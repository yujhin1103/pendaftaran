<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Manajer</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="manager-body">

<div class="manager-wrapper">

    <div class="manager-header">

        <div class="manager-title">
            Manajer
        </div>

        <div class="manager-menu">
            <a href="/manajer/dashboard">Home</a>
            <a href="#" onclick="logoutManajer()">Logout</a>
        </div>

    </div>

    <div class="manager-content">

       <a href="/manajer/penilaian" class="manager-btn">
            Penilaian
        </a>

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