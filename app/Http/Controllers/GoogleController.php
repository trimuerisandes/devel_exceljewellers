<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialite;
use Auth;
use Exception;
use Carbon\Carbon;


class GoogleController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('email', $googleUser->email)->first();

            if ($existUser) {
                Auth::loginUsingId($existUser->id);
            } else {
                $user = new User;
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->google_id = $googleUser->id;
                $user->email_verified_at = Carbon::now()->toDateTimeString();
                $user->password = bcrypt(request('password'));
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return redirect()->to('/home');
        } catch (Exception $e) {
            return redirect('/register');
        }
    }
}