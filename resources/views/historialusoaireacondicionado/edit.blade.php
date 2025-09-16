@extends('layouts.app')

@section('title', 'Editar Historial de Uso de Aire Acondicionado')

@section('content')
<div class="container">
    <h1>Editar Historial de Uso de Aire Acondicionado</h1>

    <form action="{{ route('historialusoaireacondicionado.update', $historialusoaireacondicionado) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">ID Aire</label>
            <input type="number" name="aireacondicionado_id" value="{{ $historialusoaireacondicionado->aireacondicionado_id }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Acción</label>
            <input type="text" name="accion" value="{{ $historialusoaireacondicionado->accion }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" name="fecha" value="{{ $historialusoaireacondicionado->fecha }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
