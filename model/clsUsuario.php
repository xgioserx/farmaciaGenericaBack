<?php

class clsUsuario
{
    private $id;
    private $cedula;
    private $nombre;
    private $apellido;
    private $correo;
    private $usuario;
    private $password;

    function __construct($id, $cedula, $nombre, $apellido, $correo, $usuario, $password)
    {
        $this->id = $id;
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->usuario = $usuario;
        $this->password = $password;
    }

    function getId()
    {
        return $this->id;
    }

    function getCedula()
    {
        return $this->cedula;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getApellido()
    {
        return $this->apellido;
    }

    function getCorreo()
    {
        return $this->correo;
    }

    function getUsuario()
    {
        return $this->usuario;
    }

    function getPassword()
    {
        return $this->password;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }
}
