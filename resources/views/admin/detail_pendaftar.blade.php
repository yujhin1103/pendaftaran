<!DOCTYPE html>
<html>
<head>
    <title>Detail Pendaftar</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="peserta-content">

    <a href="/admin/pendaftar">
        ← Kembali
    </a>

    <h1>Detail Pendaftar</h1>

    <div class="peserta-card">

        <p><strong>Nama Lengkap :</strong> {{ $pendaftar->nama_lengkap }}</p>

        <p><strong>Nama Panggilan :</strong> {{ $pendaftar->nama_panggilan }}</p>

        <p><strong>Departemen :</strong> {{ $pendaftar->departemen }}</p>

        <p><strong>Alamat Rumah :</strong> {{ $pendaftar->alamat_rumah }}</p>

        <p><strong>Tempat Tinggal :</strong> {{ $pendaftar->tempat_tinggal }}</p>

        <p><strong>Asal Sekolah :</strong> {{ $pendaftar->asal_sekolah }}</p>

        <p><strong>No HP :</strong> {{ $pendaftar->no_hp }}</p>

        <p><strong>Email :</strong> {{ $pendaftar->email }}</p>

        <p><strong>Status :</strong> {{ $pendaftar->status }}</p>
        <h3>Foto Pendaftar</h3>

        <img
            src="{{ asset('storage/' . $pendaftar->foto) }}"
            width="200">
            <h3>CV</h3>

        <a href="{{ asset('storage/' . $pendaftar->cv) }}" download>
            Download CV
        </a>
        <h3>Surat Pengantar</h3>

        <a href="{{ asset('storage/' . $pendaftar->surat_izin) }}" download>
            Download Surat Pengantar
        </a>

    </div>

</div>

</body>
</html>