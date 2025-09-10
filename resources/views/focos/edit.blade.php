@extends('layouts.app')

@section('title', 'Editar Foco')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Editar Foco</h2>

    <form action="{{ route('focos.update', $foco->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Número de Serie</label>
            <input type="text" name="numero_serie" class="form-control" value="{{ old('numero_serie', $foco->numero_serie) }}" required>
        </div>

        <div class="mb-3">
            <label>Tipo</label>
            <input type="text" name="tipo" class="form-control" value="{{ old('tipo', $foco->tipo) }}" required>
        </div>

        <div class="mb-3">
            <label>Aula</label>
            <select name="aula_id" class="form-select" required>
                <option value="">Seleccione un aula</option>
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}" {{ $foco->aula_id == $aula->id ? 'selected' : '' }}>
                        {{ $aula->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Luminosidad</label>
            <input type="range" name="luminosidad" class="form-range" min="0" max="100" value="{{ old('luminosidad', $foco->luminosidad) }}">
            <span id="luminosidadValue">{{ old('luminosidad', $foco->luminosidad) }}%</span>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('focos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

{{-- Script para mostrar el valor de la luminosidad en tiempo real --}}
<script>
    const range = document.querySelector('input[name="luminosidad"]');
    const display = document.getElementById('luminosidadValue');
    range.addEventListener('input', () => {
        display.textContent = range.value + '%';
    });
</script>
@endsection
