<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="card">
    <h2>Set your new password</h2>
    <p class="subtitle">Create a new password. Ensure it differs from previous ones for security</p>

    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="/peserta/update-password">
        @csrf

        <label>Password</label>
        <div class="input-wrap">
            <input type="password" name="password" id="pw1" placeholder="enter new password" required>
            <button type="button" class="toggle-eye" onclick="togglePw('pw1')">👁</button>
        </div>

        <label>Confirm Password</label>
        <div class="input-wrap">
            <input type="password" name="password_confirmation" id="pw2" placeholder="re- enter password" required>
            <button type="button" class="toggle-eye" onclick="togglePw('pw2')">👁</button>
        </div>

        <button type="submit" class="btn">Update Password</button>
    </form>
</div>

<script>
    function togglePw(id) {
        const input = document.getElementById(id);
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>

</body>
</html>