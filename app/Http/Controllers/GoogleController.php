<?php

namespace App\Http\Controllers;

use Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $users = Socialite::driver('google')->user();
        $user = $users->getName();
        $myEmail = $users->getEmail();

        return view('auth.register',compact('user','myEmail'));

        // $user->token;
    }
}
