@extends('adminlte::page')

@section('title', 'Nuevo Usuario')

@section('content_header')
    <h1>Nuevo Usuario</h1>
@stop

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
    <div class="row">
        <div class="col-md-10  offset-md-1">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Crear nuevo Usuario</h3>
                </div>
                <form action="{{route('usuario.guardar')}}" method="POST">
                    <input type="hidden" name="id" value="{{ $usuario->id}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="{{$usuario->name}}"
                                placeholder="Ingrese nombre del nuevo usuario" required>
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo" value="{{$usuario->email}}"
                                placeholder="Ingrese correo del nuevo usuario" required>
                            <label for="contrasena">Contraseña</label>
                            <input type="password" class="form-control" name="contrasena" id="contrasena" value="{{$usuario->email}}"
                                placeholder="Ingrese contraseña del nuevo usuario" required>
                            @error('contrasena')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                                <label for="rol">Rol</label>
                            <select class="form-control" name="rol" id="rol" required>
                            @foreach ($roles as $rol)
                            <option value="{{$rol}}"
                                {{ (isset($usuario) && $usuario->rol == $rol) ? 'selected' : '' }}
                            >
                                {{ ucfirst($rol) }}
                            </option>
                            @endforeach
                            </select>
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