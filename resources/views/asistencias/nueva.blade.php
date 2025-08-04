@extends('adminlte::page')

@section('title', 'Nueva Asistencia')

@section('content_header')
    <h1>Registrar asistencia</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Nueva Asistencia</h3>
            </div>
            <form action="{{ route('asistencia.guardar') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_clase">Clase</label>
                        <select name="id_clase" id="id_clase" class="form-control" required>
                            <option value="" disabled selected>Seleccione una clase</option>
                            @foreach ($clases as $clase)
                                <option value="{{ $clase->id }}">{{ $clase->id }} | {{ $clase->fecha }} | {{$clase->profesor->name ?? '---'}} | {{$clase->tipo ?? '---'}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_usuario">Cliente</label>
                        <select name="id_usuario" id="id_usuario" class="form-control" required>
                            <option value="" disabled selected>Seleccione un cliente</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_profesor">Profesor</label>
                        <select name="id_profesor" id="id_profesor" class="form-control" required>
                            <option value="" disabled selected>Seleccione un profesor</option>
                            @foreach ($profesores as $profesor)
                                <option value="{{ $profesor->id }}">{{ $profesor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_membresia">Membresía</label>
                        <select name="id_membresia" id="id_membresia" class="form-control" required>
                            <option value="" disabled selected>Seleccione una membresía</option>
                            @foreach ($membresias as $membresia)
                                <option value="{{ $membresia->id }}">
                                    {{ 'ID: '.$membresia->id . ' | Usuario: ' . $membresia->usuario->name ?? '---' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <a href="{{ route('asistencias') }}" class="btn btn-secondary">Cancelar</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#id_clase').change(function() {
        let claseId = $(this).val();

        if (claseId) {
            $.get('/clase/' + claseId + '/profesor', function(data) {
                $('#id_profesor').val(data.id);
            });
        }
    });

    $('#id_usuario').change(function() {
        let usuarioId = $(this).val();

        if (usuarioId) {
            $.get('/usuario/' + usuarioId + '/membresias', function(data) {
                let select = $('#id_membresia');
                select.empty();
                select.append('<option value="" disabled selected>Seleccione una membresía</option>');

                if (data.length === 0) {
                    select.append('<option value="">Sin membresías</option>');
                } else {
                    data.forEach(function(m) {
                        select.append('<option value="' + m.id + '">' + m.descripcion + '</option>');
                    });
                }
            });
        }
    });
});
</script>
@stop
