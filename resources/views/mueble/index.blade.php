@extends('layouts.app')

@section('title', 'Lista de Muebles')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Muebles</h1>
        <a href="{{ route('muebles.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Agregar Mueble
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
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($muebles as $mueble)
                <tr>
                    <td>{{ $mueble->nombre }}</td>
                    <td>{{ $mueble->tipo }}</td>
                    <td>
                        <span class="badge bg-{{ $mueble->estado == 'disponible' ? 'success' : 'warning' }}">
                            {{ $mueble->estado }}
                        </span>
                    </td>
                    <td>{{ $mueble->ubicacion ?? 'No especificada' }}</td>
                    <td>
                        <form action="{{ route('muebles.destroy', $mueble->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="return confirm('¿Eliminar este mueble?')">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No hay muebles registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection