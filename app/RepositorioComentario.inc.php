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
    public static function obtener_cometarios($conexion,$entrada_id){
        $comentarios = array();
        if(isset($conexion)){
            try{
                include_once 'Comentario.inc.php';
                $sql = "SELECT * FROM comentarios WHERE entrada_id = :entrada_id";
                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':entrada_id',$entrada_id,PDO::PARAM_STR);
                $sentencia ->execute();
                $resultado = $sentencia->fetchAll();
                
                if(count($resultado)){
                    foreach ($resultado as $fila){
                        $comentarios[] = new Comentario($fila['id'],$fila['autor_id'],$fila['entrada_id'],$fila['titulo'],$fila['texto'],$fila['fecha']);
                    }
                }else{
                    print 'Todavía no hay comentarios';
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $comentarios;
    }

}
