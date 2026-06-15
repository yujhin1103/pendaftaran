<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function pendaftar()
{
    $pendaftar = Pendaftaran::where(
        'status',
        'Menunggu'
    )->get();

    return view(
        'admin.pendaftar',
        compact('pendaftar')
    );
}   
public function terima($id)
{
    $pendaftar = Pendaftaran::findOrFail($id);

    $pendaftar->status = 'Diterima';

    $pendaftar->save();

    return back();
}

public function tolak($id)
{
    $pendaftar = Pendaftaran::findOrFail($id);

    $pendaftar->status = 'Ditolak';

    $pendaftar->save();

    return back();
}
public function detailPendaftar($id)
{
    $pendaftar = Pendaftaran::findOrFail($id);

    return view(
        'admin.detail_pendaftar',
        compact('pendaftar')
    );
}
public function hapus($id)
{
    $pendaftar = Pendaftaran::findOrFail($id);

    if ($pendaftar->foto) {
        Storage::disk('public')->delete($pendaftar->foto);
    }

    if ($pendaftar->cv) {
        Storage::disk('public')->delete($pendaftar->cv);
    }

    if ($pendaftar->surat_izin) {
        Storage::disk('public')->delete($pendaftar->surat_izin);
    }

    $pendaftar->delete();

    return redirect('/admin/histori-pendaftar')
        ->with('success', 'Data pendaftar berhasil dihapus');
}
public function showTerima($id)
{
    $pendaftar = Pendaftaran::findOrFail($id);

    return view(
        'admin.terima_pendaftar',
        compact('pendaftar')
    );
}   
public function prosesTerima(Request $request, $id)
{
    $pendaftar = Pendaftaran::findOrFail($id);

    $mulai = Carbon::parse($request->tanggal_mulai);

    $selesai = Carbon::parse($request->tanggal_selesai);

    $durasi = $mulai->diffInMonths($selesai);

    $pendaftar->status = 'Diterima';

    $pendaftar->tanggal_mulai =
        $request->tanggal_mulai;

    $pendaftar->tanggal_selesai =
        $request->tanggal_selesai;

    $pendaftar->durasi_bulan =
        $durasi;

    $pendaftar->save();

    return redirect('/admin/pendaftar');
}
public function peserta(Request $request)
{
    Pendaftaran::where('status', 'Diterima')
        ->whereDate('tanggal_selesai', '<', Carbon::today())
        ->update([
            'status' => 'Melebihi Batas'
        ]);

    $query = Pendaftaran::whereIn('status', [
        'Diterima',
        'Melebihi Batas'
    ]);

    if ($request->search) {
        $query->where(
            'nama_lengkap',
            'like',
            '%' . $request->search . '%'
        );
    }

    $peserta = $query->get();

    return view(
        'admin.peserta',
        compact('peserta')
    );
}
public function editPeserta($id)
{
    $peserta = Pendaftaran::findOrFail($id);

    return view(
        'admin.edit_peserta',
        compact('peserta')
    );
}
public function updatePeserta(Request $request, $id)
{
    $peserta = Pendaftaran::findOrFail($id);

    $mulai = Carbon::parse($request->tanggal_mulai);

    $selesai = Carbon::parse($request->tanggal_selesai);

    $durasi = $mulai->diffInMonths($selesai);

    $peserta->update([

        'nama_lengkap' =>
            $request->nama_lengkap,

        'nama_panggilan' =>
            $request->nama_panggilan,

        'departemen' =>
            $request->departemen,

        'asal_sekolah' =>
            $request->asal_sekolah,

        'no_hp' =>
            $request->no_hp,

        'email' =>
            $request->email,

        'tanggal_mulai' =>
            $request->tanggal_mulai,

        'tanggal_selesai' =>
            $request->tanggal_selesai,

        'durasi_bulan' =>
            $durasi,

    ]);

    return redirect('/admin/peserta');
}
public function selesaiMagang($id)
{
    $peserta = Pendaftaran::findOrFail($id);

    $peserta->status = 'Alumni';

    $peserta->save();

    return redirect('/admin/peserta')
        ->with(
            'success',
            'Peserta berhasil dipindahkan ke histori'
        );
}
public function historiPeserta()
{
    $histori = Pendaftaran::where(
        'status',
        'Alumni'
    )->get();

    return view(
        'admin.histori_peserta',
        compact('histori')
    );
}
public function tolakPeserta($id)
{
    $peserta = Pendaftaran::findOrFail($id);

    $peserta->status = 'Ditolak';

    $peserta->save();

    return redirect('/admin/peserta')
        ->with('success', 'Peserta berhasil ditolak');
}
public function historiPendaftar()
{
    $histori = Pendaftaran::where(
        'status',
        'Ditolak'
    )->get();

    return view(
        'admin.histori_pendaftar',
        compact('histori')
    );
}
}