<?php
session_start();
include 'conecta.php';

$email    = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// prepare() protege de inyeccion SQL sin tocar la BD
$sql = "SELECT * FROM usuarios WHERE email = ? AND password = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $email, $password);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultado) == 1) {
    $usuario = mysqli_fetch_assoc($resultado);

    $_SESSION['id_usuario'] = $usuario['id'];
    $_SESSION['nombre']     = $usuario['nombre'];
    $_SESSION['email']      = $usuario['email'];

    header("Location: pag1.php");
    exit;
} else {
    $_SESSION['mensaje'] = "Email o contraseña incorrectos.";
    header("Location: index1.php");
    exit;
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
