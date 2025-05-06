<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }


    // Redirect to Google OAuth
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google OAuth Callback
    public function handleGoogleCallback()
    {

        try {
            $googleUser = Socialite::driver('google')->user();
            
             // Check if the user exists based on their Google ID
            $user = User::where('google_id', $googleUser->getId())->first();

            // If user doesn't exist, create a new user
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),  // Store Google ID
                    'password' => Hash::make(Str::random(16)),  // You can set a random password for OAuth users
                ]);
            }

            // Log the user in
            Auth::login($user, true);

            return redirect()->route('home'); // Redirect to the home page or dashboard after successful login

        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            Log::error('InvalidStateException: ' . $e->getMessage());
            return redirect()->route('login')->withErrors('Failed to login with Google.');
        }      
    }

//     public function logout()
//     {
//         // Log out the user from the Laravel session
//         Auth::logout();

//         // If you are using Socialite (Google), you can also log out from the OAuth provider (optional)
//         // Socialite::driver('google')->logout();

//         // Redirect to the home or login page
//         return redirect()->route('login'); 
//     }
}
