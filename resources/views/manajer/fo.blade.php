<!DOCTYPE html>
<html>
<head>

    <title>FRONT OFFICE</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="fo-body">

<div class="fo-wrapper">

    <div class="fo-header">

        <div class="fo-user">
            Manajer
        </div>

        <div class="fo-menu">

            <a href="/manajer/dashboard">
                Home
            </a>

            <a href="#">
                Logout
            </a>

        </div>

    </div>

    <div class="fo-content">

        <a href="/manajer/penilaian" class="kembali-link">
            ← Kembali
        </a>

        <h2 class="departemen-title">
            FRONT OFFICE
        </h2>
<div class="search-box">

    <input
        type="text"
        placeholder="Cari peserta magang..."
        class="search-input"
    >

    <button class="search-btn">
        Cari
    </button>

</div>
        <div class="trainee-card">

            <h3>Trainee 1</h3>

            <p>Nama</p>

        </div>

        <div class="trainee-card">

            <h3>Trainee 2</h3>

            <p>Nama</p>

        </div>

        <div class="trainee-card">

            <h3>Trainee 3</h3>

            <p>Nama</p>

        </div>

        <div class="trainee-card">

            <h3>Trainee 4</h3>

            <p>Nama</p>

        </div>

    </div>

</div>

</body>
</html>