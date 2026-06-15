<!DOCTYPE html>
<html>
<head>

    <title>Terima Pendaftar</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

<div class="terima-container">

    <a href="/admin/pendaftar" class="btn-kembali">
        ← Kembali
    </a>

    <h1 class="terima-title">
        Terima Peserta Magang
    </h1>

    <div class="terima-info">

        <p>
            <strong>Nama :</strong>
            {{ $pendaftar->nama_lengkap }}
        </p>

        <p>
            <strong>Departemen :</strong>
            {{ $pendaftar->departemen }}
        </p>

        <p>
            <strong>Asal Sekolah :</strong>
            {{ $pendaftar->asal_sekolah }}
        </p>

    </div>

    <form action="/admin/pendaftar/terima/{{ $pendaftar->id }}"
          method="POST">

        @csrf

        <div class="form-group">
            <label>Tanggal Mulai Magang</label>

            <input
                type="date"
                name="tanggal_mulai"
                required>
        </div>

        <div class="form-group">
            <label>Tanggal Selesai Magang</label>

            <input
                type="date"
                name="tanggal_selesai"
                required>
        </div>

        <button type="submit" class="btn-simpan">
            Simpan dan Terima Peserta
        </button>

    </form>

</div>

</body>
</html>