<?php
class Cliente
{
    private $nombre;
    private $apellido;
    private $estado;
    private $tipoDoc;
    private $numDoc;

    //--------------------------------------------------------------- __contruct

    public function __construct($nom, $ape, $estadoBaja, $tipoD, $numD)
    {
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->estado = $estadoBaja;
        $this->tipoDoc = $tipoD;
        $this->numDoc = $numD;
    }

    //--------------------------------------------------------------- Get

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }
    public function getNumDoc()
    {
        return $this->numDoc;
    }

    //--------------------------------------------------------------- Set

    public function setNombre($nuevoNombre)
    {
        $this->nombre = $nuevoNombre;
    }
    public function setApellido($cambiarApellido)
    {
        $this->apellido = $cambiarApellido;
    }
    public function setEstado($cambiarEstado)
    {
        $this->estado = $cambiarEstado;
        return $this;
    }
    public function setTipoDoc($cambiarTipo)
    {
        $this->tipoDoc = $cambiarTipo;
    }
    public function setNumDoc($cambiarNum)
    {
        $this->numDoc = $cambiarNum;
    }

    //--------------------------------------------------------------- __toString

    public function __toString()
    {
        $salida =
            "\n------------------------------------\n" . 
            "Informacion del cliente: "
            . "\n\n" . 
            "Nombre del cliente: " . $this->getNombre() . " " . $this->getApellido()
            . "\n" .
            "Cliente dado de baja?: " . $this->getEstado()
            . "\n" .
            $this->getTipoDoc() . ": " . $this->getNumDoc()
            . "\n------------------------------------\n" ;
        return $salida;
    }
}
