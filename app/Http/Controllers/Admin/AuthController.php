<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

   public function login(Request $request)
{
    $admin = DB::table('admins')
        ->where('username', $request->username)
        ->first();

    if (!$admin) {
        return back()->with('error', 'Username atau Password Salah');
    }

    if ($admin->password != $request->password) {
        return back()->with('error', 'Username atau Password Salah');
    }

    return redirect('/admin/dashboard');
}
}