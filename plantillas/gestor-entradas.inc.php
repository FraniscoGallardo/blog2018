<div class="row parte-gestor-entradas">
    <div class="col-md-12">
        <h2>Gestion de entradas</h2>
        <br>
        <a href="<?php echo RUTA_NUEVA_ENTRADA  ?>" class="btn btn-lg btn-primary" role="button" id="boton-nueva-entrada">Crear entrada</a>
        <br>
        <br>
    </div>
</div>
<div class="row parte-gestor-entradas">
    <div class="col-md-12">
        <?php
        if (count($array_entradas > 0)) {
            ?>
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Título</th>
                        <th>Estado</th>
                        <th>Comentarios</th>
                        <th>Acciones</th>                  
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($array_entradas); $i++) {
                        $entrada_actual = $array_entradas[$i][0];
                        $comentarios_entrada_actual = $array_entradas[$i][1];
                        ?>
                        <tr>
                            <td><?php echo $entrada_actual->getFecha();?></td>
                            <td><?php echo $entrada_actual->getTitulo();?></td>
                            <td><?php echo $entrada_actual->getActiva();?></td>
                            <td><?php echo $comentarios_entrada_actual; ?></td>
                            <td>
                                <button type="button" class="btn btn-default btn-xs">Editar</button>
                                <button type="button" class="btn btn-default btn-xs">Editar</button>
                            </td>
                        <tr/>
                            <?php
                        }
                        ?>

                </tbody>
            </table>
            <?php
        } else {
            ?>
            <h3 class="text-center">Todavia no has escrito nunguna entrada </h3>
            <br>
            <br>
            <?php
        }
        ?>

    </div>
</div>