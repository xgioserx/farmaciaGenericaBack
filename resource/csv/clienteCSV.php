<?php

/* Se define la zona horaria en Colombia para generar el archivo */
date_default_timezone_set("America/Bogota");
/* Se genera el nombre del archivo con la fecha y hora de la generacion */
$fileName = 'Reporte' . '-' . date("Y-m-d") . "(" . date("h:i:sa") . ")" . '.csv';
/* Se define que se retornara un archivo CVS */
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename=' . $fileName);

$caracterSeparado = ';';

require "../../DAO/reportesDAO.php";

$dao = new reportesDAO();
$arr = $dao->reporteClientes();

$keys = array_keys($arr[0]);

$content = '';
for ($i = 0; $i < count($keys); $i++) {
    $content .= ucwords(" $keys[$i] ") . "  $caracterSeparado  ";
}
$content .= "\n";

for ($cont = 0; $cont < count($arr); $cont++) {
    $content .= "";

    for ($i = 0; $i < count($arr[0]); $i++) {
        if ($i == 4) {
            if ($arr[$cont][$keys[$i]] == 0) {
                $content .= "Masculino" . "  $caracterSeparado  ";
            } else {
                $content .= "Femenino" . "  $caracterSeparado  ";
            }
        } else {
            $content .= "" . $arr[$cont][$keys[$i]] . "" . "  $caracterSeparado  ";
        }
    }
    $content .= "\n";
}

echo $content;
