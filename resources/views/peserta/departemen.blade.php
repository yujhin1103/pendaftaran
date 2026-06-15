<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

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
            <a href="#">Nilai</a>
            <a href="#" onclick="logoutConfirm()">Logout</a>
        </nav>

</header>

<section class="banner">
    <img src="{{ asset('images/kasul.jpg') }}" alt="Banner">
</section>


<script>
function logoutConfirm() {

    let konfirmasi = confirm("Apakah anda ingin keluar sekarang?");

    if(konfirmasi){
        window.location.href = "/peserta/dashboard";
    }

}
</script>
<div class="departemen-container">

    <h1 class="judul-departemen">
        Departemen Magang
    </h1>

    <p class="subjudul-departemen">
        Informasi kuota departemen yang tersedia.
    </p>

    <div class="departemen-grid">

        @foreach($departemens as $departemen)

        <div class="departemen-card">

            <h3>{{ $departemen->nama_departemen }}</h3>

            <div class="info">
                <span>Kuota</span>
                <span>{{ $departemen->kuota }}</span>
            </div>

            <div class="info">
    <span>Status</span>

    <span class="{{ $departemen->status == 'Full'
        ? 'status-full'
        : 'status-tersedia' }}">

        {{ $departemen->status }}

    </span>
</div>

        </div>

        @endforeach

    </div>

</div>

</div>
</div>
</body>
</html>