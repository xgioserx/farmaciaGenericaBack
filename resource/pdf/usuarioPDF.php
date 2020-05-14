<?php

require '../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

ob_start(); //Habilita el buffer para la salida de datos 

ob_get_clean(); //Limpia lo que actualmente tenga el buffer

//En la variable content entre las etiquetas <page></page> va todo el contenido del pdf en formato html

$content = "<page backtop='38mm' backbottom='15mm' backleft='15mm' backright='100mm' footer='date;page'>";

$content .= '<link href="../css/estilosPDF.css" type="text/css" rel="stylesheet">';

$content .= "<u><h1 style='margin-top: -50px;'>Reporte Usuarios</h1></u>";

$content .= "<page_header>
             <table style='margin:auto;'>
                    <tr>
                        <td>
                        <img src='../images/LOGO-EAM.png'  height='70' alt='images'/>
                        </td>    
                    </tr>
                </table>
            </page_header>
            <page_footer>
                <table>
                    <tr>
                        <td>
                        <img src='../images/LOGO-EAM.png'  height='40' alt='images'/>
                        </td>
                     </tr>
                </table>
            </page_footer>";

require "../../DAO/reportesDAO.php";

$dao = new reportesDAO();
$arr = $dao->reporteUsuarios();
$keys = array_keys($arr[0]);

$content .= "<table border='1' cellspacing=-1'>";

$content .= "<tr>";

for ($i = 0; $i < count($keys); $i++) {
    $content .= "<th><h4>" . ucwords($keys[$i]) . "</h4></th>";
}

$content .= "</tr>";

for ($cont = 0; $cont < count($arr); $cont++) {
    $content .= "<tr>";

    for ($i = 0; $i < count($arr[0]); $i++) {

        $content .= "<td><b>" . $arr[$cont][$keys[$i]] . "</b></td>";
    }
    $content .= "</tr>";
}

$content .= "</table>";
$content .= "<h4 style='margin-top: 15px;'>cantidad de usuarios: " . $cont . "</h4>";
$content .= "</page>";

$html2pdf = new Html2Pdf('P', 'A4', 'es');
$html2pdf->writeHTML($content);
ob_end_clean();
$html2pdf->output('reporte_usuarios.pdf', 'I');
