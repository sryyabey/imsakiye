<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class SocialAuthController extends Controller
{

    public function facebook_redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebook_callback()
    {

        try {

            $faceUser = Socialite::driver('facebook')->stateless()->user();
            $existUser = User::where('email',$faceUser->email)->first();

            if($existUser) {
                Auth::loginUsingId($existUser->id);
            }
            else {
                $user = new User;
                $user->name = $faceUser->name;
                $user->email = $faceUser->email;
                $user->password = md5(rand(1,10000));
                $user->verified = 1;
                $user->approved = 1;
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return redirect()->route('frontend.home');
        }
        catch (Exception $e) {
            return 'error';
        }
    }

}
