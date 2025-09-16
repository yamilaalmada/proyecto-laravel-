@extends('layouts.app')

@section('title', 'Historial de Focos')

@section('content')
<div class="container">
    <h1 class="mb-4">Historial de Focos</h1>
    <a href="{{ route('historialfoco.create') }}" class="btn btn-primary mb-3">Agregar Registro</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Foco</th>
                <th>Acción</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historiales as $historial)
                <tr>
                    <td>{{ $historial->id }}</td>
                    <td>{{ $historial->foco_id }}</td>
                    <td>{{ $historial->accion }}</td>
                    <td>{{ $historial->fecha }}</td>
                    <td>
                        <a href="{{ route('historialfoco.edit', $historial) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('historialfoco.destroy', $historial) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
