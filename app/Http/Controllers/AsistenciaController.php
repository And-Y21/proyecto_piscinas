<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\User;
use App\Models\Clase;
use App\Models\Membresia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function index() {
        $user = Auth::user();
        Log::channel('info')->info('Usuario accedió a la sección de asistencias', [
            'user_id' => $user->id,
            'rol' => $user->rol
        ]);

        $clientes = User::where('rol', 'Cliente')->get();
        $profesores = User::where('rol', 'Instructor')->get();
        $clases = Clase::all();
        $membresias = Membresia::with('usuario')->get();

        return view("asistencias.nueva", compact('clientes', 'profesores', 'clases', 'membresias'));
    }

    public function list() {
        $user = Auth::user();
        Log::channel('info')->info('Usuario accedió a la lista de asistencias', [
            'user_id' => $user->id,
            'rol' => $user->rol
        ]);

        $asistencias = Asistencia::with(['usuario', 'profesor', 'clase'])->get();

        return view("asistencias.lista", compact('asistencias'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_clase' => 'required|exists:clases,id',
            'id_usuario' => 'required|exists:users,id',
            'id_profesor' => 'required|exists:users,id',
            'id_membresia' => 'required|exists:membresia,id',
        ]);

        $user = Auth::user();
        Log::channel('info')->info('Usuario guardó una asistencia', [
            'user_id' => $user->id,
            'rol' => $user->rol,
            'asistencia_data' => $request->all()
        ]);

        if($request->id == 0){
            $asistencia = new Asistencia();
        }else{
            $asistencia = Asistencia::find($request->id);
        }
        $asistencia->id_clase = $request->id_clase;
        $asistencia->id_usuario = $request->id_usuario;
        $asistencia->id_profesor = $request->id_profesor;
        $asistencia->id_membresia = $request->id_membresia;

        $asistencia->save();

        $membresia = Membresia::find($asistencia->id_membresia);

        if ($membresia) {
            $membresia->clases_disponibles -= 1;
            $membresia->clases_ocupadas += 1;
            $membresia->save();
        }

        return redirect()->route('asistencias');
    }

    public function edit($id){
        $user = Auth::user();
        Log::channel('info')->info('Usuario accedió a editar una asistencia', [
            'user_id' => $user->id,
            'rol' => $user->rol,
            'asistencia_id' => $id
        ]);

        $clientes = User::where('rol', 'Cliente')->get();
        $profesores = User::where('rol', 'Instructor')->get();
        $asistencia = Asistencia::find($id);
        $clases = Clase::all();
        $membresias = Membresia::with('usuario')->get();

        return view("asistencias.nueva", compact('clientes', 'profesores', 'asistencia', 'clases', 'membresias'));
    }

    public function destroy($id) {
        $user = Auth::user();
        $asistencia = Asistencia::findOrFail($id);

        Log::channel('warning')->warning('Usuario eliminó una asistencia', [
            'user_id' => $user->id,
            'rol' => $user->rol,
            'asistencia_id' => $id
        ]);

        $membresia = Membresia::find($asistencia->id_membresia);

        if ($membresia) {
            $membresia->clases_disponibles += 1;
            $membresia->clases_ocupadas -= 1;
            $membresia->save();
        }

        $asistencia->delete();
        return redirect()->to('asistencias');
    }

    public function obtenerProfesor($id)
    {
        $clase = Clase::find($id);

        if ($clase && $clase->id_profesor) {
            return response()->json([
                'id' => $clase->id_profesor,
                'nombre' => $clase->profesor->name ?? '---'
            ]);
        }

        return response()->json(null, 404);
    }

    public function obtenerMembresias($id)
    {
        $membresias = Membresia::where('id_usuario', $id)->get();

        $resultado = $membresias->map(function ($m) {
            return [
                'id' => $m->id,
                'descripcion' => "ID: {$m->id} | Clases disponibles: {$m->clases_disponibles}"
            ];
        });

        return response()->json($resultado);
    }

}
