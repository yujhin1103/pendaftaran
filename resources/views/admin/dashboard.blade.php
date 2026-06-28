<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard HR Admin - Panel Kendali</title>

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
                <a href="/admin/login" class="admin-logout-top"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </div>
        </div>
    </div>

    <div class="admin-detail-container">
        
        <div class="admin-page-header" style="margin-top: 20px;">
            <h1>Sistem Informasi Manajemen Magang Hotel</h1>
            <p>Selamat datang kembali di Panel Kendali Administrasi. Silakan pilih menu di bawah untuk mengelola data operasional magang.</p>
        </div>

        <div class="dashboard-grid-container">
            
            <a href="/admin/peserta" class="dashboard-menu-card">
                <div class="card-icon-wrapper">
                    <i class="fa-solid fa-users-gear"></i>
                </div>
                <h3>Peserta Magang</h3>
                <p>Kelola data seluruh peserta magang aktif, durasi, serta status operasional harian.</p>
                <span class="card-action-link">Buka Modul <i class="fa-solid fa-arrow-right"></i></span>
            </a>

            <a href="{{ url('/admin/departemen') }}" class="dashboard-menu-card">
                <div class="card-icon-wrapper">
                    <i class="fa-solid fa-hotel"></i>
                </div>
                <h3>Kelola Departemen</h3>
                <p>Atur kapasitas kuota pendaftaran, jumlah slot terisi, dan ketersediaan departemen hotel.</p>
                <span class="card-action-link">Buka Modul <i class="fa-solid fa-arrow-right"></i></span>
            </a>

            <a href="/admin/pendaftar" class="dashboard-menu-card">
                <div class="card-icon-wrapper">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                <h3>Data Pendaftar</h3>
                <p>Verifikasi berkas dokumen masuk, CV, serta persetujuan penerimaan calon peserta magang.</p>
                <span class="card-action-link">Buka Modul <i class="fa-solid fa-arrow-right"></i></span>
            </a>

            <a href="/admin/penilaian" class="dashboard-menu-card">
                <div class="card-icon-wrapper">
                    <i class="fa-solid fa-file-signature"></i>
                </div>
                <h3>Penilaian Peserta</h3>
                <p>Input evaluasi skor performa, rating kerja, dan pengelolaan berkas PDF sertifikat akhir.</p>
                <span class="card-action-link">Buka Modul <i class="fa-solid fa-arrow-right"></i></span>
            </a>

            <a href="/admin/histori-peserta" class="dashboard-menu-card">
                <div class="card-icon-wrapper">
                    <i class="fa-solid fa-user-graduate"></i>
                </div>
                <h3>Histori Peserta</h3>
                <p>Arsip rekam jejak alumni peserta magang yang telah menyelesaikan program evaluasi resmi.</p>
                <span class="card-action-link">Buka Modul <i class="fa-solid fa-arrow-right"></i></span>
            </a>

            <a href="/admin/histori-pendaftar" class="dashboard-menu-card">
                <div class="card-icon-wrapper">
                    <i class="fa-solid fa-box-archive"></i>
                </div>
                <h3>Histori Pendaftar</h3>
                <p>Melihat kembali data berkas lamaran pendaftar magang yang telah ditolak sistem seleksi.</p>
                <span class="card-action-link">Buka Modul <i class="fa-solid fa-arrow-right"></i></span>
            </a>

        </div>

    </div>

</body>
</html>