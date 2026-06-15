<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Peserta</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="auth-body">

    <div class="auth-overlay">

        <h1>Welcome New Prospective Trainees</h1>

        <div class="auth-box">

            <div class="tab-menu">
                <a href="{{ url('/peserta/login') }}">
                    Log in
                </a>

                <a href="{{ url('/peserta/register') }}" class="active">
                    Sign up
                </a>
            </div>

            <form action="#" method="POST">

                @csrf

                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>

                <label>Username</label>
                <input type="text" name="username" placeholder="Enter your username" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>

                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Confirm your password" required>

                <button type="submit">
                    Continue
                </button>

            </form>

        </div>

    </div>

</body>
</html>