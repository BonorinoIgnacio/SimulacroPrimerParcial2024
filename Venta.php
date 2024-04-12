<?php
// número, fecha, referencia al cliente, referencia a una colección de
// motos y el precio final
class Venta
{
    private $numero;
    private $fecha;
    private $objCliente;
    private $arrayMotos =[];
    private $precioFinal;

    //------------------------ __construct

    public function __construct($num, $fecha, $cliente, $motos, $precio)
    {
        $this->numero = $num;
        $this->fecha = $fecha;
        $this->objCliente = $cliente;
        $this->arrayMotos = $motos;
        $this->precioFinal = $precio;
    }

    //------------------------ Get
    public function getNumero(){
        return $this->numero;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getObjCliente(){
        return $this->objCliente;
    }
    public function getArrayMotos(){
        return $this->arrayMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    //------------------------ Set

    public function setNumero($nNuero){
        $this->numero=$nNuero;
    }
    public function setFecha($nFecha){
        $this->fecha=$nFecha;
    }
    public function setObjCliente($ncliente){
        $this->objCliente=$ncliente;
    }
    public function setArrayMoto($nMoto){
        $this->arrayMotos=$nMoto;
    }
    public function setPrecioFinal($nPrecio){
        $this->precioFinal=$nPrecio;
    }

    //------------------------ __toString

    public function __toString()
    {
        $salida=
        "Info Venta"
        ."\n\n".
        "N° Venta: ". $this->getNumero()
        ."\n".
        "fecha: ". $this->getFecha()
        ."\n".
        $this->getObjCliente()
        ."\n".
        $this->getArrayMotos()
        ."\n".
        "Precio Final: ". $this->getPrecioFinal()
        ."\n------------------------------------";
        return $salida;
    }

    //------------------------ Metodos

    public function incorporarMoto($objMoto){
        $arrayMoto= $this->getArrayMotos();
        if ($objMoto->getActiva() == true) {
            $arrayMoto = $objMoto;
        } else {
            echo "moto no disponible";
        }        
        $this->setArrayMoto($arrayMoto);
    }
}
