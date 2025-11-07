<?php 
session_start(); 
include("conexion.php");
if(!isset($_SESSION['usuario'])){
    header("location: login.php");
}

$correo = $_SESSION['usuario'];

// Obtener nombre del usuario
$usuario = mysqli_query($conexion,"SELECT nombre FROM usuarios WHERE correo='$correo'");
$usuario = mysqli_fetch_assoc($usuario);
$nombre = $usuario['nombre'];

?>
<!DOCTYPE html>
<html>
<head>
<title>Pagos - Portal Estudiantil</title>

<style>
    body{
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: #8fe3e3;
    }

    /* NAVBAR */
    nav{
        background: #005f8f;
        padding: 10px;
        text-align: center;
    }

    nav a{
        color: white;
        text-decoration: none;
        font-weight: bold;
        padding: 8px 12px;
        border-radius: 5px;
        transition: 0.3s;
        margin: 0 5px;
    }

    nav a:hover{
        background: rgba(255,255,255,0.25);
    }

    h2{
        color: #000;
        text-align: center;
        margin-top: 30px;
        font-size: 28px;
    }

    /* TARJETA RESUMEN */
    .resumen{
        width: 60%;
        margin: auto;
        background: #fff;
        padding: 15px;
        text-align: center;
        border-radius: 10px;
        font-size: 20px;
        box-shadow: 0 0 8px rgba(0,0,0,0.2);
        margin-top: 20px;
    }

    /* TABLA */
    .tabla{
        width: 80%;
        margin: auto;
        background: white;
        border-radius: 10px;
        box-shadow: 0 0 8px rgba(0,0,0,0.3);
        padding: 20px;
        margin-top: 30px;
    }

    table{
        width: 100%;
        border-collapse: collapse;
        text-align: center;
        font-size: 18px;
    }

    th{
        background: #005f8f;
        color: white;
        padding: 10px;
    }

    td{
        padding: 8px;
        border-bottom: 1px solid #ccc;
    }

    .pendiente{
        color: red;
        font-weight: bold;
    }

    .pagado{
        color: green;
        font-weight: bold;
    }

    /* BOTONES */
    .btn{
        background: #005f8f;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn:hover{
        background: #007bbb;
        transform: scale(1.05);
    }

    /* HISTORIAL */
    .historial{
        width: 80%;
        margin: auto;
        margin-top: 20px;
        background: #fff;
        border-radius: 10px;
        padding: 15px;
        box-shadow: 0 0 8px rgba(0,0,0,0.3);
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

<h2>💰 Estado de Pagos Académicos</h2>

<div class="resumen">
<?php
$adeudos = 1;
if($adeudos > 0){
    echo "<span style='color:red;'>⚠ Tienes pagos pendientes</span>";
}else{
    echo "<span style='color:green;'>✅ Estás al corriente</span>";
}
?>
</div>

<div class="tabla">
<table>
<tr>
    <th>Concepto</th>
    <th>Monto</th>
    <th>Estado</th>
    <th>Vencimiento</th>
    <th>Acciones</th>
</tr>

<tr>
    <td>Colegiatura Mes Actual</td>
    <td>$1,150 MXN</td>
    <td class="pendiente">Pendiente ❌</td>
    <td>15/11/2025</td>
    <td>
        <button class="btn">Pagar</button>
    </td>
</tr>

<tr>
    <td>Inscripción</td>
    <td>$1,200 MXN</td>
    <td class="pagado">Pagado ✅</td>
    <td>---</td>
    <td>
        <button class="btn">Descargar recibo</button>
    </td>
</tr>

</table>
</div>

<div class="historial">
<h3>📜 Historial de pagos</h3>
<ul>
    <li>Reposición credencial - Pagado ✅</li>
    <li>Colegiatura Agosto - Pagado ✅</li>
    <li>Colegiatura Septiembre - Pagado ✅</li>
</ul>

<br>
<button class="btn">Subir comprobante</button>
</div>

</body>
</html>
