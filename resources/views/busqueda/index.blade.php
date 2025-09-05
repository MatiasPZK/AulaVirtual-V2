@extends('layouts.app')

@section('title', 'Resultados de búsqueda')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Resultados para: "{{ $q }}"</h2>

    <h4>Aulas</h4>
    @forelse ($aulas as $aula)
        <p>{{ $aula->nombre }} - Capacidad: {{ $aula->capacidad }}</p>
    @empty
        <p>No se encontraron aulas.</p>
    @endforelse

    <h4>Profesores</h4>
    @forelse ($profesores as $profesor)
        <p>{{ $profesor->nombre }} - Especialidad: {{ $profesor->especialidad }}</p>
    @empty
        <p>No se encontraron profesores.</p>
    @endforelse

    <h4>Objetos</h4>
    @forelse ($objetos as $objeto)
        <p>{{ $objeto->nombre }} - Tipo: {{ $objeto->tipo }}</p>
    @empty
        <p>No se encontraron objetos.</p>
    @endforelse
</div>
@endsection
