@extends('adminlte::page')

@section('title', 'Nueva Clase')

@section('content_header')
    <h1>Nueva Clase</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10  offset-md-1">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Crear nueva clase</h3>
                </div>
                <form action="{{route('clase.guardar')}}" method="POST">
                    <input type="hidden" name="id" value="{{$clase->id}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fecha" value="{{$clase->fecha}}"
                                placeholder="Ingrese la fecha de clase" required>  
                            <label for="usuario">Instructor</label>
                            <select class="form-control" name="id_usuario" id="id_usuario">
                                @foreach ($usuarios as $usuario)
                                    <option value="{{$usuario->id}}"
                                        {{$clase->id_usuario == $usuario->id ? 'selected' : ""}}
                                        >{{$usuario->name}}</option>
                                @endforeach
                            </select>
                            <label for="tipo">Tipo</label>
                            <input type="text" class="form-control" name="tipo" id="tipo" value="{{$clase->tipo}}"
                                placeholder="Ingrese el tipo de clase" required>
                            <label for="lugares">Lugares</label>
                            <input type="number" class="form-control" name="lugares" id="lugares" value="{{$clase->lugares}}"
                                placeholder="Ingrese la cantidad de lugares" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Crear</button>
                        <a href="" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
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