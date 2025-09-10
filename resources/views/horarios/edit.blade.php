@extends('layouts.app')

@section('title', 'Editar Horario')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4"><i class="bi bi-pencil-square"></i> Editar Horario</h2>

    <form action="{{ route('horarios.update', $horario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="profesor_id" class="form-label">Profesor</label>
            <select name="profesor_id" id="profesor_id" class="form-select">
                @foreach($profesores as $profesor)
                    <option value="{{ $profesor->id }}" {{ $horario->profesor_id == $profesor->id ? 'selected' : '' }}>
                        {{ $profesor->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="dia" class="form-label">Día</label>
            <select name="dia" id="dia" class="form-select">
                @foreach(['Lunes','Martes','Miércoles','Jueves','Viernes'] as $d)
                    <option value="{{ $d }}" {{ $horario->dia == $d ? 'selected' : '' }}>{{ $d }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <select name="hora" id="hora" class="form-select">
                @foreach(['1° Hora','2° Hora','3° Hora','4° Hora','5° Hora','6° Hora','7° Hora','8° Hora'] as $h)
                    <option value="{{ $h }}" {{ $horario->hora == $h ? 'selected' : '' }}>{{ $h }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="materia" class="form-label">Materia</label>
            <input type="text" name="materia" id="materia" class="form-control" value="{{ $horario->materia }}">
        </div>

        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Guardar Cambios</button>
        <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
