<?php
include_once "Venta.php";
include_once "Cliente.php";
include_once "Moto.php";
include_once "Empresa.php";
$objCliente1 = new Cliente("Ignacio", "Bonorino", "no", "DNI", 44778917);
$objCliente2 = new Cliente("Tiago", "Messi", "si", "Pasaporte", 1234567);
//------------------------------------------------------------------------------
$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 0.85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 0.70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 0.55, false);
//------------------------------------------------------------------------------
$arrayMoto = [$objMoto1, $objMoto2, $objMoto3];
$arrayCliente = [$objCliente1, $objCliente2];
$arrayVentas = [];
$objEmpresa = new Empresa("Alta Gama", "Av Argentina 123", $arrayCliente, $arrayMoto, $arrayVentas);
//------------------------------------------------------------------------------
$colecCodigos = [11, 12, 13];
$objEmpresa->registrarVenta($colecCodigos, $objCliente2);
//------------------------------------------------------------------------------
$colecCodigos = [0];
echo $objEmpresa->registrarVenta($colecCodigos, $objCliente2);
//------------------------------------------------------------------------------
$colecCodigos = [2];
echo $objEmpresa->registrarVenta($colecCodigos, $objCliente2);
//------------------------------------------------------------------------------
$objDocCliente = $objCliente1->getTipoDoc();
$objNumDoc = $objCliente1->getNumDoc();
$objEmpresa->retornarVentasXCliente($objDocCliente, $objNumDoc);
//------------------------------------------------------------------------------
$objDocCliente = $objCliente2->getTipoDoc();
$objNumDoc = $objCliente2->getNumDoc();
$objEmpresa->retornarVentasXCliente($objDocCliente, $objNumDoc);
//------------------------------------------------------------------------------
echo $objEmpresa;
