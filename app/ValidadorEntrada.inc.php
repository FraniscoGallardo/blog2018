<?php

include_once 'RepositorioEntrada.inc.php';

class ValidadorEntrada {

    private $aviso_inico;
    private $aviso_cierre;
    private $titulo;
    private $url;
    private $texto;
    private $error_titulo;
    private $error_url;
    private $error_texto;

    function __construct($titulo, $url, $texto, $conexion) {
        $this->aviso_inico = "<br><div class='alert alert-danger' role=alert>";
        $this->aviso_cierre = "</br>";
        $this->titulo = "";
        $this->url = "";
        $this->texto = "";

        $this->error_titulo = $this->validar_titulo($conexion, $titulo);
        $this->error_url = $this->validar_url($conexion, $titulo);
        $this->error_texto = $this->validar_texto($texti);
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function validar_titulo($conexion, $titulo) {
        if (!$this->variable_iniciada($titulo)) {
            return "debes escribir un titulo";
        } else {
            $this->titulo = $titulo;
        }
        
        if(strlen($titulo) > 255){
            return "El titulo no puede ocupar mas de 255 caracteres";
        }
        
        if(RepositorioEntrada::titulo_existe($conexion, $titulo)){
            return "Ya existe una entrada con este titulo, por favor ingresa otro valido";
        }
        
    }

}

?>
