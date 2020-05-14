<?php

include "../model/clsUsuario.php";
include '../DAO/usuarioDAO.php';

$id = isset($_POST['id']) ? $_POST['id'] : "";
$cedula = isset($_POST['cedula']) ? $_POST['cedula'] : "";
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : "";
$correo = isset($_POST['correo']) ? $_POST['correo'] : "";
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$type = isset($_POST['type']) ? $_POST['type'] : "";

$ObjUsuario = new clsUsuario($id, $cedula, $nombre, $apellido, $correo, $usuario, $password);
$conex = new usuarioDAO();

switch ($type) {
    case "save":
        $conex->guardar($ObjUsuario);
        break;
    case "search":
        $conex->buscar($ObjUsuario);
        break;
    case "delete":
        $conex->eliminar($ObjUsuario);
        break;
    case "update":
        $conex->modificar($ObjUsuario);
        break;
    case "list":
        $conex->listar();
        break;
}
