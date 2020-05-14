<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clsLogin
 *
 * @author XgioserX
 */
class clsLogin
{

    private $usuario;
    private $password;

    function __construct($usuario, $password)
    {
        $this->usuario = $usuario;
        $this->password = $password;
    }

    function getUsuario()
    {
        return $this->usuario;
    }

    function getPassword()
    {
        return $this->password;
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
