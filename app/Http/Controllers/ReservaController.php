<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class ReservaController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);

        return view('reservas', [
            'user' => $user
        ]);
    }

    public function misReservas()
    {
        $user = User::find(auth()->user()->id);

        $reservas = Reserva::where('user_id', auth()->user()->id)
            ->where('fecha', '>', now()->toDateString())
            ->orWhere(function (Builder $query) {
                $query->where('user_id', auth()->user()->id)
                    ->where('fecha', '>=', now()->toDateString())
                    ->where('hora', '>', now()->toTimeString());
            })
            ->orderBy('created_at', 'desc')->get();

        $oldReservas = Reserva::where('user_id', auth()->user()->id)
            ->where('fecha', '<', now()->toDateString())
            ->orWhere(function (Builder $query) {
                $query->where('user_id', auth()->user()->id)
                    ->where('fecha', '<=', now()->toDateString())
                    ->where('hora', '<=', now()->toTimeString());
            })
            ->orderBy('created_at', 'desc')->get();

        foreach ($reservas as $reserva) {
            $reserva->fecha = Carbon::parse($reserva->fecha)->format("d/m/Y");
        }

        foreach ($oldReservas as $oldReserva) {
            $oldReserva->fecha = Carbon::parse($oldReserva->fecha)->format("d/m/Y");
        }

        return view('misReservas.index', [
            'user' => $user,
            'reservas' => $reservas,
            'oldReservas' => $oldReservas
        ]);
    }

    public function store(Request $request)
    {
        if ($request->header("authorization") == "") {
            return response()->json([
                'message' => 'Token no encontrado'
            ], 404);
        }

        if (!User::isValidToken($request->header("authorization"), $request->email)) {
            return response()->json([
                'message' => 'Token no valido'
            ], 401);
        }

        $validator = Validator::make($request->all(), [
            'fecha' => 'required|date_format:Y-m-d',
            'hora' => 'required|date_format:H:i'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        if ($request->fecha < now()->toDateString()) {
            return response()->json([
                "status" => false,
                "message" => "La fecha no puede ser anterior a la actual"
            ], 400);
        }

        if ($request->fecha == now()->toDateString() && $request->hora < substr(now()->toTimeString(), 0, 5)) {
            return response()->json([
                "status" => false,
                "message" => "La hora no puede ser anterior a la actual"
            ], 400);
        }

        if (Reserva::where('fecha', $request->fecha)->where('hora', $request->hora)->exists()) {
            return response()->json([
                "status" => false,
                "message" => "La reserva ya existe"
            ], 400);
        }

        Reserva::create([
            "fecha" => $request->fecha,
            "hora" => $request->hora,
            "user_id" => $request->user_id
        ]);

        return response()->json([
            "status" => true,
            "message" => "Reserva Creada Correctamente"
        ]);
    }

    public function destroy(Reserva $reserva)
    {
        $this->authorize('delete', $reserva);

        $reserva->delete();

        return back();
    }

    public function getBookings()
    {
        return response()->json(Reserva::all());
    }

    // Funciones para el panel Admin
    public function getView()
    {
        $reservas = Reserva::where('fecha', '>', now()->toDateString())
            ->orWhere(function (Builder $query) {
                $query->where('fecha', '>=', now()->toDateString())
                    ->where('hora', '>', now()->toTimeString());
            })
            ->orderBy('created_at', 'desc')->get();

        $oldReservas = Reserva::where('fecha', '<', now()->toDateString())
            ->orWhere(function (Builder $query) {
                $query->where('fecha', '<=', now()->toDateString())
                    ->where('hora', '<=', now()->toTimeString());
            })
            ->orderBy('created_at', 'desc')->get();

        foreach ($reservas as $reserva) {
            $reserva->fecha = Carbon::parse($reserva->fecha)->format("d/m/Y");
        }

        foreach ($oldReservas as $oldReserva) {
            $oldReserva->fecha = Carbon::parse($oldReserva->fecha)->format("d/m/Y");
        }

        return view('panelAdmin.reservas.index', [
            'reservas' => $reservas,
            'oldReservas' => $oldReservas
        ]);
    }

    public function deleteReserva(Reserva $reserva)
    {
        $reserva->delete();

        return back();
    }
}
