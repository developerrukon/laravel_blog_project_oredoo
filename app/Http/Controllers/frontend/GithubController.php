<?php

namespace App\Http\Controllers\frontend;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function redirect_provider(){
        return Socialite::driver('github')->redirect();
    }

    public function provider_to_application(){
        //user info
        $user = Socialite::driver('github')->user();
        //user login
        if(User::where('email', $user->getEmail(),)->exists()){
            if(Auth::attempt(['email' => $user->getEmail(), 'password' => 'sh#@%403ms'])){
                return redirect(route('backend.index'))->with('success', "You have successfully login");

            }

        }else{
        //account create
        User::insert([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => Hash::make('sh#@%403ms'),
        ]);

        if(Auth::attempt(['email' => $user->getEmail(), 'password' => 'sh#@%403ms'])){
            return redirect(route('backend.index'))->with('success', "You have successfully login");

        }
        }
    }

}
