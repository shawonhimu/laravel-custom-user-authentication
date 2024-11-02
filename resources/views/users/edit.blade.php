<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Users</title>
</head>

<body>
    <h1>Edit User</h1>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name</label>
        <input type="text" name="name" value="{{ $user->name }}" required>

        <label>Age</label>
        <input type="number" name="age" value="{{ $user->age }}">

        <label>Designation</label>
        <input type="text" name="designation" value="{{ $user->designation }}">

        <label>Role</label>
        <select name="role" required>
            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>

        <button type="submit">Update</button>
    </form>

</body>

</html>
