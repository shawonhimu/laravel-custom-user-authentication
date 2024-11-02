<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Forgot Password</h1>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <label for="email">Email</label>
        <input id="email" type="email" name="email" required>

        @if (session('status'))
            <div style="color: green;">{{ session('status') }}</div>
        @endif

        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <button type="submit">Send Password Reset Link</button>
    </form>

</body>

</html>
