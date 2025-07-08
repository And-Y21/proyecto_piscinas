<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Membresia;
use App\Models\User;

class MembresiaController extends Controller
{
    public function index(){
        $usuarios = User::all();
        $membresia = new Membresia();

        return view("membresias.nueva", compact('usuarios', 'membresia'));
    }

    public function list(){
        $membresias = Membresia::join('users','membresias.id_usuario','=', 'users.id')
            ->select('membresias.*', 'users.name as cliente')
            ->get();

        return view("membresias.lista", compact('membresias'));
    }

    public function store(Request $request){
        if($request->id == 0){
            $membresia = new Membresia();
        }else{
            $membresia = Membresia::find($request->id);
        }
        $membresia->id_usuario = $request->id_usuario;
        $membresia->clases_adquiridas = $request->clases_adquiridas;
        $membresia->clases_disponibles = $request->clases_adquiridas;
        $membresia->clases_ocupadas = 0;

        $membresia->save();

        return redirect()->route('membresias');
    }

    public function edit($id){
        $usuarios = User::all();
        $membresia = Membresia::find($id);

        return view("membresias.nueva", compact('usuarios', 'membresia'));
    }

    public function destroy($id){
        $membresia = Membresia::find($id);
        $membresia->delete();
        return redirect()->to('membresias');
    }
}
