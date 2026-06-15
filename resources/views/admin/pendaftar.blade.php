<!DOCTYPE html>
<html>
<head>

    <title>Pendaftar</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="peserta-body">

    <div class="peserta-header">

        <div class="header-user">
            Hr_admin
        </div>

        <div class="header-menu">

            <a href="/admin/dashboard">
                Home
            </a>

            <a href="#">
                Logout
            </a>

        </div>

    </div>

    <div class="peserta-content">

        <a href="/admin/dashboard" class="kembali-link">
            ← Kembali
        </a>

        <h1 class="peserta-title">
            Pendaftar
        </h1>

        <form class="search-form">

            <input
                type="text"
                placeholder="Cari pendaftar..."
                class="search-input"
            >

            <button type="submit" class="search-btn">
                Cari
            </button>

        </form>

        @foreach($pendaftar as $data)

<div class="peserta-card">

    <h3>{{ $data->nama_lengkap }}</h3>

    <p>
        Nama : {{ $data->nama_lengkap }}
    </p>

    <p>
        Departemen : {{ $data->departemen }}
    </p>

    <p>
        Asal Sekolah : {{ $data->asal_sekolah }}
    </p>
    <p>
    Status : {{ $data->status }}
</p>
    <div class="action-btn">

        <a href="/admin/pendaftar/detail/{{ $data->id }}" class="btn-detail">
            Detail
        </a>

        <a href="/admin/pendaftar/terima/{{ $data->id }}"
            class="btn-terima">
                Terima
        </a>
        <form action="/admin/pendaftar/tolak/{{ $data->id }}"
      method="POST">

    @csrf

    <button type="submit"
            class="btn-tolak">

        Tolak

    </button>

</form>

    </div>
</div>

@endforeach
</body>
</html>