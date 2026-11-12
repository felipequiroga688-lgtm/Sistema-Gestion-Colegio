<?php
include("conecta.php");
$res = mysqli_query($conn, "SELECT dni, nombre, apellido1 FROM profesor ORDER BY nombre");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario profesores</title>
</head>
<body>

    <h2>Seleccionar profesor</h2>

    <form action="consultaid.php" method="POST">
        <label>Documento del profesor:</label>
        <select name="dni" required>
            <option value="">Seleccione un profesor</option>
            <?php while ($p = mysqli_fetch_assoc($res)): ?>
                <option value="<?= htmlspecialchars($p['dni']) ?>">
                    <?= htmlspecialchars($p['dni'] . ' - ' . $p['nombre'] . ' ' . $p['apellido1']) ?>
                </option>
            <?php endwhile; ?>
        </select>
        <br><br>
        <input type="submit" value="Enviar">
    </form>

</body>
</html>


