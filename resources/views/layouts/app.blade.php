<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Aula Virtual</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- Animate.css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            min-height: 100vh;
            color: #333;
        }

        .navbar {
            background: rgba(0,0,0,0.4) !important;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .btn-lg {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn-lg:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        /* Animación para los cards */
        .animate-card {
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">Aula Virtual</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            {{-- Buscador --}}
            <form class="d-flex ms-auto" role="search" action="{{ route('buscar') }}" method="GET">
                <input class="form-control me-2" type="search" name="q" placeholder="Buscar..." aria-label="Buscar" value="{{ request('q') }}">
                <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i> Buscar</button>
            </form>
        </div>
    </div>
</nav>

{{-- Contenido principal --}}
<div class="pt-5 mt-4">
    @yield('content')
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
