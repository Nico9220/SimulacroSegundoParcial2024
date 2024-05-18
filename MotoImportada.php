<?php

class MotoImportada extends Moto {
    private $pais;
    private $impuesto;

    public function __contruct($cod, $cost, $model, $desc, $prAnual, $act, $pais, $impuesto){
        parent :: __construct($cod, $cost, $model, $desc, $prAnual, $act);
        $this->pais = $pais;
        $this->impuesto = $impuesto;
    }

    //Metodos GET
    public function getPais(){
        return $this->pais;
    }
    public function getImpuesto(){
        return $this->impuesto;
    }

    //Metodos SET
    public function setPais($pais){
        $this->pais = $pais;
    }
    public function setImpuesto($impuesto){
        $this->impuesto = $impuesto;
    }

    public function __toString(){
        $cadena = parent :: __toString();
        $cadena .= "Pais: " . $this->getPais() . "\n";
        $cadena .= "Impuesto: " . $this->getImpuesto() . "\n";
        return $cadena;
    }
}