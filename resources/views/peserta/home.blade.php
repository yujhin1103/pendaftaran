<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Peserta Magang - Royal Ambarrukmo</title>

    <!-- Google Fonts: Playfair Display & Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Memanggil CSS Eksternal -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- HEADER -->
    <header class="home-header">
        <div class="header-container">
            <!-- Bagian Kiri: Identitas Pengguna -->
            <div class="header-left">
                <div class="user-avatar">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <div class="user-text">
                    <span>Hello,</span>
                    @if(session('username'))
                        <h3>{{ session('username') }}</h3>
                    @else
                        <h3>Guest</h3>
                    @endif
                </div>
            </div>

            <!-- Bagian Tengah: Logo -->
            <div class="header-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Royal Ambarrukmo Logo">
            </div>

            <!-- Bagian Kanan: Menu Navigasi -->
            <nav class="header-menu">
                <a href="/peserta/home" class="menu-item active"><i class="fa-solid fa-house"></i> Home</a>
                <a href="/peserta/departemen" class="menu-item"><i class="fa-solid fa-hotel"></i> Department</a>
                <a href="/peserta/pendaftaran" class="menu-item"><i class="fa-solid fa-file-signature"></i> Register</a>
                <a href="/peserta/profile" class="menu-item"><i class="fa-solid fa-user-gear"></i> Profile</a>
                <a href="/peserta/penilaian" class="menu-item"><i class="fa-solid fa-star-half-stroke"></i> Penilaian</a>
                <a href="#" onclick="logoutConfirm()" class="menu-item btn-logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </nav>
        </div>
    </header>

    <!-- BANNER HERO -->
    <section class="banner-home" style="background-image: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.55)), url('{{ asset('images/kasul.jpg') }}');">
        <div class="banner-home-content">
            <h1>Internship Dashboard</h1>
            <p>Selamat datang kembali di portal resmi pelatihan kerja Royal Ambarrukmo Yogyakarta</p>
        </div>
    </section>

    <!-- KONTEN UTAMA -->
    <main class="main-container">
        
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
                        <strong>Pendaftaran Peserta</strong>
                        Peserta magang wajib mendaftar sebanyak satu kali saja, bila tidak diterima maka boleh mendaftar kembali.
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
    </main>

    <!-- JAVASCRIPT LOGOUT -->
    <script>
    function logoutConfirm() {
        let konfirmasi = confirm("Apakah anda ingin keluar sekarang?");
        if(konfirmasi){
            window.location.href = "/peserta/logout";
        }
    }
    </script>

</body>
</html>