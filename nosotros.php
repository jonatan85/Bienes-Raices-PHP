<?php 

    require 'includes/funciones.php';
    incluirTemplates('header');    
?>
    
    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="imagen/webp">
                    <source srcset="build/img/nosotros.jpg" type="imagen/jepg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de Experiencia
                </blockquote>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque natus iure adipisci, eos nulla nemo id beatae quisquam repellat ratione tempore et suscipit, ullam laboriosam nisi laudantium mollitia, voluptatem reiciendis? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem veritatis autem voluptate aut vitae laudantium doloribus neque corrupti saepe cum. Minus quos amet iusto, impedit natus debitis. Ipsum, totam consequuntur! Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, veritatis numquam, provident et voluptatibus doloremque ipsum cum dolorum nobis ipsa facilis exercitationem molestiae ipsam iste, alias velit pariatur officia quasi.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus sed praesentium impedit. Illo, animi eos! Beatae suscipit quaerat praesentium minima alias repellat animi exercitationem nulla, molestias, rerum earum, laboriosam nesciunt?</p>

            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, officia veritatis magni rerum perferendis asperiores, eius fugiat
                    , assumenda placeat labore illum veniam minima consequuntur porro quis saepe quisquam nemo numquam!
                </p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, officia veritatis magni rerum perferendis asperiores, eius fugiat
                    , assumenda placeat labore illum veniam minima consequuntur porro quis saepe quisquam nemo numquam!
                </p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore, officia veritatis magni rerum perferendis asperiores, eius fugiat
                    , assumenda placeat labore illum veniam minima consequuntur porro quis saepe quisquam nemo numquam!
                </p>
            </div>
        </div>
    </section>

    <?php incluirTemplates('footer'); ?>

</body>
</html>