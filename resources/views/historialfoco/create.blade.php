@extends('layouts.app')

@section('title', 'Agregar Historial de Foco')

@section('content')
<div class="container">
    <h1>Agregar Historial de Foco</h1>

    <form action="{{ route('historialfoco.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">ID Foco</label>
            <input type="number" name="foco_id" class="form-control" required>
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
