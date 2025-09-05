@extends('layouts.app')

@section('title', 'Listado de Aires Acondicionados')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Aires Acondicionados</h2>
        <a href="{{ route('aires.create') }}" class="btn btn-success btn-lg">
            <i class="bi bi-plus-circle"></i> Crear Aire
        </a>
    </div>

    <div class="row">
        @forelse ($aires as $aire)
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"><i class="bi bi-fan"></i> {{ $aire->nombre }}</h5>
                    </div>
                    <div class="card-body">
                        <p><i class="bi bi-door-closed"></i> <strong>Aula:</strong> {{ $aire->aula->nombre }}</p>
                        <p><i class="bi bi-thermometer-half"></i> <strong>Temperatura:</strong> {{ $aire->temperatura ?? 'No definida' }}°C</p>
                        <p><i class="bi bi-lightning-charge"></i> <strong>Automático:</strong> {{ $aire->automatica ? 'Sí' : 'No' }}</p>
                    </div>
                    <div class="card-footer text-end bg-light">
                        <a href="{{ route('aires.edit', $aire->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Editar
                        </a>
                        <form action="{{ route('aires.destroy', $aire->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este aire?')">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No hay aires acondicionados creados todavía.
                </div>
            </div>
        @endforelse
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection
