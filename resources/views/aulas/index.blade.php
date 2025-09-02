@extends('layouts.app')

@section('title', 'Listado de Aulas')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Listado de Aulas</h2>
                <a href="{{ route('aulas.create') }}" class="btn btn-success btn-lg">
                    <i class="bi bi-plus-circle"></i> Crear Aula
                </a>
            </div>

            <div class="row">
                @forelse ($aulas as $aula)
                    <div class="col-md-6 mb-4">
    <div class="card shadow-sm border-0 h-100">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-door-closed"></i> {{ $aula->nombre }}</h5>
        </div>
        <div class="card-body">
            <p><i class="bi bi-people"></i> <strong>Capacidad:</strong> {{ $aula->capacidad ?? 'No definida' }}</p>
            <p><i class="bi bi-person-badge"></i> <strong>Profesores:</strong> {{ $aula->profesores ?? 'No asignados' }}</p>
        </div>
        <div class="card-footer text-end bg-light">
            <a href="{{ route('aulas.edit', $aula->id) }}" class="btn btn-sm btn-warning">
                <i class="bi bi-pencil-square"></i> Editar
            </a>
        </div>
    </div>
</div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            No hay aulas creadas todavía.
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection
