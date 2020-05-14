
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loginDAO
 *
 * @author XgioserX
 */
class loginDAO
{
    private $objCon;

    function __construct()
    {
        require __DIR__ . '\..\infrastructure\clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function loguear(clsLogin $obj)
    {
        $sql = "call login('". $obj->getUsuario() ."','". md5($obj->getPassword()) ."')";
        
        $resultado = $this->objCon->getConnect()->prepare($sql);

        $resultado->execute();
        if ($resultado->rowCount() > 0) {
            $vec = $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        $mensaje = "";

        if (isset($vec)) {

            session_start();

            $_SESSION["user"] = $vec[0]['usuario'];
            $_SESSION["nameUser"] = $vec[0]['nombre'];
            $_SESSION["cedulaUser"] = $vec[0]['cedula'];
            $_SESSION["idUser"] = $vec[0]['id'];

            header('location:../index.php?page=venta');
        } else {
            $mensaje = "El usuario ingresado no existe";
            header('location:../index.php?msjlogin=' . $mensaje);
        }
    }
}
