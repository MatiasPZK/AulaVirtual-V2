@extends('layouts.app')

@section('title', 'Focos')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Focos Registrados</h2>

    <a href="{{ route('focos.create') }}" class="btn btn-primary mb-3">Agregar Foco</a>

    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Número de Serie</th>
                <th>Tipo</th>
                <th>Aula</th>
                <th>Luminosidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($focos as $foco)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $foco->numero_serie }}</td>
                <td>{{ $foco->tipo }}</td>
                <td>{{ $foco->aula->nombre ?? 'Sin Aula' }}</td>
                <td>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{ $foco->luminosidad }}%;" aria-valuenow="{{ $foco->luminosidad }}" aria-valuemin="0" aria-valuemax="100">{{ $foco->luminosidad }}%</div>
                    </div>
                </td>
                <td>
                    <a href="{{ route('focos.edit', $foco->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('focos.destroy', $foco->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar foco?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
