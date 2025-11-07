<?php
session_start();
include("conexion.php");

$id_usuario = $_SESSION['usuario'];
$id_tarea = $_POST['id_tarea'];
$comentario = $_POST['comentario'];

$archivo = $_FILES['archivo']['name'];
$destino = "uploads/" . basename($archivo);

move_uploaded_file($_FILES['archivo']['tmp_name'], $destino);

mysqli_query($conexion,"
INSERT INTO entregas(id_usuario, id_tarea, archivo, comentario, fecha_entregado)
VALUES ('$id_usuario','$id_tarea','$archivo','$comentario',NOW())");

echo "<script>alert('Tarea enviada correctamente'); window.location='tareas.php';</script>";
?>
