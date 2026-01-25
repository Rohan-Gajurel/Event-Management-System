<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function authProviderRediect($provider)
    {
        if($provider){
        return Socialite::driver($provider)->redirect();
        }
        abort(404);
    }
    

    public function socialAuthentication($provider)
    {
        if($provider){
            $socialUser = Socialite::driver($provider)->user();

            // dd($socialUser);


        $user = User::where('auth_provider_id', $socialUser->getId())->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('event_list');
        }

        $user = User::create([
            'name'      => $socialUser->getName(),
            'email'     => $socialUser->getEmail(),
            'password'  => Hash::make('Password@1234'),
            'auth_provider_id' => $socialUser->getId(),
            "auth_provider"=>$provider
        ]);
        
        Auth::login($user);
        return redirect()->route('profile.create');


        }
        abort(404);
        
    }
}
