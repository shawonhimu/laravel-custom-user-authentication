<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer',
            'designation' => 'nullable|string|max:255',
            'role' => 'required|string|in:admin,user',
         ]);

        $user->update($request->only('name', 'age', 'designation', 'role'));

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
}
