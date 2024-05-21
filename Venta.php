<?php


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

    public function retornarTotalVentaNacional(){
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
        if($colMotoImportada != null){
            $retornoImportadas = $colMotoImportada;
        }else{
            $retornoImportadas = [];
        }
        return $retornoImportadas;
    }

    public function retornarCadena($colecc){
        $cadena = "";
        foreach($colecc as $unEle){
            $cadena = $cadena . "" . $unEle . "\n";
        }
        return $cadena;
    }

    public function __toString(){
        $cadena = "Numero: " . $this->getNumero() . "\n";
        $cadena .= "Fecha. " . $this->getFecha() . "\n";
        $cadena .= "Datos del Cliente: " . $this->getObjCliente() . "\n";
        $cadena .= "Motos: " . $this->retornarCadena($this->getColMotos()) . "\n";
        $cadena .= "Motos Nacionales: " . $this->retornarCadena($this->getColMotoNacional()) . "\n";
        $cadena .= "Motos Internacionales: " . $this->retornarCadena($this->getColMotoImportada()) . "\n";
        $cadena .= "Precio Final: " . $this->getPrecioFinal() . "\n";
        return $cadena;
    }


}