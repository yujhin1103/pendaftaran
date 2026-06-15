<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    // Halaman admin
    public function index()
    {
        $departemens = Departemen::all();

        return view('admin.departemen', compact('departemens'));
    }
public function update(Request $request, $id)
{
    $departemen = Departemen::findOrFail($id);

    $departemen->kuota = $request->kuota;
    $departemen->jumlah_terisi = $request->jumlah_terisi;
    $departemen->status = $request->status;

    $departemen->save();

    return redirect('/admin/departemen');
}
    // Halaman peserta
    public function pesertaDepartemen()
    {
        $departemens = Departemen::all();

        return view('peserta.departemen', compact('departemens'));
    }
}