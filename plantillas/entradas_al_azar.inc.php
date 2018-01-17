<?php
include_once 'app/EscritorEntradas.inc.php';
?>
<div class="row">
    <div class="col-md-12">
        <hr>
        <h3>Otras entradas interesantes</h3>
    </div>
    
    <?php
    for ($i = 0; $i < count($entradas_azar); $i++) {
        $entrada_actual = $entrada[$i];
        ?>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $entrada_actual->getTitulo(); ?>
                </div>
                <div class="panel-body">
                    <p>
                        <?php echo EscritorEntradas::resumir_texto(nl2br($entrada_actual->getTexto)); ?>
                    </p>
                </div>
            </div>
        </div>

        <?php
    }
    ?>
    <div class="col-md-12">
        <hr>
    </div>
</div>
