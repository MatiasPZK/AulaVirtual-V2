<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula Virtual</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Animate.css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            color: white;
        }

        .hero {
            height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .btn-landing {
            margin: 10px;
            font-size: 1.2rem;
        }

        /* Efecto sutil de sombra y transición en botones */
        .btn-landing:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            transition: 0.3s;
        }

        /* Buscador más grande y consistente */
        .navbar .form-control-lg {
            width: 250px;
        }
    </style>
</head>
<body>
    {{-- Navbar minimalista --}}
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: transparent;">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#">Aula Virtual</a>

            {{-- Buscador --}}
            <form class="d-flex ms-auto" role="search">
                <input class="form-control me-2 form-control-lg" type="search" placeholder="Buscar..." aria-label="Buscar">
                <button class="btn btn-outline-light btn-lg" type="submit">Buscar</button>
            </form>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="hero">
        <h1 class="animate__animated animate__fadeInDown">Bienvenido a Aula Virtual</h1>
        <p class="lead animate__animated animate__fadeInUp animate__delay-1s">
            Gestiona aulas, profesores, objetos y sistemas automatizados de manera fácil e intuitiva.
        </p>

        <div class="animate__animated animate__fadeInUp animate__delay-2s d-flex flex-wrap justify-content-center">
            <a href="{{ route('aulas.index') }}" class="btn btn-primary btn-lg btn-landing">Aulas</a>
            <a href="{{ route('profesores.index') }}" class="btn btn-success btn-lg btn-landing">Profesores</a>
            <a href="{{ route('objetos.index') }}" class="btn btn-warning btn-lg btn-landing">Objetos</a>
            <a href="{{ route('cortinas.index') }}" class="btn btn-info btn-lg btn-landing">Cortinas</a>
            <a href="{{ route('aires.index') }}" class="btn btn-danger btn-lg btn-landing">Aire Acondicionado</a>
        </div>
    </section>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Pequeña animación extra con JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const hero = document.querySelector('.hero');
            hero.addEventListener('mousemove', e => {
                const x = (window.innerWidth / 2 - e.pageX) / 30;
                const y = (window.innerHeight / 2 - e.pageY) / 30;
                hero.style.transform = `rotateX(${y}deg) rotateY(${x}deg)`;
            });
        });
    </script>
</body>
</html>
