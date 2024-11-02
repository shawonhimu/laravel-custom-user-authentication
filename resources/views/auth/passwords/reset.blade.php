<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Reset Password</h1>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>

        <label for="password">New Password</label>
        <input id="password" type="password" name="password" required>

        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>

        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        @error('password')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <button type="submit">Reset Password</button>
    </form>

</body>

</html>
