<?php
    include_once('conexion.php');

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $tipo = $_POST['tipo'];

    $query = "INSERT INTO icar_personas (cedula, nombre, correo, tipo) VALUES ('$cedula', '$nombre', '$correo', '$tipo')";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));

    if($tipo == 'C'){
        echo 'Cliente agregado.';
    } else{
        echo 'Mecánico agregado.';
    }
?>