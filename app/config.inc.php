<?php

//info de la base de datos
define('NOMBRE_SERVIDOR', 'localhost');
define('NOMBRE_USUARIO', 'root');
define('PASSWORD', '');
define('NOMBRE_BD', 'blog');

//rutas de la web
define("SERVIDOR", "http://localhost/blog");
define("RUTA_REGISTRO", SERVIDOR . "/registro");
define("RUTA_REGISTRO_CORRECTO", SERVIDOR . "/registro-correcto");
define("RUTA_LOGIN", SERVIDOR . "/login");
define("RUTA_ENTRADAS", SERVIDOR . "/entrada");
define("RUTA_FAVORITOS", SERVIDOR . "/favoritos");
define("RUTA_AUTORES", SERVIDOR . "/autores");
define("RUTA_LOGOUT",SERVIDOR."/logout");
define("RUTA_GESTOR",SERVIDOR."/gestor");
define("RUTA_GESTOR_ENTRADAS",RUTA_GESTOR."/entradas");
define("RUTA_GESTOR_COMENTARIOS",RUTA_GESTOR."/comentarios");
define("RUTA_GESTOR_FAVORITOS",RUTA_GESTOR."/favoritos");

//recursos
define("RUTA_CSS",SERVIDOR. "/css/");
define("RUTA_JS",SERVIDOR. "/js/");


?>