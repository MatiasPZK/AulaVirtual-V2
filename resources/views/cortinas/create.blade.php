@extends('layouts.app')

@section('title', 'Crear Cortina')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white text-center">
                    <h3>Crear Cortina</h3>
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
                    <form action="{{ route('cortinas.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-window"></i> Nombre</label>
                            <input type="text" class="form-control form-control-lg" name="nombre" value="{{ old('nombre') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-door-closed"></i> Aula</label>
                            <select name="aula_id" class="form-select form-select-lg" required>
                                <option value="">-- Selecciona un aula --</option>
                                @foreach ($aulas as $aula)
                                    <option value="{{ $aula->id }}" {{ old('aula_id') == $aula->id ? 'selected' : '' }}>
                                        {{ $aula->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><i class="bi bi-clock"></i> Hora de apertura</label>
                                <input type="time" class="form-control form-control-lg" name="hora_apertura" value="{{ old('hora_apertura') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><i class="bi bi-clock"></i> Hora de cierre</label>
                                <input type="time" class="form-control form-control-lg" name="hora_cierre" value="{{ old('hora_cierre') }}">
                            </div>
                        </div>

                        {{-- Días de la semana con botones toggle --}}
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-calendar-event"></i> Días de la semana</label>
                            <div class="d-flex flex-wrap gap-2">
                                @php
                                    $dias = ['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
                                    $diasSeleccionados = old('dias', []);
                                @endphp
                                @foreach ($dias as $dia)
                                    <input type="checkbox" class="btn-check" name="dias[]" id="dia-{{ $dia }}" value="{{ $dia }}"
                                        autocomplete="off" {{ in_array($dia, $diasSeleccionados) ? 'checked' : '' }}>
                                    <label class="btn btn-outline-primary" for="dia-{{ $dia }}">{{ $dia }}</label>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="automatica" value="1" id="automatica" {{ old('automatica') ? 'checked' : '' }}>
                            <label class="form-check-label" for="automatica">Activar modo automático (clima)</label>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('cortinas.index') }}" class="btn btn-secondary btn-lg">
                                <i class="bi bi-arrow-left"></i> Volver
                            </a>
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="bi bi-plus-circle"></i> Crear
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
