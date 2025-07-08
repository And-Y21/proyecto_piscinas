<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){
        $usuario = new User();
        $roles = ['Cliente','Instructor','Admin'];

        return view("usuarios.nueva", compact('usuario', 'roles'));
    }

    public function list(){
        $usuarios = User::all();

        return view("usuarios.lista", compact('usuarios'));
    }

    public function store(Request $request)
    {
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
        $usuario = User::find($id);
        $roles = ['Cliente','Instructor','Admin'];

        return view("usuarios.nueva", compact('usuario', 'roles'));
    }

    public function destroy($id){
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->to('usuarios');
    }
}
