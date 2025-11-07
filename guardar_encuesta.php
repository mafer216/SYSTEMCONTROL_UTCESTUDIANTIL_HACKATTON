<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
    exit();
}

require_once "conexion.php";

$id_encuesta = $_POST['id_encuesta'];
$id_usuario = $_POST['id_usuario'];
$p21 = $_POST['p21'];
$p22 = $_POST['p22'];
$p23 = $_POST['p23'];
$p24 = $_POST['p24'];
$fortalezas = $_POST['fortalezas'];
$mejoras = $_POST['mejoras'];

$sql = "INSERT INTO respuestas_encuesta 
(id_encuesta, id_usuario, p21, p22, p23, p24, fortalezas, mejoras)
VALUES ('$id_encuesta', '$id_usuario', '$p21', '$p22', '$p23', '$p24', '$fortalezas', '$mejoras')";

if (mysqli_query($conexion, $sql)) {
    echo "<script>alert('✅ Encuesta enviada con éxito'); window.location='encuestas.php';</script>";
} else {
    echo "❌ Error al enviar: " . mysqli_error($conexion);
}
?>

