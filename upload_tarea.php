<?php
require_once "conexion.php";

$id = $_POST['id'];

$archivo = $_FILES['archivo']['name'];
$ruta = "uploads/" . $archivo;

move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta);

$sql = "UPDATE tareas SET archivo='$archivo', entregada=1 WHERE id=$id";
$conn->query($sql);

header("Location: tareas.php");
?>
