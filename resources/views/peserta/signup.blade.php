<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Peserta</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="login-peserta-body">
     <a href="/peserta/dashboard" class="back-dashboard">
        ❮
    </a>

<div class="login-container">

    <h1 class="welcome-title">
        Welcome New Prospective Trainees
    </h1>

    <div class="login-box">

        <div class="tab-menu">

           <a href="/peserta/login">
                Log in
            </a>

            <span class="active-tab">
                Sign up
            </span>

        </div>
            @if ($errors->any())

    <div style="background:#ffebee;color:red;padding:10px;margin-bottom:15px;border-radius:5px;">

                    @foreach ($errors->all() as $error)

                        <p>{{ $error }}</p>

                    @endforeach

    </div>

            @endif
        <form method="POST" action="/peserta/signup">

            @csrf

            <label>Email</label>
            <input type="email" name="email" placeholder="Email">

            <label>User name</label>
             <input type="text" name="username" placeholder="Username">

            <label>Password</label>
           <input type="password" name="password" placeholder="Password">

            <label>Confirm Password</label>
             <input type="password"
           name="password_confirmation"
           placeholder="Konfirmasi Password">

            <button type="submit">
                Sign Up
            </button>

        </form>

    </div>

</div>

</body>
</html>