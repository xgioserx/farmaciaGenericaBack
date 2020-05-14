<?php

include "../model/clsDetalleVenta.php";
include '../DAO/ventaDAO.php';


$id = isset($_POST['id']) ? $_POST['id'] : "";
$cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : "";
$inventario_medico_id = isset($_POST['inventario_medico_id']) ? $_POST['inventario_medico_id'] : "";
$venta_id = isset($_POST['venta_id']) ? $_POST['venta_id'] : "";
$type = isset($_POST['type']) ? $_POST['type'] : "";

$detalleVenta = new clsDetalleVenta($id, $cantidad, $inventario_medico_id, $venta_id);

$conex = new ventaDAO();

switch ($type) {
    case "search":
        $conex->listarCarritoVenta($detalleVenta);
        break;
    case "delete":
        $conex->eliminarDetalle($detalleVenta);
        break;
    case "listItems":
        $conex->listarCarrito();
        break;
    case "deleteItem":
        $conex->eliminarItemCarrito($detalleVenta);
        break;
    case "saveItem":
        $conex->guardarItemCarrito($detalleVenta);
        break;
    case "deleteAllItem":
        $conex->eliminarTodosLosItems();
        break;
    case "precioPorGrupo":
        $conex->precioPorGrupoCarrito();
        break;
}
