<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function formForgotPassword()
{
    return view('peserta.forgot_password');
}
public function sendOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    $user = User::where(
        'email',
        $request->email
    )->first();

    if (!$user) {

        return back()->with(
            'error',
            'Email tidak ditemukan'
        );

    }

    $otp = rand(100000,999999);

    PasswordReset::updateOrCreate(

        [
            'email' => $request->email
        ],

        [
            'otp' => $otp,
            'expired_at' => now()->addMinutes(10)
        ]
    );

    session([
    'otp_email' => $request->email
]);
    return back()->with(
        'success',
        'Kode OTP Anda : ' . $otp
    );
}
public function verifyOtp(Request $request)
{
     dd($request->all());

    // kode lama...
    $data = DB::table('password_resets')
        ->where(
            'email',
            $request->email
        )
        ->first();

    if (!$data) {

        return back()->with(
            'error',
            'Kode tidak ditemukan'
        );

    }

    if ($data->otp != $request->otp) {

        return back()->with(
            'error',
            'Kode OTP salah'
        );

    }

    if (now()->gt($data->expired_at)) {

        return back()->with(
            'error',
            'Kode OTP sudah kadaluarsa'
        );

    }

    session([
        'reset_email' => $request->email
    ]);

    return redirect(
        '/peserta/reset-password'
    );
}
public function formResetPassword()
{
    return view('peserta.reset_password');
}
public function updatePassword(Request $request)
{
    $request->validate([
        'password' => 'required|min:6|confirmed'
    ]);

    $email = session('reset_email');

    User::where(
        'email',
        $email
    )->update([

        'password' => Hash::make(
            $request->password
        )

    ]);

    DB::table('password_resets')
        ->where(
            'email',
            $email
        )
        ->delete();

    session()->forget(
        'reset_email'
    );

    return redirect('/peserta/login')
        ->with(
            'success',
            'Password berhasil diperbarui'
        );
}
}
