@extends('layouts.app')

@section('title', 'Listado de Aulas')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="animate__animated animate__fadeInLeft"><i class="bi bi-building"></i> Listado de Aulas</h2>
        <a href="{{ route('aulas.create') }}" class="btn btn-primary btn-lg animate__animated animate__fadeInRight">
            <i class="bi bi-plus-circle"></i> Crear Aula
        </a>
    </div>

    <div class="row">
        @forelse ($aulas as $aula)
            <div class="col-md-6 mb-4 animate__animated animate__fadeInUp">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-building"></i> {{ $aula->nombre }}</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Capacidad:</strong> {{ $aula->capacidad ?? 'No definida' }}</p>
                        <p><strong>Profesores:</strong> {{ $aula->profesores ?? 'No asignados' }}</p>
                    </div>
                    <div class="card-footer text-end bg-light">
                        <a href="{{ route('aulas.edit', $aula->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Editar
                        </a>
                        <form action="{{ route('aulas.destroy', $aula->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar esta aula?')">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center animate__animated animate__fadeIn">
                    No hay aulas creadas todavía.
                </div>
            </div>
        @endforelse
    </div>
</div>

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection
