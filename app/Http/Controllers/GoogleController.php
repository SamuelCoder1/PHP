<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function login()
    {
        // Redirigir a Google
        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request)
    {
        try {
            // Obtener datos del usuario de Google
            $user_google = Socialite::driver('google')->user();

            // Buscar el usuario por correo
            $user = User::where('email', $user_google->email)->first();

            // Si no existe, crearlo
            if (!$user) {
                $user = User::create([
                    'name' => $user_google->name,
                    'email' => $user_google->email,
                    'password' => Hash::make(rand(100000, 999999)), // Generar contraseña aleatoria
                ]);
            }

            // Iniciar sesión
            Auth::login($user);

            return redirect()->route('usuarios.index')->with('success', 'Sesión iniciada exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Hubo un error al iniciar sesión con Google. Intenta de nuevo.');
        }
    }
}
