<?php

namespace App\Http\Controllers\Manajer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    public function showLogin()
    {
        return view('manajer.login');
    }
    public function login(Request $request)
{
    $manajer = DB::table('manajers')
        ->where('username', $request->username)
        ->first();

    if (!$manajer) {
        return back()->with('error', 'Username atau Password Salah');
    }

    if ($manajer->password != $request->password) {
        return back()->with('error', 'Username atau Password Salah');
    }

    return redirect('/manajer/dashboard');
}
}