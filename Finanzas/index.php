<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Finanzas Personales</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Google Fonts (Fuente femenina y elegante) -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #f7f2f8;
        }
        .navbar {
            background-color: #f5c6cb;
        }
        .navbar-brand, .nav-link {
            color: #6f42c1 !important;
        }
        .navbar-nav .nav-link:hover {
            color: #ff66b3 !important;
        }
        .btn-primary {
            background-color: #ff66b3;
            border-color: #ff66b3;
        }
        .btn-primary:hover {
            background-color: #ff3385;
            border-color: #ff3385;
        }
        .footer {
            background-color: #f5c6cb;
            color: #6f42c1;
            font-size: 14px;
        }
        .container h1 {
            color: #6f42c1;
            font-weight: 500;
        }
        .container p {
            color: #6f42c1;
        }
        .text-center a {
            margin: 10px;
        }
        .btn-primary {
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Finanzas Personales</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="metas.php">Metas Financieras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transacciones.php">Transacciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reportes.php">Reportes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Finanzas Personales</h1>
        <p class="text-center">Bienvenida a tu plataforma personalizada para gestionar tus finanzas. Aquí puedes registrar tus transacciones, establecer metas y generar reportes detallados.</p>

        <!-- Botones de Redirección -->
        <div class="text-center">
            <a href="metas.php" class="btn btn-primary mx-2">Metas Financieras</a>
            <a href="transacciones.php" class="btn btn-primary mx-2">Transacciones</a>
            <a href="reportes.php" class="btn btn-primary mx-2">Reportes</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-center py-3 mt-4">
        <p>&copy; 2024 Finanzas Personales. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
