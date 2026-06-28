<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftar - Admin Panel</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="admin-body">

    <div class="admin-detail-container">
        
        <a href="/admin/pendaftar" class="admin-btn-back">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Pendaftar
        </a>

        <div class="admin-page-header">
            <h1>Detail Berkas Pendaftar</h1>
            <p>Verifikasi data biodata dan kelayakan dokumen pendukung milik peserta secara teliti.</p>
        </div>

        <div class="detail-main-layout">
            
            <div class="detail-info-card">
                <div class="card-section-title">
                    <i class="fa-solid fa-id-card"></i> Informasi Biodata
                </div>
                
                <div class="biodata-grid">
                    <div class="bio-row">
                        <span class="bio-label">Nama Lengkap</span>
                        <span class="bio-semicolon">:</span>
                        <span class="bio-value"><strong>{{ $pendaftar->nama_lengkap ?? 'Yujhin' }}</strong></span>
                    </div>
                    <div class="bio-row">
                        <span class="bio-label">Nama Panggilan</span>
                        <span class="bio-semicolon">:</span>
                        <span class="bio-value">{{ $pendaftar->nama_panggilan ?? 'yuu' }}</span>
                    </div>
                    <div class="bio-row">
                        <span class="bio-label">Asal Sekolah / Kampus</span>
                        <span class="bio-semicolon">:</span>
                        <span class="bio-value">{{ $pendaftar->asal_sekolah ?? 'UGM' }}</span>
                    </div>
                    <div class="bio-row">
                        <span class="bio-label">Departemen Tujuan</span>
                        <span class="bio-semicolon">:</span>
                        <span class="bio-value highlight-text">{{ $pendaftar->departemen ?? 'Food & Beverage Product' }}</span>
                    </div>
                    <div class="bio-row">
                        <span class="bio-label">Nomor HP / WA</span>
                        <span class="bio-semicolon">:</span>
                        <span class="bio-value">{{ $pendaftar->no_hp ?? '089999911' }}</span>
                    </div>
                    <div class="bio-row">
                        <span class="bio-label">Alamat Email</span>
                        <span class="bio-semicolon">:</span>
                        <span class="bio-value">{{ $pendaftar->email ?? 'harisyujhin@gmail.com' }}</span>
                    </div>
                    <div class="bio-row">
                        <span class="bio-label">Alamat Rumah (KTP)</span>
                        <span class="bio-semicolon">:</span>
                        <span class="bio-value">{{ $pendaftar->alamat_rumah ?? 'sempor' }}</span>
                    </div>
                    <div class="bio-row">
                        <span class="bio-label">Tempat Tinggal (Domisili)</span>
                        <span class="bio-semicolon">:</span>
                        <span class="bio-value">{{ $pendaftar->tempat_tinggal ?? 'sempor' }}</span>
                    </div>
                    <div class="bio-row">
                        <span class="bio-label">Status Verifikasi</span>
                        <span class="bio-semicolon">:</span>
                        <span class="bio-value">
                            <span class="badge-status-waiting">MENUNGGU</span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="detail-sidebar-card">
                <div class="card-section-title">
                    <i class="fa-solid fa-image"></i> Pas Foto Peserta
                </div>
                
                <!-- PERBAIKAN: Mengambil foto asli pendaftar dari storage -->
<div class="photo-preview-box">
    @if(!empty($pendaftar->foto) && Storage::disk('public')->exists($pendaftar->foto))
        <!-- Jika file foto ada di database dan storage -->
        <img src="{{ asset('storage/' . $pendaftar->foto) }}" alt="Pas Foto {{ $pendaftar->nama_lengkap }}" class="img-pendaftar-responsive">
    @else
        <!-- Jika kosong, gunakan gambar default berformat SVG/URL gratis biar gak pecah lagi -->
        <img src="https://ui-avatars.com/api/?name={{ urlencode($pendaftar->nama_lengkap ?? 'Yujhin') }}&background=f7f4eb&color=8c7643&size=250" alt="Avatar Default" class="img-pendaftar-responsive">
    @endif
</div>

                <div class="card-section-title" style="margin-top: 25px;">
                    <i class="fa-solid fa-file-pdf"></i> Lampiran Berkas
                </div>
                
                <!-- PERBAIKAN: Tombol Download Berkas Terhubung ke Storage -->
<div class="document-action-group">
    
    <!-- Tombol Download CV -->
    @if(!empty($pendaftar->cv))
        <a href="{{ asset('storage/' . $pendaftar->cv) }}" class="btn-download-attachment btn-cv" target="_blank" download>
            <i class="fa-solid fa-file-arrow-down"></i> Download File CV
        </a>
    @else
        <button class="btn-download-attachment btn-cv" style="background-color: #d1cbdc; border-color: #c0b9cc; cursor: not-allowed;" disabled>
            <i class="fa-solid fa-file-circle-xmark"></i> CV Tidak Tersedia
        </button>
    @endif

    <!-- Tombol Download Surat Pengantar -->
    @if(!empty($pendaftar->surat_izin))
        <a href="{{ asset('storage/' . $pendaftar->surat_izin) }}" class="btn-download-attachment btn-surat" target="_blank" download>
            <i class="fa-solid fa-envelope-open-text"></i> Download Surat Pengantar
        </a>
    @else
        <button class="btn-download-attachment btn-surat" style="background-color: #f1ede6; color: #a19a8f; border-color: #e1dad0; cursor: not-allowed;" disabled>
            <i class="fa-solid fa-file-circle-xmark"></i> Surat Tidak Tersedia
        </button>
    @endif

</div>
            </div>

        </div>

    </div>

</body>
</html>