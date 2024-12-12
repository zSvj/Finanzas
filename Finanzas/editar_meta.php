<?php
// Activar la visualización de errores
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "config/Database.php";
require_once "models/Meta.php";

// Conexión a la base de datos
$database = new Database();
$db = $database->getConnection();

// Crear una instancia del objeto Meta
$meta = new Meta($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
        $id = $_POST['id'];

        if ($meta->eliminarMeta($id)) {
            // Redirige directamente a metas.php tras eliminar
            header("Location: metas.php");
            exit; // Asegura que no se ejecuta más código
        } else {
            // Mostrar mensaje de error si no se pudo eliminar
            echo "<script>
                    Swal.fire({
                        title: 'Error',
                        text: 'No se pudo eliminar la meta.',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    }).then(() => {
                        window.location.href = 'metas.php';
                    });
                  </script>";
            exit; // Asegura que no se ejecuta más código
        }
    }
}

// Obtener los datos de la meta
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'No se proporcionó un ID válido.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = 'metas.php';
            });
          </script>";
    exit;
}

$id = $_GET['id'];
$meta_actual = $meta->obtenerMeta($id);

if (!$meta_actual) {
    echo "<script>
            Swal.fire({
                title: 'Error',
                text: 'No se encontró la meta.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                window.location.href = 'metas.php';
            });
          </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Meta</title>
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
        .btn-danger {
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: bold;
            background-color: #d33;
            border-color: #d33;
        }
        .btn-danger:hover {
            background-color: #ff3385;
            border-color: #ff3385;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Finanzas Personales</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="metas.php">Metas Financieras</a>
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

    <!-- Contenido principal -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar Meta Financiera</h1>

        <form method="POST" action="editar_meta.php">
            <input type="hidden" name="id" value="<?= htmlspecialchars($meta_actual['id']) ?>">

            <div class="mb-3">
                <label for="nombre_meta" class="form-label">Nombre de la Meta</label>
                <input type="text" class="form-control" id="nombre_meta" value="<?= htmlspecialchars($meta_actual['nombre']) ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="ahorro_actual" class="form-label">Ahorro Actual</label>
                <input type="number" class="form-control" id="ahorro_actual" name="ahorro_actual" value="<?= htmlspecialchars($meta_actual['ahorro_actual']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="ahorro_objetivo" class="form-label">Meta de Ahorro</label>
                <input type="number" class="form-control" id="ahorro_objetivo" name="ahorro_objetivo" value="<?= htmlspecialchars($meta_actual['ahorro_objetivo']) ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Meta</button>
        </form>

        <button class="btn btn-danger mt-3" id="deleteMetaButton">Eliminar Meta</button>
    </div>

    <!-- Footer -->
    <footer class="footer text-center py-3 mt-4">
        <p>&copy; 2024 Finanzas Personales. Todos los derechos reservados.</p>
    </footer>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        document.getElementById('deleteMetaButton').addEventListener('click', function() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'editar_meta.php';
                    form.innerHTML = `
                        <input type="hidden" name="id" value="<?= htmlspecialchars($meta_actual['id']) ?>">
                        <input type="hidden" name="accion" value="eliminar">
                    `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
