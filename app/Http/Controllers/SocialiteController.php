<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {

        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {

        $googleData = Socialite::driver('google')->user();
        $user = User::where('email', $googleData->getEmail())->first();
        if (! $user) {
            // User doesn't exist, create a new user
            $user = User::create([
                'name' => $googleData->getName(),
                'email' => $googleData->getEmail(),
                'password' => Hash::make($googleUser->getName()),
                'role_id'  => 7
            ]);
        }

        // Log in the user
        Auth::login($user);

        // Redirect to the desired page
        return redirect('/');

    }

    // Redirect to Facebook for authentication
            public function redirectToFacebook()
            {
                return Socialite::driver('facebook')->redirect();
            }

            // Handle Facebook callback
            public function handleFacebookCallback()
            {
                $user = Socialite::driver('facebook')->user();

                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'password' => bcrypt(str_random(16)), // Generate a random password
                        'role_id' => 7
                    ]);

                    // Log in the user (optional)
                    Auth::login($newUser);
                    return redirect('/');
            }
}
