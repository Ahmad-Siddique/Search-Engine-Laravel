<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\PasswordReset;

class PasswordResetController extends Controller
{
    // Show the form to request a password reset link
    public function showRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Send a password reset link to the given email
    public function sendResetLinkEmail(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'No account found with that email address.']);
    }

    $token = bin2hex(random_bytes(50));

    // Ensure the model and table are correctly set up
    PasswordReset::updateOrCreate(
        ['email' => $request->email],
        ['token' => $token]
    );

    // Send reset link email
    Mail::send('auth.passwords.password', ['token' => $token], function ($message) use ($request) {
        $message->to($request->email);
        $message->subject('Password Reset Link');
    });

    return back()->with('status', 'We have emailed your password reset link!');
}



    // Show the form to reset the password
    public function showResetForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    // Reset the user's password
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $passwordReset = PasswordReset::where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if (!$passwordReset) {
            return back()->withErrors(['email' => 'Invalid token or email address.']);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        $passwordReset->delete();

        return redirect('/login')->with('status', 'Password has been reset!');
    }
}
