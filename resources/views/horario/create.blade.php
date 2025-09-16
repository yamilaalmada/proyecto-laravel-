@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Horario</h1>
    <form action="{{ route('horario.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Día</label>
            <input type="text" name="dia" class="form-control">
        </div>
        <div class="mb-3">
            <label>Hora inicio</label>
            <input type="time" name="hora_inicio" class="form-control">
        </div>
        <div class="mb-3">
            <label>Hora fin</label>
            <input type="time" name="hora_fin" class="form-control">
        </div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
