<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Membresia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MembresiaController extends Controller
{
    public function index(){
        $user = Auth::user();
        Log::channel('info')->info('Usuario accedió a la sección de membresías', [
            'user_id' => $user->id,
            'rol' => $user->rol
        ]);

        $usuarios = User::all();
        $membresia = new Membresia();

        return view("membresias.nueva", compact('usuarios', 'membresia'));
    }

    public function list(){
        $user = Auth::user();
        Log::channel('info')->info('Usuario accedió a la lista de membresías', [
            'user_id' => $user->id,
            'rol' => $user->rol
        ]);

        $membresias = Membresia::join('users','membresias.id_usuario','=', 'users.id')
            ->select('membresias.*', 'users.name as cliente')
            ->get();

        return view("membresias.lista", compact('membresias'));
    }

    public function store(Request $request){
        $user = Auth::user();
        Log::channel('info')->info('Usuario guardó una membresía', [
            'user_id' => $user->id,
            'rol' => $user->rol
        ]);

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
        $user = Auth::user();
        Log::channel('info')->info('Usuario accedió a la edición de una membresía', [
            'user_id' => $user->id,
            'rol' => $user->rol
        ]);

        $usuarios = User::all();
        $membresia = Membresia::find($id);

        return view("membresias.nueva", compact('usuarios', 'membresia'));
    }

    public function destroy($id){
        $user = Auth::user();
        Log::channel('warning')->warning('Usuario eliminó una membresía', [
            'user_id' => $user->id,
            'rol' => $user->rol,
            'membresia_id' => $id
        ]);
        $membresia = Membresia::find($id);
        $membresia->delete();
        return redirect()->to('membresias');
    }
}
