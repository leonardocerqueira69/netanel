<!DOCTYPE html>
<html id="bckg-login">

<head>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <title>Netanel - Login</title>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <a class="form-logo" href="/">
                <img src="/img/logo.svg" alt="Logo da Empresa" width="70" height="70">
            </a>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label for="name">User</label>
                    <input id="name" type="text" name="name" required autofocus>
                </div>

                <div>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                </div>

                <div>
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
