<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Session;
class PendaftaranController extends Controller
{
    public function store(Request $request)
{
    $foto = null;
    $cv = null;
    $surat_izin = null;

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto')
                        ->store('foto', 'public');
    }

    if ($request->hasFile('cv')) {
        $cv = $request->file('cv')
                      ->store('cv', 'public');
    }

    if ($request->hasFile('surat_izin')) {
        $surat_izin = $request->file('surat_izin')
                              ->store('surat_izin', 'public');
    }

    Pendaftaran::create([
        'user_id'        => Session::get('user_id'),
        'nama_lengkap'   => $request->nama_lengkap,
        'nama_panggilan' => $request->nama_panggilan,
        'departemen'     => $request->departemen,
        'alamat_rumah'   => $request->alamat_rumah,
        'tempat_tinggal' => $request->tempat_tinggal,
        'asal_sekolah'   => $request->asal_sekolah,
        'no_hp'          => $request->no_hp,
        'email'          => $request->email,

        'foto'          => $foto,
        'cv'            => $cv,
        'surat_izin'    => $surat_izin,
    ]);

    return redirect('/peserta/profile');
}
    
}