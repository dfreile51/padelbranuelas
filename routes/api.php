<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para las reservas
Route::post('/reservas/insert', [ReservaController::class, 'store']);
Route::get('/reservas/get', [ReservaController::class, 'getBookings']);

// Rutas para obtener el token
Route::post('/getToken', [LoginController::class, 'getToken']);
