@extends('layouts.app')

@section('title', 'Listado de Profesores')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Profesores</h2>
        <a href="{{ route('profesores.create') }}" class="btn btn-success btn-lg">
            <i class="bi bi-plus-circle"></i> Crear Profesor
        </a>
    </div>

    <div class="row">
        @forelse ($profesores as $profesor)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-person"></i> {{ $profesor->nombre }}</h5>
                    </div>
                    <div class="card-body">
                        <p><i class="bi bi-book"></i> <strong>Especialidad:</strong> {{ $profesor->especialidad ?? 'No definida' }}</p>
                        <p><i class="bi bi-door-closed"></i> <strong>Aula:</strong> {{ $profesor->aula ?? 'No asignada' }}</p>
                    </div>
                    <div class="card-footer text-end bg-light">
                        <a href="{{ route('profesores.edit', $profesor->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Editar
                        </a>
                        <form action="{{ route('profesores.destroy', $profesor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este profesor?')">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No hay profesores creados todavía.
                </div>
            </div>
        @endforelse
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection
