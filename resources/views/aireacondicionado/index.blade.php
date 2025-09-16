@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Aireacondicionados</h1>
    <a href="{{ route('aireacondicionado.create') }}" class="btn btn-primary mb-3">Agregar</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aireacondicionados as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->marca }}</td>
                    <td>{{ $item->modelo }}</td>
                    <td>
                        <a href="{{ route('aireacondicionado.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('aireacondicionado.destroy', $item) }}" method="POST" class="d-inline">
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
