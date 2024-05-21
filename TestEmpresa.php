<?php

include_once "Cliente.php";
include_once "Moto.php";
include_once "Empresa.php";
include_once "Venta.php";
include_once "MotoNacional.php";
include_once "MotoImportada.php";

//$nom, $ape, $est, $tipo, $doc
$objCliente1 = new Cliente ("Nicolas", "Caretta", true, "dni", 36329071);
$objCliente2 = new Cliente ("Florencia", "Gutierrez", true, "dni", 41780957);

// Motos nacionales
$objMoto1 = new MotoNacional(11,2230000,2022, "Benelli Imperiale 400", 85, true, 10);
$objMoto2 = new MotoNacional(12,584000,2021, "Zanella Zr 150 Ohc", 70, true, 10);
$objMoto3 = new MotoNacional(13,9999900,2023, "Zanella Patagonian Eagle 250", 55, false);
// Moto Importada
$objMoto4 = new MotoImportada(14, 12499900, 2020,"Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 100, true, "Francia", 6244400 );

// Punto 3
$objEmpresa = new Empresa("Alta Gama", " Av. Argentina 123", [$objMoto1, $objMoto2, $objMoto3, $objMoto4],[$objCliente1, $objCliente2], [] );

//Punto 4
$valorFinal = $objEmpresa->registrarVenta([11, 12, 13, 14], $objCliente2);
echo "El valor final de la venta es: $valorFinal \n";

//Punto 5
$valorFinal = $objEmpresa->registrarVenta([13, 14], $objCliente2);
echo "El valor final de la venta es: $valorFinal \n";

//Punto 6
$valorFinal = $objEmpresa->registrarVenta([14 , 2], $objCliente2);
echo "El valor final de la venta es: $valorFinal \n";

//Punto 7
$informeImportadas = $objEmpresa->informarVentasImportadas();
echo $informeImportadas . "\n";

//Punto 8
$informeSumaNacionales = $objEmpresa->informarSumaVentasNacionales($objVenta);
echo $informeSumaNacionales;

//Punto 9
echo $objEmpresa;



