<?php
include_once 'app/config.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/Usuario.inc.php';
$titulo = 'Registro';
include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/Redireccion.inc.php';

if (isset($_POST['enviar'])) {
    Conexion::abrir_conexion();
    $validador = new ValidadorRegistro($_POST['nombre'], $_POST['email'], $_POST['clave1'], $_POST['clave2'], Conexion::obtener_conexion());

    if ($validador->registro_valido()) {
        Conexion::abrir_conexion();
        $usuario = new Usuario('', $validador->getNombre(), 
                $validador->getEmail(), 
                password_hash($validador->getClave(),PASSWORD_DEFAULT), 
                '', 
                '');
        $usuario_insertado = RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);

        if ($usuario_insertado) {
            //Redirigir a registro-correcto
            Redireccion::redirigir(RUTA_REGISTRO_CORRECTO.'/'.$usuario->getNombre());
        }

        Conexion::cerrar_conexion();
    }
}
?>
<div class="container">
    <div class="jumbotron">
        <h1 class="text-center">Formulario de registro</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Instrucciones
                    </h3>
                </div>
                <div class="panel-body">
                    <br>
                    <p class="text-justify">
                        Para unirte al blog de Francisco, intruduce un nombre de usuario,
                        tu email y una contraseña. El email que escribas debe ser real
                        ya que lo necesitas para gestionar tu cuenta. Te recomendamos que uses
                        una contraseña que contenga letras ninúsculas, mayúsculas, números y símbolos.
                    </p>
                    <br>
                    <a href="#">¿Ya tienes cuenta ?</a>
                    <br>
                    <br>
                    <a href="#">¿Olvidaste tu contraseña?</a>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Introduce tus datos
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_REGISTRO ?>">
<?php
if (isset($_POST['enviar'])) {
    include_once 'plantillas/registro_validado.inc.php';
} else {
    include_once 'plantillas/registro_vacio.inc.php';
}
?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'plantillas/documento-cierre.int.php';
?>
