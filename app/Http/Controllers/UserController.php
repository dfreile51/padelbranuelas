<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $users = User::all();

        return view('panelAdmin.usuarios.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $roles = Role::all();
        return view('panelAdmin.usuarios.create', [
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:60',
            'username' => 'required|regex:/^\S*$/u|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->syncRoles($request->rol);

        return back()->with('success', 'Usuario Registado Correctamente');
    }

    public function show(User $user)
    {
        return view('panelAdmin.usuarios.show', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('panelAdmin.usuarios.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string|max:60',
            'username' => ['required', 'unique:users,username,' . $user->id, 'min:3', 'max:20', 'not_in:editar-perfil', 'regex:/^\S*$/u'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id, 'max:60']
        ]);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email
        ]);

        if ($request->password) {
            $this->validate($request, [
                'password' => 'required|min:8'
            ]);

            $user->update([
                'password' => $request->password
            ]);
        }

        $user->syncRoles($request->rol);

        return back()->with('success', 'Usuario Actualizado Correctamente');
    }

    public function destroy(User $user)
    {
        if(!is_null($user->imagen)) {
            $imagen = public_path('perfiles') . '/' . $user->imagen;

            unlink($imagen);
        }

        $user->delete();

        return back();
    }
}
