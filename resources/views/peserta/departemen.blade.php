<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departemen Magang - Royal Ambarrukmo</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="home-header">
        <div class="header-container">
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

            <div class="header-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Royal Ambarrukmo Logo">
            </div>

            <nav class="header-menu">
                <a href="/peserta/home" class="menu-item"><i class="fa-solid fa-house"></i> Home</a>
                <a href="/peserta/departemen" class="menu-item active"><i class="fa-solid fa-hotel"></i> Department</a>
                <a href="/peserta/pendaftaran" class="menu-item"><i class="fa-solid fa-file-signature"></i> Register</a>
                <a href="/peserta/penilaian" class="menu-item"><i class="fa-solid fa-star-half-stroke"></i> Penilaian</a>
                <a href="/peserta/profile" class="menu-item"><i class="fa-solid fa-user-gear"></i> Profile</a>
                <a href="#" onclick="logoutConfirm()" class="menu-item btn-logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </nav>
        </div>
    </header>

    <section class="banner-home" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.6)), url('{{ asset('images/kasul.jpg') }}');">
        <div class="banner-home-content">
            <h1>Hotel Departments</h1>
            <p>Pilihlah departemen pelatihan kerja yang sesuai dengan minat dan keahlian bidang Anda</p>
        </div>
    </section>

    <main class="main-container">
        <div class="departemen-container">
            
            <div class="departemen-header-text">
                <h1 class="judul-departemen">Departemen Magang</h1>
                <p class="subjudul-departemen">Informasi real-time ketersediaan kuota posisi magang di Royal Ambarrukmo Hotel Yogyakarta.</p>
            </div>

            <div class="departemen-grid">
                @foreach($departemens as $departemen)
                <div class="departemen-card">
                    <div class="card-icon-box">
                        <i class="fa-solid fa-hotel"></i>
                    </div>
                    
                    <h3>{{ $departemen->nama_departemen }}</h3>
                    
                    <div class="departemen-info-row">
                        <span class="info-label"><i class="fa-solid fa-users"></i> Sisa Kuota</span>
                        <span class="info-value text-bold">{{ $departemen->kuota }} Orang</span>
                    </div>

                    <div class="departemen-info-row">
                        <span class="info-label"><i class="fa-solid fa-circle-dot"></i> Status</span>
                        <span class="status-badge {{ $departemen->status == 'Full' ? 'status-full' : 'status-tersedia' }}">
                            {{ $departemen->status == 'Full' ? 'Penuh' : 'Tersedia' }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </main>

    <script>
    function logoutConfirm() {
        let konfirmasi = confirm("Apakah anda ingin keluar sekarang?");
        if(konfirmasi){
            window.location.href = "/peserta/dashboard";
        }
    }
    </script>

</body>
</html>