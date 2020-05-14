<?php

class laboratorioDAO
{
    private $dao;

    function __construct()
    {
        //Generico
        require '../DAO/genericoDAO.php';
        $this->dao = new genericoDAO();
    }

    public function guardar(clsLaboratorio $obj)
    {
        $this->dao->crearConsulta("guardarLaboratorio", array(0, $obj->getNombre(), $obj->getDescripcion()), "funcion");
    }

    public function buscar(clsLaboratorio $obj)
    {
        $this->dao->crearConsulta("buscarlaboratorio", array($obj->getId()), "procedimiento");
    }

    public function eliminar(clsLaboratorio $obj)
    {
        $this->dao->crearConsulta("eliminarLaboratorio", array($obj->getId()), "funcion");
    }

    public function modificar(clsLaboratorio $obj)
    {
        $this->dao->crearConsulta("modificarLaboratorio", array( $obj->getId(),  $obj->getNombre(), $obj->getDescripcion()), "funcion");
    }

    public function listar()
    {
        $this->dao->crearConsulta("listarLaboratorios", array(0), "procedimiento");
    }
}
