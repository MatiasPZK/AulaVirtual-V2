@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Horarios</h1>

    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Botón para crear nuevo horario --}}
    <div class="mb-3">
        <a href="{{ route('horarios.create') }}" class="btn btn-primary">➕ Nuevo Horario</a>
    </div>

    {{-- Tabla de horarios --}}
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Aula</th>
                <th>Profesor</th>
                <th>Fecha</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Materia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($horarios as $horario)
                <tr>
                    <td>{{ $horario->aula->nombre ?? 'Sin aula' }}</td>
                    <td>{{ $horario->profesor->nombre ?? 'Sin profesor' }}</td>
                    <td>{{ \Carbon\Carbon::parse($horario->fecha)->format('d/m/Y') }}</td>
                    <td>{{ $horario->hora_inicio }}</td>
                    <td>{{ $horario->hora_fin }}</td>
                    <td>{{ $horario->materia ?? '-' }}</td>
                    <td>
                        <a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-sm btn-warning">✏️ Editar</a>

                        <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este horario?')">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay horarios registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
