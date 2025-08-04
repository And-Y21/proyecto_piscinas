@extends('adminlte::page')

@section('title', 'Asistencias')

@section('content_header')
    <h1>Asistencias</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Lista de Asistencias</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Clase</th>
                            <th>Cliente</th>
                            <th>Profesor</th>
                            <th>Membresía</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asistencias as $asistencia)
                        <tr>
                            <td>{{ $asistencia->id }}</td>
                            <td>{{ $asistencia->clase->id ?? 'Clase no disponible' }}</td>
                            <td>{{ $asistencia->usuario->name ?? 'Cliente no disponible' }}</td>
                            <td>{{ $asistencia->profesor->name ?? 'Profesor no disponible' }}</td>
                            <td>{{ $asistencia->id_membresia ?? 'N/A' }}</td>
                            <td class="d-flex">
                                <a href="{{ route('asistencia.editar', $asistencia->id) }}" class="btn btn-warning btn-sm mr-1">Editar</a>
                                <form action="{{ route('asistencia.eliminar', $asistencia->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta asistencia?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop