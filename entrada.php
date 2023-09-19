<?php 

    require 'includes/funciones.php';
    incluirTemplates('header');    
?>    
    <main class="contenedor seccion contenido-centrado ">
        <h1>Guia para la decoración de tu hogar</h1>

        
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jepg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la Propiedad">
        </picture>
        
        <p class="informacion-meta">Escrito el: <span>6/09/2023</span> por:<span>Jonatan Moreno Ramos</span></p>
        
        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque natus iure adipisci, eos nulla nemo id beatae quisquam repellat ratione tempore et suscipit, ullam laboriosam nisi laudantium mollitia, voluptatem reiciendis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem veritatis autem voluptate aut vitae laudantium doloribus neque corrupti saepe cum. Minus quos amet iusto, impedit natus debitis. Ipsum, totam consequuntur! Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, veritatis numquam, provident et voluptatibus doloremque ipsum cum dolorum nobis ipsa facilis exercitationem molestiae ipsam iste, alias velit pariatur officia quasi.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus sed praesentium impedit. Illo, animi eos! Beatae suscipit quaerat praesentium minima alias repellat animi exercitationem nulla, molestias, rerum earum, laboriosam nesciunt?</p>

        </div>
    </main>

    <?php incluirTemplates('footer'); ?>


</body>
</html>