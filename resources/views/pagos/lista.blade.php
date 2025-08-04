@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')
    <h1>Pagos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Lista de pagos</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Usuario</th>
                                <th>Membresía</th>
                                <th>Clase</th>
                                <th>Monto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pagos as $pago)
                            <tr>
                                <td>{{ $pago->id }}</td>
                                <td>{{ $pago->fecha }}</td>
                                <td>{{ $pago->usuario->name }}</td>
                                <td>{{ $pago->membresia->tipo->nombre ?? 'Sin membresía' }}</td>
                                <td>{{ $pago->clase?->profesor?->name ?? 'Sin clase' }}</td>
                                <td>{{ $pago->monto }}</td>
                                <td>
                                    <a href="{{route('pago.editar', $pago->id)}}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{route('pago.eliminar', $pago->id)}}" method="POST">
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