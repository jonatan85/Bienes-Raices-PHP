<!-- Conexion a la base de datos. -->
<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', '', 'vienes_raices_crud');

    if(!$db){
        echo 'Error no se pudo conectar';
        exit;
    }
    
    return $db;
}
