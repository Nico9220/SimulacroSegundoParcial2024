<?php

/**
 * En la clase Venta:
 * 1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
motos y el precio final.
 * 2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
 * 3. Los métodos de acceso de cada uno de los atributos de la clase.
 * 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 * 5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario
 */

class Venta
{
    private $numero;
    private $fecha;
    private $objCliente;
    private $colMotos;
    private $precioFinal;
    private $colMotoNacional;
    private $colMotoImportada;

    public function __construct($id_venta, $fechaIn, $objCliente, $precio){
        $this->numero = $id_venta;
        $this->fecha = $fechaIn;
        $this->objCliente = $objCliente;
        $this->colMotos = [];
        $this->precioFinal = $precio;
        $this->colMotoNacional = [];
        $this->colMotoImportada = [];
    }

     //Getters

    public function getNumero(){
        return $this->numero;
    }
    public function getFecha(){ 
        return $this->fecha;
    }
    public function getObjCliente(){
        return $this->objCliente;
    }
    public function getColMotos(){
        return $this->colMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }
    public function getColMotoNacional(){
        return $this->colMotoNacional;
    }
    public function getColMotoImportada(){
        return $this->colMotoImportada;
    }

     //Setters

    public function setNumero($id_venta){
        $this->numero = $id_venta;
    }
    public function setFecha($fechaIn){
        $this->fecha = $fechaIn;
    }
    public function setObjCliente($objCliente){
        $this->objCliente = $objCliente;
    }
    public function setColMotos($colMotos){
        $this->colMotos = $colMotos;
    }
    public function setPrecioFinal($precio){
        $this->precioFinal = $precio;
    }
    public function setColMotoNacional($colMotoNacional){
        $this->colMotoNacional = $colMotoNacional;
    }
    public function setColMotoImportada($colMotoImportada){
        $this->colMotoImportada = $colMotoImportada;
    }

    public function incorporarMoto($objMoto){
         //vemos si la moto esta disponible para la venta
        if ($objMoto->getActiva()){
            $precio = $this->getPrecioFinal() + $objMoto->darPrecioVenta();
            $this->setPrecioFinal($precio);
             // Obtenemos la colección de motos actual y agregamos la nueva moto
            $colMotos = $this->getColMotos();
            $colMotos[] = $objMoto;
            $this->setColMotos($colMotos);
            }
        }

    public function incorporarMotoNacional($objMotoNacional){
        if ($objMotoNacional->getActiva()){
            $precio = $this->getPrecioFinal() + $objMotoNacional->darPrecioVenta();
            $this->setPrecioFinal($precio);

            $colMotoNacional = $this->getColMotoNacional();
            $colMotoNacional[] = $objMotoNacional;
            $this->setColMotoNacional($colMotoNacional);
        }
    }

    // 1.	Implementar el método retornarTotalVentaNacional() que retorna  la sumatoria del precio venta de cada una de las motos Nacionales vinculadas a la venta.

    public function retornarTotalValorVentaNacional(){
        $colMotoNacional = $this->getColMotoNacional();
        $totalVentaNacional = 0;
        $i = 0;

        while($i < count($colMotoNacional)){
            $motoNacional = $colMotoNacional[$i];
            $totalVentaNacional = $totalVentaNacional + $motoNacional->darPrecioVenta();
            $i++;
        }
        return $totalVentaNacional;
    }

    //2.	Implementar el método retornarMotosImportadas() que retorna una colección de motos importadas vinculadas a la venta. Si la venta solo se corresponde con motos Nacionales la colección retornada debe ser vacía.

    public function retornarMotosImportadas($objMotoImportada){
        $colMotoImportada = $this->getColMotoImportada();
        $retornoImportadas = [];
        if($colMotoImportada != null){
            $retornoImportadas = $colMotoImportada;
        }
        return $retornoImportadas;
    }

    public function __toString(){
        return "Numero: " . $this->getNumero() . "\n" . 
        "Fecha: " . $this->getFecha() . "\n" . 
        "Datos del cliente: " . $this->getObjCliente() . "\n" . 
        "Moto: " . $this->getColMotos() . "\n" . 
        "Precio Final: " . $this->getPrecioFinal() . "\n";
    }


}