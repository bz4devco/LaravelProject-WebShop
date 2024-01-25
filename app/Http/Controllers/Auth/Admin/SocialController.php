<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }



    public function providerCallback($driver)
    {

        $user = Socialite::driver($driver)->user();

        $result = $this->findOrCreateUser($user);

        if ($result) {
            Auth::login($result);
            session()->regenerate();

            return to_route('admin.home');
        } else {
            return to_route('admin.auth.login.form')->with('accessDenied', true);
        }
    }


    protected function findOrCreateUser($user)
    {
        $providerUser = User::where([
            'email' => $user->getEmail()
        ])
            ->where('user_type', 1)
            ->where('status', 1)
            ->first();

        if (!is_null($providerUser)) {
            if ($providerUser->email_verified_at == null) {
                $providerUser->update([
                    'email_verified_at' => now()
                ]);
            }

            return $providerUser;
        } else {
            return false;
        }
    }
}
