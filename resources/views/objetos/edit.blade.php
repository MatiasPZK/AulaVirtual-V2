@extends('layouts.app')

@section('title', 'Editar Objeto')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark text-center">
                    <h3>Editar Objeto</h3>
                </div>
                <div class="card-body">
                    {{-- Mostrar errores de validación --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Formulario --}}
                    <form action="{{ route('objetos.update', ['objeto' => $objeto->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-box-seam"></i> Nombre</label>
                            <input type="text"
                                   class="form-control form-control-lg"
                                   name="nombre"
                                   value="{{ old('nombre', $objeto->nombre) }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-tag"></i> Tipo</label>
                            <input type="text"
                                   class="form-control form-control-lg"
                                   name="tipo"
                                   value="{{ old('tipo', $objeto->tipo) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-door-closed"></i> Aula</label>
                            <select name="aula_id" class="form-select form-select-lg" required>
                                <option value="">-- Selecciona un aula --</option>
                                @foreach ($aulas as $aula)
                                    <option value="{{ $aula->id }}" 
                                        {{ old('aula_id', $objeto->aula_id) == $aula->id ? 'selected' : '' }}>
                                        {{ $aula->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('objetos.index') }}" class="btn btn-secondary btn-lg">
                                <i class="bi bi-arrow-left"></i> Volver
                            </a>
                            <button type="submit" class="btn btn-warning btn-lg">
                                <i class="bi bi-save"></i> Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection
