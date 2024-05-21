<?php


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

    public function retornarCadenaDesdeColeccion($coleccion){
        $cadena = "";
        foreach($coleccion as $elemento){
            $cadena = $cadena . "" . $elemento . "\n";
        }
        return $cadena;
    }

    public function __toString(){
        $cadena = "Denominacion: " . $this->getDenominacion() . "\n";
        $cadena .= "Direccion: " . $this->getDireccion() . "\n";
        $cadena .= "Informacion Motos: " . $this->retornarCadenaDesdeColeccion($this->getColMotos()) . "\n";
        $cadena .= "Informacion Cliente: " . $this->retornarCadenaDesdeColeccion($this->getColClientes()) . "\n";
        $cadena .= "Informacion Ventas: " . $this->retornarCadenaDesdeColeccion($this->getColVentas()) . "\n";
    }
    //1.	Implementar el método informarSumaVentasNacionales() que recorre la colección de ventas realizadas por la empresa y retorna el importe total de ventas Nacionales realizadas por la empresa.
    public function informarSumaVentasNacionales($objVenta){
        $colNacional = $objVenta->getColMotoNacional();
        $totalNacional = 0;
        foreach($colNacional as $unaMoto){
            $totalNacional = $totalNacional + $unaMoto->retornarTotalVentaNacional();
        }
        return $totalNacional;
    }

    //2.	Implementar el método informarVentasImportadas() que recorre la colección de ventas realizadas por la empresa y retorna una colección de ventas de motos  importadas. Si en la venta al menos una de las motos es importada la venta debe ser informada.
    public function informarVentasImportadas(){
        $ventasRealizadas = $this->getColVentas();
        $ventasImportadas = [];
        foreach($ventasRealizadas as $element){
            $motosVenta = $element->getColMotos();
            $unaImportada = false;
            foreach($motosVenta as $moto){
                if($unaImportada === false && $moto->esImportada()){
                    $unaImportada = true;
                }
            }
            if ($unaImportada){
                $ventasImportadas[] = $element;
            }
        }
        return $ventasImportadas;
    }
}