<?php

class Moto 
{
    private $codigo;
    private $costo;
    private $modelo;
    private $descripcion;
    private $porcentaje_incremento_anual; 
    private $activa;

    public function __construct($cod, $cost, $model, $desc, $prAnual, $act){
        $this->codigo = $cod;
        $this->costo = $cost;
        $this->modelo = $model;
        $this->descripcion = $desc;
        $this->porcentaje_incremento_anual = $prAnual;
        $this->activa = $act;
    }

     //Get

    public function getCodigo(){
        return $this->codigo;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function getModelo(){
        return $this->modelo;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getPorcentajeAnual(){
        return $this->porcentaje_incremento_anual;
    }
    public function getActiva(){
        return $this->activa;
    }


     //SET

    public function setCodigo($cod){
        $this->codigo = $cod;
    }
    public function setCosto($cost){
        $this->costo = $cost;
    }
    public function setModelo($model){
        $this->modelo = $model;
    }
    public function setPorcentajeAnual($prAnual){
        $this->porcentaje_incremento_anual = $prAnual;
    }
    public function setActiva($act){
        $this->activa = $act;
    }


    public function darPrecioVenta(){
        if($this->getActiva() != true){
            return -1;
        }
        $anioActual = intval(date("Y"));
        $anio = $anioActual - $this->getModelo();
         $_venta = $this->getCosto() + $this->getCosto() * ($anio * $this->getPorcentajeAnual());
        
        return $_venta;
    }

    public function __toString(){
        return "Codigo: " . $this->getCodigo() . "\n" . 
        "Costo: " . $this->getCosto() . "\n" . 
        "Modelo: " . $this->getModelo() . "\n" . 
        "Porcentaje de incremento anual: " . $this->getPorcentajeAnual(). "\n" . 
        "Activa: " . $this->getActiva() . "\n";
    }
}