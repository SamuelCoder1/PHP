<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GoogleUser;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request)
    {
        try {
            // Obtener datos del usuario de Google
            $user_google = Socialite::driver('google')->user();

            // Buscar el usuario en tu base de datos
            $user = User::where('email', $user_google->email)->first();

            if ($user) {
                // Si existe, iniciar sesión con el usuario
                Auth::login($user);
            } else {
                // Si no existe, crear un nuevo usuario
                $user = User::create([
                    'names' => $user_google->name,
                    'email' => $user_google->email,
                ]);

                // Crear un registro en GoogleUser
                GoogleUser::create([
                    'email' => $user_google->email,
                    'name' => $user_google->name,
                    'user_id' => $user->id,
                ]);

                // Iniciar sesión con el nuevo usuario
                Auth::login($user);
            }

            // Redirigir a la vista de usuarios con un mensaje de éxito
            return redirect()->route('usuarios.index')->with('success', 'Has iniciado sesión correctamente');
        } catch (\Exception $e) {
            \Log::error('Google login error:', ['message' => $e->getMessage()]);
            return redirect()->route('auth.google')->with('error', 'Error al iniciar sesión con Google.');
        }
    }

    public function logout()
    {
        // Cierra la sesión del usuario actual
        Auth::logout();

        // Redirige a la página de login
        return redirect()->route('login')->with('success', 'Has cerrado sesión correctamente.');
    }


}
