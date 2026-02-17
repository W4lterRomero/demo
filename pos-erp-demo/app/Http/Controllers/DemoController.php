<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemoController extends Controller
{
    public function login($package)
    {
        $credentials = match($package) {
            'basico' => 'cajero@demo.com',
            'completo' => 'admin@demo.com',
            'premium' => 'propietario@demo.com',
            default => null,
        };

        if (!$credentials) {
            return redirect('/')->with('error', 'Paquete no válido');
        }

        $user = User::where('email', $credentials)->first();

        if ($user) {
            Auth::login($user);
            session(['demo_package' => $package]);
            
            return redirect()->route('dashboard');
        }

        return redirect('/')->with('error', 'Usuario demo no encontrado. Ejecute los seeders.');
    }
    
    public function logout()
    {
        Auth::logout();
        session()->forget('demo_package');
        return redirect('/');
    }
}
