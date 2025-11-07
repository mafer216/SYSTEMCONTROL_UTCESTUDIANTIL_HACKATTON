<?php
session_start();
include("conexion.php");

$id_usuario = $_SESSION['usuario'];
$destinatario = $_POST['destinatario'];
$mensaje = $_POST['mensaje'];

mysqli_query($conexion,"
INSERT INTO mensajes(id_remitente,id_destinatario,mensaje,fecha)
VALUES('$id_usuario','$destinatario','$mensaje',NOW())");

echo "<script>alert('Mensaje enviado'); window.location='chat.php';</script>";
?>
