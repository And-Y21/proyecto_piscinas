<?php

namespace App\Http\Controllers;
use App\Models\TipoMembresia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class TipoMembresiaController extends Controller
{
    public function index(){
        Log::channel('info')->info('Usuario accedió a la sección de tipos de membresía', [
            'user_id' => Auth::id(),
            'rol' => Auth::user()->rol
        ]);

        $tipoMembresia = new TipoMembresia();

        return view("tipos_membresias.nueva", compact('tipoMembresia'));
    }

    public function create(){
        Log::channel('info')->info('Usuario accedió a la creación de un nuevo tipo de membresía', [
            'user_id' => Auth::id(),
            'rol' => Auth::user()->rol
        ]);

        return view("tipos_membresias.nueva", compact('tipoMembresia'));
    }

    public function list(){
        Log::channel('info')->info('Usuario accedió a la lista de tipos de membresía', [
            'user_id' => Auth::id(),
            'rol' => Auth::user()->rol
        ]);

        $tiposMembresia = TipoMembresia::all();

        return view("tipos_membresias.lista", compact('tiposMembresia'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'precio' => 'required|numeric',
            'clases_adquiridas' => 'required|integer',
        ]);

        Log::channel('info')->info('Usuario guardó un tipo de membresía', [
            'user_id' => Auth::id(),
            'rol' => Auth::user()->rol,
        ]);

        if ($request->id == null) {
            $tipoMembresia = new TipoMembresia();
        } else {
            $tipoMembresia = TipoMembresia::find($request->id);
            if (!$tipoMembresia) {
                return redirect()->back()->withErrors('Tipo de membresía no encontrado.');
            }
        }

        $tipoMembresia->nombre = $request->nombre;
        $tipoMembresia->precio = $request->precio;
        $tipoMembresia->clases_adquiridas = $request->clases_adquiridas ;

        $tipoMembresia->save();
        return redirect()->route('tipos_membresias');
    }

    public function edit($id){
        Log::channel('info')->info('Usuario accedió a la edición de un tipo de membresía', [
            'user_id' => Auth::id(),
            'rol' => Auth::user()->rol,
            'tipo_membresia_id' => $id
        ]);
        $tipoMembresia = TipoMembresia::find($id);
        $roles = ['Cliente','Instructor','Admin'];

        return view("tipos_membresias.nueva", compact('tipoMembresia', 'roles'));
    }

    public function destroy($id){
        Log::channel('warning')->warning('Usuario eliminó un tipo de membresía', [
            'user_id' => Auth::id(),
            'rol' => Auth::user()->rol,
            'tipo_membresia_id' => $id
        ]);

        $tipoMembresia = TipoMembresia::find($id);
        $tipoMembresia->delete();
        return redirect()->to('tipos_membresias');
    }
}
