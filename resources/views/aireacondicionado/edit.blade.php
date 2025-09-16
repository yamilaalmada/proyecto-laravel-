@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Aireacondicionado</h1>
    <form action="{{ route('aireacondicionado.update', $aireacondicionado) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Marca</label>
            <input type="text" name="marca" value="{{ $aireacondicionado->marca }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Modelo</label>
            <input type="text" name="modelo" value="{{ $aireacondicionado->modelo }}" class="form-control">
        </div>
        <button class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
