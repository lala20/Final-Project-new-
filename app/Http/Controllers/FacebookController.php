<?php

namespace App\Http\Controllers;

use Socialite;

class FacebookController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
      // dd(Socialite::driver('facebook'));
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $users = Socialite::driver('facebook')->user();
        $user = $users->getName();
        $myEmail = $users->getEmail();
      //   dd($users);

        return view('auth.register',compact('user','myEmail'));

        // $user->token;
    }
}
