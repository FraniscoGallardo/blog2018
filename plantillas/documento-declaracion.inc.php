<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';

Conexion::abrir_conexion();
$total_usuarioss = RepositorioUsuario::obtener_numero_usuarios(Conexion::obtener_conexion());
Conexion::cerrar_conexion();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <?php
        if (!isset($titulo) || empty($titulo)) {
            $titulo = "Blog de Francisco";
        }
        echo "<title>$titulo</title>";
        ?>
        <link href="<?PHP echo RUTA_CSS?>bootstrap.min.css" rel="stylesheet">
        <link href="<?PHP echo RUTA_CSS?>estilos.css" rel="stylesheet">


    </head>
    <body>