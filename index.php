<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioComentario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioUsuario.inc.php';



$componentes_url = parse_url($_SERVER['REQUEST_URI']);

$ruta = $componentes_url['path'];

$partes_ruta = explode("/", $ruta);

$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = 'vistas/404.php';

if ($partes_ruta[0] == 'blog') {
    if (count($partes_ruta) == 1) {
        $ruta_elegida = 'vistas/home.php';
    } else if (count($partes_ruta) == 2) {
        switch ($partes_ruta[1]) {
            case 'login':
                $ruta_elegida = 'vistas/login.php';
                break;
            case 'logout':
                $ruta_elegida = 'vistas/logout.php';
                break;
            case 'registro':
                $ruta_elegida = 'vistas/registro.php';
                break;
             case 'gestor':
                $ruta_elegida = 'vistas/gestor.php';
                 $gestor_actual ='';
                break;
            case 'relleno-dev':
                $ruta_elegida = 'vistas/script-relleno.php';
                break;
            case 'nueva-entrada':
                $ruta_elegida = 'vistas/nueva-entrda.php';
                break;;
        }
    } elseif (count($partes_ruta) == 3) {
        if ($partes_ruta[1] == 'registro-correcto') {
            $nombre = $partes_ruta[2];
            $ruta_elegida = 'vistas/registro-correcto.php';
        }if ($partes_ruta[1] == 'entrada') {
            $url = $partes_ruta[2];
            Conexion::abrir_conexion();
            $entrada = RepositorioEntrada::obtener_entrada_por_url(Conexion::obtener_conexion(), $url);

            if ($entrada != null) {
                $autor = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $entrada->getAutor_id());
                $comentarios = RepositorioComentario::obtener_cometarios(Conexion::obtener_conexion(), $entrada->getId());
                $entradas_azar = RepositorioEntrada::obtener_entradas_alazar(Conexion::obtener_conexion(), 3);
                
                $ruta_elegida = 'vistas/entrada.php';
            }
        }
        if($partes_ruta[1] = 'gestor'){
            switch ($partes_ruta[2]){
                case 'entradas':
                    $gestor_actual = 'entradas';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
                case 'comentarios':
                    $gestor_actual ='comentarios';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
                case 'favoritos':
                    $gestor_actual = 'favoritos';
                    $ruta_elegida = 'vistas/gestor.php';
                    break;
            }
        }
    }
}

include_once $ruta_elegida;

