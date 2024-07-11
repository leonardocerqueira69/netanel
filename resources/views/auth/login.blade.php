<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="name">Name</label>
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
</body>
</html>
