@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Mueble</h1>
    <form action="{{ route('mueble.update', $mueble) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $mueble->nombre }}" required>
        </div>
        <div class="mb-3">
            <label>Ubicación</label>
            <input type="text" name="ubicacion" class="form-control" value="{{ $mueble->ubicacion }}" required>
        </div>
        <button class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
