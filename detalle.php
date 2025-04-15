<?php
session_start();

if (!isset($_SESSION["nombre"])) {
    header("Location: index.php");
    exit();
}

$nombre = $_SESSION["nombre"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<div class='container mt-5'><h3>Datos recibidos:</h3><ul class='list-group'>";
    foreach ($_POST as $clave => $valor) {
        echo "<li class='list-group-item'><strong>$clave:</strong> $valor</li>";
    }
    echo "</ul></div>";
    session_destroy(); // Opcional, para cerrar la sesión después del envío
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Completa tu perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Completa tu perfil</h2>
        <form method="POST" class="card p-4 shadow">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="pais" class="form-label">País:</label>
                <input type="text" class="form-control" id="pais" name="pais" required>
            </div>
            <div class="mb-3">
                <label for="ocupacion" class="form-label">Ocupación:</label>
                <input type="text" class="form-control" id="ocupacion" name="ocupacion" required>
            </div>
            <button type="submit" class="btn btn-success">Enviar</button>
        </form>
    </div>
</body>
</html>
