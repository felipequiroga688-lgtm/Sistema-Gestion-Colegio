<?php

include("conecta.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Buscar Profesor</title>
</head>

<body>

    <h3>TABLA PROFESOR</h3>

    <form method="POST">

        Buscar por:

        <select name="campo">

            <option value="dni">DNI</option>
            <option value="nombre">Nombre</option>
            <option value="apellido1">Apellido1</option>
            <option value="apellido2">Apellido2</option>

        </select>

        <input type="text" name="buscar" placeholder="Escriba para buscar" required>

        <input type="submit" name="consultar" value="Buscar">

    </form>

    <br>

    <?php

    if (isset($_POST['consultar'])) {

        $campo = $_POST['campo'];
        $buscar = $_POST['buscar'];

        // Campos permitidos
        $campos = ["dni", "nombre", "apellido1", "apellido2"];

        if (in_array($campo, $campos)) {

            $sql = "SELECT * FROM profesor WHERE $campo LIKE ?";

            $stmt = mysqli_prepare($conn, $sql);

            $texto = "%" . $buscar . "%";

            mysqli_stmt_bind_param($stmt, "s", $texto);

            mysqli_stmt_execute($stmt);

            $resultado = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($resultado) > 0) {

                echo "<table border='1' cellpadding='10'>";

                echo "<tr>";
                echo "<th>DNI</th>";
                echo "<th>Nombre</th>";
                echo "<th>Apellido1</th>";
                echo "<th>Apellido2</th>";
                echo "</tr>";

                while ($fila = mysqli_fetch_assoc($resultado)) {

                    echo "<tr>";

                    echo "<td>".$fila['dni']."</td>";
                    echo "<td>".$fila['nombre']."</td>";
                    echo "<td>".$fila['apellido1']."</td>";
                    echo "<td>".$fila['apellido2']."</td>";

                    echo "</tr>";

                }

                echo "</table>";

            } else {

                echo "No se encontraron profesores.";

            }

        }

    }

    ?>

</body>
</html>



