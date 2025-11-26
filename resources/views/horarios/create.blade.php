@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Nuevo Horario</h1>

    {{-- Mostrar errores de validación --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('horarios.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Profesor</label>
            <select name="profesor_id" class="form-select" required>
                <option value="">Seleccione un profesor</option>
                @foreach($profesores as $profesor)
                    <option value="{{ $profesor->id }}">{{ $profesor->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Aula</label>
            <select name="aula_id" class="form-select" required>
                <option value="">Seleccione un aula</option>
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Hora Inicio</label>
            <input type="time" name="hora_inicio" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Hora Fin</label>
            <input type="time" name="hora_fin" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Materia (opcional)</label>
            <input type="text" name="materia" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">✅ Guardar</button>
        <a href="{{ route('horarios.index') }}" class="btn btn-secondary">🔙 Volver</a>
    </form>
</div>
@endsection
