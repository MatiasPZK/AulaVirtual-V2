@extends('layouts.app')

@section('title', 'Crear Aula')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Crear Nueva Aula</h3>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('aulas.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nombre" class="form-label">
                                <i class="bi bi-door-closed"></i> Nombre del Aula
                            </label>
                            <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" placeholder="Ej: Aula 101" required>
                        </div>

                        <div class="mb-3">
                            <label for="capacidad" class="form-label">
                                <i class="bi bi-people"></i> Capacidad
                            </label>
                            <input type="number" class="form-control form-control-lg" id="capacidad" name="capacidad" placeholder="Cantidad de alumnos">
                        </div>

                        <div class="mb-3">
                            <label for="profesor_id" class="form-label">
                                <i class="bi bi-person-badge"></i> Profesor asignado
                            </label>
                            <select class="form-select form-select-lg" id="profesor_id" name="profesor_id" required>
                                <option value="">-- Seleccionar profesor --</option>
                                @foreach ($profesores as $profesor)
                                    <option value="{{ $profesor->id }}">{{ $profesor->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Crear Aula</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection
