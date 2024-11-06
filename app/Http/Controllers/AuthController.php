<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiClient;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Crear una instancia del cliente API
        $apiClient = new ApiClient();

        // Realizar el login
        $response = $apiClient->login($email, $password);

        // Verificar si la respuesta tiene un token
        if (isset($response->data->token)) {
            if ($response->data->user) {
                // Guardar el token en la sesión
                session(['token' => $response->data->token, 'user' => $response->data->user]);
                return redirect()->route('app');
            }
        }

        return redirect()->back()->withErrors([
            'email' => 'Credenciales incorrectas o usuario no encontrado.',
        ]);
    }


    public function logout(Request $request)
    {
        // Elimina el token y el usuario de la sesión
        $request->session()->forget(['token', 'user']);

        // Redirige al usuario a la página de inicio de sesión
        return redirect()->route('login')->with('message', 'Sesión cerrada correctamente.');
    }


    public function showApp(Request $request)
    {
        // Verificar si el usuario tiene un token en la sesión
        if (!$request->session()->has('token')) {
            // Si no tiene token, redirigir al login
            return redirect()->route('login');
        }

        // Si está autenticado, mostrar la vista `app`
        return view('app');
    }
}
