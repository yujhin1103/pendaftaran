<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'pendaftaran_id',
        'grooming',
        'motivation',
        'responsibility',
        'cooperativeness',
        'attendance',
        'job_knowledge',
        'quality_of_work',
        'job_speed',
        'initiative',
        'improvement_achieved',
        'total_score',
        'rating',
        'tempat',
        'tanggal_ttd',
        'tanda_tangan_manager',
        'nama_penanda_tangan_manager',
        'jabatan_manager',
        'tanda_tangan_hrd',
        'nama_penanda_tangan_hrd',
        'jabatan_hrd',
        'dokumen_penilaian'
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
