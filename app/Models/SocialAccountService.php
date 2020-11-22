<?php

namespace App\Models;

use App\User;
use App\Models\SocialAccount;
use Illuminate\Database\Eloquent\Model;
use Laravel\Socialite\Contracts\Provider;
use Laravel\Socialite\Contracts\user as ProviderUser;

class SocialAccountService extends Model
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')->whereProviderUserId($providerUser->getId())->first();

        if ($account) {
            return $account->user;
        }

        $account = new SocialAccount();
        $account->provider_user_id = $providerUser->getId();
        $account->provider = 'facebook';

        $user = User::whereEmail($providerUser->getEmail())->first();
        if (!$user) {
            $user = new User();
            $user->name = $providerUser->getName();
            $user->email = $providerUser->getEmail();
            $user->save();
        }

        $account->user()->associate($user);
        $account->save();

        return $user;
    }
}
