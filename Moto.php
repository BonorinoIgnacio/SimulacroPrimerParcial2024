<?php
class Moto
{
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncAnual;
    private $activa; //atributo que va a contener un valor true, si la moto está disponible para la venta y false en caso contrario

    //--------------------- __construct

    public function __construct($cod, $cost, $fabricacion, $desc, $incrementoAnual, $disponible)
    {
        $this->codigo = $cod;
        $this->costo = $cost;
        $this->anioFabricacion = $fabricacion;
        $this->descripcion = $desc;
        $this->porcentajeIncAnual = $incrementoAnual;
        $this->activa = $disponible;
    }

    //--------------------- Get

    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getCosto()
    {
        return $this->costo;
    }
    public function getAnioFabricacion()
    {
        return $this->anioFabricacion;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getIncrementoAnual()
    {
        return $this->porcentajeIncAnual;
    }
    public function getActiva()
    {
        return $this->activa;
    }

    //--------------------- Set

    public function setCodigo($nCodigo)
    {
        $this->codigo = $nCodigo;
    }
    public function setCosto($nCosto)
    {
        $this->costo = $nCosto;
    }
    public function setAnioFabricacion($nAnio)
    {
        $this->anioFabricacion = $nAnio;
    }
    public function setDescripcion($nDescripcion)
    {
        $this->descripcion = $nDescripcion;
    }
    public function setInctrementoAnual($nInc)
    {
        $this->porcentajeIncAnual = $nInc;
    }
    public function setActiva($nEstado)
    {
        $this->activa = $nEstado;
    }

    //--------------------- __tosting

    public function __toString()
    {
        $salida =
            "\n" .
            "Informacion de la Moto: "
            . "\n\n" .
            "Codigo: " . $this->getCodigo()
            . "\n" .
            "Costo: " . $this->getCosto()
            . "\n" .
            "Año de fabricacion: " . $this->anioFabricacion
            . "\n" .
            "Inc. Anual: " . $this->getIncrementoAnual()
            . "\n" .
            "Esta disponible: " . $this->getActiva()
            . "\n------------------------------------\n";
        return $salida;
    }

    //--------------------- Metodos

    public function estaDisponible($disponible)
    {
        if ($disponible == "s") {
            $disponible = "true";
        } else {
            $disponible = "false";
        }
        $this->setActiva($disponible);
        return $disponible;
    }


    public function darPrecioVenta()
    {

        if ($this->getActiva()) {
            $anioAct = 2024;
            $anio = $anioAct - $this->getAnioFabricacion();
            $venta = ($this->getCosto() * 2) * ($anio * $this->getIncrementoAnual());
        } else {
            $venta = -1;
        }
        return $venta;
    }
}
