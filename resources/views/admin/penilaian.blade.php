<!DOCTYPE html>
<html>
<head>

    <title>Penilaian Peserta Magang</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="peserta-body">

    <div class="peserta-header">

        <div class="header-user">
            Admin
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
            Penilaian Peserta Magang
        </h1>

        <form action="/admin/penilaian" method="GET" class="search-form">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari penilaian..."
                class="search-input"
            >

            <button type="submit" class="search-btn">
                Cari
            </button>

        </form>
        @if($penilaian->count() == 0)

<div class="peserta-card">
    <p>
        Penilaian tidak ditemukan.
    </p>
</div>

@endif

        @foreach($penilaian as $data)

<div class="peserta-card">

    <h3>{{ $data->pendaftaran->nama_lengkap }}</h3>

    <p>
        Departemen :
        {{ $data->pendaftaran->departemen }}
    </p>

    <p>
        Asal Sekolah :
        {{ $data->pendaftaran->asal_sekolah }}
    </p>

    <p>
        Total Score :
        <strong>{{ $data->total_score }}</strong>
    </p>

    <p>
        Rating :
        <strong>{{ $data->rating }}</strong>
    </p>

    <p>
        Tanggal Penilaian :
        {{ $data->tanggal_ttd ? date('d-m-Y', strtotime($data->tanggal_ttd)) : '-' }}
    </p>

    <p>
    Status HRD :

    @if($data->tanda_tangan_hrd)

        <span style="color:green;font-weight:bold;">
            ✓ Sudah Ditandatangani
        </span>

    @else

        <span style="color:red;font-weight:bold;">
            ✗ Belum Ditandatangani
        </span>

    @endif
</p>

   <div style="display:flex; gap:10px; flex-wrap:wrap;">
        <a
            href="/admin/penilaian/{{ $data->id }}"
            class="btn-nilai">

            Lihat Detail

        </a>

        <a
            href="/admin/penilaian/{{ $data->id }}/edit-hrd"
            class="btn-nilai"
            style="background-color: #ff9800;">

            Tambah Tanda Tangan HRD

        </a>
    </div>

</div>

@endforeach

    </div>

</body>

</html>
