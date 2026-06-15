<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Manajer Departemen</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="manager-login-body">

<div class="manager-login-box">

    <div class="manager-login-card">

        <div class="manager-login-header">
            LOGIN MANAJER DEPARTEMEN
        </div>

        <div class="manager-login-body-card">

                        @if(session('error'))
            <script>
                alert("{{ session('error') }}");
            </script>
            @endif

            <form action="/manajer/login" method="POST">

                @csrf

                <div class="mb-3">
                    <label>Username</label>
                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        placeholder="Masukkan Username">
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan Password">
                </div>

                <button type="submit" class="manager-login-btn">
                    Login
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>