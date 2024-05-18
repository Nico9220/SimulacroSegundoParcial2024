<?php

class MotoNacional extends Moto {
    private $porcentajeDescuento;

    public function __construct($cod, $cost, $model, $desc, $prAnual, $act){
        parent :: __construct($cod, $cost, $model, $desc, $prAnual, $act);
        $this->porcentajeDescuento = 0.15;
    }

    //Metodo GET
    public function getPorcentajeDescuento(){
        return $this->porcentajeDescuento;
    }

    //Metodo SET
    public function setPorcentajeDescuento($porcentajeDescuento){
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    public function darPrecioVenta()
    {
        $valor = parent :: darPrecioVenta();
        if($valor != -1 && $valor > 0){
            $valor -= $valor * $this->getPorcentajeDescuento();
        }
        return $valor;
    }

    public function __toString(){
        $cadena = parent :: __toString();
        $cadena .= "Descuento: " . $this->getPorcentajeDescuento() . "\n";
        return $cadena;
    }
}