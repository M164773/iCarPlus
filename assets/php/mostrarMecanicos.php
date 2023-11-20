<?php
    include_once('conexion.php');

    $query = "SELECT * FROM icar_personas WHERE tipo='M'";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));
    $json = array();
    while($fila = mysqli_fetch_array($rs)){
        $json[] = array(
            'id' => $fila['id'],
            'cedula' => $fila['cedula'],
            'nombre' => $fila['nombre'],
            'correo' => $fila['correo']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>