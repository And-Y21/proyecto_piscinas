<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Clase;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    public function index(){
        $usuarios = User::all();
        $clase = new Clase();

        return view("clases.nueva", compact('usuarios', 'clase'));
    }

    public function list(){
        $clases = Clase::join('users','clases.id_profesor','=', 'users.id')
            ->select('clases.*', 'users.name as instructor')
            ->get();

        return view("clases.lista", compact('clases'));
    }

    public function store(Request $request){
        if($request->id == 0){
            $clase = new Clase();
        }else{
            $clase = Clase::find($request->id);
        }
        $clase->fecha = $request->fecha;
        $clase->id_profesor = $request->id_usuario;
        $clase->tipo = $request->tipo;
        $clase->lugares = $request->lugares;
        $clase->lugares_disponibles = $request->lugares;
        $clase->lugares_ocupados = 0;

        $clase->save();

        return redirect()->route('clases');
    }

    public function edit($id){
        $usuarios = User::all();
        $clase = Clase::find($id);

        return view("clases.nueva", compact('usuarios', 'clase'));
    }

    public function destroy($id){
        $clase = Clase::find($id);
        $clase->delete();
        return redirect()->to('clases');
    }
}
