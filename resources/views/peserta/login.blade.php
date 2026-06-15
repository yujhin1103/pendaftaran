<!DOCTYPE html>
<html>
<head>
    <title>Login Peserta</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="login-peserta-body">
    <a href="/peserta/dashboard" class="back-dashboard">
        ← Kembali ke Dashboard
    </a>

<div class="login-container">

    <h1 class="welcome-title">
        Welcome New Prospective Trainees
    </h1>
    
    <div class="login-box">

        <div class="login-tab-menu">

    <span class="active-tab">
        Log In
    </span>

    <a href="/peserta/signup">
        Sign Up
    </a>

</div>

@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert-danger">
        {{ session('error') }}
    </div>
@endif

<form method="POST" action="/peserta/login">

    @csrf

    <label>User name</label>

     <input type="text"
           name="username"
           placeholder="Username">

    <label>Password</label>

    <input type="password"
           name="password"
           placeholder="Password">  

    <div class="forgot-password">
        <a href="/peserta/fp">Forgot Password?</a>
    </div>

    <button type="submit">
        Continue
    </button>

</form>

</div>

</body>
</html>