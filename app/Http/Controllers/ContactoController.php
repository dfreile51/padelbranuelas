<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin|empleado'])->except(['index', 'store']);
    }

    public function index()
    {
        if (auth()->check()) {
            $user = User::find(auth()->user()->id);

            return view('contacto', [
                'user' => $user
            ]);
        } else {
            return view('contacto');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:60',
            'email' => 'required|email|max:60',
            'asunto' => 'required|string|max:60',
            'mensaje' => 'required|max:255'
        ]);

        Contacto::create([
            'name' => $request->name,
            'email' => $request->email,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje
        ]);

        return back()->with('success', 'Mensaje Enviado Correctamente');
    }

    // Funciones Panel Admin
    public function getView()
    {
        $comentarios = Contacto::all();

        return view('panelAdmin.comentarios.index', [
            'comentarios' => $comentarios
        ]);
    }

    public function show(Contacto $contacto)
    {
        return view('panelAdmin.comentarios.show', [
            'comentario' => $contacto
        ]);
    }

    public function destroy(Contacto $contacto) {
        $contacto->delete();

        return back();
    }
}
