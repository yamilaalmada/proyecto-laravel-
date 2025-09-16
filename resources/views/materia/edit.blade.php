@extends('layouts.app')

@section('title', 'Editar Materia')

@section('content')
<div class="container">
    <h1>Editar Materia</h1>
    
    <form action="{{ route('materias.update', $materia->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Materia</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $materia->nombre }}" required>
        </div>
        
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $materia->descripcion }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar Materia</button>
        <a href="{{ route('materias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection