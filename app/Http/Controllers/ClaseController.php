<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Clase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ClaseController extends Controller
{
    public function index(){
        $user = Auth::user();
        Log::channel('info')->info('Usuario accedió a la sección de clases', [
            'user_id' => $user->id,
            'rol' => $user->rol
        ]);
        $usuarios = User::all();
        $clase = new Clase();

        return view("clases.nueva", compact('usuarios', 'clase'));
    }

    public function list(){
        $user = Auth::user();
        Log::channel('info')->info('Usuario accedió a la lista de clases', [
            'user_id' => $user->id,
            'rol' => $user->rol
        ]);
        $clases = Clase::join('users','clases.id_profesor','=', 'users.id')
            ->select('clases.*', 'users.name as instructor')
            ->get();

        return view("clases.lista", compact('clases'));
    }

    public function store(Request $request){
        $request->validate([
            'fecha' => 'required|date',
            'id_usuario' => 'required|exists:users,id',
            'tipo' => 'required|string',
            'lugares' => 'required|integer',
        ]);

        $user = Auth::user();
        Log::channel('info')->info('Usuario guardó una clase', [
            'user_id' => $user->id,
            'rol' => $user->rol,
            'clase_data' => $request->all()
        ]);

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
        $user = Auth::user();
        Log::channel('info')->info('Usuario accedió a editar una clase', [
            'user_id' => $user->id,
            'rol' => $user->rol,
            'clase_id' => $id
        ]);

        $usuarios = User::all();
        $clase = Clase::find($id);

        return view("clases.nueva", compact('usuarios', 'clase'));
    }

    public function destroy($id){
        $user = Auth::user();
        Log::channel('warning')->warning('Usuario eliminó una clase', [
            'user_id' => $user->id,
            'rol' => $user->rol,
            'clase_id' => $id
        ]);

        $clase = Clase::find($id);
        $clase->delete();
        return redirect()->to('clases');
    }
}
