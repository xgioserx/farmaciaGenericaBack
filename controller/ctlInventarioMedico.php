<?php

include "../model/clsInventarioMedico.php";
include '../DAO/inventarioMedicoDAO.php';

$id = isset($_POST['id']) ? $_POST['id'] : "";
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
$fecha_vencimiento = isset($_POST['fecha_vencimiento']) ? $_POST['fecha_vencimiento'] : "";
$cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : "";
$fecha_fabricacion = isset($_POST['fecha_fabricacion']) ? $_POST['fecha_fabricacion'] : "";
$precio = isset($_POST['precio']) ? $_POST['precio'] : "";
$usuario_id = isset($_POST['usuario_id']) ? $_POST['usuario_id'] : "";
$laboratorio_id = isset($_POST['laboratorio_id']) ? $_POST['laboratorio_id'] : "";
$type = isset($_POST['type']) ? $_POST['type'] : "";

$inventario = new clsInventarioMedico($id, $nombre, $descripcion, $fecha_vencimiento, $cantidad, $fecha_fabricacion, $precio, $usuario_id, $laboratorio_id);
$conex = new inventarioMedicoDAO();

switch ($type) {
    case "save":
        $conex->guardar($inventario);
        break;
    case "search":
        $conex->buscar($inventario);
        break;
    case "delete":
        $conex->eliminar($inventario);
        break;
    case "update":
        $conex->modificar($inventario);
        break;
    case "list":
        $conex->listar();
        break;
}
