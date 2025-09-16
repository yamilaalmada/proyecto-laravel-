@extends('layouts.app')

@section('title', 'Editar Cortina')

@section('content')
<div class="container">
    <h1>Editar Cortina</h1>

    <form action="{{ route('cortina.update', $cortina) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Ubicación</label>
            <input type="text" name="ubicacion" value="{{ $cortina->ubicacion }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="Abierta" {{ $cortina->estado == 'Abierta' ? 'selected' : '' }}>Abierta</option>
                <option value="Cerrada" {{ $cortina->estado == 'Cerrada' ? 'selected' : '' }}>Cerrada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
