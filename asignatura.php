<?php

include("conecta.php");

if (isset($_POST['cod'])) {

    $cod = $_POST['cod'];
    $nombre = $_POST['nombre'];
    $dni_profesor = $_POST['dni_profesor'];

    $sql = "INSERT INTO asignatura (cod, nombre, dni_profesor) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "iss", $cod, $nombre, $dni_profesor);

    if (mysqli_stmt_execute($stmt)) {
        echo "¡Asignatura registrada correctamente!";
    } else {
        echo "Error al registrar la asignatura.";
    }

    mysqli_stmt_close($stmt);

} else {
    
    echo "No hay datos. <a href='from3.html'>Ir al formulario</a>";
}

mysqli_close($conn);

?>



