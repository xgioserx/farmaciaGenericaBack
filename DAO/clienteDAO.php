<?php

class clienteDAO
{
    private $dao;

    function __construct()
    {
        //Generico
        require '../DAO/genericoDAO.php';
        $this->dao = new genericoDAO();
    }

    public function guardar(clsCliente $obj)
    {
        $this->dao->crearConsulta("guardarCliente", array(0, $obj->getNombre(), $obj->getApellido(), $obj->getCedula(), $obj->getGenero(), $obj->getFecha_nacimiento()), "funcion");
    }

    public function buscar(clsCliente $obj)
    {
        $this->dao->crearConsulta("buscarCliente", array($obj->getId()), "procedimiento");
    }

    public function eliminar(clsCliente $obj)
    {
        $this->dao->crearConsulta("eliminarCliente", array($obj->getId()), "funcion");
    }

    public function modificar(clsCliente $obj)
    {
        $this->dao->crearConsulta("modificarCliente", array(
            $obj->getId(), $obj->getNombre(), $obj->getApellido(), $obj->getCedula(), $obj->getGenero(), $obj->getFecha_nacimiento()), "funcion");
    }

    public function listar()
    {
        $this->dao->crearConsulta("listarClientes", array(0), "procedimiento");
    }


}
