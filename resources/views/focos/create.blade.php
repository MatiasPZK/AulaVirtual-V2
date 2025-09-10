@extends('layouts.app')

@section('title', 'Agregar Foco')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Agregar Foco</h2>

    <form action="{{ route('focos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Número de Serie</label>
            <input type="text" name="numero_serie" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tipo</label>
            <input type="text" name="tipo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Aula</label>
            <select name="aula_id" class="form-select" required>
                <option value="">Seleccione un aula</option>
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Luminosidad</label>
            <input type="range" name="luminosidad" class="form-range" min="0" max="100" value="50">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('focos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
