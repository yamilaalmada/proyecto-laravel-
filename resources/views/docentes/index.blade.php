@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gestión de Docentes</h3>
                    <a href="{{ route('docentes.create') }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus"></i> Nuevo Docente
                    </a>
                </div>

                <div class="card-body">
                    <!-- DEBUG: Verificar datos -->
                    <div class="alert alert-info">
                        <strong>DEBUG:</strong> 
                        Total de docentes: {{ $docentes->count() }}
                        @if($docentes->count() > 0)
                            | Primer docente: {{ $docentes->first()->nombre }}
                        @endif
                    </div>

                    @if($docentes->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Materia</th>
                                    <th>Hora de Clase</th>
                                    <th>Curso</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($docentes as $docente)
                                    <tr>
                                        <td>{{ $docente->id }}</td>
                                        <td>{{ $docente->nombre }}</td>
                                        <td>{{ $docente->materia }}</td>
                                        <td>{{ $docente->hora_clase }}</td>
                                        <td>{{ $docente->curso }}</td>
                                        <td>
                                            <span class="badge badge-{{ $docente->estado == 'activo' ? 'success' : 'secondary' }}">
                                                {{ ucfirst($docente->estado) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                @if($docente->estado == 'inactivo')
                                                    <form action="{{ route('docentes.iniciar', $docente->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm">
                                                            <i class="fas fa-play"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('docentes.finalizar', $docente->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning btn-sm">
                                                            <i class="fas fa-stop"></i>
                                                        </button>
                                                    </form>
                                                @endif

                                                <a href="{{ route('docentes.edit', $docente->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('docentes.destroy', $docente->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar docente?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-warning">
                        No hay docentes registrados.
                        <a href="{{ route('docentes.create') }}">Crear primer docente</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection