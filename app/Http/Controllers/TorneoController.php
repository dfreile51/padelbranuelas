<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Torneo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin|empleado'])->except(['index', 'detalle']);
    }

    public function index()
    {
        $torneos = Torneo::all();

        if (auth()->check()) {
            $user = User::find(auth()->user()->id);

            return view('torneos', [
                'user' => $user,
                'torneos' => $torneos
            ]);
        } else {
            return view('torneos', [
                'torneos' => $torneos
            ]);
        }
    }

    public function detalle(Torneo $torneo)
    {
        $torneo->fecha_inicio = Carbon::parse($torneo->fecha_inicio)->format('d/m/Y');
        $torneo->fecha_fin = Carbon::parse($torneo->fecha_fin)->format('d/m/Y');

        if (auth()->check()) {
            $user = User::find(auth()->user()->id);

            return view('torneos.show', [
                'user' => $user,
                'torneo' => $torneo
            ]);
        } else {
            return view('torneos.show', [
                'torneo' => $torneo
            ]);
        }
    }

    // Funciones para el panel Admin
    public function getView()
    {
        $torneos = Torneo::all();

        foreach($torneos as $torneo) {
            $torneo->fecha_inicio = Carbon::parse($torneo->fecha_inicio)->format('d/m/Y');
            $torneo->fecha_fin = Carbon::parse($torneo->fecha_fin)->format('d/m/Y');
        }

        return view('panelAdmin.torneos.index', [
            'torneos' => $torneos
        ]);
    }

    public function create()
    {
        return view('panelAdmin.torneos.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'fecha_inicio' => 'required|date_format:Y-m-d',
            'fecha_fin' => 'required|date_format:Y-m-d',
            'email' => 'required|email|max:60',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        Torneo::create([
            'titulo' => $request->titulo,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'email' => $request->email,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen
        ]);

        return back()->with('success', 'Torneo Creado Correctamente');
    }

    public function destroy(Torneo $torneo)
    {
        $imagen = public_path('uploads') . '/' . $torneo->imagen;

        unlink($imagen);

        $torneo->delete();

        return back();
    }

    public function show(Torneo $torneo)
    {
        $torneo->fecha_inicio = Carbon::parse($torneo->fecha_inicio)->format('d/m/Y');
        $torneo->fecha_fin = Carbon::parse($torneo->fecha_fin)->format('d/m/Y');

        return view('panelAdmin.torneos.show', [
            'torneo' => $torneo
        ]);
    }
}
