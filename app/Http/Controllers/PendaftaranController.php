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
public function prosesPendaftaran(Request $request)
{
    // 1. Validasi berkas & teks
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'nama_panggilan' => 'required|string|max:100',
        'departemen' => 'required',
        'no_hp' => 'required',
        'email' => 'required|email',
        'alamat_rumah' => 'required',
        'tempat_tinggal' => 'required',
        'foto' => 'nullable|image|max:2048',
        'cv' => 'required|mimes:pdf,doc,docx|max:2048',
        'surat_pengantar' => 'required|mimes:pdf,doc,docx|max:2048',
    ]);

    // 2. Ambil data atau buat data baru (sesuaikan dengan nama Model kamu, misal: Pendaftar)
    // Jika nama modelmu bukan Pendaftar, silakan sesuaikan namanya
    $pendaftar = new \App\Models\Pendaftaran(); 
    $pendaftar->nama_lengkap = $request->nama_lengkap;
    $pendaftar->nama_panggilan = $request->nama_panggilan;
    $pendaftar->departemen = $request->departemen;
    $pendaftar->no_hp = $request->no_hp;
    $pendaftar->email = $request->email;
    $pendaftar->alamat_rumah = $request->alamat_rumah;
    $pendaftar->tempat_tinggal = $request->tempat_tinggal;

    // 3. Simpan File ke Storage
    if ($request->hasFile('foto')) {
        $pendaftar->foto = $request->file('foto')->store('pendaftar/foto', 'public');
    }
    if ($request->hasFile('cv')) {
        $pendaftar->cv = $request->file('cv')->store('pendaftar/cv', 'public');
    }
    if ($request->hasFile('surat_pengantar')) {
        $pendaftar->surat_pengantar = $request->file('surat_pengantar')->store('pendaftar/surat', 'public');
    }

    $pendaftar->save();

    // 4. Kembali ke halaman utama dengan pesan sukses
    return redirect('/peserta/home')->with('success', 'Pendaftaran berhasil dikirim!');
}
    
}