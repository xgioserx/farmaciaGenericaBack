<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clsDetalleVenta
 *
 * @author XgioserX
 */
class clsDetalleVenta
{

    private $id;
    private $cantidad;
    private $inventario_medico_id;
    private $venta_id;

    function __construct($id, $cantidad, $inventario_medico_id, $venta_id)
    {
        $this->id = $id;
        $this->cantidad = $cantidad;
        $this->inventario_medico_id = $inventario_medico_id;
        $this->venta_id = $venta_id;
    }

    function getId()
    {
        return $this->id;
    }

    function getCantidad()
    {
        return $this->cantidad;
    }

    function getInventario_medico_id()
    {
        return $this->inventario_medico_id;
    }

    function getVenta_id()
    {
        return $this->venta_id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    function setInventario_medico_id($inventario_medico_id)
    {
        $this->inventario_medico_id = $inventario_medico_id;
    }

    function setVenta_id($venta_id)
    {
        $this->venta_id = $venta_id;
    }
}
