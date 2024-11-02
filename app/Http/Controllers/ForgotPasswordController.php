<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    // Show the form to request a password reset link
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Handle sending the password reset link email
    public function sendResetLinkEmail(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email|exists:users,email',
         ]);

        // Send the reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return Password::RESET_LINK_SENT === $status ? back()->with([ 'status' => __($status) ])
        : back()->withErrors([ 'email' => __($status) ]);
    }
}
