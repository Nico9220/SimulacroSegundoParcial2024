<?php

class Cliente
{
    private $nombre;
    private $apellido;
    private $estado;
    private $tipoDoc;
    private $documento;

    public function __construct($nom, $ape, $est, $tipo, $doc){
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->estado = $est;
        $this->tipoDoc = $tipo;
        $this->documento = $doc;
    }

     //Getters

    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function getTipoDoc(){
        return $this->tipoDoc;
    }
    public function getDocumento(){
        return $this->documento;
    }

     //Setters

    public function setNombre($nom){
        $this->nombre = $nom;
    }
    public function setApellido($ape){
        $this->apellido = $ape;
    }
    public function setEstado($est){
        $this->estado = $est;
    }
    public function setTipoDoc($tipo){
        $this->tipoDoc = $tipo;
    }
    public function setDocumento($doc){
        $this->documento = $doc;
    }

    public function __toString(){
        return "Nombre: " . $this->getNombre() . "\n" . 
        "Apellido: " . $this->getApellido() . "\n" . 
        "Estado: " . $this->getEstado() . "\n" . 
        "Tipo documento: " . $this->getTipoDoc() . "\n" . 
        "Documento: " . $this->getDocumento() . "\n";
    }

}