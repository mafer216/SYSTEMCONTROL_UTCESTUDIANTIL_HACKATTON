<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html>
<head>
<title>Portal Estudiantil UTC</title>

<style>
/* Fondo general */
body{
     
    background: url('alcon.png') center center fixed;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;

}

/* Centrado total */
.login-container{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Caja login */
.login-box{
    width: 330px;               
    padding: 25px;
    background: rgba(255,255,255,0.95);
    box-shadow: 0 0 12px rgba(0,0,0,0.3);
    border-radius: 12px;

    /* CENTRAR */
    position: absolute;
    top: 58%;                
    left: 50%;
    transform: translate(-50%, -50%);
}


/* Logo */
.logo{
    width: 120px;
    margin-bottom: 10px;
}

/* Título */
.login-box h2{
    color: #003366; /* azul oscuro */
}

/* Inputs */
.login-box input[type="text"],
.login-box input[type="password"]{
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border: 2px solid #003366;
    border-radius: 5px;
}

/* Botón */
.login-box input[type="submit"]{
    background: #003366;
    color: white;
    width: 95%;
    padding: 10px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
}

.login-box input[type="submit"]:hover{
    background: #005599;
}
</style>

</head>
<body>

<div class="login-container">

    <div class="login-box">
        <img src="UTC.png" class="logo" alt="UTC">


        <h2>Iniciar Sesión</h2>

        <form action="" method="POST">
            <input type="text" name="correo" placeholder="Correo" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="submit" name="login" value="Ingresar">
        </form>
    </div>

</div>

<?php
if(isset($_POST['login'])){
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $consulta = mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo='$correo' AND password='$password'");

    if(mysqli_num_rows($consulta) > 0){
        session_start();
        $_SESSION['usuario']=$correo;
        header("location: dashboard.php");
    } else {
        echo "<script>alert('Credenciales incorrectas');</script>";
    }
}
?>

</body>
</html>
