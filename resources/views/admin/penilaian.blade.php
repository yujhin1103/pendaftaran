<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Peserta Magang - Admin Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="admin-body">

    <div class="admin-header-nav">
        <div class="admin-nav-container">
            <div class="header-user">
                <i class="fa-solid fa-user-shield"></i> Hr_admin
            </div>
            <div class="header-menu-admin">
                <a href="/admin/dashboard"><i class="fa-solid fa-gauge"></i> Home</a>
                <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </div>
        </div>
    </div>

    <div class="admin-detail-container">
        
        <a href="/admin/dashboard" class="admin-btn-back">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
        </a>

        <div class="admin-page-header">
            <h1>Penilaian Peserta Magang</h1>
            <p>Kelola skor evaluasi kinerja, verifikasi tanda tangan dokumen, serta unggah berkas penilaian akhir.</p>
        </div>

        <div class="admin-action-bar">
            <form action="/admin/penilaian" method="GET" class="search-form-admin">
                <div class="search-box-wrapper">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Cari penilaian..." 
                        class="search-input-admin"
                    >
                </div>
                <button type="submit" class="search-btn-admin">Cari</button>
            </form>
        </div>

        <div class="admin-table-card">
            <table class="admin-data-table">
                <thead>
                    <tr>
                        <th>Nama Peserta</th>
                        <th>Departemen & Asal</th>
                        <th style="text-align: center; width: 110px;">Skor & Rating</th>
                        <th style="width: 150px;">Tanggal TTD</th>
                        <th>Status Dokumen</th>
                        <th style="text-align: center; width: 280px;">Aksi Berkas Administrasi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($penilaian->count() == 0)
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 40px; color: #a38a53;">
                            <i class="fa-solid fa-file-signature" style="font-size: 2rem; display: block; margin-bottom: 10px;"></i>
                            Penilaian tidak ditemukan.
                        </td>
                    </tr>
                    @endif

                    @foreach($penilaian as $data)
                    <tr>
                        <td class="td-primary-name">
                            {{ $data->pendaftaran->nama_lengkap }}
                        </td>
                        
                        <td>
                            <span class="admin-highlight-dept">{{ $data->pendaftaran->departemen }}</span>
                            <div style="font-size: 0.95rem; color: #7a7167; margin-top: 2px;">
                                <i class="fa-solid fa-graduation-cap"></i> {{ $data->pendaftaran->asal_sekolah }}
                            </div>
                        </td>
                        
                        <td style="text-align: center;">
                            <div class="score-main-value">{{ $data->total_score }}</div>
                            <span class="rating-sub-badge"><i class="fa-solid fa-star"></i> {{ $data->rating }}</span>
                        </td>
                        
                        <td>
                            <span class="table-date-info">
                                <i class="fa-regular fa-calendar-check"></i> 
                                {{ $data->tanggal_ttd ? date('d-m-Y', strtotime($data->tanggal_ttd)) : '-' }}
                            </span>
                        </td>
                        
                        <td>
                            <div style="display: flex; flex-direction: column; gap: 5px;">
                                @if(isset($data->dokumen_penilaian) && $data->dokumen_penilaian)
                                    <span class="badge-status-doc doc-success"><i class="fa-solid fa-file-pdf"></i> PDF Uploaded</span>
                                @else
                                    <span class="badge-status-doc doc-danger"><i class="fa-solid fa-file-circle-xmark"></i> PDF Missing</span>
                                @endif

                                @if($data->tanda_tangan_hrd)
                                    <span class="badge-status-doc doc-success"><i class="fa-solid fa-pen-nib"></i> HRD Signed</span>
                                @else
                                    <span class="badge-status-doc doc-danger"><i class="fa-solid fa-signature"></i> HRD Unsigned</span>
                                @endif
                            </div>
                        </td>
                        
                        <td>
                            <div class="admin-action-grid-buttons">
                                <a href="/admin/penilaian/{{ $data->id }}" class="admin-act-btn btn-act-detail" title="Lihat Detail Penilaian">
                                    <i class="fa-solid fa-eye"></i> Detail
                                </a>

                                <a href="/admin/penilaian/{{ $data->id }}/edit-hrd" class="admin-act-btn btn-act-warning" title="Tanda Tangan HRD">
                                    <i class="fa-solid fa-file-signature"></i> TTD HRD
                                </a>

                                @if($data->tanda_tangan_manager && $data->tanda_tangan_hrd)
                                    <a href="/admin/penilaian/{{ $data->id }}/upload" class="admin-act-btn btn-act-success" title="Upload PDF Final">
                                        <i class="fa-solid fa-cloud-arrow-up"></i> Upload Final
                                    </a>
                                @endif 

                                @if($data->tanda_tangan_manager && $data->tanda_tangan_hrd && $data->dokumen_penilaian)
                                    <form action="/admin/penilaian/selesai/{{ $data->id }}" method="POST" style="display:inline; width: 100%;">
                                        @csrf
                                        <button 
                                            type="submit" 
                                            class="admin-act-btn btn-act-primary-submit" 
                                            onclick="return confirm('Penilaian sudah selesai?')"
                                        >
                                            <i class="fa-solid fa-circle-check"></i> Selesai
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>