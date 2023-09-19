<!-- IMPORTANTE UNA VEZ CREEMOS EL PRIMAR USUARIO EN LA BASE DE DATOS ESTE ARCHIVO DEBE DE SER ELIMINADO -->
<?php 
    // Importar la conexion
    require 'includes/config/databases.php';
    $db = conectarDB();

    // Crear un email y password
    $email = "correo@correo.com";
    $password = "123456";
                                        // Se utiliza char por que los caracteres son fijos 
                                        // Por eso el char de el password en la base de datos es de 60 caracteres.
    // Hasear el password con php         // PASSWORD_BCRYPT tambien es segura
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);


    // Query para crear el usuario
    $query = " INSERT INTO usuarios (email, password) VALUES ( '$email', '$passwordHash');";

    // echo $query;

    // Agregar a la base de datos
    mysqli_query($db, $query);
?>