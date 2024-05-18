<?php

/**
 * En la clase Moto:
 * 1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).
 * 2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.
 * 3. Los métodos de acceso de cada uno de los atributos de la clase.
 * 4. Redefinir el método toString para que retorne la información de los atributos de la clase.
 * 5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto.
 */

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