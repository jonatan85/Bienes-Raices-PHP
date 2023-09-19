<?php 

    require 'includes/funciones.php';
    incluirTemplates('header');    
?>
    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jepg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Texto Entrada Blog">
        </picture>

        <h2>Rellene el Formulario</h2>

        <form action="" class="formulario">
            <!-- fildset se asocia a un campo relaccionado -->
            <fieldset>
                <legend>Imformacion Personal</legend>
                <!-- Label y input se relaccionan con el for y el id -->
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">
                
                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" id="email">
                
                <label for="telefono">Teléfono</label>
                <input type="tel" placeholder="Tu Telefono" id="telefono">
                
                <label for="mensaje">Mensaje:</label>
                <textarea  id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la Propiedad</legend>

                <label for="opciones">Vende o Compra</label>
                <select name="" id="opciones">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Información sobre la Propiedad</legend>

                <p>Como desea ser Contactado</p>

                <div class="forma-contacto">
                    <!-- Radio mas name con la misma clase html solo te deja elegir una de las opciones -->
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" name="telefono" id="contactar-telefono">

                    <label for="contactar-email">Email</label>
                    <input name="contacto" type="radio" name="email" id="contactar-email">
                </div>

                <p>Si eligió teléfono, elija la fecha y la hora</p>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00">

            </fieldset>

            <input type="submit" value="submit" class="boton-verde">

        </form>
    </main>
    <?php incluirTemplates('footer'); ?>

</body>
</html>