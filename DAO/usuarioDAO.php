<?php

class usuarioDAO
{
    private $dao;

    function __construct()
    {
        //Generico
        require '../DAO/genericoDAO.php';
        $this->dao = new genericoDAO();
    }

    public function guardar(clsUsuario $obj)
    {
        $this->dao->crearConsulta("guardarUsuario", array(0,$obj->getCedula(),$obj->getNombre(),$obj->getApellido(), $obj->getCorreo(), $obj->getUsuario(), md5($obj->getPassword())), "funcion");
    }

    public function buscar(clsUsuario $obj)
    {
        $this->dao->crearConsulta("buscarUsuario", array($obj->getId()), "procedimiento");
    }

    public function eliminar(clsUsuario $obj)
    {
        $this->dao->crearConsulta("eliminarUsuario", array($obj->getId()), "funcion");
    }

    public function modificar(clsUsuario $obj)
    {
        $this->dao->crearConsulta("modificarUsuario", array(
            $obj->getId(), $obj->getCedula(), $obj->getNombre(), $obj->getApellido(), $obj->getCorreo(), $obj->getUsuario(), md5($obj->getPassword())), "funcion");
    }

    public function listar()
    {
        $this->dao->crearConsulta("listarUsuarios", array(0), "procedimiento");
    }

}
