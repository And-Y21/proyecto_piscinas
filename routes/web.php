<?php

use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\TipoMembresiaController;
use App\Http\Controllers\AsistenciaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Opcodes\LogViewer\Facades\LogViewer;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'rol:Admin'])->group(function () {
    Route::get('/log-viewer', function () {
        return redirect('/log-viewer');
    })->name('log-viewer');
});

Route::get('membresias', [MembresiaController::class, 'list'])
    ->name('membresias',)
    ->middleware('auth', 'rol:Admin');
Route::get('membresia/nueva', [MembresiaController::class, 'index'])
    ->name('membresia.nueva')
    ->middleware('auth', 'rol:Admin');
Route::post('membresia/guardar', [MembresiaController::class, 'store'])
    ->name('membresia.guardar')
    ->middleware('auth', 'rol:Admin');
Route::get('membresia/editar/{id}', [MembresiaController::class, 'edit'])
    ->name('membresia.editar')
    ->middleware('auth', 'rol:Admin');
Route::delete('membresia/eliminar/{id}', [MembresiaController::class, 'destroy'])
    ->name('membresia.eliminar')
    ->middleware('auth', 'rol:Admin');

Route::get('usuarios', [UsuarioController::class, 'list'])
    ->name('usuarios')
    ->middleware('auth', 'rol:Admin');
Route::get('usuario/nueva', [UsuarioController::class, 'index'])
    ->name('usuario.nueva')
    ->middleware('auth', 'rol:Admin');
Route::post('usuario/guardar', [UsuarioController::class, 'store'])
    ->name('usuario.guardar')
    ->middleware('auth', 'rol:Admin');
Route::get('usuario/editar/{id}', [UsuarioController::class, 'edit'])
    ->name('usuario.editar')
    ->middleware('auth', 'rol:Admin');
Route::delete('usuario/eliminar/{id}', [UsuarioController::class, 'destroy'])
    ->name('usuario.eliminar')
    ->middleware('auth', 'rol:Admin');

Route::get('clases', [ClaseController::class, 'list'])
    ->name('clases')
    ->middleware('auth', 'rol:Admin');
Route::get('clase/nueva', [ClaseController::class, 'index'])
    ->name('clase.nueva')
    ->middleware('auth', 'rol:Admin');
Route::post('clase/guardar', [ClaseController::class, 'store'])
    ->name('clase.guardar')
    ->middleware('auth', 'rol:Admin');
Route::get('clase/editar/{id}', [ClaseController::class, 'edit'])
    ->name('clase.editar')
    ->middleware('auth', 'rol:Admin');
Route::delete('clase/eliminar/{id}', [ClaseController::class, 'destroy'])
    ->name('clase.eliminar')
    ->middleware('auth', 'rol:Admin');

Route::get('tipos_membresias', [TipoMembresiaController::class, 'list'])
    ->name('tipos_membresias')
    ->middleware('auth', 'rol:Admin');
Route::get('tipo_membresia/nueva', [TipoMembresiaController::class, 'index'])
    ->name('tipo_membresia.nueva')
    ->middleware('auth', 'rol:Admin');
Route::post('tipo_membresia/guardar', [TipoMembresiaController::class, 'store'])
    ->name('tipo_membresia.guardar')
    ->middleware('auth', 'rol:Admin');
Route::get('tipo_membresia/editar/{id}', [TipoMembresiaController::class, 'edit'])
    ->name('tipo_membresia.editar')
    ->middleware('auth', 'rol:Admin');
Route::delete('tipo_membresia/eliminar/{id}', [TipoMembresiaController::class, 'destroy'])
    ->name('tipo_membresia.eliminar')
    ->middleware('auth', 'rol:Admin');

Route::get('asistencias', [AsistenciaController::class, 'list'])
    ->name('asistencias')
    ->middleware('auth', 'rol:Admin');
Route::get('asistencia/nueva', [AsistenciaController::class, 'index'])
    ->name('asistencia.nueva')
    ->middleware('auth', 'rol:Admin');
Route::post('asistencia/guardar', [AsistenciaController::class, 'store'])
    ->name('asistencia.guardar')
    ->middleware('auth', 'rol:Admin');
Route::get('asistencia/editar/{id}', [AsistenciaController::class, 'edit'])
    ->name('asistencia.editar')
    ->middleware('auth', 'rol:Admin');
Route::delete('asistencia/eliminar/{id}', [AsistenciaController::class, 'destroy'])
    ->name('asistencia.eliminar')
    ->middleware('auth', 'rol:Admin');
Route::get('/clase/{id}/profesor', [AsistenciaController::class, 'obtenerProfesor']);
Route::get('/usuario/{id}/membresias', [AsistenciaController::class, 'obtenerMembresias']);

Route::get('/auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback']);
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
