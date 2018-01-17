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

include_once 'plantillas/documento-cierre.inc.php';


?>