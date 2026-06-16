<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Manajer</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="penilaian-body">

<div class="penilaian-wrapper">

    <div class="penilaian-header">

        <div class="penilaian-title">
            Manajer
        </div>

        <div class="penilaian-menu">
            <a href="/manajer/dashboard">Home</a>
            <a href="#" onclick="logoutManajer()">Logout</a>
        </div>

    </div>

    <div class="departemen-container">

    <a href="/manajer/dashboard" class="back-text">
        ← Kembali
    </a>

    <h1 class="judul-halaman">
           Penilaian Peserta Magang
    </h1>

</div>
<form method="GET" action="{{ url('/manajer/penilaian') }}">

    <input
        type="text"
        name="search"
        placeholder="Cari peserta..."
        value="{{ request('search') }}"
    >

    <button type="submit">
        Cari
    </button>

</form>
@if($peserta->count() > 0)

    @foreach($peserta as $data)

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

        @php
            $penilaian = \App\Models\Penilaian::where('pendaftaran_id', $data->id)->first();
        @endphp

        @if($penilaian)
            <p style="color: green; font-weight: bold; margin-top: 10px;">
                ✓ Sudah Dinilai
            </p>
            <a
                href="/manajer/form-penilaian/{{ $data->id }}"
                class="btn-nilai"
                style="background-color: #999; cursor: not-allowed;"
                disabled>
                Sudah Dinilai
            </a>
        @else
            <a
                href="/manajer/form-penilaian/{{ $data->id }}"
                class="btn-nilai">
                Beri Penilaian
            </a>
        @endif

    </div>

    @endforeach

@else

    <p style="text-align:center; margin-top:20px;">
        Peserta tidak ditemukan.
    </p>

@endif

<script>
function logoutManajer(){

    let konfirmasi = confirm(
        "Apakah anda ingin keluar sekarang?"
    );

    if(konfirmasi){
        window.location.href="/manajer/login";
    }

}
</script>

</body>
</html>