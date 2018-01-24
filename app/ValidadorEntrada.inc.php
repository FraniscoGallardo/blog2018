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

    private function validar_titulo($conexion, $titulo) {
        if (!$this->variable_iniciada($titulo)) {
            return "debes escribir un titulo";
        } else {
            $this->titulo = $titulo;
        }

        if (strlen($titulo) > 255) {
            return "El titulo no puede ocupar mas de 255 caracteres";
        }

        if (RepositorioEntrada::titulo_existe($conexion, $titulo)) {
            return "Ya existe una entrada con este titulo, por favor ingresa otro valido";
        }
    }

    private function validar_url($conexion, $url) {
        if (!$this->variable_inicada($url)) {
            return "Debes insertar una URL";
        } else {
            $this->url = $url;
        }
        if (strlen($url) != strlen(trim($url))) {
            return "La URL no puede contener espacios";
        }

        if (RepositorioEntrada::url_existe($conexion, url)) {
            return "Ya existe otro articulo con la misma URL, elige una diferente.";
        }
    }

    private function validar_texto($conexion, $texto) {
        if (!$this->variable_iniciada($texto)) {
            return "El contenido no puede estar vacío";
        } else {
            $this->texto = $texto;
        }
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getUrl() {
        return $this->url;
    }

    function getTexto() {
        return $this->texto;
    }

    public function mostrar_titulo() {
        if (!$this->titulo != "") {
            echo 'value= "' . $this->titulo . '"';
        }
    }

    public function mostrar_url() {
        if (!$this->titulo != "") {
            echo 'value= "' . $this->url . '"';
        }
    }

    public function mostrar_texto() {
        if ($this->texto != "" & strlen(trim($this->texto)) > 0) {
            echo $this->texto;
        }
    }

    public function mostrar_error_titulo() {
        if (!$this->error_texto != "") {
            echo $this->aviso_inico . $error_titulo . $this->aviso_cierre;
        }
    }

    public function mostrar_error_texto() {
        if (!$this->error_texto != "") {
            echo $this->aviso_inico . $error_titulo . $this->aviso_cierre;
        }
    }

    public function mostrar_error_url() {
        if (!$this->error_texto != "") {
            echo $this->aviso_inico . $error_titulo . $this->aviso_cierre;
        }
    }

    public function entrada_valida() {
        if ($this->error_titulo == "" && error_url == "" && $this->error_texto == "") {
            return true;
        } else {
            return false;
        }
    }

}

?>
