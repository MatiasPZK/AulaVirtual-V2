<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula Virtual</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Aula Virtual</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aulas.index') }}">Aulas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profesores.index') }}">Profesores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#objetos">Objetos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cortinas">Cortinas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#aires">Aire Acondicionado</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sección de presentación -->
    <header class="bg-light py-5">
        <div class="container text-center">
            <h1 class="display-4">Bienvenido al Aula Virtual</h1>
            <p class="lead">Gestiona aulas, profesores, objetos y sistemas automatizados de forma sencilla y eficiente.</p>
            <a href="#aulas" class="btn btn-primary btn-lg mt-3">Comenzar</a>
        </div>
    </header>

    <!-- Sección de funcionalidades -->
    <section id="aulas" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Aulas</h2>
            <p class="text-center mb-5">Crea y administra las aulas de tu institución educativa.</p>
        </div>
    </section>

    <section id="profesores" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Profesores</h2>
            <p class="text-center mb-5">Asigna profesores a las aulas y gestiona su información.</p>
        </div>
    </section>

    <section id="objetos" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Objetos</h2>
            <p class="text-center mb-5">Agrega y organiza los objetos disponibles en cada aula.</p>
        </div>
    </section>

    <section id="cortinas" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Cortinas Automatizadas</h2>
            <p class="text-center mb-5">Controla la apertura y cierre de cortinas desde la aplicación.</p>
        </div>
    </section>

    <section id="aires" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Aire Acondicionado</h2>
            <p class="text-center mb-5">Configura y controla los aires acondicionados de cada aula.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; {{ date('Y') }} Aula Virtual. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
