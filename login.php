<?php 
    // Conexión a la base de datos
    require 'includes/config/databases.php';
    $db = conectarDB();

    // Autenticar el usuario

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        // mysqli_real_escape_string para interactuar con las base de datos
        // Pasamos el email que recibimos de el formulario mediante la superglobal post y lo validamos
        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        // Verificar que las verificadiones sean correctas o no esten vacias
        if(!$email) {
            $errores[] = "El email es obligatorio o no es válido";
        }

        if(!$password) {
            $errores[] = 'El password es obligatorio o no es válido';
        }

        if(empty($errores)) {

            // Revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '$email' ";
            $resultado = mysqli_query($db, $query);
            // var_dump($resultado);

            // Si el usuario existe, revisamos si el password es correcto
            if( $resultado->num_rows ) {
                // Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);

                // Verificar si el password es correcto o no
                $auth = password_verify($password, $usuario['password']);

                if($auth) {
                    // Para verificar que el usuario esta autenticado usamos la superglobal $_SESSION
                    // El usuario esta autenticado
                    session_start();

                    // Llenar el arreglo de la sesion
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');

                } else {
                    $errores[] = "El Password es incorrecto";
                }
            } else {
                $errores[] = "El Usuario no existe";
            }
        }
    }

    // Incluye el header
    require 'includes/funciones.php';
    incluirTemplates('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>    

        <form method="POST" class="formulario">

        <fieldset>
                <legend>Email y Password</legend>
                      
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Tu Email" id="email" require>
                
                <label for="password">Teléfono</label>
                <input type="password" name="password" placeholder="Tu Password" id="password" require>
         
            </fieldset>
            
            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

        </form>
    </main>

<?php 
    incluirTemplates('footer');
?>