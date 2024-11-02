<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>
</head>

<body>
    <h1>Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Email</label>
        <input type="email" name="email" required>

        <br>
        <br>

        <label>Password</label>
        <input type="password" name="password" required>

        <br>
        <br>
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br>

        <button type="submit">Login</button>
        <div>Forget your password ?</div>
        <a href="{{ url('forgot-password') }}">Reset password</a>
        <div>Don't have an account ?</div>
        <a href="{{ url('register') }}">Register</a>
    </form>

</body>

</html>
