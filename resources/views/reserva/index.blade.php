@extends('layouts.app')

@section('title', 'Lista de Reservas')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Lista de Reservas</h1>
    <a href="{{ route('reservas.create') }}" class="btn btn-primary">Nueva Reserva</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Docente</th>
            <th>Mueble</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservas as $reserva)
        <tr>
            <td>{{ $reserva->id }}</td>
            <td>{{ $reserva->docente_id }}</td>
            <td>{{ $reserva->mueble_id }}</td>
            <td>{{ $reserva->fecha_reserva }}</td>
            <td>
                <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection