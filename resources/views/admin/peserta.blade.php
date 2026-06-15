<!DOCTYPE html>
<html>
<head>

    <title>Peserta Magang</title>

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
            Peserta Magang
        </h1>

        <form action="/admin/peserta" method="GET" class="search-form">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari peserta magang..."
                class="search-input"
            >

            <button type="submit" class="search-btn">
                Cari
            </button>

        </form>
        @if($peserta->count() == 0)

<div class="peserta-card">
    <p>
        Peserta dengan nama tersebut tidak ditemukan.
    </p>
</div>

@endif

        @foreach($peserta as $data)

<div class="peserta-card">

    <h3>{{ $data->nama_lengkap }}</h3>

    <p>
        Nama :
        {{ $data->nama_lengkap }}
    </p>

    <p>
        Departemen :
        {{ $data->departemen }}
    </p>

    <p>
        Asal Sekolah :
        {{ $data->asal_sekolah }}
    </p>

    <p>
        Status :
        {{ $data->status }}
    </p>
    @php
    $hariIni = \Carbon\Carbon::today();
@endphp

<p>
    Kondisi :

    @if($hariIni->gt(\Carbon\Carbon::parse($data->tanggal_selesai)))
        <span style="color:red;">
            Melebihi Batas
        </span>
    @else
        <span style="color:green;">
            Aktif
        </span>
    @endif
</p>
    <p>
    Periode :
            {{ $data->tanggal_mulai }}
            -
            {{ $data->tanggal_selesai }}
        </p>

        <p>
            Lama Magang :
            {{ $data->durasi_bulan }} Bulan
        </p>

    <a href="/admin/peserta/edit/{{ $data->id }}" class="btn-edit">
            Edit
    </a>
    <form
    action="/admin/peserta/selesai/{{ $data->id }}"
    method="POST"
    style="display:inline;">

    @csrf

    <button
        type="submit"
        class="btn-selesai"
        onclick="return confirm('Peserta telah selesai magang?')">

        Selesai Magang

    </button>
    

</form>

</div>

@endforeach
    </div>

</body>
</html>