<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Peserta - Royal Ambarrukmo</title>

    <!-- Google Fonts: Kombinasi Playfair Display & Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Memanggil CSS Eksternal -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<!-- HEADER -->
<div class="header">
    <div class="welcome">
        Welcome, Prospective Trainee!
    </div>
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Royal Ambarrukmo Logo">
    </div>
    <div class="login-area">
        <a href="/peserta/login" class="login-btn">Login Portal</a>
    </div>
</div>

<!-- HERO BANNER -->
<div class="banner" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.5)), url('{{ asset('images/kasul.jpg') }}');">
    <div class="banner-content">
        <h1>Hotel Internship Program</h1>
        <p>Royal Ambarrukmo Yogyakarta</p>
    </div>
</div>

<!-- CONTAINER UTAMA -->
<div class="container">

    <!-- INFO BAR -->
    <div class="info-box">
        <i class="fa-solid fa-circle-info"></i>
        <p>Sebelum memulai proses pendaftaran, harap baca dengan seksama aturan dan ketentuan yang berlaku di bawah ini.</p>
    </div>

    <!-- CONTENT GRID -->
    <div class="grid-container">
        
        <!-- CARD 1: RULES -->
        <div class="card">
            <h2><i class="fa-solid fa-clipboard-list"></i> Ketentuan Pendaftaran</h2>
            <ul class="custom-list">
                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    <strong>Pembuatan Akun</strong>
                    Peserta magang wajib membuat akun terlebih dahulu sebelum melakukan pendaftaran resmi.
                </li>
                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    <strong>Monitoring Berkala</strong>
                    Peserta magang wajib memeriksa status seleksi dan pendaftaran secara berkala melalui dashboard ini.
                </li>
                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    <strong>Kepatuhan Syarat</strong>
                    Peserta harus memenuhi seluruh syarat, berkas, dan ketentuan yang telah ditetapkan oleh manajemen hotel.
                </li>
                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    <strong>Data Kontak Aktif</strong>
                    Pada saat pendaftaran, peserta wajib menggunakan nomor HP (WhatsApp) dan alamat email yang aktif.
                </li>
            </ul>
        </div>

        <!-- CARD 2: BENEFITS -->
        <div class="card">
            <h2><i class="fa-solid fa-gift"></i> Benefit & Keuntungan</h2>
            <ul class="custom-list">
                <li>
                    <i class="fa-solid fa-star"></i>
                    <strong>Sertifikat Resmi</strong>
                    Mendapatkan sertifikat magang resmi yang dikeluarkan langsung oleh manajemen Royal Ambarrukmo Yogyakarta.
                </li>
                <li>
                    <i class="fa-solid fa-star"></i>
                    <strong>Pengalaman & Mentorship</strong>
                    Mendapatkan bimbingan langsung (one-on-one) dari para profesional hospitality dan Heads of Department (HOD) berpengalaman.
                </li>
                <li>
                    <i class="fa-solid fa-star"></i>
                    <strong>Fasilitas Penunjang</strong>
                    Penyediaan makan di Duty Cafeteria karyawan selama giliran kerja (shift) serta peminjaman seragam kerja standar hotel.
                </li>
            </ul>
        </div>

    </div>
</div>

<!-- FOOTER -->
<div class="dashboard-footer">
    <p>&copy; {{ date('Y') }} Royal Ambarrukmo Hotel Yogyakarta. All rights reserved.</p>
</div>

</body>
</html>