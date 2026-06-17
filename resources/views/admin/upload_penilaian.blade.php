<!DOCTYPE html>
<html>
<head>
    <title>Upload Form Penilaian Final</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="peserta-body">

<div class="peserta-content">

    <a href="/admin/penilaian">
        ← Kembali
    </a>

    <h2>Upload Form Penilaian Final</h2>

    <form
        action="/admin/penilaian/upload/{{ $penilaian->id }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        <label>
            Upload PDF Penilaian Final
        </label>

        <input
            type="file"
            name="dokumen_penilaian"
            accept=".pdf"
            required>

        <br><br>

        <button type="submit">
            Simpan
        </button>

    </form>

</div>

</body>
</html>