<?php
session_start();
include("conexion.php");

$id = $_GET['id'];

$consulta = mysqli_query($conexion,"
SELECT materias.nombre, tareas.*
FROM tareas
JOIN materias ON materias.id = tareas.id_materia
WHERE tareas.id=$id");
$tarea = mysqli_fetch_assoc($consulta);
?>

<html>
<head><link rel="stylesheet" href="css/estilos.css"></head>
<body>

<nav>
<a href="dashboard.php">Inicio</a>
<a href="tareas.php">Tareas</a>
<a href="logout.php">Salir</a>
</nav>

<h2><?php echo $tarea['titulo']; ?></h2>
<p><?php echo $tarea['descripcion']; ?></p>
<p><b>Entrega:</b> <?php echo $tarea['fecha_entrega']; ?></p>

<form action="subir_tarea.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id_tarea" value="<?php echo $tarea['id']; ?>">
<textarea name="comentario" placeholder="Comentario opcional"></textarea>
<input type="file" name="archivo" required>
<input type="submit" value="Entregar Tarea">
</form>

</body>
</html>
