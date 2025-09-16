@extends('layouts.app')

@section('title', 'Agregar Historial de Uso de Aire Acondicionado')

@section('content')
<div class="container">
    <h1>Agregar Historial de Uso de Aire Acondicionado</h1>

    <form action="{{ route('historialusoaireacondicionado.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">ID Aire</label>
            <input type="number" name="aireacondicionado_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Acción</label>
            <input type="text" name="accion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
