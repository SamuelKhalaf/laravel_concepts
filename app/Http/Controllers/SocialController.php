<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Contracts\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
class SocialController extends Controller
{
    public function redirect($service): RedirectResponse
    {
        return Socialite::driver($service)->redirect();
    }

    public function callback($service): User
    {
       return $user = Socialite::driver($service)->user();
    }
}
