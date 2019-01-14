<?php include_once 'includes/templates/header.php'; ?>

    <div class="contenedor">

        <section id="contacto">

            <h2>Contacto</h2>
            <form action="correo.php" method="post" id="formulario"  >

                <legend>Contáctanos llenando todos los campos</legend>
                <div class="contenedor-campos">

                    <div class="campo">
                        <label>Nombre</label>
                        <input type="text" name="nombre" placeholder="Nombre" >
                    </div>
                    <div class="campo">
                        <label>Teléfono</label>
                        <input type="text" name="telefono" placeholder="Teléfono" >
                    </div>
                    <div class="campo w-100">
                        <label>Correo</label>
                        <input type="text" name="correo" placeholder="Correo" data-validation="email">
                    </div>
                    <div class="campo w-100">
                        <label>Mensaje</label>
                        <textarea name="mensaje"></textarea>
                    </div>
                </div>
                <!--.contenedor de campos-->
                <div class="enviar box-footer">
                    <input type="submit" class="boton"  value="Enviar">
                </div>

            </form>
        </section>
    </div>

    <div id="mapa"></div>

    <?php include_once 'includes/templates/footer.php'; ?>
