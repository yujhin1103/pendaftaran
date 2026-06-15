<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    public function showLogin()
    {
        return view('peserta.login');
    }

    public function login(Request $request)
    {
        // nanti ditambahkan validasi database
        return redirect('/peserta/home');
    }
    public function showSignup()
{
    return view('peserta.signup');
}

public function signup(Request $request)
{
    // nanti kita hubungkan ke database
    return redirect('/peserta/login');
}
public function showFp()
{
    return view('peserta.fp');
}
public function profile()
{
    return view('peserta.profile');
}
}