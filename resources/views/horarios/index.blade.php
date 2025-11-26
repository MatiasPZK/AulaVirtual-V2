@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Horario Escolar</h1>

    @php
        $dias = ['lunes','martes','miercoles','jueves','viernes'];
        // Bloques de horario (pueden coincidir con tu modelo)
        $bloques = \App\Models\Horario::$bloques;
        $bloquesRecreo = [3, 6, 9]; // los bloques de recreo
    @endphp

    <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>Hora</th>
                @foreach($dias as $dia)
                    <th class="text-capitalize">{{ $dia }}</th>
                @endforeach
            </tr>
        </thead>

        <tbody>
        @foreach($bloques as $num => $rango)
            <tr>
                <td class="fw-bold">{{ $rango }}</td>
                
                @foreach($dias as $dia)
                    @php
                        $h = $horarios
                            ->where('dia', $dia)
                            ->where('bloque', $num)
                            ->first();
                    @endphp

                    <td style="min-width: 120px; 
                               {{ in_array($num, $bloquesRecreo) ? 'background-color:#f0f0f0;' : '' }}">
                        @if(in_array($num, $bloquesRecreo))
                            {{-- Bloque de recreo: vacío --}}
                            <span class="text-muted">Recreo</span>
                        @elseif($h)
                            <strong>{{ $h->materia }}</strong><br>
                            <small>{{ $h->profesor->nombre ?? '' }}</small>
                        @else
                            <a class="btn btn-sm btn-success"
                               href="{{ route('horarios.create', ['dia' => $dia, 'bloque' => $num]) }}">
                                +
                            </a>
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
