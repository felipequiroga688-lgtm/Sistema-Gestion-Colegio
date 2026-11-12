<?php
include("conecta.php");

$nexp = $_POST['nexp'];
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$fecha_nac = $_POST['fecha_nac'];
$cod_grupo = $_POST['cod_grupo'];

$sql = "INSERT INTO alumno
(nexp, nombre, apellido1, apellido2, fecha_nac, cod_grupo)
VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "issssi",
    $nexp,
    $nombre,
    $apellido1,
    $apellido2,
    $fecha_nac,
    $cod_grupo
);

if (mysqli_stmt_execute($stmt)) {
    echo "Alumno registrado correctamente";
} else {
    echo "Error al registrar: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>
