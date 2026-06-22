<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="login-peserta-body">

<a href="/peserta/login" class="back-dashboard">
    ←
</a>

<div class="fp-container">

    <div class="fp-box">

        <h1>Forgot Password</h1>

        <p class="fp-text">
            Please enter your email to reset the password
        </p>

        @if(session('success'))
            <div class="otp-alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- FORM KIRIM OTP --}}
        <form method="POST" action="/peserta/send-otp">
            @csrf

            <label>Your email</label>

            <input
                type="email"
                name="email"
                value="{{ session('otp_email') }}"
                placeholder="yourmail@gmail.com"
                required
            >

            <button type="submit" class="btn-fp">
                Get Code
            </button>
        </form>

        {{-- FORM VERIFIKASI OTP --}}
        <form method="POST" action="/peserta/verify-otp">

            @csrf

            <input
                type="hidden"
                name="email"
                value="{{ session('otp_email') }}"
            >

            <input
                type="text"
                name="otp"
                placeholder="enter code"
                required
            >

            <button type="submit" class="btn-fp">
                Continue
            </button>

        </form>

    </div>

</div>

</body>
</html>