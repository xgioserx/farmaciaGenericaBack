<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clsVenta
 *
 * @author XgioserX
 */
class clsVenta
{

    private $id;
    private $fecha_venta;
    private $hora;
    private $valor_total;
    private $cliente_id;
    private $usuario_id;

    function __construct($id, $fecha_venta, $hora, $valor_total, $cliente_id, $usuario_id)
    {
        $this->id = $id;
        $this->fecha_venta = $fecha_venta;
        $this->hora = $hora;
        $this->valor_total = $valor_total;
        $this->cliente_id = $cliente_id;
        $this->usuario_id = $usuario_id;
    }

    function getId()
    {
        return $this->id;
    }

    function getFecha_venta()
    {
        return $this->fecha_venta;
    }

    function getHora()
    {
        return $this->hora;
    }

    function getValor_total()
    {
        return $this->valor_total;
    }

    function getCliente_id()
    {
        return $this->cliente_id;
    }

    function getUsuario_id()
    {
        return $this->usuario_id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setFecha_venta($fecha_venta)
    {
        $this->fecha_venta = $fecha_venta;
    }

    function setHora($hora)
    {
        $this->hora = $hora;
    }

    function setValor_total($valor_total)
    {
        $this->valor_total = $valor_total;
    }

    function setCliente_id($cliente_id)
    {
        $this->cliente_id = $cliente_id;
    }

    function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }
}
