<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Role Management</title>
</head>

<body>
    <h1>Users</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Designation</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->age }}</td>
                <td>{{ $user->designation }}</td>
                <td>{{ $user->role }}</td>
                <td><a href="{{ route('users.edit', $user) }}">Edit</a></td>
            </tr>
        @endforeach
    </table>

</body>

</html>
