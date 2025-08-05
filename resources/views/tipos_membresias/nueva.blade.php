@extends('adminlte::page')

@section('title', 'Nueva Membresía')

@section('content_header')
    <h1>Nueva Membresía</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10  offset-md-1">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Crear nueva Membresía</h3>
                </div>
                <form action="{{route('tipo_membresia.guardar')}}" method="POST">
                    <input type="hidden" name="id" value="{{ $tipoMembresia->id}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="{{$tipoMembresia->nombre}}"
                                placeholder="Ingrese nombre de la nueva membresía" required>
                            <label for="precio">Precio</label>
                            <input type="number" class="form-control" name="precio" id="precio" value="{{$tipoMembresia->precio}}"
                                placeholder="Ingrese precio de la nueva membresía" required>
                            <label for="clases_adquiridas">Clases adquiridas</label>
                            <input type="number" class="form-control" name="clases_adquiridas" id="clases_adquiridas" value="{{$tipoMembresia->clases_adquiridas}}"
                                placeholder="Ingrese clases adquiridas de la nueva membresía" required>
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