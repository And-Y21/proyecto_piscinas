@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    @can ('admin')
        <h1>Panel de Administración</h1>
        <!-- Total de Usuarios -->
        <div class="row">
        <!-- Profesores -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $totalProfesores }}</h3>
                    <p>Profesores Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
            </div>
        </div>

        <!-- Clientes -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $totalClientes }}</h3>
                    <p>Clientes Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-friends"></i>
                </div>
            </div>
        </div>


        <!-- Clases Programadas -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalClases }}</h3>
                    <p>Clases Programadas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
            </div>
        </div>

        <!-- Membresías Activas -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $membresiasActivas }}</h3>
                    <p>Membresías Activas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-id-card"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Últimas Clases -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Últimas Clases</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Profesor</th>
                        <th>Tipo</th>
                        <th>Lugares</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ultimasClases as $clase)
                        <tr>
                            <td>{{ $clase->fecha }}</td>
                            <td>{{ $clase->profesor->name }}</td>
                            <td>{{ $clase->tipo }}</td>
                            <td>{{ $clase->lugares_ocupados }}/{{ $clase->lugares }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Últimos Pagos -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Últimos Pagos</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Clase</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ultimosPagos as $pago)
                        <tr>
                            <td>{{ $pago->usuario->name }}</td>
                            <td>${{ number_format($pago->monto, 2) }}</td>
                            <td>{{ $pago->fecha }}</td>
                            <td>{{ optional($pago->clase)->tipo ?? '---' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endcan

    @can ('cliente')
        <h1>¡Bienvenido!</h1>
        <p>Aquí puedes ver tus clases programadas</p>
        @if($clasesCliente->isEmpty())
            <div class="alert alert-info">No tienes clases asignadas aún.</div>
        @else
            <div class="row">
                @foreach($clasesCliente as $claseCliente)
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $claseCliente->tipo }}</h5>
                                <p class="card-text">
                                    <strong>Fecha:</strong> {{ \Carbon\Carbon::parse($clase->fecha)->format('d/m/Y') }}<br>
                                    <strong>Lugares:</strong> {{ $claseCliente->lugares }}<br>
                                    <strong>Disponibles:</strong> {{ $claseCliente->lugares_disponibles }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endcan

    @can ('instructor')
        <h1>Clases Asignadas</h1>
        @if($clasesImpartidas->isEmpty())
            <div class="alert alert-info">Aún no tienes clases asignadas como profesor.</div>
        @else
            <div class="row">
                @foreach($clasesImpartidas as $clase)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-primary shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $clase->tipo }}</h5>
                                <p class="card-text">
                                    <strong>Fecha:</strong> {{ \Carbon\Carbon::parse($clase->fecha)->format('d/m/Y') }}<br>
                                    <strong>Lugares totales:</strong> {{ $clase->lugares }}<br>
                                    <strong>Ocupados:</strong> {{ $clase->lugares_ocupados }}<br>
                                    <strong>Disponibles:</strong> {{ $clase->lugares_disponibles }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endcan
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log("Dashboard cargado"); </script>
@stop
