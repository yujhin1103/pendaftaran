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
        Pilih Departemen
    </h1>

    <div class="departemen-grid">

        <a href="/manajer/accounting" class="departemen-card">
            <h3>Accounting</h3>
        </a>

        <a href="/manajer/fbp" class="departemen-card">
            <h3>FBP</h3>
        </a>

        <a href="/manajer/engineering" class="departemen-card">
            <h3>Engineering</h3>
        </a>

        <a href="/manajer/fbs" class="departemen-card">
            <h3>FBS</h3>
        </a>

        <a href="/manajer/frontoffice" class="departemen-card">
            <h3>Front Office</h3>
        </a>

        <a href="/manajer/housekeeping" class="departemen-card">
            <h3>House Keeping</h3>
        </a>

        <a href="/manajer/sales" class="departemen-card">
            <h3>Sales & Marketing</h3>
        </a>

    </div>

</div>

</div>

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