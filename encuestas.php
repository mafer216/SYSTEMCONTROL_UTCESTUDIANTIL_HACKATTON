<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
    exit();
}

require_once "conexion.php";

// Obtener encuesta (solo 1 por ahora)
$sql = "SELECT * FROM encuestas ORDER BY fecha DESC LIMIT 1";
$resultado = mysqli_query($conexion, $sql);

if(mysqli_num_rows($resultado) > 0){
    $encuesta = mysqli_fetch_assoc($resultado);
} else {
    echo "<script>alert('No hay encuestas disponibles por el momento'); window.location='dashboard.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Encuestas UTC</title>

<style>
body{font-family: Arial;background:#e0f7fa;margin:0;padding:0;}
nav{background:#006c9c;padding:12px;text-align:center;}
nav a{color:white;text-decoration:none;font-weight:bold;margin:10px;}
form{width:70%;background:white;margin:25px auto;padding:25px;border-radius:10px;}
button{background:#007bb3;color:white;padding:12px;border:none;border-radius:5px;cursor:pointer;font-weight:bold;}
textarea{width:100%;height:80px;margin-top:10px;}
</style>
</head>

<body>

<nav>
<a href="dashboard.php">Inicio</a>
<a href="tareas.php">Tareas</a>
<a href="encuestas.php">Encuestas</a>
<a href="logout.php">Salir</a>
</nav>

<h2 style="text-align:center;">Encuesta Estudiantil UTC</h2>

<form action="guardar_encuesta.php" method="POST">

<input type="hidden" name="id_encuesta" value="<?= $encuesta['id'] ?>">
<input type="hidden" name="id_usuario" value="<?= $_SESSION['usuario'] ?>">

<p><strong><?= $encuesta['titulo'] ?></strong></p>
<p><?= $encuesta['descripcion'] ?></p>
<hr><br>

<label>¿El profesor explica con claridad?</label><br>
<select name="p21" required>
<option value="5">Excelente</option>
<option value="4">Bueno</option>
<option value="3">Regular</option>
<option value="2">Malo</option>
<option value="1">Muy malo</option>
</select><br><br>

<label>¿Entrega retroalimentación?</label><br>
<select name="p22" required>
<option value="5">Sí, siempre</option>
<option value="4">Casi siempre</option>
<option value="3">A veces</option>
<option value="2">Rara vez</option>
<option value="1">Nunca</option>
</select><br><br>

<label>¿Cumple con los tiempos de clase?</label><br>
<select name="p23" required>
<option value="5">Excelente</option>
<option value="4">Bueno</option>
<option value="3">Regular</option>
<option value="2">Malo</option>
<option value="1">Muy malo</option>
</select><br><br>

<label>¿Recomendarías este curso?</label><br>
<select name="p24" required>
<option value="5">Sí, mucho</option>
<option value="4">Sí</option>
<option value="3">Neutral</option>
<option value="2">Poco</option>
<option value="1">Nada</option>
</select><br><br>

<label>Fortalezas del profesor:</label>
<textarea name="fortalezas"></textarea><br><br>

<label>Áreas de mejora:</label>
<textarea name="mejoras"></textarea><br><br>

<button type="submit">✅ Enviar Encuesta</button>

</form>

</body>
</html>
