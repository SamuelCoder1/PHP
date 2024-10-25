<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function login(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request){

        $user_google = Socialite::driver('google')->stateless()->user();

        $user = User::where('email', $user_google->email)->first();
        
        if(!$user)
        {
            $user = User::create(['name' => $user_google->name, 'email' => $user_google->email, 'password' => \Hash::make(rand(100000,999999))]);
        }

        Auth::login($user);

        return redirect()->route('usuarios.index')->with('danger', 'Actualmente tu correo no esta autorizado para iniciar sesion');
    }
}
