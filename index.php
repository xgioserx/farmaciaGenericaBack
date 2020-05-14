<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Farmacia EAM</title>

    <link href="resource/libreries/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
    <link href="resource/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="resource/framework/c3-0.4.17/c3.css" rel="stylesheet" type="text/css" />

    <script src="resource/libreries/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="resource/libreries/datatables/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="resource/js/gestionLogin.js" type="text/javascript"></script>
    <script src="resource/js/cargarList.js" type="text/javascript"></script>
    <script src="resource/framework/c3-0.4.17/bower_components/d3/d3.min.js" type="text/javascript"></script>
    <script src="resource/framework/c3-0.4.17/c3.min.js" type="text/javascript"></script>

</head>

<body>
    <div class="text-white bg-info">
        <?php
        session_start();
        if (isset($_REQUEST['msjlogin'])) {
            echo '* ';
            echo $_REQUEST['msjlogin'];
        }
        if (isset($_SESSION["user"])) {
            include("views/masterPage.php");
        } else {
            include("views/login.php");
        }
        ?>
    </div>
</body>

<script src="resource/js/c3.js" type="text/javascript"></script>

</html>