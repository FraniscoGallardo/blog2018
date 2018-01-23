<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Usuario.inc.php';
$titulo = "Nueva Entrada";
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center"> Nueva entrada </h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="form-nueva-entrada" method="post" action="<?php echo RUTA_NUEVA_ENTRADA ?>">
                <div class="form-group">
                    <label for="titulo">Título </label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Inserta tu titulo"></input>
                </div>
                <div class="form-group">
                    <label for="url">Url </label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Dirección unica sin espacios para la entrada"></input>
                </div>
                <div class="form-group">
                    <label for="contenido">Contenido </label>
                    <textarea class="form-control" rows="10" id="contenido" name="texto" placeholder="Escribe aqui tu articulo"></textarea>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="publicar" value="si" value="Publica">Marca este recuadro si quieres que se publique de inmediato
                    </label> 
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="guardar">Guardar entrada</button>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
