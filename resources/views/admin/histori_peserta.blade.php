<!DOCTYPE html>
<html>
<head>

    <title>Histori Peserta Magang</title>

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
        Histori Peserta Magang
    </h1>

    @foreach($histori as $data)

    <div class="peserta-card">

        <h3>{{ $data->nama_lengkap }}</h3>

        <p>
            Departemen :
            {{ $data->departemen }}
        </p>

        <p>
            Asal Sekolah :
            {{ $data->asal_sekolah }}
        </p>

        <p>
            Periode :
            {{ $data->tanggal_mulai }}
            -
            {{ $data->tanggal_selesai }}
        </p>

        <p>
            Status :
            Alumni
        </p>
        <form action="/admin/pendaftar/hapus/{{ $data->id }}"
            method="POST"
            style="display:inline;">

            @csrf

            <button type="submit"
                    class="btn-hapus"
                    onclick="return confirm('Yakin ingin menghapus data alumni ini?')">

                Hapus

            </button>

        </form>
    </div>

    @endforeach

</div>

</body>
</html>