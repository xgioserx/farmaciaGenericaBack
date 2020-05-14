<?php

class genericoDAO
{
    private $objCon;
    function __construct()
    {
        require '../infrastructure/clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();

    }

    public function crearConsulta($nombreFuncion, array $datos, $tipo)
    {
        if ($tipo == "funcion") {
            $resultado = "select " . $nombreFuncion . "(";
            foreach ($datos as $valor) {
                if (is_numeric($valor)) {
                    $resultado = $resultado . $valor . ",";
                } else {
                    $resultado = $resultado . "'" . $valor . "',";
                }
            }
            $resultadoN = substr($resultado, 0, -1);
            $resultado = $resultadoN . ")";
        }
        if ($tipo == "procedimiento") {
            $resultado = "call " . $nombreFuncion . "(";
            foreach ($datos as $valor) {
                if (is_numeric($valor)) {
                    $resultado = $resultado . $valor . ",";
                } else {
                    $resultado = $resultado . "'" . $valor . "',";
                }
            }
            $resultadoN = substr($resultado, 0, -1);
            $resultado = $resultadoN . ")";
        }

        if (strpos($nombreFuncion, 'listar') !== false || strpos($nombreFuncion, 'buscar') !== false) {
         $this->objCon->Execute($resultado);
       }  else {
          $this->objCon->ExecuteTransaction($resultado);
        }
    }

}
