@extends('layouts.app')

@section('title', 'Listado de Objetos')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Objetos</h2>
        <a href="{{ route('objetos.create') }}" class="btn btn-success btn-lg">
            <i class="bi bi-plus-circle"></i> Crear Objeto
        </a>
    </div>

    <div class="row">
        @forelse ($objetos as $objeto)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"><i class="bi bi-box-seam"></i> {{ $objeto->nombre }}</h5>
                    </div>
                    <div class="card-body">
                        <p><i class="bi bi-tag"></i> <strong>Tipo:</strong> {{ $objeto->tipo ?? 'No definido' }}</p>
                        <p><i class="bi bi-door-closed"></i> <strong>Aula:</strong> {{ $objeto->aula->nombre ?? 'No asignada' }}</p>
                    </div>
                    <div class="card-footer text-end bg-light">
                        <a href="{{ route('objetos.edit', $objeto->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Editar
                        </a>
                        <form action="{{ route('objetos.destroy', $objeto->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('¿Seguro que quieres eliminar este objeto?')">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No hay objetos creados todavía.
                </div>
            </div>
        @endforelse
    </div>
</div>

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection
