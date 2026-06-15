<!DOCTYPE html>
<html>
<head>

    <title>Dashboard Peserta</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

<div class="header">

    <div class="welcome">
        Welcome Prospective Trainee!
    </div>

    <div class="logo">
        <img src="{{ asset('images/logo.png') }}">
    </div>

    <div class="login-area">
        <a href="/peserta/login" class="login-btn">
    Login
</a>
    </div>

</div>

<div class="banner"
     style="background-image:url('{{ asset('images/kasul.jpg') }}');">
</div>

<div class="info-box">
    <p>
        This website is the official media for internship registration and management.
    </p>
</div>

<div class="rules">

    <h2>Trainee Rules!</h2>

    <p>
        Participants must complete all registration data correctly and honestly.
    </p>

    <p>
        Participants are required to regularly check registration status.
    </p>

    <p>
        All announcements will be delivered through the system.
    </p>

</div>

</body>
</html>