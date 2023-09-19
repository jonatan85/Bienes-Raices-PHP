<?php 

    require 'includes/funciones.php';
    incluirTemplates('header');    
?>    
    <main class="contenedor seccion">
        <?php
            $limite = 6;
            include 'includes/templates/anuncios.php';
        ?>
    </main>

    <?php incluirTemplates('footer'); ?>

  
</body>
</html>