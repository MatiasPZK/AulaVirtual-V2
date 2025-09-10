@extends('layouts.app')

@section('title', 'Agregar Horario')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4"><i class="bi bi-plus-circle"></i> Agregar Horario</h2>

    <form action="{{ route('horarios.store') }}" method="POST">
        @csrf

        {{-- Profesor --}}
        <div class="mb-3">
            <label for="profesor_id" class="form-label">Profesor</label>
            <select name="profesor_id" id="profesor_id" class="form-select" required>
                <option value="">Selecciona un profesor</option>
                @foreach($profesores as $profesor)
                    <option value="{{ $profesor->id }}">{{ $profesor->nombre }}</option>
                @endforeach
            </select>
        </div>

        {{-- Día --}}
        <div class="mb-3">
            <label for="dia" class="form-label">Día</label>
            <select name="dia" id="dia" class="form-select" required>
                @foreach(['Lunes','Martes','Miércoles','Jueves','Viernes'] as $dia)
                    <option value="{{ $dia }}">{{ $dia }}</option>
                @endforeach
            </select>
        </div>

        {{-- Hora --}}
        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <select name="hora" id="hora" class="form-select" required>
                @foreach(['1° Hora','2° Hora','3° Hora','4° Hora','5° Hora','6° Hora','7° Hora','8° Hora'] as $hora)
                    <option value="{{ $hora }}">{{ $hora }}</option>
                @endforeach
            </select>
        </div>

        {{-- Materia --}}
        <div class="mb-3">
            <label for="materia" class="form-label">Materia</label>
            <input type="text" name="materia" id="materia" class="form-control" placeholder="Opcional">
        </div>

        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar</button>
        <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
