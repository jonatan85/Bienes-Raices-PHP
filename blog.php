<?php 

    require 'includes/funciones.php';
    incluirTemplates('header');    
?>    
    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jepg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el Techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el:<span>20/10/2021</span> por: <span>Admin</span></p>

                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, 
                        soluta dolor deleniti ut nisi.

                    </p>
                </a>
            </div>
        </article> <!-- Fin de article -->
        
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jepg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la Decoración de tu Hogar</h4>
                    <p class="informacion-meta">Escrito el:<span>20/10/2021</span> por: <span>Admin</span></p>

                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, 
                        soluta dolor deleniti ut nisi.

                    </p>
                </a>
            </div>
        </article> <!-- Fin de article -->

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jepg">
                    <img loading="lazy" src="build/img/blog3.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el Techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el:<span>20/10/2021</span> por: <span>Admin</span></p>

                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, 
                        soluta dolor deleniti ut nisi.

                    </p>
                </a>
            </div>
        </article> <!-- Fin de article -->
        
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpg" type="image/jepg">
                    <img loading="lazy" src="build/img/blog4.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la Decoración de tu Hogar</h4>
                    <p class="informacion-meta">Escrito el:<span>20/10/2021</span> por: <span>Admin</span></p>

                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, 
                        soluta dolor deleniti ut nisi.

                    </p>
                </a>
            </div>
        </article> <!-- Fin de article -->
    </main>

    <?php incluirTemplates('footer'); ?>

</body>
</html>