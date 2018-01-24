<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/Entrada.inc.php';

include_once 'app/ValidadorEntrada.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';
$titulo = "Nueva Entrada";
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

$entrada_publica = 0;
if (isset($_POST['guardar'])) {
    Conexion::abrir_conexion();

    $validador = new ValidadorEntrada($_POST['titulo'], $_POST['url'], htmospecialchars($_POST['texto']), Conexion::obtener_conexion());
    if (isset($_POST['publicar']) && $_POST['publicar'] == 'si') {
        $entrada_publica = 1;
    }

    if ($validador->entrada_valida()) {
        if (ControlSesion::sesion_inicada()) {
            $entrada = new Entrada('', $_SESSION['id_usuario'], $validador->getUrl(), $validador->getTitulo(), $validador->getTexto(), '', $entrada_publica);
            $entrada_insertada = RepositorioEntrada::insertar_entrada(Conexion::obtener_conexion(), $entrada);
            if ($entrada_insertada) {
                Redireccion:redirigir(RUTA_GESTOR_ENTRADAS);
                
            }else{
                Redireccion::redirigir(RUTA_LOGIN);
            }
        }
        Conexion::cerrar_conexion();
    }
    
}
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
