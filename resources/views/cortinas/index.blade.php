@extends('layouts.app')

@section('title', 'Listado de Cortinas')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Cortinas</h2>
        <a href="{{ route('cortinas.create') }}" class="btn btn-success btn-lg">
            <i class="bi bi-plus-circle"></i> Crear Cortina
        </a>
    </div>

    <div class="row">
        @forelse ($cortinas as $cortina)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-window"></i> {{ $cortina->nombre }}</h5>
                    </div>
                    <div class="card-body">
                        <p><i class="bi bi-door-closed"></i> <strong>Aula:</strong> {{ $cortina->aula->nombre }}</p>
                        <p><i class="bi bi-clock"></i> <strong>Horario:</strong> {{ $cortina->hora_apertura ?? '—' }} - {{ $cortina->hora_cierre ?? '—' }}</p>
                        <p><i class="bi bi-calendar-event"></i> <strong>Días:</strong> {{ $cortina->dias ? implode(', ', $cortina->dias) : 'No configurados' }}</p>
                        <p><i class="bi bi-lightbulb"></i> <strong>Estado:</strong> {{ $cortina->estado ? 'Abierta' : 'Cerrada' }}</p>
                        <p><i class="bi bi-gear"></i> <strong>Automática:</strong> {{ $cortina->automatica ? 'Sí' : 'No' }}</p>
                    </div>
                    <div class="card-footer text-end bg-light">
                        <a href="{{ route('cortinas.edit', $cortina->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Editar
                        </a>
                        <form action="{{ route('cortinas.destroy', $cortina->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que quieres eliminar esta cortina?')">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No hay cortinas creadas todavía.
                </div>
            </div>
        @endforelse
    </div>
</div>

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection
