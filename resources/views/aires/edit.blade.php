@extends('layouts.app')

@section('title', 'Editar Aire Acondicionado')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark text-center">
                    <h3>Editar Aire Acondicionado</h3>
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

                    <form action="{{ route('aires.update', ['aire' => $aire->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-fan"></i> Nombre</label>
                            <input type="text" class="form-control form-control-lg" name="nombre" value="{{ old('nombre', $aire->nombre) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-door-closed"></i> Aula</label>
                            <select name="aula_id" class="form-select form-select-lg" required>
                                <option value="">-- Selecciona un aula --</option>
                                @foreach ($aulas as $aula)
                                    <option value="{{ $aula->id }}" {{ old('aula_id', $aire->aula_id) == $aula->id ? 'selected' : '' }}>
                                        {{ $aula->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-thermometer-half"></i> Temperatura (°C)</label>
                            <input type="number" class="form-control form-control-lg" name="temperatura" value="{{ old('temperatura', $aire->temperatura) }}">
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="automatica" value="1" id="automatica" {{ old('automatica', $aire->automatica) ? 'checked' : '' }}>
                            <label class="form-check-label" for="automatica">Activar modo automático</label>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('aires.index') }}" class="btn btn-secondary btn-lg">
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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection
