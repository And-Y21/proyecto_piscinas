@extends('adminlte::page')

@section('title', 'Nueva Membresia')

@section('content_header')
    <h1>Nueva membresia</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10  offset-md-1">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Crear nueva membresia</h3>
                </div>
                <form action="{{route('membresia.guardar')}}" method="POST">
                    <input type="hidden" name="id" value="{{$membresia->id}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <select class="form-control" name="id_usuario" id="id_usuario">
                                @foreach ($usuarios as $usuario)
                                    <option value="{{$usuario->id}}"
                                        {{$membresia->id_usuario == $usuario->id ? 'selected' : ""}}
                                        >{{$usuario->name}}</option>
                                @endforeach
                            </select>
                            <label for="tipo_membresia">Membresia</label>
                            <select class="form-control" name="id_tipo_membresia" id="id_tipo_membresia">
                                @foreach ($tipos_membresia as $tipo)
                                    <option value="{{$tipo->id}}"
                                        {{$membresia->id_tipo_membresia == $tipo->id ? 'selected' : ""}}
                                        >{{$tipo->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Confirmar</button>
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