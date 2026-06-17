<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Peserta Magang</title>

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

    <!-- HEADER -->
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
            <li>
                <a href="/peserta/penilaian">
                    Penilaian
                </a>
            </li>
            <a href="#" onclick="logoutConfirm()">Logout</a>
        </nav>

    </header>

    <!-- BANNER -->
    <section class="banner">
        <img src="{{ asset('images/kasul.jpg') }}" alt="Banner">
    </section>

    <!-- INFO -->
    <section class="info-box">
        <p>
            This website is the official media for registration and management
            of internship participants at the Royal Ambarrukmo Hotel Yogyakarta.
        </p>
    </section>

    <!-- CONTENT -->
    <section class="content-box">

        <h2>Trainee Rules!</h2>

        <p>
            Participants must complete the registration form completely,
            correctly, and in accordance with their official identification.
            Any errors or discrepancies in the data are the responsibility
            of the participant.
        </p>

        <p>
            Participants are required to regularly monitor their registration
            status via email. Official information regarding acceptance
            will only be provided through the system or through registered contacts.
        </p>

        <p>
            Participants are required to regularly monitor their registration
            status via email. Official information regarding acceptance
            will only be provided through the system or through registered contacts.
        </p>

    </section>

</body>
</html>