@extends('adminlte::page')

@section('title', 'Clases')

@section('content_header')
    <h1>Clases</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lista de clases</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Profesor Asignado</th>
                                <th>Tipo</th>
                                <th>Lugares</th>
                                <th>Lugares Ocupados</th>
                                <th>Lugares Disponibles</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clases as $clase)
                            <tr>
                                <td>{{$clase->id}}</td>
                                <td>{{$clase->fecha}}</td>
                                <td>{{$clase->instructor}}</td>
                                <td>{{$clase->tipo}}</td>
                                <td>{{$clase->lugares}}</td>
                                <td>{{$clase->lugares_ocupados}}</td>
                                <td>{{$clase->lugares_disponibles}}</td>
                                <td>
                                    <a href="{{route('clase.editar', $clase->id)}}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{route('clase.eliminar', $clase->id)}}" method="POST">
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