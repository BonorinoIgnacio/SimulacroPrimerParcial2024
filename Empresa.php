<?php
// denominación, dirección, la colección de clientes, colección de motos y la colección de ventas realizadas
include_once "Venta.php";
class Empresa
{
    private $denominacion;
    private $direccion;
    private $arrayClientes;
    private $arrayMotos;
    private $arrayVentasRealizadas;
    //------------------------------------------------------------------------------ __construct
    public function __construct($deno, $dire, $clientes, $motos, $ventas)
    {
        $this->denominacion = $deno;
        $this->direccion = $dire;
        $this->arrayClientes = $clientes;
        $this->arrayMotos = $motos;
        $this->arrayVentasRealizadas = $ventas;
    }
    //------------------------------------------------------------------------------ Get
    public function getDenominacion()
    {
        return $this->denominacion;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getClientes()
    {
        return $this->arrayClientes;
    }
    public function getMotos()
    {
        return $this->arrayMotos;
    }
    public function getVentas()
    {
        return $this->arrayVentasRealizadas;
    }

    //------------------------------------------------------------------------------ Set
    public function setDenominacion($deno)
    {
        $this->denominacion = $deno;
    }
    public function setDireccion($dire)
    {
        $this->direccion = $dire;
    }
    public function set($clientes)
    {
        $this->arrayClientes = $clientes;
    }
    public function setMotos($motos)
    {
        $this->arrayMotos = $motos;
    }
    public function setVentas($ventas)
    {
        $this->arrayVentasRealizadas = $ventas;
    }

    //------------------------------------------------------------------------------ __toString

    public function __toString()
    {
        $clientes = "";
        foreach ($this->getClientes() as $cliente) {
            $clientes .= $cliente . "\n";
        }
        $motos = "";
        foreach ($this->getMotos() as $moto) {
            $motos .= $moto . "\n";
        }

        $ventas = "";
        foreach ($this->getVentas() as $venta) {
            $ventas .= $venta . "\n";
        }

        $salida =
            "Denominacion: " . $this->getDenominacion()
            . "\n" .
            "direccion: " . $this->getDireccion()
            . "\n" .
            "Clientes: " . $clientes
            . "\n" .
            "motos: " . $motos
            . "\n" .
            "Ventas: " . $ventas
            . "\n------------------------------------\n";
        return $salida;
    }
    //------------------------------------------------------------------------------ Metodos

    public function retornarMoto($codigoMoto)
    {
        $motoEncontrada = false;
        foreach ($this->getMotos() as $elemento) {
            if ($elemento->getCodigo() == $codigoMoto) {
                $motoEncontrada = $elemento;
            }
        }
        return $motoEncontrada;
    }

    public function registrarVenta($colCodigosMoto, $objCliente)
    {
        $precioF = 0;
        $encontrada = false;
        if ($objCliente->getEstado() == "si") {
            $baja = true;
        } else {
            $baja = false;
        }
        $arrayMoto = [];
        if (!$baja) {
            foreach ($colCodigosMoto as $cod) {
                $moto = $this->retornarMoto($cod);

                if ($moto && $moto->darPrecioVenta() >= 0) {
                    $arrayMoto = $moto;
                    $precioF = $precioF + $moto->darPrecioVenta();
                    $encontrada = true;
                }
            }
        }

        if ($baja) {
            $mensaje = "El cliente está dado de baja\n";
        } elseif (!$encontrada) {
            $mensaje = "No se han encontrado motos válidas\n";
        } else {
            $venta = new Venta(20, 2001, $objCliente, $this->getMotos(), $precioF);
            $venta->setObjCliente($objCliente);
            $venta->setArrayMoto($encontrada);
            $venta->setPrecioFinal($precioF);
            $this->arrayVentasRealizadas[] = $venta;

            $mensaje = $precioF;
        }
        return $mensaje;
    }
    public function retornarVentasXCliente($tipo, $numDoc)
    {
        $ventasCliente = [];
        foreach ($this->getVentas() as  $venta) {
            $cliente = $venta->getObjCliente();
            if ($cliente->getNumDoc() === $numDoc && $cliente->getTipoDoc() === $tipo) {
                $ventasCliente[] = $venta;
            }
        }
        return $ventasCliente;
    }
}
