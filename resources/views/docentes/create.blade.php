@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear Nuevo Docente</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('docentes.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="nombre">Nombre completo *</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="materia">Materia *</label>
                            <input type="text" class="form-control @error('materia') is-invalid @enderror" 
                                id="materia" name="materia" value="{{ old('materia') }}" required>
                            @error('materia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="hora_clase">Hora de clase *</label>
                            <input type="time" class="form-control @error('hora_clase') is-invalid @enderror" 
                                id="hora_clase" name="hora_clase" value="{{ old('hora_clase') }}" required>
                            @error('hora_clase')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="curso">Curso *</label>
                            <input type="text" class="form-control @error('curso') is-invalid @enderror" 
                                id="curso" name="curso" value="{{ old('curso') }}" required>
                            @error('curso')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado *</label>
                            <select class="form-control @error('estado') is-invalid @enderror" 
                                id="estado" name="estado" required>
                                <option value="">Seleccionar estado</option>
                                <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                                <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            @error('estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Guardar Docente
                            </button>
                            <a href="{{ route('docentes.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection