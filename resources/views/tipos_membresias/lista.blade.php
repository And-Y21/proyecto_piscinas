@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Membresias</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lista de Usuarios</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Clases Adquiridas</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tiposMembresia as $tipoMembresia)
                            <tr>
                                <td>{{$tipoMembresia->id}}</td>
                                <td>{{$tipoMembresia->nombre}}</td>
                                <td>{{$tipoMembresia->precio}}</td>
                                <td>{{$tipoMembresia->clases_adquiridas}}</td>
                                <td>
                                    <a href="{{route('tipo_membresia.editar', $tipoMembresia->id)}}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{route('tipo_membresia.eliminar', $tipoMembresia->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop