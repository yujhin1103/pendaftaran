<?php

namespace App\Http\Controllers\Manajer;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view('manajer.dashboard');
    }
    public function penilaian(Request $request)
    {
        // Tampilkan peserta yang masih relevan untuk penilaian oleh manajer.
        // Termasuk peserta dengan status: Diterima, Melebihi Batas (sudah lewat tanggal
        // selesai tapi belum dipindahkan ke histori), atau Alumni (sudah selesai).
        // Tampilkan peserta yang telah selesai atau relevan untuk penilaian.
        $query = Pendaftaran::query();

        // Kondisi: peserta yang sudah selesai (tanggal_selesai <= hari ini)
        // atau peserta dengan status yang relevan (Diterima, Alumni).
        $query->where(function($q) {
            $q->whereDate('tanggal_selesai', '<=', Carbon::today())
              ->orWhereIn('status', ['Diterima', 'Alumni']);
        });

        if ($request->search) {
            $query->where(
                'nama_lengkap',
                'like',
                '%' . $request->search . '%'
            );
        }

        $peserta = $query->get();

        return view('manajer.penilaian', compact('peserta'));
    }
public function formPenilaian($id)
{
    $peserta = Pendaftaran::findOrFail($id);

    return view(
        'manajer.form_penilaian',
        compact('peserta')
    );
}
public function simpanPenilaian(
    Request $request,
    $id
)
{
    $total =
        $request->grooming +
        $request->motivation +
        $request->responsibility +
        $request->cooperativeness +
        $request->attendance +
        $request->job_knowledge +
        $request->quality_of_work +
        $request->job_speed +
        $request->initiative +
        $request->improvement_achieved;

    if ($total >= 41) {
        $rating = 'Excellent';
    } elseif ($total >= 31) {
        $rating = 'Very Good';
    } elseif ($total >= 21) {
        $rating = 'Good';
    } elseif ($total >= 11) {
        $rating = 'Fair';
    } else {
        $rating = 'Needs Improvement';
    }

    // Handle file upload for manager signature
    $tandaTanganManagerPath = null;
    if ($request->hasFile('tanda_tangan_manager')) {
        $file = $request->file('tanda_tangan_manager');
        $tandaTanganManagerPath = $file->store('tanda_tangan', 'public');
    }

    Penilaian::create([
        'pendaftaran_id' => $id,

        'grooming' => $request->grooming,
        'motivation' => $request->motivation,
        'responsibility' => $request->responsibility,
        'cooperativeness' => $request->cooperativeness,
        'attendance' => $request->attendance,

        'job_knowledge' => $request->job_knowledge,
        'quality_of_work' => $request->quality_of_work,
        'job_speed' => $request->job_speed,
        'initiative' => $request->initiative,
        'improvement_achieved' => $request->improvement_achieved,

        'total_score' => $total,
        'rating' => $rating,
        
        'tempat' => $request->tempat,
        'tanggal_ttd' => $request->tanggal,
        'tanda_tangan_manager' => $tandaTanganManagerPath,
        'nama_penanda_tangan_manager' => $request->nama_penanda_tangan_manager,
        'jabatan_manager' => $request->jabatan_manager
    ]);

    return redirect('/manajer/penilaian')
        ->with('success','Penilaian berhasil disimpan');
}
public function accounting()
{
    $peserta = Pendaftaran::where(
        'departemen',
        'Accounting'
    )
    ->where('status','Diterima')
    ->get();

    return view(
        'manajer.accounting',
        compact('peserta')
    );
}
}