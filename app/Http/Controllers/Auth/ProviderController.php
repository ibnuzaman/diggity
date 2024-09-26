<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProviderController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $socialUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('There was an error during authentication.');
        }

        $registeredUser = User::where('google_id', $socialUser->getId())
            ->orWhere('email', $socialUser->getEmail())
            ->first();

        if ($registeredUser) {
            // $registeredUser->update([
            //     'google_id' => $socialUser->getId(),
            //     'google_token' => $socialUser->token,
            //     'google_refresh_token' => $socialUser->refreshToken,
            // ]);
            // Auth::login($registeredUser);
            redirect('login')->withErrors('User already registered.');
        } else {
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'google_id' => $socialUser->getId(),
                'google_token' => $socialUser->token,
                'google_refresh_token' => $socialUser->refreshToken,
                'password' => Hash::make(Str::random(24)),
            ]);

            Auth::login($user);
        }

        return redirect('/dashboard');
    }
}
