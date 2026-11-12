<?php

include("conecta.php");

// Si el formulario envía el código, procesamos
if (isset($_POST['cod'])) {

    $cod = $_POST['cod'];
    $nombre = $_POST['nombre'];
    $aula = $_POST['aula'];
    $dni_tutor = $_POST['dni_tutor'];

    $sql = "INSERT INTO grupo (cod, nombre, aula, dni_tutor) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);


    mysqli_stmt_bind_param($stmt, "isss", $cod, $nombre, $aula, $dni_tutor);

    if (mysqli_stmt_execute($stmt)) {
        echo "¡Grupo registrado correctamente!";
    } else {
        echo "Error al registrar el grupo.";
    }

    mysqli_stmt_close($stmt);

} else {

    echo "No hay datos. <a href='from4.html'>Ir al formulario</a>";
}

mysqli_close($conn);

?>


