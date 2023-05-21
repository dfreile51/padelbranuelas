<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::find(auth()->user()->id);

        return view('perfil.index', [
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:60',
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:20', 'not_in:editar-perfil', 'regex:/^\S*$/u'],
            'email' => ['required', 'email', 'unique:users,email,' . auth()->user()->id, 'max:60']
        ]);

        if ($request->imagen) {
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            $imagenServidor = Image::make($imagen);
            // $imagenServidor->fit(1000, 1000);

            $imagenPath = public_path('perfiles') . "/" . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        // Guardar Cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->name = $request->name;
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();

        if ($request->oldpassword || $request->password) {
            if (Hash::check($request->oldpassword, auth()->user()->password)) {
                $this->validate($request, [
                    'password' => 'required|confirmed|min:8'
                ]);

                $usuario->password = Hash::make($request->password);
                $usuario->save();
            } else {
                return back()->with('error', 'La contraseña actual no coincide');
            }
        }

        // Redireccionar
        return back();
    }
}
