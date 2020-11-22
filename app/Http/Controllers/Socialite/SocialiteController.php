<?php

namespace App\Http\Controllers\Socialite;

use Socialite;
use Illuminate\Http\Request;
use App\Models\SocialAccountService;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialAccountService $social)
    {
        $user = $social->createOrGetUser(Socialite::driver('facebook')->user());
        Auth::login($user);
        return redirect('/home');

        // dd($user);
    }
}
