<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("location: login.php");
    exit();
}

require_once "conexion.php";

// Enviar mensaje
if(isset($_POST['mensaje']) && $_POST['mensaje'] != ""){
    $usuario = $_SESSION['usuario'];
    $mensaje = $_POST['mensaje'];
    mysqli_query($conexion, "INSERT INTO chat (usuario, mensaje) VALUES ('$usuario', '$mensaje')");
    header("Location: chat.php");
    exit();
}

// Mostrar mensajes
$result = mysqli_query($conexion, "SELECT * FROM chat ORDER BY fecha ASC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Chat Estudiantil</title>

<style>
body{
    font-family: Arial;
    background: #c6f1ef;
    margin: 0;
    padding: 0;
}

nav{
    background: #006c9c;
    padding: 12px;
    text-align: center;
}

nav a{
    color: white;
    text-decoration: none;
    font-weight: bold;
    margin: 10px;
}

/* Caja del chat */
.chat-box{
    width: 80%;
    margin: 25px auto;
    background: white;
    padding: 20px;
    height: 400px;
    overflow-y: scroll;
    border-radius: 10px;
    box-shadow: 0 0 10px #00000025;
}

/* Mensajes */
.mensaje{
    background: #e2f3ff;
    padding: 10px;
    margin: 5px 0;
    border-radius: 7px;
}

.mensaje span{
    font-weight: bold;
    color: #005f8f;
}

/* Formulario */
form{
    width: 80%;
    margin: auto;
}

input{
    width: 85%;
    padding: 10px;
    border-radius: 7px;
    border: 1px solid #aaa;
}

button{
    padding: 10px 15px;
    border: none;
    background: #007bb3;
    color: white;
    border-radius: 7px;
    cursor: pointer;
    font-weight: bold;
}

button:hover{
    background: #005f8f;
}
</style>

</head>
<body>

<nav>
<a href="dashboard.php">Inicio</a>
<a href="calificaciones.php">Calificaciones</a>
<a href="tareas.php">Tareas</a>
<a href="encuestas.php">Encuestas</a>
<a href="pagos.php">Pagos</a>
<a href="chat.php">Chat</a>
<a href="logout.php">Salir</a>
</nav>

<h2 style="text-align:center;color:black;">💬 Chat Estudiantil</h2>

<div class="chat-box">
<?php while($row = mysqli_fetch_assoc($result)){ ?>
    <div class="mensaje">
        <span><?= $row['usuario'] ?>:</span> <?= $row['mensaje'] ?><br>
        <small style="color:gray;"><?= $row['fecha'] ?></small>
    </div>
<?php } ?>
</div>

<form action="" method="POST">
    <input type="text" name="mensaje" placeholder="Escribe un mensaje..." required>
    <button type="submit">Enviar</button>
</form>

</body>
</html>
