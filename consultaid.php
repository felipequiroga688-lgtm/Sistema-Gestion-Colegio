<?php
include("conecta.php");

$dni  = strtoupper(trim($_POST['dni'] ?? ''));
$fila = null;
$mensaje = '';

if ($dni !== '') {
    $sql = "SELECT dni, nombre, apellido1, apellido2 FROM profesor WHERE dni = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $dni);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) === 1) {
        $fila = mysqli_fetch_assoc($resultado);
    } else {
        $mensaje = "No existe ningún profesor con el DNI $dni.";
    }
    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Profesor por DNI</title>
</head>
<body>

    <h3>Buscar Profesor por DNI</h3>

    <form method="POST">
        DNI:
        <input type="text" name="dni" maxlength="9" required
               value="<?= htmlspecialchars($dni) ?>">
        <input type="submit" value="Buscar">
    </form>

    <hr>

    <?php if ($mensaje): ?>
        <p style="color:red;"><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>

    <?php if ($fila): ?>
        <table border="1" cellpadding="10">
            <tr>
                <th>DNI</th><th>Nombre</th><th>Apellido 1</th><th>Apellido 2</th>
            </tr>
            <tr>
                <td><?= htmlspecialchars($fila['dni']) ?></td>
                <td><?= htmlspecialchars($fila['nombre']) ?></td>
                <td><?= htmlspecialchars($fila['apellido1']) ?></td>
                <td><?= htmlspecialchars($fila['apellido2'] ?? '—') ?></td>
            </tr>
        </table>
    <?php endif; ?>

</body>
</html>
