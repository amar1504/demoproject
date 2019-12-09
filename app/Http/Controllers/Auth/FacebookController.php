<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;
use Illuminate\Http\Request;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $create['firstname'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['facebook_id'] = $user->getId();

            $userModel = new User;
            $createdUser =User::create($create);
           // Auth::loginUsingId($createdUser->id);
            return redirect()->route('eshopper');


        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
    }
}
