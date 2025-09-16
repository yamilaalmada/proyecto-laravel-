@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Foco</h1>
    <form action="{{ route('foco.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tipo</label>
            <input type="text" name="tipo" class="form-control">
        </div>
        <div class="mb-3">
            <label>Estado</label>
            <input type="text" name="estado" class="form-control">
        </div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
