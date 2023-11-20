<?php
    include_once('conexion.php');

    $vehiculo = $_POST['vehiculo'];
    $repuestos = $_POST['repuestos'];
    $estado = $_POST['estado'];
    $mecanico = $_POST['mecanico'];

    $query = "INSERT INTO icar_registro(vehiculo, repuesto, estado, mecanico) VALUES ('$vehiculo', '$repuestos', '$estado', '$mecanico')";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));
?>