<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Pendaftaran;

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

            dd($request->all());

    $request->validate([
        'email' => 'required|email|unique:users,email',
        'username' => 'required|unique:users,name',
        'password' => 'required|min:6|confirmed',
    ]);
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

public function profile()
{
    if (!Session::has('user_id')) {
        return redirect('/peserta/login');
    }

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
}