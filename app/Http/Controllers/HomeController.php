<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clase;
use App\Models\Membresia;
use App\Models\Pago;
use App\Models\Asistencia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        Log::channel('info')->info('Usuario accedió al dashboard', [
        'user_id' => $user->id,
        'rol' => $user->rol
        ]);

        $totalProfesores = User::where('rol', 'Instructor')->count();
        $totalClientes = User::where('rol', 'Cliente')->count();

        $totalClases = Clase::count();
        $membresiasActivas = Membresia::where('clases_disponibles', '>', 0)->count();

        $ultimasClases = Clase::with('profesor')->orderBy('fecha', 'desc')->take(5)->get();
        $ultimosPagos = Pago::with(['usuario', 'clase'])->orderBy('fecha', 'desc')->take(5)->get();

        // Obtener las clases del cliente
        $user = Auth::user();
        $clasesCliente = Asistencia::with('clase')
            ->where('id_usuario', $user->id)
            ->get()
            ->pluck('clase');

        // Clases profesor
        $clasesImpartidas = \App\Models\Clase::where('id_profesor', $user->id)->get();

        return view('home', compact(
            'totalProfesores',
            'totalClientes',
            'totalClases',
            'membresiasActivas',
            'ultimasClases',
            'ultimosPagos',
            'clasesCliente',
            'clasesImpartidas'
        ));
    }
}
