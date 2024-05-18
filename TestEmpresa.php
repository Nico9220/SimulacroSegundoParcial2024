<?php

/**
 * Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
 * 2. Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación,
descripción, porcentaje incremento anual, activo.
código costo anio_fabricacion Descripcion porc_increment activo
11 2230000 2022 Benelli Imperiale 400 85% true
12 584000 2021 Zanella Zr 150 Ohc 70% true
13 999900 2023 Zanella Patagonian Eagle 250 55% false
 * Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
[$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
 * 5. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
 * 6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
 * 7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
 * 8. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente1.
 * 9. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente2
 * 10. Realizar un echo de la variable Empresa creada en 2.
 */

include_once "Cliente.php";
include_once "Moto.php";
include_once "Empresa.php";
include_once "Venta.php";

//$nom, $ape, $est, $tipo, $doc
$objCliente1 = new Cliente ("Nicolas", "Caretta", true, "dni", 36329071);
$objCliente2 = new Cliente ("Florencia", "Gutierrez", true, "dni", 41780957);

$objMoto1 = new Moto(11,2230000,2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12,584000,2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto(13,9999900,2023, "Zanella Patagonian Eagle 250", 55, false);

$objEmpresa = new Empresa ("Alta gama","Av. Argentina 123",[$objMoto1, $objMoto2, $objMoto3],[$objCliente1, $objCliente2],[]);

//Punto 5
// Invocamos al método registrarVenta con la colección de códigos de motos y el objeto Cliente $objCliente2
$valorFinal = $objEmpresa->registrarVenta([11, 12, 13], $objCliente2);
echo "El valor final de la venta es: $valorFinal \n";

//Punto 6
$valorFinal = $objEmpresa->registrarVenta([0], $objCliente2);
echo "El valor final de la venta es: $valorFinal \n";

//Punto 7
$valorFinal = $objEmpresa->registrarVenta([2], $objCliente2);
echo "El valor final de la venta es: $valorFinal \n";

//Punto 8
$ventasClienteString = $objEmpresa->obtenerVentasXClienteString($objCliente1->getTipoDoc(), $objCliente1->getDocumento());
echo "La coleccion del cliente es: $ventasClienteString \n";

//Punto 9
$ventasClienteString = $objEmpresa->obtenerVentasXClienteString($objCliente2->getTipoDoc(), $objCliente2->getDocumento());
echo "La coleccion del cliente es: $ventasClienteString \n";

//Punto 10
echo $objEmpresa;
