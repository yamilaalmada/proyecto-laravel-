@extends('layouts.app')

@section('title', 'Editar Historial de Foco')

@section('content')
<div class="container">
    <h1>Editar Historial de Foco</h1>

    <form action="{{ route('historialfoco.update', $historialfoco) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">ID Foco</label>
            <input type="number" name="foco_id" value="{{ $historialfoco->foco_id }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Acción</label>
            <input type="text" name="accion" value="{{ $historialfoco->accion }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" name="fecha" value="{{ $historialfoco->fecha }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
