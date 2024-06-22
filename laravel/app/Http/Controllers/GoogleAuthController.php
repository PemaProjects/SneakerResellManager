<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('email', $google_user->email)->first();

            if(!$user){

                $new_user = User::create([
                    'name' => $google_user->name,
                    'email' => $google_user->email,
                    'google_id' => $google_user->id,
                    'avatar' => $google_user->avatar
                    
                ]);

                Auth::login($new_user);

                return redirect()->intended('/');

            }else{
                Auth::login($user);
                return redirect()->intended('/');

            }

        } catch (\Throwable $th) {
            dd($th);
        }
    }

}
 