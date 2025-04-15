<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]); // trim() quita los espacios antes o despues de la palabra
    if (!empty($nombre)) { // empty() valida que no este vacia, de lo contrario carga basura.
        $_SESSION["nombre"] = $nombre;
        header("Location: detalle.php"); //La función header() envía un encabezado HTTP sin procesar a un cliente
        exit(); //La función exit() imprime un mensaje y finaliza el script actual.  
    } else {
        $error = "Por favor, ingresa un nombre válido.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Universidad empresarial Siglo21 - Desarrollo web TP2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Ingresa tu nombre</h2>
        <?php if (isset($error)): ?>  <!-- isset() comprueba que la variable esta vacia, definida o declarada -->
            <div class="alert alert-danger"><?= $error ?></div> 
        <?php endif; ?>
        <form method="POST" class="card p-4 shadow"> <!-- Inicia un formulario con metodo POST -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label> 
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>
