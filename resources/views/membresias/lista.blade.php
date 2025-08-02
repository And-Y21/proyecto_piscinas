@extends('adminlte::page')

@section('title', 'Membresias')

@section('content_header')
    <h1>Membresias</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lista de Membresias</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Clases Disponibles</th>
                                <th>Clases Ocupadas</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($membresias as $membresia)
                            <tr>
                                <td>{{$membresia->id}}</td>
                                <td>{{$membresia->cliente}}</td>
                                <td>{{$membresia->clases_disponibles}}</td>
                                <td>{{$membresia->clases_ocupadas}}</td>
                                <td>
                                    <a href="{{route('membresia.editar', $membresia->id)}}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{route('membresia.eliminar', $membresia->id)}}" method="POST">
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