<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aula Virtual')</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Tipografía y estilos generales --}}
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: "Figtree", sans-serif;
            color: white;
            overflow-x: hidden;
        }

        /* Fondo aurora boreal cósmica con tonos negros y grises */
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            z-index: -1;
            background: radial-gradient(circle at 20% 30%, #474747ff, #000000ff, #333333ff, #a8a2a2ff);
            background-size: 400% 400%;
            animation: auroraBG 20s ease infinite;
        }

        @keyframes auroraBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Navbar minimalista */
        .navbar {
            background: transparent !important;
        }

        /* Botones generales */
        .btn-custom {
            border-radius: 9999px;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            transform: scale(1.1);
        }

        /* Contenedor de contenido */
        .content-section {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            {{-- Logo / Texto que lleva al welcome --}}
            <a class="navbar-brand fw-bold fs-3" href="{{ route('welcome') }}">Aula Virtual</a>
        </div>
    </nav>

    {{-- Contenido principal --}}
    <main>
        @yield('content')
    </main>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
