@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Reserva</h1>
    <form action="{{ route('reserva.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Docente</label>
            <input type="text" name="docente" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Materia</label>
            <input type="text" name="materia" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Hora</label>
            <input type="time" name="hora" class="form-control" required>
        </div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
