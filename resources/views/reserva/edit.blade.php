@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Reserva</h1>
    <form action="{{ route('reserva.update', $reserva) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Docente</label>
            <input type="text" name="docente" class="form-control" value="{{ $reserva->docente }}" required>
        </div>
        <div class="mb-3">
            <label>Materia</label>
            <input type="text" name="materia" class="form-control" value="{{ $reserva->materia }}" required>
        </div>
        <div class="mb-3">
            <label>Fecha</label>
            <input type="date" name="fecha" class="form-control" value="{{ $reserva->fecha }}" required>
        </div>
        <div class="mb-3">
            <label>Hora</label>
            <input type="time" name="hora" class="form-control" value="{{ $reserva->hora }}" required>
        </div>
        <button class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
