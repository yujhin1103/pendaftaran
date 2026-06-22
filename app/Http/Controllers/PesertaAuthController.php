<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Pendaftaran;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PesertaAuthController extends Controller
{
    public function showLogin()
    {
        return view('peserta.login');
    }

    public function showSignup()
    {
        return view('peserta.signup');
    }

    public function signup(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:users,email',
        'username' => 'required|unique:users,name',
        'password' => 'required|min:6|confirmed',
    ]);

    User::create([
        'name' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/peserta/login')
        ->with('success', 'Akun berhasil dibuat');
}


    public function login(Request $request)
    {
        $user = User::where('name', $request->username)->first();

        if (!$user) {
            return back()->with('error', 'Username tidak ditemukan');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah');
        }

        Session::put('user_id', $user->id);
        Session::put('username', $user->name);

        return redirect('/peserta/home');
    }

    public function logout()
    {
        Session::flush();

        return redirect('/peserta/login');
    }

public function penilaian()
{
    $pendaftaran = Pendaftaran::where(
        'user_id',
        Session::get('user_id')
    )->latest()->first();

    $penilaian = null;

    if ($pendaftaran) {
        $penilaian = Penilaian::where(
            'pendaftaran_id',
            $pendaftaran->id
        )->first();
    }

    return view(
        'peserta.penilaian',
        compact('penilaian')
    );
}
public function profile()
{
    $user = User::find(Session::get('user_id'));

    $pendaftaran = Pendaftaran::where(
        'user_id',
        Session::get('user_id')
    )->latest()->first();

    return view(
        'peserta.profile',
        compact('user', 'pendaftaran')
    );
}
public function showFp()
{
    return view('peserta.fp');
}
public function sendOtp(Request $request)
{
    try {

        Mail::raw('Tes email dari sistem magang', function ($message) use ($request) {

            $message->to($request->email)
                    ->subject('Tes Email');

        });

        dd('EMAIL BERHASIL DIKIRIM');

    } catch (\Exception $e) {

        dd($e->getMessage());

    }
}
public function verifyOtp(Request $request)
{
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

    Session::put(
        'reset_email',
        $request->email
    );

    return redirect(
        '/peserta/reset-password'
    );
}
public function updatePassword(Request $request)
{
    $request->validate([

        'password' =>
            'required|min:6|confirmed'

    ]);

    $email = Session::get(
        'reset_email'
    );

    $user = User::where(
        'email',
        $email
    )->first();

    $user->update([

        'password' =>
            Hash::make(
                $request->password
            )

    ]);

    DB::table('password_resets')
        ->where(
            'email',
            $email
        )
        ->delete();

    Session::forget(
        'reset_email'
    );

    return redirect(
        '/peserta/login'
    )->with(
        'success',
        'Password berhasil diperbarui'
    );
}
}