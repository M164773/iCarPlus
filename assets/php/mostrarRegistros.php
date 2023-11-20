<?php
    include_once('conexion.php');

    $query = "SELECT * FROM icar_registro";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));
    $json = array();
    while($fila = mysqli_fetch_array($rs)){
        $json[] = array(
            'id' => $fila['id'],
            'vehiculo' => $fila['vehiculo'],
            'repuesto' => $fila['repuesto'],
            'estado' => $fila['estado'],
            'mecanico' => $fila['mecanico']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>