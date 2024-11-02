<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Registration</title>
</head>

<body>
    <h1>Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label>Name</label>
        <input type="text" name="name" required>
        @error('name')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <br>
        <br>

        <label>Email</label>
        <input type="email" name="email" required>
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <br>
        <br>

        <label>Password</label>
        <input type="password" name="password" required>
        @error('password')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <br>
        <br>

        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" required>

        <label>Age</label>
        <input type="number" name="age">
        @error('age')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <br>
        <br>

        <label>Designation</label>
        <input type="text" name="designation">
        @error('designation')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <br>
        <br>

        <label>Role</label>
        <select name="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit">Register</button>
    </form>

</body>

</html>
