<?php

include "../model/clsCliente.php";
include '../DAO/clienteDAO.php';

$id = isset($_POST['id']) ? $_POST['id'] : "";
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : "";
$cedula = isset($_POST['cedula']) ? $_POST['cedula'] : "";
$genero = isset($_POST['genero']) ? $_POST['genero'] : "";
$fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : "";
$type = isset($_POST['type']) ? $_POST['type'] : "";

$cliente = new clsCliente($id, $nombre, $apellido, $cedula, $genero, $fecha_nacimiento);
$conex = new clienteDAO();

switch ($type) {
    case "save":
        $conex->guardar($cliente);
        break;
    case "search":
        $conex->buscar($cliente);
        break;
    case "delete":
        $conex->eliminar($cliente);
        break;
    case "update":
        $conex->modificar($cliente);
        break;
    case "list":
        $conex->listar();
        break;
}
