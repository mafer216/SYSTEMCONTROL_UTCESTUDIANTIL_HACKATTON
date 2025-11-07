<?php
include("conexion.php");

// Consulta para obtener las calificaciones
$consulta = "SELECT materia, calificacion, estatus FROM calificaciones";
$resultado = mysqli_query($conexion, $consulta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calificaciones</title>
    <style>
        table {
            width: 70%;
            margin: auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 9px;
            text-align: center;
            font-family: Arial;
        }
        th {
            background-color: #277aff;
            color: white;
        }
        .aprobado {
            background-color: #b1ffb1;
            font-weight: bold;
        }
        .reprobado {
            background-color: #ffb1b1;
            font-weight: bold;
        }
        .btn-pdf{
            margin-top:20px;
            display:block;
            width:200px;
            text-align:center;
            background:#277aff;
            color:white;
            padding:10px;
            border-radius:7px;
            text-decoration:none;
            font-family:Arial;
            margin:auto;
        }
        .btn-pdf:hover{
            background:#1757c9;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;font-family:Arial;">Calificaciones del Alumno</h2>

<table>
    <tr>
        <th>Materia</th>
        <th>Calificación</th>
        <th>Estatus</th>
    </tr>

    <?php while($fila = mysqli_fetch_assoc($resultado)) { ?>
        <tr class="<?php echo ($fila['calificacion'] >= 70) ? 'aprobado' : 'reprobado'; ?>">
            <td><?php echo $fila['materia']; ?></td>
            <td><?php echo $fila['calificacion']; ?></td>
            <td><?php echo $fila['estatus']; ?></td>
        </tr>
    <?php } ?>
</table>

<!-- ✅ Botón para descargar PDF -->
<a class="btn-pdf" href="generar_pdf.php" target="_blank">Descargar PDF</a>

</body>
</html>
