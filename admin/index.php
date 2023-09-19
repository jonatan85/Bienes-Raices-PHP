<?php
    // Comprovamos que el usuario este autenticado si no le restringimos el acceso con un if
    // session_start();

    // $auth = $_SESSION['login'];

    require '../includes/funciones.php';
    $auth = estaAutenticado();

    if(!$auth) {
        header('Location: /');
    }

    // Pasos para hacer una peticion a una base de datos
    // Importar la conexion
    require '../includes/config/databases.php';
    $db = conectarDB();

    // Escribir el Query
    $query = "SELECT * FROM propiedades";
    // Consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);
    
    // Muestra un mensaje condicional
    $resultado = $_GET['resultado'] ?? null;

    // Eliminar 
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        
        if($id) {
            // Elimianar el archivo
            $query = "SELECT imagen FROM propiedades WHERE id = $id";

            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);

            unlink('../imagenes/' . $propiedad['imagen']);
   

            // Eliminar la propiedad
            $query = "DELETE FROM propiedades WHERE id = $id";

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                header('location: /admin?resultado=3');
            }
        }
    }

    // Incluye un template
    
    incluirTemplates('header');    
?>    
    <main class="contenedor seccion">
        <h1>Administrador de Vienes Raices</h1>
        <?php if( intval( $resultado ) === 1 ): ?>
        <p class="alerta exito"> Anuncio creado correctamente </p>  
        <?php elseif( intval( $resultado ) === 2 ): ?>
        <p class="alerta exito"> Anuncio actualizado correctamente </p>
        <?php elseif( intval( $resultado ) === 3 ): ?>
        <p class="alerta exito"> Anuncio eliminado correctamente </p>
        <?php endif; ?>    
        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
    </main>

    <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!-- Mostrar los resultados -->
                <?php while( $propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td> <?php echo $propiedad['id']; ?> </td>
                    <td> <?php echo $propiedad['titulo'] ?> </td>
                    <td><img src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="casa en la playa" class="imagen-tabla"></td>
                    <td> <?php echo $propiedad['precio'] ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id'] ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a class="boton-amarillo-block" href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
    </table>
    
    
    <?php 
        // Cerrar la conexion
        mysqli_close($db);       
        
        incluirTemplates('footer'); 
    
    ?>

</body>
</html>