<?php

/**
 * En la clase Cliente:
 * 0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
    documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
 * 1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
 * 2. Los métodos de acceso de cada uno de los atributos de la clase.
 * 3. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 */

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