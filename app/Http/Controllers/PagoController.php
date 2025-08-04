<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Pago;
use App\Models\User;
use App\Models\Membresia;
use App\Models\Clase;

class PagoController extends Controller
{
    public function index(){
        Log::channel('info')->info('Usuario accedió a la sección de Pagos', [
            'user_id' => Auth::id(),
            'rol' => Auth::user()->rol
        ]);

        $pago = new Pago();
        $clientes = User::where('rol', 'Cliente')->get();
        $clases = Clase::all();
        $membresias = Membresia::all();

        return view("pagos.nueva", compact('pago', 'clientes', 'membresias', 'clases'));
    }

    public function list(){
        Log::channel('info')->info('Usuario accedió a la lista de pagos', [
            'user_id' => Auth::id(),
            'rol' => Auth::user()->rol
        ]);

        $pagos = Pago::all();

        return view("pagos.lista", compact('pagos'));
    }

    public function store(Request $request)
    {
        Log::channel('info')->info('Usuario guardó un pago', [
            'user_id' => Auth::id(),
            'rol' => Auth::user()->rol,
        ]);

        if ($request->id == null) {
            $pago = new Pago();
        } else {
            $pago = Pago::find($request->id);
        }

        $pago->id_usuario = $request->id_usuario;
        $pago->id_membresia = $request->id_membresia;
        $pago->id_clase = $request->id_clase;
        $pago->monto = $request->monto;
        $pago->fecha = $request->fecha;

        $pago->save();
        return redirect()->route('pagos');
    }

    public function edit($id){
        Log::channel('info')->info('Usuario accedió a la edición de un pago', [
            'user_id' => Auth::id(),
            'rol' => Auth::user()->rol,
            'pago_id' => $id
        ]);
        $pago = Pago::find($id);
        $clientes = User::where('rol', 'Cliente')->get();
        $membresias = Membresia::all();
        $clases = Clase::all();

        return view("pagos.nueva", compact('pago', 'clientes', 'membresias', 'clases'));
    }

    public function destroy($id){
        $user = Auth::user();
        Log::channel('warning')->warning('Usuario eliminó un pago', [
            'user_id' => $user->id,
            'rol' => $user->rol,
            'pago_id' => $id
        ]);

        $pago = Pago::find($id);
        $pago->delete();
        return redirect()->to('pagos');
    }
}
