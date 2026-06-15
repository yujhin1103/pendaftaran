<!DOCTYPE html>
<html>
<head>
    <title>Kelola Departemen</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="admin-body">

    <!-- Tombol Kembali -->
   <a href="/admin/dashboard" class="back-text">
    ← Kembali ke Dashboard
</a>
    <div class="departemen-wrapper">

        <h1>Kelola Departemen</h1>

       <div class="departemen-form">

    <label>Departemen</label>

</div>

@foreach($departemens as $departemen)

<form action="/admin/departemen/update/{{ $departemen->id }}" method="POST">

    @csrf

    <div class="departemen-card">

        <h3>{{ $departemen->nama_departemen }}</h3>

        <label>Kuota</label>
        <input
            type="number"
            name="kuota"
            value="{{ $departemen->kuota }}"
        >

        <label>Status</label>

        <select name="status">

            <option
                value="Tersedia"
                {{ $departemen->status == 'Tersedia' ? 'selected' : '' }}>
                Tersedia
            </option>

            <option
                value="Full"
                {{ $departemen->status == 'Full' ? 'selected' : '' }}>
                Full
            </option>

        </select>

        <label>Jumlah Terisi</label>

<input
    type="number"
    name="jumlah_terisi"
    value="{{ $departemen->jumlah_terisi }}"
>

        <button type="submit">
            Simpan
        </button>

    </div>

</form>
<div class="info">
    <span>Status</span>

    <span class="{{ $departemen->status == 'Full'
        ? 'status-full'
        : 'status-tersedia' }}">

        {{ $departemen->status }}

    </span>
</div>

@endforeach

</body>
</html>