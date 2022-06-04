<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleProviderCallback(Request $request)
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', substr($user->id, 0,5))->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('dashboard');

            }else{
                $user_id = substr($user->id, 0,5);
                $newUser = User::create([
                    'id' => $user_id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user_id,
                    'email_verified_at' => Carbon::now(),
                    'password' => encrypt('123456dummy'),
                ]);
                $newUser->attachRole('student');
                Mahasiswa::create([
                    'user_id' => $user_id
                ]);
                Auth::login($newUser);

                return redirect()->intended('dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }

    }
}
