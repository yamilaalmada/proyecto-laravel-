@extends('layouts.app')

@section('title', 'Cortinas')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Cortinas</h1>
    <a href="{{ route('cortina.create') }}" class="btn btn-primary mb-3">Agregar Cortina</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cortinas as $cortina)
                <tr>
                    <td>{{ $cortina->id }}</td>
                    <td>{{ $cortina->ubicacion }}</td>
                    <td>{{ $cortina->estado }}</td>
                    <td>
                        <a href="{{ route('cortina.edit', $cortina) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('cortina.destroy', $cortina) }}" method="POST" style="display:inline;">
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
