<?php
session_start();
include 'conecta.php';

$errores = [];
$exito   = '';

// Si llega por POST → procesamos el INSERT
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $dni       = trim($_POST['dni'] ?? '');
    $nombre    = trim($_POST['nombre'] ?? '');
    $apellido1 = trim($_POST['apellido1'] ?? '');
    $apellido2 = trim($_POST['apellido2'] ?? '');

    if ($dni === '')       $errores[] = "El DNI es obligatorio.";
    if ($nombre === '')    $errores[] = "El nombre es obligatorio.";
    if ($apellido1 === '') $errores[] = "El primer apellido es obligatorio.";

    // ¿DNI duplicado?
    if (empty($errores)) {
        $check = mysqli_prepare($conn, "SELECT dni FROM profesor WHERE dni = ? LIMIT 1");
        mysqli_stmt_bind_param($check, "s", $dni);
        mysqli_stmt_execute($check);
        mysqli_stmt_store_result($check);
        if (mysqli_stmt_num_rows($check) > 0) {
            $errores[] = "Ya existe un profesor con ese DNI.";
        }
        mysqli_stmt_close($check);
    }

    if (empty($errores)) {
        $ap2 = ($apellido2 === '') ? null : $apellido2;
        $sql = "INSERT INTO profesor (dni, nombre, apellido1, apellido2) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $dni, $nombre, $apellido1, $ap2);

        if (mysqli_stmt_execute($stmt)) {
            $exito = "Profesor $nombre $apellido1 registrado correctamente.";
        } else {
            $errores[] = "Error al guardar: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Profesor - Colegio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f6f9; }
        .card { border: none; box-shadow: 0 4px 20px rgba(0,0,0,.08); border-radius: 1rem; }
        .card-header { border-radius: 1rem 1rem 0 0 !important; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">

            <div class="card">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0 text-center">Registro de Profesor</h4>
                </div>
                <div class="card-body p-4">

                    <?php if ($exito): ?>
                        <div class="alert alert-success"><?= htmlspecialchars($exito) ?></div>
                    <?php endif; ?>

                    <?php if (!empty($errores)): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($errores as $e): ?>
                                    <li><?= htmlspecialchars($e) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="procesar.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">DNI *</label>
                            <input type="text" class="form-control" name="dni" maxlength="9"
                                   placeholder="Ej: 12345678A"
                                   value="<?= htmlspecialchars($_POST['dni'] ?? '') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nombre *</label>
                            <input type="text" class="form-control" name="nombre"
                                   value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Primer apellido *</label>
                            <input type="text" class="form-control" name="apellido1"
                                   value="<?= htmlspecialchars($_POST['apellido1'] ?? '') ?>" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Segundo apellido</label>
                            <input type="text" class="form-control" name="apellido2"
                                   value="<?= htmlspecialchars($_POST['apellido2'] ?? '') ?>">
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="consulta1.php" class="btn btn-outline-secondary">Ver profesores</a>
                            <button type="submit" class="btn btn-primary px-4">Guardar</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>