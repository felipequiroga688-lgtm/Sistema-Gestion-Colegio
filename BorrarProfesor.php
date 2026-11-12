
<?php
include("conecta.php");

if (isset($_POST['eliminar'])) {

    $dni = $_POST['dni'];

    $sql = "DELETE FROM profesor WHERE dni = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $dni);
    mysqli_stmt_execute($stmt);

    echo "Profesor eliminado correctamente";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eliminar profesor</title>
</head>
<body>

<form method="POST">

    DNI del profesor:
    <select name="dni" required>

        <option value="">Seleccione</option>

        <?php
        $sql = "SELECT * FROM profesor";
        $resultado = mysqli_query($conn, $sql);

        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<option value='".$fila['dni']."'>";
            echo $fila['dni']." - ".$fila['nombre'];
            echo "</option>";
        }
        ?>

    </select>

    <br><br>

    <input type="submit" name="eliminar"
    value="Eliminar profesor"
    onclick="return confirm('¿Desea eliminar este profesor?')">

</form>

</body>
</html>



