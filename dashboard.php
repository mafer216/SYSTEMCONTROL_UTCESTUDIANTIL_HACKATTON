<?php 
session_start(); 
if(!isset($_SESSION['usuario'])){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard - Portal Estudiantil</title>
<link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<nav>
<a href="dashboard.php">Inicio</a>
<a href="calificaciones.php">Calificaciones</a>
<a href="tareas.php">Tareas</a>
<a href="encuestas.php">Encuestas</a>
<a href="logout.php">Salir</a>
</nav>

<h2>Bienvenido al portal estudiantil tipo Classroom</h2>
<p>Aquí podrás ver avisos, tareas pendientes y calificaciones.</p>

</body>
</html>