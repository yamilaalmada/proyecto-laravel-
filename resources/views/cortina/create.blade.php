@extends('layouts.app')

@section('title', 'Agregar Cortina')

@section('content')
<div class="container">
    <h1>Agregar Cortina</h1>

    <form action="{{ route('cortina.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Ubicación</label>
            <input type="text" name="ubicacion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="Abierta">Abierta</option>
                <option value="Cerrada">Cerrada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
