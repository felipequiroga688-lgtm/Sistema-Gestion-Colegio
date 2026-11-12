<?php

include("conecta.php");

$tabla = $_POST['tabla'] ?? "";

$tablas = ["alumno", "asignatura", "cursa", "grupo", "profesor", "se_entrevista", "usuarios"];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar tablas</title>
</head>
<body>

    <h3>Escoge la tabla</h3>

    <form method="POST">

        <select name="tabla" required>

            <option value="">Seleccione una tabla</option>

            <?php
            foreach ($tablas as $nombre) {
                echo "<option value='$nombre'>$nombre</option>";
            }
            ?>

        </select>

        <input type="submit" value="Consultar">

    </form>

    <?php

    if (in_array($tabla, $tablas)) {

        $sql = "SELECT * FROM `$tabla`";
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {

            echo "<h3>Datos de la tabla: $tabla</h3>";

            echo "<table border='1' cellpadding='10'>";

            // Mostrar nombres de las columnas
            echo "<tr>";

            while ($campo = mysqli_fetch_field($resultado)) {
                echo "<th>" . htmlspecialchars($campo->name) . "</th>";
            }

            echo "</tr>";

            // Mostrar registros
            while ($fila = mysqli_fetch_assoc($resultado)) {

                echo "<tr>";

                foreach ($fila as $valor) {
                    echo "<td>" . htmlspecialchars((string)$valor) . "</td>";
                }

                echo "</tr>";
            }

            echo "</table>";

        } else {
            echo "Error al consultar la tabla";
        }
    }

    ?>

</body>
</html>
