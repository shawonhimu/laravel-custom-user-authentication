<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as PasswordRule;

class ResetPasswordController extends Controller
{
    // Show the form to reset password
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with([
            'token' => $token,
            'email' => $request->email,
         ]);
    }

    // Handle the actual password reset process
    public function reset(Request $request)
    {
        // Validate the request
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => [ 'required', 'confirmed', PasswordRule::defaults() ],
         ]);

        // Attempt to reset the password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                 ])->save();
            }
        );

        return Password::PASSWORD_RESET === $status ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors([ 'email' => [ __($status) ] ]);
    }
}
