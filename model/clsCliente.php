<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clsCliente
 *
 * @author XgioserX
 */
class clsCliente
{

    private $id;
    private $nombre;
    private $apellido;
    private $cedula;
    private $genero;
    private $fecha_nacimiento;

    function __construct($id, $nombre, $apellido, $cedula, $genero, $fecha_nacimiento)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->genero = $genero;
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    function getId()
    {
        return $this->id;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getApellido()
    {
        return $this->apellido;
    }

    function getCedula()
    {
        return $this->cedula;
    }

    function getGenero()
    {
        return $this->genero;
    }

    function getFecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

    function setGenero($genero)
    {
        $this->genero = $genero;
    }

    function setFecha_nacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }
}
