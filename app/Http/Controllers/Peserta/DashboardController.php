<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('peserta.dashboard');
    }

    public function penilaian()
    {
        // Get current user's pendaftaran
        $username = Session::get('username');
        $pendaftaran = Pendaftaran::where('email', auth()->guard('web')->user()->email ?? null)->first();

        // If no pendaftaran from email, try to get from user
        if (!$pendaftaran && Session::has('user_id')) {
            $pendaftaran = Pendaftaran::where('user_id', Session::get('user_id'))->first();
        }

        if (!$pendaftaran) {
            return view('peserta.penilaian', ['penilaian' => null, 'message' => 'Data pendaftaran tidak ditemukan']);
        }

        // Get penilaian for this pendaftaran (only if both manager and HRD have signed)
        $penilaian = Penilaian::where('pendaftaran_id', $pendaftaran->id)
            ->whereNotNull('tanda_tangan_manager')
            ->whereNotNull('tanda_tangan_hrd')
            ->first();

        return view('peserta.penilaian', compact('penilaian', 'pendaftaran'));
    }

    public function downloadPenilaian($id)
    {
        $penilaian = Penilaian::findOrFail($id);

        // Verify this penilaian belongs to current user's pendaftaran
        $username = Session::get('username');
        $pendaftaran = Pendaftaran::where('email', auth()->guard('web')->user()->email ?? null)
            ->where('id', $penilaian->pendaftaran_id)
            ->first();

        if (!$pendaftaran && Session::has('user_id')) {
            $pendaftaran = Pendaftaran::where('user_id', Session::get('user_id'))
                ->where('id', $penilaian->pendaftaran_id)
                ->first();
        }

        if (!$pendaftaran) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke dokumen ini.');
        }

        if (! $penilaian->dokumen_penilaian || ! Storage::disk('public')->exists($penilaian->dokumen_penilaian)) {
            return redirect()->back()->with('error', 'Dokumen penilaian tidak tersedia.');
        }

        $path = storage_path('app/public/' . $penilaian->dokumen_penilaian);
        $name = basename($penilaian->dokumen_penilaian);

        return response()->download($path, $name);
    }
}