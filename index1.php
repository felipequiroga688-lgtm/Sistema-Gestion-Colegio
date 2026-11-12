<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesion</title>
</head>
<body>
    <h2>Iniciar Sesion</h2>

    <?php
    session_start();
    if (isset($_SESSION['mensaje'])) {
        echo "<p style='color:red'>" . $_SESSION['mensaje'] . "</p>";
        unset($_SESSION['mensaje']);
    }
    ?>

    <form action="validalogin.php" method="POST">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Entrar</button>
    </form>

    <p>¿No tienes cuenta? <a href="altalog.php">Registrate aqui</a></p>
</body>
</html>