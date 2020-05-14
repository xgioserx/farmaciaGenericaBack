<?php

class ventaDAO
{
    private $dao;

    function __construct()
    {
        //Generico
        require '../DAO/genericoDAO.php';
        $this->dao = new genericoDAO();
    }

    public function guardar(clsVenta $obj)
    {
        $this->dao->crearConsulta("guardarVenta", array(0,$obj->getFecha_venta(),$obj->getHora(), $obj->getValor_total(), $obj->getCliente_id(), $obj->getUsuario_id()), "funcion");

    }

    public function guardar2(clsVenta $obj)
    {
        $this->dao->crearConsulta("guardarItemsAVenta", array($obj->getId()), "procedimiento");
    }

    public function buscar(clsVenta $obj)
    {
        $this->dao->crearConsulta("buscarVenta", array($obj->getId()), "procedimiento");

    }

    public function eliminar(clsVenta $obj)
    {
        $this->dao->crearConsulta("eliminarVenta", array($obj->getId()), "funcion");
    }

    public function modificar(clsVenta $obj)
    {
        $this->dao->crearConsulta("modificarVenta", array(
            $obj->getId(), $obj->getFecha_venta(), $obj->getHora(), $obj->getValor_total(), $obj->getCliente_id(), $obj->getUsuario_id()), "funcion");
    }


  
    public function eliminarDetalle(clsDetalleVenta $obj)
    {
        $this->dao->crearConsulta("eliminarDetalle", array($obj->getId()), "funcion");
    }

    public function listarCarritoVenta(clsDetalleVenta $obj)
    {
        $this->dao->crearConsulta("listarCarritoVenta", array($obj->getVenta_id()), "procedimiento");
    }

    public function listar()
    {
        $this->dao->crearConsulta("listarVentas", array(0), "procedimiento");
    }





    public function guardarItemCarrito(clsDetalleVenta $obj)
    {
        $this->dao->crearConsulta("guardarItemCarrito", array(0, $obj->getCantidad(), $obj->getInventario_medico_id(),0), "funcion");
    }

    public function eliminarItemCarrito(clsDetalleVenta $obj)
    {
        $this->dao->crearConsulta("eliminarItemCarrito", array($obj->getId()), "funcion");
    }

    public function listarCarrito()
    {
        $this->dao->crearConsulta("listarCarrito", array(0), "procedimiento");
    }

    public function eliminarTodosLosItems()
    {
        $this->dao->crearConsulta("eliminarTodosLosItems",  array(0) , "procedimiento");
    }


    /* falta */
    public function precioPorGrupoCarrito()
    {
        $this->dao->crearConsulta("precioPorGrupoCarrito",  array(0) , "procedimiento");
    }

    
}
