<?php

/**
 * En la clase Empresa:
 * 1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
motos y la colección de ventas realizadas.
 * 2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
 * 3. Los métodos de acceso para cada una de las variables instancias de la clase.
 * 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 * 5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
 * 6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta.
 * 7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.
 */


class Empresa 
{
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentas;

    public function __construct($denom, $dir, $objMoto, $objCliente, $objVenta)
    {
        $this->denominacion = $denom;
        $this->direccion = $dir;
        $this->colClientes = $objCliente;
        $this->colMotos = $objMoto;
        $this->colVentas = $objVenta;
    }

     //Getters

    public function getDenominacion(){
        return $this->denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getColClientes(){
        return $this->colClientes;
    }
    public function getColMotos(){
        return $this->colMotos;
    }
    public function getColVentas(){
        return $this->colVentas;
    }

     //Setters

    public function setDenominacion ($denom){
        $this->denominacion = $denom;
    }
    public function setDireccion($dir){
        $this->direccion = $dir;
    }
    public function setColClientes($objCliente){
        $this->colClientes [] = $objCliente;
    }
    public function setColMotos($objMoto){
        $this->colMotos [] = $objMoto;
    }
    public function setColVentas($objVenta){
        $this->colVentas [] = $objVenta;
    }

    public function retornarMoto($codigoMoto){
        $colMotos = $this->getColMotos();
        $objMoto = null;
        $i = 0;
        while($i < count($colMotos) && $objMoto == null){
            if ($colMotos[$i]->getCodigo() == $codigoMoto){
                $objMoto = $colMotos[$i];
            }
            $i++;
        }
        return $objMoto;
    }

    public function registrarVenta($colCodigosMoto, $objCliente){
        $valorFinal = 0;
        if ($objCliente->getEstado()) {
            $objVenta = new Venta(0, date("Y-m-d"), $objCliente, 0);

            foreach ($colCodigosMoto as $codigoMoto) {
                $unaMoto = $this->retornarMoto($codigoMoto);
                if ($unaMoto != null) {
                    $objVenta->incorporarMoto($unaMoto);
                }
            }
            $valorFinal = $objVenta->getPrecioFinal();
        }
        return $valorFinal;
    }

    public function retornarVentasXCliente($tipo, $doc){
        $colVentasCliente = [];
    
        foreach ($this->colVentas as $venta) {
            if ($venta->getObjCliente()->getTipoDoc() == $tipo && $venta->getObjCliente()->getDocumento() == $doc) {
                $colVentasCliente[] = $venta;
            }
        }
        
        return $colVentasCliente;
    }

    public function obtenerVentasXClienteString($tipo, $doc){
        $ventasClienteString = "";
        $ventasCliente = $this->retornarVentasXCliente($tipo,$doc);
        
        foreach ($ventasCliente as $venta){
            $ventasClienteString .= $venta . "\n";
        }
        return $ventasClienteString;
    }

    public function listadoClientes(){
        $coll = $this->getColClientes();
        $listadoCli = "";
        
        foreach($coll as $cliente){
            $listadoCli = $listadoCli . $cliente . "\n";
        }
        return $listadoCli;
    }
    
    public function listadoMotos(){
        $colMo = $this->getColMotos();
        $listadoMo = "";
    
        foreach($colMo as $moto){
            $listadoMo .= $moto . "\n";
        }
        return $listadoMo;
    }
    
    public function listadoVentas(){
        $col = $this->getColVentas();
        $listado = "";
    
        foreach($col as $venta){
            $listado .= $venta . "\n";
        }
        return $listado;
    }

    public function __toString(){
        return "Denominacion: " . $this->getDenominacion() . "\n" . 
        "Direccion: " . $this->getDireccion() . "\n" . 
        "informacion Motos: " . $this->listadoMotos() . "\n" .
        "informacion Cliente: " .  $this->listadoClientes() . "\n" . 
        "informacion Ventas: " . $this->listadoVentas() . "\n";
    }
}