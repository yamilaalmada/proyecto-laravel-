@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Aireacondicionado</h1>
    <form action="{{ route('aireacondicionado.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Marca</label>
            <input type="text" name="marca" class="form-control">
        </div>
        <div class="mb-3">
            <label>Modelo</label>
            <input type="text" name="modelo" class="form-control">
        </div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
