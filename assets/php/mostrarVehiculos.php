<?php
    include_once('conexion.php');

    $query = "SELECT * FROM icar_vehiculos";
    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));
    $json = array();
    while($fila = mysqli_fetch_array($rs)){
        $json[] = array(
            'matricula' => $fila['matricula'],
            'descripcion' => $fila['descripcion'],
            'imagen' => $fila['imagen'],
            'marca' => $fila['marca'],
            'modelo' => $fila['modelo'],
            'tipo' => $fila['tipo'],
            'year' => $fila['year'],
            'clasificacion' => $fila['clasificacion'],
            'cedulaCliente' => $fila['cedula_cliente']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>