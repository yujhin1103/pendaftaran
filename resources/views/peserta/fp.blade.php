<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="login-peserta-body">

    <a href="/peserta/login" class="back-dashboard">
        ←
    </a>

    <div class="fp-container">

        <div class="fp-box">

            <h1>Forgot Password</h1>

            <p class="fp-text">
                Please enter your email to reset the password
            </p>

            <form>

                <label>Your email</label>

                <input
                    type="email"
                    placeholder="yourmail@gmail.com"
                >

                <div class="code-area">

                    <input
                        type="text"
                        placeholder="enter code"
                    >

                    <a href="#">
                        send code
                    </a>

                </div>

                <button type="submit">
                    Continue
                </button>

            </form>

        </div>

    </div>

</body>
</html>