<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Peserta - Royal Ambarrukmo</title>

    <!-- Google Fonts & FontAwesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Memanggil CSS Eksternal -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<script>
function logoutConfirm() {
    let konfirmasi = confirm("Apakah anda ingin keluar sekarang?");
    if(konfirmasi){
        window.location.href = "/peserta/logout";
    }
}
</script>

<body>

    <!-- HEADER (Konsisten dengan halaman lain) -->
    <header class="home-header">
        <div class="header-container">
            <div class="header-left">
                <div class="user-avatar"><i class="fa-solid fa-user-tie"></i></div>
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
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>

            <nav class="header-menu">
                <a href="/peserta/home" class="menu-item"><i class="fa-solid fa-house"></i> Home</a>
                <a href="/peserta/departemen" class="menu-item"><i class="fa-solid fa-hotel"></i> Department</a>
                <a href="/peserta/profile" class="menu-item active"><i class="fa-solid fa-user-gear"></i> Profile</a>
                <a href="/peserta/pendaftaran" class="menu-item"><i class="fa-solid fa-file-signature"></i> Register</a>
                <a href="/peserta/penilaian" class="menu-item"><i class="fa-solid fa-star-half-stroke"></i> Penilaian</a>    
                <a href="#" onclick="logoutConfirm()" class="menu-item btn-logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </nav>
        </div>
    </header>

    <!-- BANNER HERO -->
    <section class="banner-home" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.6)), url('{{ asset('images/kasul.jpg') }}');">
        <div class="banner-home-content">
            <h1>Trainee Profile</h1>
            <p>Manajemen data akun dan peninjauan berkas status kelulusan magang Anda</p>
        </div>
    </section>

    <!-- CONTAINER UTAMA -->
    <main class="main-container">
        <section class="profile-page-wrapper">
            
            <!-- BAGIAN 1: KARTU IDENTITAS KIRI (USER CARD) -->
            <div class="profile-side-card">
                <div class="profile-photo-wrapper">
                    @if($pendaftaran && $pendaftaran->foto)
                        <img src="{{ asset('storage/' . $pendaftaran->foto) }}" alt="Foto Peserta">
                    @else
                        <img src="{{ asset('images/default-user.png') }}" alt="Foto Default">
                    @endif
                </div>

                <h3 class="profile-user-name">{{ $user->name }}</h3>
                <p class="profile-user-email"><i class="fa-regular fa-envelope"></i> {{ $user->email }}</p>
                
                <div class="profile-meta-mini">
                    <div class="meta-row">
                        <span class="meta-label">Status Akun</span>
                        @if($pendaftaran)
                            <span class="status-badge status-tersedia">{{ $pendaftaran->status }}</span>
                        @else
                            <span class="status-badge status-full">Belum Mendaftar</span>
                        @endif
                    </div>
                    <div class="meta-row">
                        <span class="meta-label">Departemen</span>
                        <span class="meta-value-text">{{ $pendaftaran ? $pendaftaran->departemen : '-' }}</span>
                    </div>
                </div>

                <!-- INFO PERIODE AKTIF JIKA DITERIMA -->
                @if($pendaftaran && $pendaftaran->status == 'Diterima')
                    <div class="profile-active-period-box">
                        <div class="period-item">
                            <label><i class="fa-regular fa-calendar-check"></i> Periode Magang</label>
                            <p>{{ $pendaftaran->tanggal_mulai }} &rarr; {{ $pendaftaran->tanggal_selesai }}</p>
                        </div>
                        <div class="period-item" style="margin-top: 12px;">
                            <label><i class="fa-solid fa-hourglass-half"></i> Durasi Kontrak</label>
                            <p><strong>{{ $pendaftaran->durasi_bulan }} Bulan</strong> Pelatihan</p>
                        </div>
                    </div>
                @endif  
            </div>

            <!-- BAGIAN 2: RIWAYAT PENDAFTARAN KANAN (HISTORY DETAILS) -->
            <div class="profile-main-details">
                @if($pendaftaran)
                    <div class="profile-history-section">
                        <h2 class="section-detail-title"><i class="fa-solid fa-clock-rotate-left"></i> Riwayat Pendaftaran Magang</h2>
                        
                        <div class="history-detail-card">
                            <div class="detail-row">
                                <span class="detail-label">Nama Lengkap</span>
                                <span class="detail-value">{{ $pendaftaran->nama_lengkap }}</span>
                            </div>

                            <div class="detail-row">
                                <span class="detail-label">Departemen Pilihan</span>
                                <span class="detail-value text-gold-theme">{{ $pendaftaran->departemen }}</span>
                            </div>

                            <div class="detail-row">
                                <span class="detail-label">Institusi / Asal Sekolah</span>
                                <span class="detail-value">{{ $pendaftaran->asal_sekolah }}</span>
                            </div>

                            <div class="detail-row">
                                <span class="detail-label">Status Seleksi</span>
                                <div class="detail-value">
                                    @php
                                        $today = \Carbon\Carbon::today();
                                        $statusDisplay = $pendaftaran->status;
                                        if($pendaftaran->tanggal_selesai) {
                                            $selesai = \Carbon\Carbon::parse($pendaftaran->tanggal_selesai);
                                            if($selesai->lt($today) && $pendaftaran->status == 'Diterima') {
                                                $statusDisplay = 'Melebihi Batas';
                                            }
                                        }
                                    @endphp
                                    
                                    <!-- Variasi styling teks badge dinamis -->
                                    <span class="status-badge {{ $statusDisplay == 'Diterima' ? 'status-tersedia' : 'status-full' }}">
                                        {{ $statusDisplay }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Tampilan opsional jika user belum mengisi data registrasi sama sekali -->
                    <div class="empty-history-box">
                        <i class="fa-solid fa-folder-open"></i>
                        <h3>Belum Ada Riwayat Pendaftaran</h3>
                        <p>Silakan lengkapi berkas Anda pada menu pendaftaran terlebih dahulu.</p>
                        <a href="/peserta/pendaftaran" class="btn-submit-registration" style="text-decoration:none; display:inline-block; font-size:0.85rem; padding:10px 20px; margin-top:15px;">Isi Formulir Sekarang</a>
                    </div>
                @endif
            </div>

        </section>
    </main>

</body>
</html>