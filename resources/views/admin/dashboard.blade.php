<!DOCTYPE html>
<html>
<head>

    <title>Dashboard Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="admin-body">

<div class="admin-header">

    <h2>HR Admin</h2>

    <a href="/admin/login">
        Logout
    </a>

</div>

<div class="admin-content">

    <div class="menu-container">

        <a href="/admin/peserta" class="menu-btn">
            Peserta Magang
        </a>

        <a href="{{ url('/admin/departemen') }}" class="menu-btn">
              Departemen
        </a>

        <a href="/admin/pendaftar" class="menu-btn">
            Pendaftar
        </a>

        <a href="/admin/penilaian" class="menu-btn">
            Penilaian
        </a>

        <a href="/admin/histori-peserta" class="menu-btn">
            Histori Peserta
        </a>
        <a href="/admin/histori-pendaftar" class="menu-btn">
    Histori Pendaftar
</a>

    </div>

</div>

</body>
</html>