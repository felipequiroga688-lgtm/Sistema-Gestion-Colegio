<?php
session_start();
include 'conecta.php';

$nombre   = trim($_POST['nombre'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

$errores = [];
if ($nombre === '')   $errores[] = "El nombre es obligatorio.";
if ($email === '')    $errores[] = "El email es obligatorio.";
if ($password === '') $errores[] = "La contraseña es obligatoria.";

if (empty($errores)) {
    $check = mysqli_prepare($conn, "SELECT id FROM usuarios WHERE email = ? LIMIT 1");
    mysqli_stmt_bind_param($check, "s", $email);
    mysqli_stmt_execute($check);
    mysqli_stmt_store_result($check);
    if (mysqli_stmt_num_rows($check) > 0) {
        $errores[] = "Ese email ya está registrado.";
    }
    mysqli_stmt_close($check);
}

if (!empty($errores)) {
    $_SESSION['error'] = implode(" ", $errores);
    header("Location: altalog.php");
    exit;
}

$sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $nombre, $email, $password);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['mensaje'] = "Cuenta creada. Ya puedes iniciar sesión.";
    header("Location: index1.php");
} else {
    $_SESSION['error'] = "Error al registrar: " . mysqli_error($conn);
    header("Location: altalog.php");
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
exit;
?>