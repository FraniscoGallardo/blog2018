<?php
ini_set('max_execution_time', 3000000);
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/Comentario.inc.php';

include_once 'app/RepositorioComentario.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/RepositorioUsuario.inc.php';

Conexion::abrir_conexion();

for ($usuarios = 0; $usuarios < 100; $usuarios++) {
    $nombre = sa(10);
    $email = sa(5) . '@' . sa(3);
    $password = password_hash('123456', PASSWORD_DEFAULT);

    $usuario = new Usuario('', $nombre, $email, $password, '', '');
    RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);
}

for ($entradas = 0; $entradas < 100; $entradas++) {
    $titulo = sa(10);
    $url= $titulo;
    $texto = lorem();
    $autor = rand(1, 100);

    $entrada = new Entrada('', $autor,$url, $titulo, $texto, '', '');
    RepositorioEntrada::insertar_entrada(Conexion::obtener_conexion(), $entrada);
}

for ($comentarios = 0; $comentarios < 100; $comentarios++) {
    $titulo = sa(10);
    $texto = lorem();
    $autor = rand(1, 100);
    $entrada = rand(1, 100);

    $comentario = new Comentario('', $autor, $entrada, $titulo, $texto, '');
    RepositorioComentario::insertar_comentario(Conexion::obtener_conexion(), $comentario);
}

function sa($longitud) {
    $caracteres = '0123456789abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';


    for ($i=0; $i < $longitud; $i++) {
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }
    return $string_aleatorio;
}

function lorem() {
    $lorem = '
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam rhoncus lectus dolor, ut elementum nulla euismod vitae. Sed at luctus risus. Vestibulum sollicitudin congue arcu non vehicula. Ut quis congue justo. Nullam nec metus orci. Fusce non aliquam arcu. Vivamus condimentum rhoncus enim sit amet accumsan. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel aliquet magna, vel viverra mi. Etiam eu nisl eget diam rhoncus sodales sit amet id purus.

    Quisque vel turpis vel lectus volutpat ultricies ac nec nisl. Cras eleifend maximus auctor. Integer nisl diam, placerat ut suscipit viverra, feugiat vel mauris. Sed euismod est non libero vehicula convallis. Suspendisse maximus libero non nunc rhoncus, sed convallis nisl pretium. Vestibulum volutpat vel nisl ultricies bibendum. Nam id ante sapien. Proin eros massa, auctor vitae interdum nec, pharetra eu arcu. Cras faucibus et nisl eget varius. Sed eu sagittis metus, sed imperdiet arcu. Donec ut neque est. Curabitur ultrices nisl et euismod bibendum. Nulla laoreet, mauris id ullamcorper vulputate, lacus nisi tempus tellus, ut pulvinar ante libero eget turpis. Suspendisse suscipit est ut orci tristique, non tincidunt neque aliquet. Nam dapibus elit lacus, vitae vehicula quam dapibus non.

    Aliquam suscipit imperdiet nisi vitae rutrum. Integer sed arcu eu nisl sollicitudin laoreet. Donec condimentum hendrerit augue vel efficitur. Nam tempor eros sit amet elit eleifend, eleifend bibendum libero egestas. Vestibulum iaculis odio tortor, consectetur auctor magna posuere vel. Mauris in arcu et quam ultricies facilisis. Quisque non velit ut tortor tempor auctor ultricies nec felis. Aenean tristique ante eget libero blandit, nec volutpat turpis gravida. Sed mollis erat eget suscipit maximus. Nam non ligula id justo pharetra tincidunt ac id eros. Quisque fringilla vel sem sit amet scelerisque. Ut lobortis nulla mauris, quis vestibulum velit bibendum volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.

    Nam volutpat tellus maximus volutpat posuere. Integer commodo dolor risus. Etiam tempus scelerisque ex non volutpat. Ut vehicula suscipit arcu non posuere. Donec dignissim metus vel vulputate commodo. Integer eget metus at nunc congue fringilla vitae sed nisi. Sed suscipit leo at eleifend scelerisque. Sed nec est augue. Nullam vehicula sapien purus, vel euismod ex finibus ut. Ut laoreet risus eu arcu fringilla, vel aliquam augue maximus. Aliquam quis nulla nec tellus tincidunt varius eu quis dui. Phasellus libero lectus, vestibulum ut semper et, dignissim vel felis. Nunc a eleifend sem. Praesent nec venenatis est. Morbi vitae ex risus.

    Aenean finibus elit ex, ut maximus lorem rutrum vel. Pellentesque odio quam, euismod ultricies mi id, tincidunt eleifend metus. Mauris auctor placerat quam, id luctus lacus condimentum id. Nunc eu suscipit neque. In mollis metus gravida arcu luctus, a consectetur magna ornare. Cras id urna nec orci auctor interdum et vel diam. Sed vel metus eu tortor euismod feugiat sit amet quis ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras fringilla tellus vel justo pellentesque tempus. ';
    return $lorem;
}
