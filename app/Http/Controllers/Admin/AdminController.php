<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
class AdminController extends Controller
{
   public function detailPendaftar($id)
{
    $pendaftar = Pendaftaran::findOrFail($id);

    return view('admin.detail_pendaftar', compact('pendaftar'));
}
}
