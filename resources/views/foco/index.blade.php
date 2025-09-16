@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Focos</h1>
    <a href="{{ route('foco.create') }}" class="btn btn-primary mb-3">Agregar</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($focos as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->tipo }}</td>
                    <td>{{ $item->estado }}</td>
                    <td>
                        <a href="{{ route('foco.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('foco.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
