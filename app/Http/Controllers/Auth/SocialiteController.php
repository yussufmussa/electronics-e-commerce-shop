<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;




class SocialiteController extends Controller
{
    //
    public function loginSocial(Request $request, string $provider): RedirectResponse
    {
        $this->validateProvider($request);
 
        return Socialite::driver($provider)->redirect();
    }
 
    public function callbackSocial(Request $request, string $provider)
    {
        $this->validateProvider($request);
 
        $response = Socialite::driver($provider)->user();
 
        $user = User::firstOrCreate(
            ['email' => $response->getEmail()],
            ['password' => Hash::make(Str::random(16)), 'role_id' => 2],
        
        );
        $data = [$provider . '_id' => $response->getId()];
 
        if ($user->wasRecentlyCreated) {
            $data['name'] = $response->getName() ?? $response->getNickname();
 
            // event(new Registered($user));
        }
 
        $user->update($data);
 
        Auth::login($user, remember: true);
 
        return redirect()->route(auth()->user()->redirectBasedONRole());
    }
 
    protected function validateProvider(Request $request): array
    {
        return $this->getValidationFactory()->make(
            $request->route()->parameters(),
            ['provider' => 'in:facebook,google,github']
        )->validate();
    }
}
