<?php

use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClaseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Opcodes\LogViewer\Facades\LogViewer;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('log-viewer', function () {
    return LogViewer::index();
})->name('log-viewer')->middleware('auth', 'rol:Admin');

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
