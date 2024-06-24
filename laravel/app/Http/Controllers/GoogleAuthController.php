<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Mail\RegisterMail;

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
                    'username' => $google_user->name,
                    'google_id' => $google_user->id,
                    'avatar' => $google_user->avatar
                    
                ]);

                $token = $new_user->createToken('snkrs')->plainTextToken;
                
                Mail::to($new_user)->send(new RegisterMail($new_user->name));

            }else{
                $token = $user->createToken('snkrs')->plainTextToken;
                Auth::login($user);
            }

            return redirect("http://localhost:3000/auth/callback?token=$token");

        } catch (\Throwable $th) {
            dd($th);
        }
    }

}
 