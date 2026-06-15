<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pendaftaran extends Model
{
  protected $fillable = [
    'user_id',
    'nama_lengkap',
    'nama_panggilan',
    'departemen',
    'alamat_rumah',
    'tempat_tinggal',
    'asal_sekolah',
    'no_hp',
    'email',
    'status',
    'foto',
    'cv',
    'surat_izin',
    'tanggal_mulai',
    'tanggal_selesai',
    'durasi_bulan'
];
}