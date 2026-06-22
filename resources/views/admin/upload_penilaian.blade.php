<!DOCTYPE html>

<html>
<head>
    <title>Upload PDF Penilaian</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="peserta-body">

<div class="upload-container">

<a href="/admin/penilaian" class="kembali-btn">
    ← Kembali
</a>

<h2 class="upload-title">
    Upload PDF Penilaian Final
</h2>

<div class="upload-info">

    <p>
        <strong>Nama Peserta :</strong>
        {{ $penilaian->pendaftaran->nama_lengkap }}
    </p>

    <p>
        <strong>Departemen :</strong>
        {{ $penilaian->pendaftaran->departemen }}
    </p>

</div>

<form
    action="/admin/penilaian/{{ $penilaian->id }}/upload"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    <label class="upload-label">
        Pilih Dokumen PDF
    </label>

    <input
        type="file"
        name="dokumen_penilaian"
        accept=".pdf"
        required
        class="upload-file">

    <button
        type="submit"
        class="upload-btn">

        Upload PDF Final

    </button>

</form>

</div>

</body>
</html>
