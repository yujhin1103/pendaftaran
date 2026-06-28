<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Manajer - Panel Eksekutif</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="admin-body"> <div class="admin-header-nav" style="border-bottom: 3px solid #8c7643;"> <div class="admin-nav-container">
            <div class="header-user">
                <i class="fa-solid fa-user-tie"></i> Manajer
            </div>
            <div class="header-menu-admin">
                <a href="/manajer/dashboard"><i class="fa-solid fa-gauge"></i> Home</a>
                <a href="#" onclick="logoutManajer()" class="admin-logout-top"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </div>
        </div>
    </div>

    <div class="admin-detail-container">
        
        <div class="admin-page-header" style="margin-top: 25px;">
            <span style="color: #a38a53; font-family: 'Barlow Condensed'; font-weight: 600; letter-spacing: 1px; text-transform: uppercase;">Executive Portal</span>
            <h1>Dashboard Persetujuan Manajer</h1>
            <p>Selamat datang di ruang kendali manajerial. Silakan periksa, berikan tanda tangan digital, dan lakukan verifikasi akhir pada berkas evaluasi peserta magang.</p>
        </div>

        <div class="dashboard-grid-container" style="justify-content: center; grid-template-columns: repeat(auto-fill, minmax(360px, 400px));">
            
            <a href="/manajer/penilaian" class="dashboard-menu-card manager-card-premium">
                <div class="card-icon-wrapper" style="background-color: #f7f4eb; border-color: #e3d9bd;">
                    <i class="fa-solid fa-file-signature" style="color: #8c7643;"></i>
                </div>
                <h3>Modul Evaluasi Penilaian</h3>
                <p>Tinjau lembar rekap nilai, validasi skor performa praktikum, serta tambahkan tanda tangan resmi Manajer untuk penerbitan sertifikat final.</p>
                <span class="card-action-link" style="color: #8c7643;">
                    Mulai Verifikasi Data <i class="fa-solid fa-arrow-right-long"></i>
                </span>
            </a>

        </div>

    </div>

    <script>
    function logoutManajer(){
        let konfirmasi = confirm("Apakah anda ingin keluar dari Panel Eksekutif Manajer sekarang?");
        if(konfirmasi){
            window.location.href = "/manajer/login";
        }
    }
    </script>

</body>
</html>