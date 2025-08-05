<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){
        Log::channel('info')->info('Usuario accedió a la sección de usuarios', [
            'user_id' => Auth::id(),
            'rol' => Auth::user()->rol
        ]);

        $usuario = new User();
        $roles = ['Cliente','Instructor','Admin'];

        return view("usuarios.nueva", compact('usuario', 'roles'));
    }

    public function list(){
        Log::channel('info')->info('Usuario accedió a la lista de usuarios', [
            'user_id' => Auth::id(),
            'rol' => Auth::user()->rol
        ]);

        $usuarios = User::all();

        return view("usuarios.lista", compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'correo' => 'required|string|email',
            'contrasena' => 'required|string|min:8',
            'rol' => 'required|in:Cliente,Instructor,Admin',
        ], [
            'correo.email' => 'El correo debe ser una dirección válida.',
            'contrasena.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);

        Log::channel('info')->info('Usuario guardó un usuario', [
            'user_id' => Auth::id(),
            'rol' => Auth::user()->rol,
        ]);

        if ($request->id == null) {
            $usuario = new User();
            if ($request->filled('contrasena')) {
                $usuario->password = bcrypt($request->contrasena);
            }
        } else {
            $usuario = User::find($request->id);
            if (!$usuario) {
                return redirect()->back()->withErrors('Usuario no encontrado.');
            }

            if ($request->filled('contrasena')) {
                $usuario->password = bcrypt($request->contrasena);
            }
        }

        $usuario->name = $request->nombre;
        $usuario->email = $request->correo;
        $usuario->rol = $request->rol;

        $usuario->save();
        return redirect()->route('usuarios');
    }

    public function edit($id){
        Log::channel('info')->info('Usuario accedió a la edición de un usuario', [
            'user_id' => Auth::id(),
            'rol' => Auth::user()->rol,
            'usuario_id' => $id
        ]);
        $usuario = User::find($id);
        $roles = ['Cliente','Instructor','Admin'];

        return view("usuarios.nueva", compact('usuario', 'roles'));
    }

    public function destroy($id){
        Log::channel('warning')->warning('Usuario eliminó un usuario', [
            'user_id' => Auth::id(),
            'rol' => Auth::user()->rol,
            'usuario_id' => $id
        ]);

        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->to('usuarios');
    }
}
