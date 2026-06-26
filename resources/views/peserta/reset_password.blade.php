<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>


<body class="reset-body">
    <a href="/peserta/login" class="back-dashboard">
        ❮
    </a>

<div class="reset-card">

    <h1 class="reset-title">
        Set your new password
    </h1>

    <p class="reset-subtitle">
        Create a new password. Ensure it differs from previous ones for security
    </p>

    <form method="POST" action="/peserta/update-password">
        @csrf

        <label class="reset-label">
            Password
        </label>

        <input
            type="password"
            name="password"
            class="reset-input"
            placeholder="Enter new password"
        >

        <label class="reset-label">
            Confirm Password
        </label>

        <input
            type="password"
            name="password_confirmation"
            class="reset-input"
            placeholder="Re-enter password"
        >

        <button
            type="submit"
            class="reset-btn"
        >
            Update Password
        </button>

    </form>

</div>

</body>
</html>