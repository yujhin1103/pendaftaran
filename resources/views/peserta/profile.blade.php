<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Peserta</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

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

<header class="home-header">

    <div class="header-left">
        <p>Hello!</p>

        @if(session('username'))
            <h3>{{ session('username') }}</h3>
        @else
            <h3>Guest</h3>
        @endif
    </div>

    <div class="header-logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </div>

    <nav class="header-menu">
        <a href="/peserta/home">Home</a>
        <a href="/peserta/departemen">Department</a>
        <a href="/peserta/profile">Profile</a>
        <a href="/peserta/pendaftaran">Register</a>
        <a href="/peserta/penilaian">
                    Penilaian
                </a>
        <a href="#" onclick="logoutConfirm()">Logout</a>
    </nav>

</header>

<section class="profile-container">

    <h1>Profil Peserta</h1>

    <div class="profile-card">
        @if($pendaftaran)

<div class="profile-history">

    <h2>Riwayat Pendaftaran Magang</h2>

    <div class="history-card">

        <p>
            <strong>Nama Lengkap:</strong>
            {{ $pendaftaran->nama_lengkap }}
        </p>

        <p>
            <strong>Departemen:</strong>
            {{ $pendaftaran->departemen }}
        </p>

        <p>
            <strong>Asal Sekolah:</strong>
            {{ $pendaftaran->asal_sekolah }}
        </p>

        <p>
            <strong>Status:</strong>
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
            {{ $statusDisplay }}
        </p>

    </div>

</div>

@endif

        <div class="profile-photo">

    @if($pendaftaran && $pendaftaran->foto)

        <img
            src="{{ asset('storage/' . $pendaftaran->foto) }}"
            alt="Foto Peserta"
        >

    @else

        <img
            src="{{ asset('images/default-user.png') }}"
            alt="Foto Peserta"
        >

    @endif

    @if($pendaftaran && $pendaftaran->status == 'Diterima')

<div class="profile-item">
    <label>Periode Magang</label>

    <p>
        {{ $pendaftaran->tanggal_mulai }}
        -
        {{ $pendaftaran->tanggal_selesai }}
    </p>
</div>

<div class="profile-item">
    <label>Durasi Magang</label>

    <p>
        {{ $pendaftaran->durasi_bulan }} Bulan
    </p>
</div>

@endif  
</div>

            <h3>{{ $user->name }}</h3>

                <p>
                    <strong>Email :</strong>
                    {{ $user->email }}
                </p>

            <div class="profile-item">
                <label>Status</label>

                @if($pendaftaran)
                    <p>{{ $pendaftaran->status }}</p>
                @else
                    <p>Belum Mendaftar</p>
                @endif

            </div>

            <div class="profile-item">
                <label>Departemen</label>

                @if($pendaftaran)
                    <p>{{ $pendaftaran->departemen }}</p>
                @else
                    <p>-</p>
                @endif

            </div>
        </div>

    </div>

</section>

</body>
</html>