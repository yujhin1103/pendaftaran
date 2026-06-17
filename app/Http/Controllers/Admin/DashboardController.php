<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Penilaian;
use Barryvdh\DomPDF\Facade\Pdf;
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
    // Jangan otomatis mengubah kolom status di database berdasarkan tanggal.
    // Tampilkan kondisi "Melebihi Batas" hanya di tampilan saat diperlukan.
    $query = Pendaftaran::query();

    // Default filter: tampilkan peserta yang relevan (Diterima, Melebihi Batas, Alumni)
    $query->whereIn('status', ['Diterima', 'Melebihi Batas', 'Alumni']);

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

public function penilaian(Request $request)
{
    $query = \App\Models\Penilaian::with('pendaftaran');

    if ($request->search) {
        $query->whereHas('pendaftaran', function($q) use ($request) {
            $q->where('nama_lengkap', 'like', '%' . $request->search . '%');
        });
    }

    $penilaian = $query->get();

    return view('admin.penilaian', compact('penilaian'));
}

public function detailPenilaian($id)
{
    $penilaian = \App\Models\Penilaian::findOrFail($id);

    return view('admin.detail_penilaian', compact('penilaian'));
}

public function editPenilaian($id)
{
    $penilaian = \App\Models\Penilaian::findOrFail($id);

    return view('admin.edit_penilaian', compact('penilaian'));
}

public function updatePenilaian(Request $request, $id)
{
    $penilaian = \App\Models\Penilaian::findOrFail($id);

    // Handle file upload for HRD signature
    $tandaTanganHrdPath = $penilaian->tanda_tangan_hrd;
    if ($request->hasFile('tanda_tangan_hrd')) {
        if ($penilaian->tanda_tangan_hrd) {
            Storage::disk('public')->delete($penilaian->tanda_tangan_hrd);
        }
        $file = $request->file('tanda_tangan_hrd');
        $tandaTanganHrdPath = $file->store('tanda_tangan', 'public');
    }

   
    $penilaian->update([
    'tanda_tangan_hrd' => $tandaTanganHrdPath,
    'nama_penanda_tangan_hrd' => $request->nama_penanda_tangan_hrd,
    'jabatan_hrd' => $request->jabatan_hrd
]);

    return redirect('/admin/penilaian')->with('success', 'Tanda tangan HRD dan dokumen penilaian berhasil disimpan');
}

public function downloadPenilaianDokumen($id)
{
    $penilaian = \App\Models\Penilaian::findOrFail($id);

    if (! $penilaian->dokumen_penilaian || ! Storage::disk('public')->exists($penilaian->dokumen_penilaian)) {
        return redirect()->back()->with('error', 'Dokumen penilaian tidak tersedia.');
    }

    $path = storage_path('app/public/' . $penilaian->dokumen_penilaian);
    $name = basename($penilaian->dokumen_penilaian);

    return response()->download($path, $name);
}
public function formUploadPenilaian($id)
{
    $penilaian = Penilaian::findOrFail($id);

    return view(
        'admin.upload_penilaian',
        compact('penilaian')
    );
}
public function simpanDokumenPenilaian(Request $request, $id)
{
    $request->validate([
        'dokumen_penilaian' =>
            'required|mimes:pdf|max:5120'
    ]);

    $penilaian = Penilaian::findOrFail($id);

    $file = $request->file('dokumen_penilaian')
        ->store('dokumen_penilaian', 'public');

    $penilaian->update([
        'dokumen_penilaian' => $file
    ]);

    return redirect('/admin/penilaian')
        ->with(
            'success',
            'Form penilaian final berhasil diupload'
        );
}
public function downloadPdf($id)
{
    $penilaian = Penilaian::with('pendaftaran')
        ->findOrFail($id);

    $pdf = Pdf::loadView(
        'pdf.penilaian',
        compact('penilaian')
    );

    return $pdf->download(
        'Penilaian_' .
        $penilaian->pendaftaran->nama_lengkap .
        '.pdf'
    );
}
}
