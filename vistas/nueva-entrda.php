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

    $validador = new ValidadorEntrada($_POST['titulo'], $_POST['url'], htmlspecialchars($_POST['texto']), Conexion::obtener_conexion());
    if (isset($_POST['publicar']) && $_POST['publicar'] == 'si') {
        $entrada_publica = 1;
    }

    if ($validador->entrada_valida()) {
        if (ControlSesion::sesion_inicada()) {
            $entrada = new Entrada('', $_SESSION['id_usuario'], $validador->getUrl(), $validador->getTitulo(), $validador->getTexto(), '', $entrada_publica);
            $entrada_insertada = RepositorioEntrada::insertar_entrada(Conexion::obtener_conexion(), $entrada);
            if ($entrada_insertada) {
                Redireccion::redirigir(RUTA_GESTOR_ENTRADAS);
            } else {
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
                <?php
                if (isset($_POST['guardar'])) {
                    include_once 'plantillas/form_entrada_validado.inc.php';
                } else {
                    include_once 'plantillas/form_nueva_entrada_vacio.inc.php';
                }
                ?>  

            </form>

        </div>
    </div>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
?>
