<?php

class Entrada {

    private $id;
    private $autor_id;
    private $url;
    private $titulo;
    private $texto;
    private $fecha;
    private $activa;
  

    public function __construct($id, $autor_id,$url, $titulo, $texto, $fecha, $activa) {
        $this->id = $id;
        $this->autor_id = $autor_id;
        $this->url =$url;
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->fecha = $fecha;
        $this->activa = $activa;
    }

    function getId() {
        return $this->id;
    }

    function getAutor_id() {
        return $this->autor_id;
    }
    function getUrl() {
        return $this->url;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getTexto() {
        return $this->texto;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getActiva() {
        return $this->activa;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function setUrl() {
         $this->url= $url;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function setActiva($activa) {
        $this->activa = $activa;
    }

}
