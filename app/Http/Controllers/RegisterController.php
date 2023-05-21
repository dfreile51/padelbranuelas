<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // VALIDACIÓN DE LOS DATOS
        $this->validate($request, [
            'name' => 'required|string|max:60',
            'username' => 'required|regex:/^\S*$/u|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|min:8|confirmed'
        ]);

        // CREAR EL USUSARIO Y ALMACENARLO EN LA BASE DE DATOS
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole('cliente');

        // DEVOLVER UN MENSAJE SATISFACTORIO
        return back()->with('success', 'Cuenta Registrada Correctamente');
    }
}
