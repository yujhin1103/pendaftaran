<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="login-box">

        <div class="card">

            <div class="card-header">
                LOGIN ADMIN
            </div>

            <div class="card-body">
                
                @if(session('error'))
                <script>
                    alert("{{ session('error') }}");
                </script>
                @endif

                <form action="{{ url('/admin/login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Username</label>
                        <input type="username" name="username" class="form-control" placeholder="Username">
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password">
                    </div>

                    <button type="submit" class="btn btn-login">
                        Login
                    </button>

                </form>

            </div>

        </div>

    </div>

</body>
</html>