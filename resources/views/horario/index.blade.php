@extends('layouts.app')

@section('title', 'Lista de Horarios')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Horarios</h1>
        <a href="{{ route('horarios.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo Horario
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Día</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Actividad</th>
                    <th>Responsable</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($horarios as $horario)
                <tr>
                    <td>{{ ucfirst($horario->dia_semana) }}</td>
                    <td>{{ \Carbon\Carbon::parse($horario->hora_inicio)->format('h:i A') }}</td>
                    <td>{{ \Carbon\Carbon::parse($horario->hora_fin)->format('h:i A') }}</td>
                    <td>{{ $horario->actividad }}</td>
                    <td>{{ $horario->responsable ?? 'No asignado' }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST" class="ms-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('¿Eliminar este horario?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No hay horarios registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection