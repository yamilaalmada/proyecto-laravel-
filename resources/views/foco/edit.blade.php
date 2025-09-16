@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Foco</h1>
    <form action="{{ route('foco.update', $foco) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Tipo</label>
            <input type="text" name="tipo" value="{{ $foco->tipo }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Estado</label>
            <input type="text" name="estado" value="{{ $foco->estado }}" class="form-control">
        </div>
        <button class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
