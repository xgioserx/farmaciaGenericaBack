<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clasInventarioMedico
 *
 * @author XgioserX
 */
class clsInventarioMedico
{

    private $id;
    private $nombre;
    private $descripcion;
    private $fecha_vencimiento;
    private $cantidad;
    private $fecha_fabricacion;
    private $precio;
    private $usuario_id;
    private $laboratorio_id;

    function __construct($id, $nombre, $descripcion, $fecha_vencimiento, $cantidad, $fecha_fabricacion, $precio, $usuario_id, $laboratorio_id)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fecha_vencimiento = $fecha_vencimiento;
        $this->cantidad = $cantidad;
        $this->fecha_fabricacion = $fecha_fabricacion;
        $this->precio = $precio;
        $this->usuario_id = $usuario_id;
        $this->laboratorio_id = $laboratorio_id;
    }

    function getId()
    {
        return $this->id;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }

    function getFecha_vencimiento()
    {
        return $this->fecha_vencimiento;
    }

    function getCantidad()
    {
        return $this->cantidad;
    }

    function getFecha_fabricacion()
    {
        return $this->fecha_fabricacion;
    }

    function getPrecio()
    {
        return $this->precio;
    }

    function getUsuario_id()
    {
        return $this->usuario_id;
    }

    function getLaboratorio_id()
    {
        return $this->laboratorio_id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    function setFecha_vencimiento($fecha_vencimiento)
    {
        $this->fecha_vencimiento = $fecha_vencimiento;
    }

    function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    function setFecha_fabricacion($fecha_fabricacion)
    {
        $this->fecha_fabricacion = $fecha_fabricacion;
    }

    function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    function setLaboratorio_id($laboratorio_id)
    {
        $this->laboratorio_id = $laboratorio_id;
    }
}
