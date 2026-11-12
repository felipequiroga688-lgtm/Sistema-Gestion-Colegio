<?php

include("conecta.php");

if (isset($_POST['actualizar'])) {

    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];

    $sql = "UPDATE profesor SET nombre = ?,
            apellido1 = ?, apellido2 = ?
            WHERE dni = ?";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        $nombre,
        $apellido1,
        $apellido2,
        $dni
    ]);

    echo "Profesor actualizado correctamente";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Profesor</title>
</head>
<body>

    <h2>Actualizar Profesor</h2>

    <form method="POST">

        DNI:
        <input type="text" name="dni" required>
        <br><br>

        Nombre:
        <input type="text" name="nombre" required>
        <br><br>

        Apellido 1:
        <input type="text" name="apellido1" required>
        <br><br>

        Apellido 2:
        <input type="text" name="apellido2" required>
        <br><br>

        <input type="submit" name="actualizar"
        value="Guardar cambios">

    </form>

</body>
</html>
