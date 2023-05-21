<?php

use App\Models\User;
use App\Models\Torneo;
use App\Models\Reserva;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\RegisterController;
use App\Models\Contacto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        $user = User::find(auth()->user()->id);

        return view('inicio', [
            'user' => $user
        ]);
    } else {
        return view('inicio');
    }
});

//Rutas para la iniciar sesion, registrar usuario y cerrar sesión
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Rutas para la página de contacto
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'store']);

// Rutas para el perfil
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');
// Route::delete('/editar-perfil/{user}', [PerfilController::class, 'destroy'])->name('perfil.destroy');

// Rutas para las reservas
Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas')->middleware('auth');
Route::get('/mis-reservas', [ReservaController::class, 'misReservas'])->name('mis-reservas.index')->middleware('auth');
Route::delete('/mis-reservas/{reserva}', [ReservaController::class, 'destroy'])->name('mis-reservas.destroy')->middleware('auth');

// Rutas para las tarifas
Route::get('/tarifas', function () {
    if (auth()->check()) {
        $user = User::find(auth()->user()->id);

        return view('tarifas', [
            'user' => $user
        ]);
    } else {
        return view('tarifas');
    }
})->name('tarifas');

// Rutas para los torneos
Route::get('/torneos', [TorneoController::class, 'index'])->name('torneos');
Route::get('/torneos/{torneo}', [TorneoController::class, 'detalle'])->name('torneos.show');

// Rutas para conocenos
Route::get('/conocenos', function () {
    if (auth()->check()) {
        $user = User::find(auth()->user()->id);

        return view('conocenos', [
            'user' => $user
        ]);
    } else {
        return view('conocenos');
    }
})->name('conocenos');

// Rutas para el Dropzone
Route::post('/imagenes', [DropzoneController::class, 'store'])->name('imagenes.store');
Route::get('/imagenes/delete', [DropzoneController::class, 'delete'])->name('imagenes.delete');

// Rutas para el panel de administración
Route::get('/panel-admin', function () {
    $users = User::all();
    $reservas = Reserva::all();
    $torneos = Torneo::all();
    $comentarios = Contacto::all();

    return view('panelAdmin.inicio', [
        'users' => $users,
        'reservas' => $reservas,
        'torneos' => $torneos,
        'comentarios' => $comentarios
    ]);
})->name('panel-admin.index')->middleware(['auth', 'role:admin|empleado']);
Route::get('/panel-admin/usuarios', [UserController::class, 'index'])->name('panel-admin.usuarios');
Route::get('/panel-admin/usuarios/create', [UserController::class, 'create'])->name('panel-admin.usuarios.create');
Route::post('/panel-admin/usuarios', [UserController::class, 'store'])->name('panel-admin.usuarios.store');
Route::delete('/panel-admin/usuarios/{user}', [UserController::class, 'destroy'])->name('panel-admin.usuarios.destroy');
Route::get('/panel-admin/usuarios/{user}/edit', [UserController::class, 'edit'])->name('panel-admin.usuarios.edit');
Route::put('/panel-admin/usuarios/{user}', [UserController::class, 'update'])->name('panel-admin.usuarios.update');
Route::get('/panel-admin/usuarios/{user}', [UserController::class, 'show'])->name('panel-admin.usuarios.show');

Route::get('/panel-admin/comentarios', [ContactoController::class, 'getView'])->name('panel-admin.comentarios');
Route::delete('/panel-admin/comentarios/{contacto}', [ContactoController::class, 'destroy'])->name('panel-admin.comentarios.destroy');
Route::get('/panel-admin/comentarios/{contacto}', [ContactoController::class, 'show'])->name('panel-admin.comentarios.show');

Route::get('/panel-admin/reservas', [ReservaController::class, 'getView'])->name('panel-admin.reservas')->middleware(['auth', 'role:admin|empleado']);
Route::delete('/panel-admin/reservas/{reserva}', [ReservaController::class, 'deleteReserva'])->name('panel-admin.reservas.delete')->middleware(['auth', 'role:admin|empleado']);

Route::get('/panel-admin/torneos', [TorneoController::class, 'getView'])->name('panel-admin.torneos');
Route::get('/panel-admin/torneos/create', [TorneoController::class, 'create'])->name('panel-admin.torneos.create');
Route::post('/panel-admin/torneos', [TorneoController::class, 'store'])->name('panel-admin.torneos.store');
Route::get('/panel-admin/torneos/{torneo}', [TorneoController::class, 'show'])->name('panel-admin.torneos.show');
Route::delete('/panel-admin/torneos/{torneo}', [TorneoController::class, 'destroy'])->name('panel-admin.torneos.destroy');
