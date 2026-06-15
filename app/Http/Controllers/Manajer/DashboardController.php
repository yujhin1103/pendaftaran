<?php

namespace App\Http\Controllers\Manajer;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('manajer.dashboard');
    }
    public function penilaian(Request $request)
{
    $query = Pendaftaran::where('status', 'Diterima');

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

    // Handle file upload
    $tandaTanganPath = null;
    if ($request->hasFile('tanda_tangan')) {
        $file = $request->file('tanda_tangan');
        $tandaTanganPath = $file->store('tanda_tangan', 'public');
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
        'tanda_tangan' => $tandaTanganPath
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