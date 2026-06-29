<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Peserta</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="login-peserta-body" style="font-family: 'Barlow Condensed', sans-serif !important;">
    
    <a href="/peserta/dashboard" class="back-dashboard" style="font-family: 'Barlow Condensed', sans-serif !important;">
        ❮
    </a>

    <div class="login-container" style="font-family: 'Barlow Condensed', sans-serif !important;">

        <h1 class="welcome-title" style="font-family: 'Barlow Condensed', sans-serif !important; font-weight: 600;">
            Welcome New Prospective Trainees
        </h1>

        <div class="login-box" style="font-family: 'Barlow Condensed', sans-serif !important;">

            <div class="tab-menu">
                <a href="/peserta/login" style="font-family: 'Barlow Condensed', sans-serif !important; font-weight: 500;">
                    Log In
                </a>
                <a href="/peserta/signup" class="active" style="font-family: 'Barlow Condensed', sans-serif !important; font-weight: 600;">
                    Sign Up
                </a>
            </div>

            @if ($errors->any())
                <div style="background:#ffebee; color:red; padding:10px; margin-bottom:15px; border-radius:5px; font-family: 'Barlow Condensed', sans-serif; font-size: 1.1rem;">
                    @foreach ($errors->all() as $error)
                        <p style="margin: 5px 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="/peserta/signup" style="font-family: 'Barlow Condensed', sans-serif !important;">
                @csrf

                <div class="form-group">
                    <label style="font-family: 'Barlow Condensed', sans-serif !important; font-size: 1.2rem; font-weight: 500;">Email</label>
                    <input type="email" name="email" placeholder="Email" required style="font-family: 'Barlow Condensed', sans-serif !important; font-size: 1.1rem;">
                </div>

                <div class="form-group">
                    <label style="font-family: 'Barlow Condensed', sans-serif !important; font-size: 1.2rem; font-weight: 500;">User name</label>
                    <input type="text" name="username" placeholder="Username" required style="font-family: 'Barlow Condensed', sans-serif !important; font-size: 1.1rem;">
                </div>

                <div class="form-group">
                    <label style="font-family: 'Barlow Condensed', sans-serif !important; font-size: 1.2rem; font-weight: 500;">Password</label>
                    <input type="password" name="password" placeholder="Password" required style="font-family: 'Barlow Condensed', sans-serif !important; font-size: 1.1rem;">
                </div>

                <div class="form-group">
                    <label style="font-family: 'Barlow Condensed', sans-serif !important; font-size: 1.2rem; font-weight: 500;">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required style="font-family: 'Barlow Condensed', sans-serif !important; font-size: 1.1rem;">
                </div>

                <button type="submit" class="btn-login" style="font-family: 'Barlow Condensed', sans-serif !important; font-size: 1.3rem; font-weight: 600; text-transform: uppercase;">
                    Continue
                </button>
            </form>

        </div>
    </div>

</body>
</html>