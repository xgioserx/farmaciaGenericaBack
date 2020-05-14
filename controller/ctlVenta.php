<?php

include "../model/clsVenta.php";
include '../DAO/ventaDAO.php';


$id = isset($_POST['id']) ? $_POST['id'] : "";
$fecha_venta = isset($_POST['fecha_venta']) ? $_POST['fecha_venta'] : "";
$hora = isset($_POST['hora']) ? $_POST['hora'] : "";
$valor_total = isset($_POST['valor_total']) ? $_POST['valor_total'] : "";
$cliente_id = isset($_POST['cliente_id']) ? $_POST['cliente_id'] : "";
$usuario_id = isset($_POST['usuario_id']) ? $_POST['usuario_id'] : "";
$type = isset($_POST['type']) ? $_POST['type'] : "";

$venta = new clsVenta($id, $fecha_venta, $hora, $valor_total, $cliente_id, $usuario_id);

$conex = new ventaDAO();

switch ($type) {
    case "save":
        $conex->guardar($venta);
        break;
    case "save2":
        $conex->guardar2($venta);
        break;
    case "search":
        $conex->buscar($venta);
        break;
    case "delete":
        $conex->eliminar($venta);
        break;
    case "update":
        $conex->modificar($venta);
        break;
    case "list":
        $conex->listar();
        break;
}
