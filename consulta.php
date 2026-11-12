<?php

// include("conecta.php");

// $sql = "SELECT dni, nombre, apellido1, apellido2 FROM profesor";

// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {

//     echo "Estos son los profesores registrados:<br><br>";

//     while ($row = mysqli_fetch_assoc($result)) {

//         echo "DNI: " . $row['dni'] .
//              " - Nombre: " . $row['nombre'] . " " .
//              $row['apellido1'] . " " .
//              $row['apellido2'] . "<br>";
//     }

// } else {

//     echo "No hay profesores registrados";

// }

// mysqli_close($conn);



include 'conecta.php';

$sql = "SELECT dni, nombre, apellido1, apellido2 FROM profesor";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {

    echo "Exito, si se esta conectando";

    echo "<table border='1' cellpadding='10'>";

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "</tr>";

    while ($fila = $resultado->fetch_assoc()) {

        echo "<tr>";

        echo "<td>" . $fila['dni'] . "</td>";

        echo "<td>" . $fila['nombre'] . " " .
        $fila['apellido1'] . " " .
        $fila['apellido2'] . "</td>";

        echo "</tr>";
    }

    echo "</table>";

} else {

    echo "No hay resultados";
}

$conn->close();


?>


