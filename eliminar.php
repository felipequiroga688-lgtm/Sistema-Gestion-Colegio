<?php
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "colegio";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
  die("No se pudo conectar. " . $e->getMessage());
}

try {

  $sql = "DELETE FROM colegio WHERE id=3";
  $conn->exec($sql);
  echo "Registro eliminado correctamente";
} catch(PDOException $e) {
  echo "Error al eliminar el registro: " .$sql . "<br>" . $e->getMessage();
}

$conn = null;
?>


