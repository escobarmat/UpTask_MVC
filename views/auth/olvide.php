<div class="contenedor olvide">
    <?php include_once __DIR__ . "/../templates/nombre-sitio.php"; ?>


    <div class="contenedor-sm">
        <p class="descripcion-pagina">Recupera tu Acceso UpTask</p>
        <?php include_once __DIR__ . "/../templates/alertas.php"; ?>

        <form action="/olvide" class="formulario" method="POST">
            
            <div class="campo">
                <label for="email">Email</label>
                <input 
                type="email"
                name="email" 
                id="email"
                placeholder="Tu Email"
                >
            </div>
            
            <input type="submit" class="boton" value="Enviar Instrucciones">
        </form>

        <div class="acciones">
            <a href="/">¿Ya tiene cuenta? Iniciar Sesión</a>
            <a href="/crear">¿Aún no tienes una cuenta? Obtener una</a>
        </div>
    </div><!--contenedor sm -->
</div>