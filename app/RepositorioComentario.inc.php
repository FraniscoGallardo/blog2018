<?php

include_once 'app/Config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Comentario.inc.php';

class RepositorioComentario {

    public static function insertar_comentario($conexion, $comentario) {
        $comentario_insertada = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO comentarios(autor_id,entrada_id,titulo,texto,fecha) VALUES(:autor_id,:entrada_id,:titulo,:texto, NOW())";
                $sentencia = $conexion->prepare($sql);
                  $sentencia->bindParam(':entrada_id', $comentario->getEntrada_id(), PDO::PARAM_STR);
                $sentencia->bindParam(':autor_id', $comentario->getAutor_id(), PDO::PARAM_STR);
                $sentencia->bindParam(':titulo', $comentario->getTitulo(), PDO::PARAM_STR);
                $sentencia->bindParam(':texto', $comentario->getTexto(), PDO::PARAM_STR);

                $comentario_insertada = $sentencia->execute();
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $comentario_insertada;
    }

}
