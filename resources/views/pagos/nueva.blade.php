@extends('adminlte::page')

@section('title', 'Nuevo Pago')

@section('content_header')
    <h1>Nuevo Pago</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10  offset-md-1">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Crear nuevo pago</h3>
                </div>
                <form action="{{route('pago.guardar')}}" method="POST">
                    <input type="hidden" name="id" value="{{$pago->id}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fecha" value="{{$pago->fecha}}"
                                placeholder="Ingrese la fecha de pago">
                            <label for="usuario">Usuario</label>
                            <select class="form-control" name="id_usuario" id="id_usuario">
                                @foreach ($clientes as $cliente)
                                    <option value="{{$cliente->id}}"
                                        {{$pago->id_usuario == $cliente->id ? 'selected' : ""}}
                                        >{{$cliente->name}}</option>
                                @endforeach
                            </select>
                            <label for="membresia">Membresía</label>
                            <select class="form-control" name="id_membresia" id="id_membresia">
                                @foreach ($membresias as $membresia)
                                    <option value="{{$membresia->id}}"
                                        {{$pago->id_membresia == $membresia->id ? 'selected' : ""}}
                                        >{{$membresia->id}} | {{$membresia->usuario->name}}</option>
                                @endforeach
                            </select>
                            <label for="clase">Clase</label>
                            <select class="form-control" name="id_clase" id="id_clase">
                                @foreach ($clases as $clase)
                                    <option value="{{$clase->id}}"
                                        {{$pago->id_clase == $clase->id ? 'selected' : ""}}
                                        >{{$clase->profesor->name}} | {{$clase->nombre}} | {{$clase->fecha}}</option>
                                @endforeach
                            </select>
                            <label for="monto">Monto</label>
                            <input type="number" class="form-control" name="monto" id="monto" value="{{$pago->monto}}"
                                placeholder="Ingrese el monto del pago">
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