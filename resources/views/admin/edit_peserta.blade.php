<!DOCTYPE html>
<html>
<head>
    <title>Edit Peserta</title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="edit-container">

    <a href="/admin/peserta" class="btn-kembali">
        ← Kembali
    </a>

    <h1 class="edit-title">
        Edit Data Peserta Magang
    </h1>

    <form
        action="/admin/peserta/update/{{ $peserta->id }}"
        method="POST"
        class="edit-form">

        @csrf

        <label>Nama Lengkap</label>
        <input
            type="text"
            name="nama_lengkap"
            value="{{ $peserta->nama_lengkap }}">

        <label>Nama Panggilan</label>
        <input
            type="text"
            name="nama_panggilan"
            value="{{ $peserta->nama_panggilan }}">

        <label>Departemen</label>
        <input
            type="text"
            name="departemen"
            value="{{ $peserta->departemen }}">

        <label>Asal Sekolah</label>
        <input
            type="text"
            name="asal_sekolah"
            value="{{ $peserta->asal_sekolah }}">

        <label>No HP</label>
        <input
            type="text"
            name="no_hp"
            value="{{ $peserta->no_hp }}">

        <label>Email</label>
        <input
            type="email"
            name="email"
            value="{{ $peserta->email }}">

        <label>Tanggal Mulai Magang</label>
        <input
            type="date"
            name="tanggal_mulai"
            value="{{ $peserta->tanggal_mulai }}">

        <label>Tanggal Selesai Magang</label>
        <input
            type="date"
            name="tanggal_selesai"
            value="{{ $peserta->tanggal_selesai }}">

        <label>Durasi Magang (Bulan)</label>
        <input
            type="number"
            name="durasi_bulan"
            value="{{ $peserta->durasi_bulan }}">

        <button type="submit" class="btn-update">
            Simpan Perubahan
        </button>

    </form>

</div>

</body>
</html>