<?php
    include_once('conexion.php');

    $cedula = $_POST['c'];

    $query = "DELETE FROM icar_personas WHERE cedula='$cedula'";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));
?>