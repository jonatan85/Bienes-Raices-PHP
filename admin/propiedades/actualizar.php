<?php
     require '../../includes/funciones.php';
     $auth = estaAutenticado();

     if(!$auth) {
        header('Location: /');
    }

    //Conexión base de datos.
    require '../../includes/config/databases.php';
    $db = conectarDB();
      

    // VALIDAR QUE EL ID SEA UN ID VALIDO
    // Obtener el id que hemos enviado desde el index con el boton actualizar
    $id = $_GET['id'];
    // Validamos el id para que nadie le pase una cadena de texto o otro valor
    $id = filter_var($id, FILTER_VALIDATE_INT);

    // Si intenta añadir un valor que no sea un id les redirigimos a admin
    if(!$id) {
        header('Location: /admin');
    }

    // Obtener los datos de la propiedad
    $consultaGet = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultadoGet = mysqli_query($db, $consultaGet);
    $propiedad = mysqli_fetch_assoc($resultadoGet);


    // Consultar para obtener datos de vendedores de la base de datos
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = [];

    // Alamacenar los datos para que al recargar no tener rellenar todos los apartados
    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedores_id = $propiedad['vendedores_id'];
    $imagenPropiedad = $propiedad['imagen'];
    

    // Este server contiene mucha informacion.
    // echo "<pre>";
    //     var_dump($_SERVER["REQUEST_METHOD"]);
    // echo "</pre>";

    // Ejecutar el codigo despues de que el usuario envie el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        // Para imagenes
        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";



        // mysqli_real_escape_string (1)
        $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
        $wc = mysqli_real_escape_string( $db, $_POST['wc'] );
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
        $creado = date('Y-m-d');
        $vendedores_id = mysqli_real_escape_string( $db, $_POST['vendedor'] );
        $imagen = $_FILES['imagen'];

        if(!$titulo) {
            $errores[] = 'Debes añadir un titulo';
        }

        if(!$precio) {
            $errores[] = 'Debes añadir un precio';
        }

        if(strlen($descripcion) < 10) {
            $errores[] = 'Debes añadir una descripción o debe contener más de cincuenta caracteres';
        }

        if(!$habitaciones) {
            $errores[] = 'Debes añadir un numero de habitaciones';
        }

        if(!$wc) {
            $errores[] = 'Debes añadir un numero de wc';
        }

        if(!$estacionamiento) {
            $errores[] = 'Debes añadir un numero de estacionamiento';
        }

        if(!$vendedores_id) {
            $errores[] = 'Debes añadir elegir un vendedor';
        }


        // Validar por tamaño imagen kb no pude ser mayor de 100kb
        $medida = 1000 * 1000;

        if(!$imagen['size'] > $medida) {
            $errores[] = 'La Imagen es my pesada';
        }

        // Revisar que el array de errores este vacio
        if(empty($errores)) {

        // SUBIDA DE ARCHIVOS
            // Crear carpeta relativa
            $carpetaImagenes = '../../imagenes/';
            // Negando is_dir hacemos que si la carpeta no existe la cree y si existe no la vuelva a crear. 
            // is_dir (3)
            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            // Borrar la imagen anterios si añadimos otra nueva
            if($imagen['name']) {
                // Eliminar la imagen previa
                unlink($carpetaImagenes . $propiedad['imagen']);

                // Generar un nombre unico para cada imagen, este genera un numero aleatorio para nombrar un archivo con un nombre diferente cada vez que subamos una imagen
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
    
                // Subir la imagen, añadirla a la carpeta imagenes move_uploaded_file(4)
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/" . $nombreImagen  );
            } else {
                $carpetaImagenes . $propiedad['imagen'];
            }

          

            // Insertar en la base de datos
            $query = 
                " UPDATE propiedades SET titulo = '${titulo}' , precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedores_id = ${vendedores_id} WHERE id = ${id}
                 ";
            
            // echo $query;

            $resultado = mysqli_query($db, $query);
    
            if($resultado) {
                // Redireccionar a el usuario
                header('Location: /admin?resultado=2');

            }
        }

    }

   
    incluirTemplates('header');    
?>    
    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>    
                                                                                    <!--enctype="multipart/form-data"(2)  -->
        <form class="formulario" method="POST"  enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo ;?>" >
                
                <label for="precio">Precio</label>
                <input type="nunber" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio ;?>" >

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
                
                <img src="/imagenes/<?php echo $imagenPropiedad; ?>" class="imagen-small">

                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion"> <?php echo $descripcion ;?> </textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedades</legend>

                <label for="habiaciones">Habitaciones</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones;?>" >

                <label for="wc">WC</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc ;?>" >

                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento ;?>">
            </fieldset>

            <fieldset>
                <legend>Vandedor</legend>

                <select name="vendedor">
                    <option value="">-- Elige un Vendedor --</option>
                        <?php while($vendedor = mysqli_fetch_assoc($resultado) ): ?>
                            <option <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>">
                            <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?>
                    </option>
                        <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Actulizar Propiedad" class="boton boton-verde">
        </form>
    </main>

    <?php incluirTemplates('footer'); ?>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>


<!--(1) mysqli_real_escape_string es una función en PHP que se utiliza para escapar (o "limpiar") las cadenas de texto que se van a insertar en una consulta SQL antes de ejecutarla en una base de datos MySQL. Su función principal es prevenir la inyección de SQL, que es un tipo de ataque en el que un atacante intenta manipular una consulta SQL para acceder o alterar datos en la base de datos de manera no autorizada.

La función mysqli_real_escape_string toma dos argumentos:

La conexión a la base de datos MySQL a través de la extensión mysqli.
La cadena de texto que se desea escapar.
La función devuelve la cadena de texto escapada, que se puede usar de manera segura en una consulta SQL sin el riesgo de introducir código malicioso. -->

<!-- (2) La propiedad enctype con el valor "multipart/form-data" es un atributo de un formulario HTML utilizado para especificar cómo se codificará el contenido de un formulario antes de ser enviado al servidor web. Es especialmente importante cuando se envían archivos binarios, como imágenes o archivos de video, a través de un formulario.

Cuando un formulario tiene enctype="multipart/form-data", significa que el navegador web codificará los datos del formulario y los archivos adjuntos de una manera especial, conocida como codificación multiparte (multipart encoding). Esto es necesario porque los archivos adjuntos pueden contener datos binarios y, por lo tanto, no pueden codificarse de la misma manera que los datos de texto simple. -->

<!-- (3) is_dir es una función en PHP que se utiliza para comprobar si una ruta especificada corresponde a un directorio en el sistema de archivos del servidor. La función devuelve true si la ruta es un directorio válido y existe, y false si no lo es o si ocurre algún error. -->

<!-- (4) 
move_uploaded_file es una función en PHP que se utiliza para mover un archivo cargado (subido) desde una ubicación temporal (donde se almacena inicialmente después de cargarse desde un formulario HTML) a una ubicación permanente en el servidor de archivos. Esta función es comúnmente utilizada cuando se trabaja con formularios web que permiten a los usuarios cargar archivos, como imágenes, documentos, archivos de audio, etc. -->
