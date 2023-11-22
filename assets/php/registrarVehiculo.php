<?php
    include_once('conexion.php');

    if(!file_exists("img")){
        mkdir("img");
    }

    if(empty($_POST['matricula']) || empty($_POST['descripcion']) || empty($_POST['marca']) || empty($_POST['modelo']) || empty($_POST['tipo']) || empty($_POST['year']) || empty($_POST['clasificacion']) || empty($_POST['cedulaCliente'])){
        echo 'Asegúrese de que todos los campos hayan sido llenados.';
    } else{
        $matricula = $_POST['matricula'];
        $descripcion = $_POST['descripcion'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $tipo = $_POST['tipo'];
        $year = $_POST['year'];
        $clasificacion = $_POST['clasificacion'];
        $cedulaCliente = $_POST['cedulaCliente'];

        if(isset($_FILES['imagen'])){
            if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
                $imagen = $_FILES['imagen'];
                $nombre = $imagen['name'];
                $type = $imagen['type'];
                $ruta_provisional = $imagen['tmp_name'];
                $size = $imagen['size'];
                $dimensiones = getimagesize($ruta_provisional);
                $width = $dimensiones[0];
                $height = $dimensiones[1];
                $carpeta = "img/";
                // if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jepg' && $tipo != 'image/png' && $tipo != 'image/gif'){
                //     echo 'El archivo no es una imagen.';
                // } 
                if($size > 3*1024*1024){
                    echo 'El tamaño máximo permitido es de 3 MB.';
                } else{
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $imagen = 'assets/php/img/'.$nombre;
                    $query = "INSERT INTO icar_vehiculos VALUES ('$matricula', '$descripcion', '$imagen', '$marca', '$modelo', '$tipo', '$year', '$clasificacion', '$cedulaCliente')";
                    $rs = mysqli_query($con, $query) or die("Error con la Base de Datos: ".mysqli_error($con));
                }
            } else{
                echo 'Asegúrese de que todos los campos hayan sido llenados.';
            }
        }
    }
?>