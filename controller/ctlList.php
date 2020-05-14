<?php

include '../DAO/listDAO.php';

$type = isset($_POST['type']) ? $_POST['type'] : "";
$valor = isset($_POST['valor']) ? $_POST['valor'] : "";

$conex = new listDAO();

switch ($type) {
    case "loadListLaboratorios":
        $conex->listLaboratorios();
        break;

    case "loadListMedicamentos":
        $conex->listMedicamentos();
        break;

    case "loadListClientes":
        $conex->ListClientes();
        break;
}
