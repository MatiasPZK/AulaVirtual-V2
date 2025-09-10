@extends('layouts.app')

@section('title', 'Bienvenido al Aula Virtual')

@section('content')
<style>
    /* Fondo general de la página */
    body {
        background: linear-gradient(120deg, #000000, #1a1a1a, #2e2e2e, #000000);
        overflow-x: hidden;
        color: white;
    }

    /* Caja de presentación con aurora boreal */
    .hero-box {
        position: relative;
        margin: 2rem auto;
        width: 90%;
        min-height: 95vh;
        border-radius: 1.5rem;
        overflow: hidden;
        padding: 4rem 3rem;
        text-align: left;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: linear-gradient(120deg, #000000, #8b5cf6, #ffffff, #1e1b4b, #4c1d95);
        background-size: 600% 600%;
        animation: gradientBG 30s ease infinite;
        box-shadow: 0 0 40px rgba(255,255,255,0.1);
    }

    @keyframes gradientBG {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .hero-box h1 .italic {
        font-style: italic;
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
    }

    .hero-box h1 .normal {
        font-style: normal;
        font-weight: 400;
        font-size: 2rem;
        display: block;
        margin-top: 0.5rem;
    }

    .hero-box p {
        margin-top: 1rem;
        font-size: 1rem;
        opacity: 0.8;
    }

    .btn-outline-light {
        color: white;
        border: 1px solid white;
        font-weight: 300;
        background-color: transparent;
        transition: all 0.3s ease;
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
        margin-top: 2rem;
        align-self: start;
        border-radius: 1rem;
        width: 200px;
        text-align: center;
    }

    .btn-outline-light:hover {
        background-color: rgba(255,255,255,0.1);
        transform: scale(1.05);
    }

    .options-section {
        margin: 4rem auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        max-width: 300px;
    }

    .options-section a {
        color: white;
        border: 1px solid white;
        font-weight: 300;
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
        text-decoration: none;
        background-color: transparent;
        transition: all 0.3s ease;
        border-radius: 1rem;
        width: 100%;
        text-align: center;
    }

    .options-section a:hover {
        background-color: rgba(255,255,255,0.1);
        transform: scale(1.05);
    }

    html {
        scroll-behavior: smooth;
    }
</style>

<div class="hero-box">
    <h1>
        <span class="italic">Bienvenidos</span>
        <span class="normal">Al Aula Virtual</span>
    </h1>
    <p>
        Gestiona aulas, profesores, objetos y sistemas automatizados de manera fácil e intuitiva.
    </p>

    <a href="#opciones" class="btn-outline-light">Empezar</a>
</div>

{{-- Sección de botones de opciones --}}
<div id="opciones" class="options-section">
    <a href="{{ route('aulas.index') }}">Aulas</a>
    <a href="{{ route('profesores.index') }}">Profesores</a>
    <a href="{{ route('objetos.index') }}">Objetos</a>
    <a href="{{ route('cortinas.index') }}">Cortinas</a>
    <a href="{{ route('aires.index') }}">Aire Acondicionado</a>
    <a href="{{ route('horarios.index') }}">Horarios</a>
    <a href="{{ route('focos.index') }}">Focos</a>
</div>

{{-- Fuente Playfair Display --}}
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
@endsection
