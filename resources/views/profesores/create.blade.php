@extends('layouts.app')

@section('title', 'Crear Profesor')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Crear Profesor</h3>
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

                    <form action="{{ route('profesores.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-person"></i> Nombre</label>
                            <input type="text" class="form-control form-control-lg" name="nombre" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-book"></i> Especialidad</label>
                            <input type="text" class="form-control form-control-lg" name="especialidad" placeholder="Ej: Matemática">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-door-closed"></i> Aula asignada</label>
                            <input type="text" class="form-control form-control-lg" name="aula" placeholder="Ej: Aula 101">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Crear Profesor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection
