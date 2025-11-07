<?php
require_once "conexion.php";

$id = $_GET['id'];

$sql = "UPDATE tareas SET entregada=1 WHERE id=$id";
$conn->query($sql);

header("Location: tareas.php");
?>
