@extends('layouts.app')

@section('title', 'Horarios')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4 animate__animated animate__fadeInDown">
        <i class="bi bi-calendar-event"></i> Horarios de Profesores
    </h2>

    @php
        $dias = ['Lunes','Martes','Miércoles','Jueves','Viernes'];
        $horas = ['1° Hora','2° Hora','3° Hora','4° Hora','5° Hora','6° Hora','7° Hora','8° Hora'];
    @endphp

    <div class="table-responsive animate__animated animate__fadeInUp">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Hora / Día</th>
                    @foreach($dias as $dia)
                        <th>{{ $dia }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($horas as $hora)
                    <tr>
                        <th class="table-secondary">{{ $hora }}</th>
                        @foreach($dias as $dia)
                            @php
                                $asignacion = $horarios->first(function($h) use ($dia, $hora) {
                                    return $h->dia === $dia && $h->hora === $hora;
                                });
                            @endphp
                            <td class="{{ $asignacion ? 'table-info' : 'table-success' }}">
                                @if($asignacion)
                                    <strong>{{ $asignacion->profesor->nombre ?? 'Sin profesor' }}</strong><br>
                                    {{ $asignacion->materia ?? '' }}
                                    <div class="mt-1">
                                        <a href="{{ route('horarios.edit', $asignacion->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('horarios.destroy', $asignacion->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este horario?')">Eliminar</button>
                                        </form>
                                    </div>
                                @else
                                    {{-- Botón que lleva a create --}}
                                    <a href="{{ route('horarios.create', ['dia' => $dia, 'hora' => $hora]) }}" class="btn btn-sm btn-success">
                                        Reservar
                                    </a>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection
