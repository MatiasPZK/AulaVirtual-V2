@extends('layouts.app')

@section('title', 'Editar Aula')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark text-center">
                    <h3>Editar Aula</h3>
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

                    <form action="{{ route('aulas.update', $aula->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nombre" class="form-label"><i class="bi bi-door-closed"></i> Nombre del Aula</label>
                            <input type="text" class="form-control form-control-lg" id="nombre" name="nombre"
                                   value="{{ $aula->nombre }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="capacidad" class="form-label"><i class="bi bi-people"></i> Capacidad</label>
                            <input type="number" class="form-control form-control-lg" id="capacidad" name="capacidad"
                                   value="{{ $aula->capacidad }}">
                        </div>

                        <div class="mb-3">
                            <label for="profesores" class="form-label"><i class="bi bi-person-badge"></i> Profesores</label>
                            <input type="text" class="form-control form-control-lg" id="profesores" name="profesores"
                                   value="{{ $aula->profesores }}">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning btn-lg">Actualizar Aula</button>
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
