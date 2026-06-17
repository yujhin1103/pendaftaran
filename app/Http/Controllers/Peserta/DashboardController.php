<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('peserta.dashboard');
    }
}