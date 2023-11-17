<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Google\ReCaptcha\V2\ReCaptcha;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $setting = Setting::all();
        return view('auth.register', compact('setting'));
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
            'g-recaptcha-response' => 'required|captcha',
        ],['g-recaptcha-response' => 'Please Check the security box']);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => 2,
            'profile_picture' => 'user.png',
            'password' => Hash::make($request->password),
        ]);

       
        Auth::login($user);

        return redirect()->route(auth()->user()->redirectBasedONRole());
    }
}
