
<?php
include("conecta.php");

$sql = "SELECT * FROM profesor";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Profesores</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-center text-primary mb-4">
        <i class="bi bi-people-fill"></i>
        Profesores registrados
    </h2>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-striped table-bordered text-center">

                <thead class="table-primary">
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Primer apellido</th>
                        <th>Segundo apellido</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                if (mysqli_num_rows($resultado) > 0) {

                    while ($fila = mysqli_fetch_assoc($resultado)) {
                ?>

                    <tr>
                        <td><?php echo htmlspecialchars($fila['dni']); ?></td>
                        <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($fila['apellido1']); ?></td>
                        <td><?php echo htmlspecialchars($fila['apellido2']); ?></td>
                    </tr>

                <?php
                    }

                } else {
                    echo "<tr><td colspan='4'>No hay profesores registrados</td></tr>";
                }
                ?>

                </tbody>
            </table>

            <a href="index.php" class="btn btn-primary">
                <i class="bi bi-arrow-left"></i>
                Volver al registro
            </a>

        </div>
    </div>

</div>

</body>
</html>

<?php
mysqli_close($conn);
?>