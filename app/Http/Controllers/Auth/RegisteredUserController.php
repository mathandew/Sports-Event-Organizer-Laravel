<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationMail;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verification_token' => Str::random(64),
        ]);

        event(new Registered($user));

        Mail::to($user->email)->send(new EmailVerificationMail($user));

        return redirect(route('registration.success'))->with('message', 'Registration successful! Please check your email to verify your account.');
    }


    public function checkEmail(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();

        return response()->json(['exists' => $emailExists]);
    }

    public function verify($id, $token)
    {
        $user = User::findOrFail($id);

        if ($user->email_verification_token === $token) {
            $user->email_verified_at = now();
            $user->email_verification_token = $token;
            $user->verification_status = 1;
            $user->save();

            return redirect()->route('login')->with('success', 'Email verified successfully!');
        }

        return redirect()->route('login')->with('error', 'Invalid verification link.');
    }


}
