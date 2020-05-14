<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Farmacia EAM</title>
</head>

<body class="bg-info" id="page-top">
    <?php
    if (isset($_GET['page'])) {
        include('views/' . $_GET['page'] . ".php");
    } else {
        include("views/login.php");
    }
    ?>
</body>

</html>