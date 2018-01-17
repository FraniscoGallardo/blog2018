<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioComentario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioUsuario.inc.php';

$titulo = $entrada->getTitulo();
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>
<div class="container contenido-articulo">
    <div class ="row">
        <div>
            <h1>
                <?php echo $entrada->getTitulo(); ?> 
            </h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <p>
                Por 
                <a href="#">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $autor->getNombre(); ?>

                </a>
                el
                <?php echo $entrada->getFecha(); ?>
            </p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <article class="text-justify">
                <?php echo nl2br($entrada->getTexto()); ?>
            </article>
        </div>
    </div>
    <?php
    include_once 'plantillas/entradas_al_azar.inc.php';
    ?>
    <br>
    
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>