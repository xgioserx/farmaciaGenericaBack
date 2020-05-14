<?php

class reportesDAO
{
    private $objCon;

    function __construct()
    {
        require __DIR__ . '\..\infrastructure\clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function reporteLaboratorios()
    {
        $sql="call listarLaboratorios(0)";
        $arr= $this->objCon->ExecuteReporte($sql);
        return $arr;

    }

    public function reporteInventario()
    {
        $sql = "call listarInventario(0)";
        $arr = $this->objCon->ExecuteReporte($sql);
        return $arr;
    }

    public function reporteClientes()
    {
        $sql = "call listarClientes(0)";
        $arr = $this->objCon->ExecuteReporte($sql);
        return $arr;
    }

    
    public function reporteUsuarios()
    {
        $sql = "call listarUsuarios(0)";
        $arr = $this->objCon->ExecuteReporte($sql);
        return $arr;
    }

    public function reporteVentas()
    {
        $sql = "call listarVentas(0)";
        $arr = $this->objCon->ExecuteReporte($sql);
        return $arr;
    }

    public function ClientesComprasCSV()
    {
        $sql = "call clientesMayorCompras()";
        $arr = $this->objCon->ExecuteReporte($sql);
        return $arr;
    }

    public function EmpleadosVentasCSV()
    {
        $sql = "call empleadosMayorVentas()";
        $arr = $this->objCon->ExecuteReporte($sql);
        return $arr;
    }

    public function ProductosVentaCSV()
    {
        $sql = "call productosMayorVenta()";
        $arr = $this->objCon->ExecuteReporte($sql);
        return $arr;
    }

    public function VentasPorDiaCSV()
    {
        $sql = "call ventasIngresosPorDia()";
        $arr = $this->objCon->ExecuteReporte($sql);
        return $arr;
    }


    public function cantidadProductosPorProducto()
    {
        $sql = "call cantidadProductosPorProducto()";
        $this->objCon->Execute($sql);
       
    }


    public function clientesHombresMujeres()
    {
        $sql = "call clientesHombresMujeres()";
        $this->objCon->Execute($sql);
    }

    public function cantidadProductosVendidosGanancias()
    {
     $sql = "call cantidadProductosVendidosPorProductoGanancias()";
     $this->objCon->Execute($sql);
    }

    public function ventasPorEmpleadoIngresoso()
    {
     $sql = "call ventasPorEmpleadoIngresoso()";
     $this->objCon->Execute($sql);
    }

    public function ventasPorDiaDelMesIngresosDiarios()
    {
        $sql = "call ventasPorDiaDelMesIngresosDiarios()";
        $this->objCon->Execute($sql);
    }
    
    public function ventasPorDiaDeLaSemanaIngresosDia(){
        $sql= "call ventasPorDiaDeLaSemanaIngresosDia()";
        $this->objCon->Execute($sql);
    }
}
