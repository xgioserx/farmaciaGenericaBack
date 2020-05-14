<?php
include("views/banner.php");
?>
<html>

<head>
    <meta charset="UTF-8">
    <script src="resource/js/gestionCliente.js" type="text/javascript"></script>
</head>

<body>
    <div class="row col-11">
        <div class="bg-dark col-3 border border-white ml-4 ">
            <h1 class="text-center pt-3 pb-2 pl-4 text-white">Gestion clientes</h1>
        </div>
        <div class="ml-5 alert alert-primary">
            <h4 id="alertaC"></h4>
        </div>
    </div>

    <input type="text" id="txtIdCliente" style="display: none" value="">

    <div class="row">
        <div class="col-3 ml-3 mt-2 mb-5 mr-5 text-center">
            <input class="col-sm-5 btn btn-primary mt-4 border border-dark" type="button" value="Nuevo cliente" id="btnNuevoCliente">
            <br>
            <input class="col-sm-5 btn btn-primary mt-4 border border-dark" type="button" value="Guardar" id="btnGuardarCliente">
            <br>
            <input class="col-sm-5 btn btn-primary mt-4  border border-dark" type="button" value="Modificar" id="btnModificarCliente">
            <br>
            <input class="col-sm-5 btn btn-primary mt-4  border border-dark" type="button" value="Eliminar" id="btnEliminarCliente">
            <form method="post" action="resource/pdf/clientePDF.php" target="_blank">
                <input class="col-sm-4 btn btn-secondary mt-4  border border-dark" type="submit" value="Generar PDF">
            </form>
            <form method="post" action="resource/csv/clienteCSV.php" target="_blank">
                <input class="col-sm-4 btn btn-secondary mt-4  border border-dark" type="submit" value="Generar CSV ;">
            </form>
            <form method="post" action="resource/csv/clienteCSV2puntos.php" target="_blank">
                <input class="col-sm-4 btn btn-secondary mt-4  border border-dark" type="submit" value="Generar CSV :">
            </form>
        </div>
        <div class="ml-4 mr-5 col-2 mb-4">
            <br><br>
            <h3 class="text-white ">Nombre:</h3>
            <input class="form-control" type="text" id="txtNombreC">
            <h3 class="text-white mt-4">Apellido:</h3>
            <input class="form-control" type="text" id="txtApellidoC">
            <h3 class="text-white mt-4">Cedula:</h3>
            <input class="form-control" type="number" id="txtCedulaC">
        </div>
        <div class="col-2">
            <br><br><br>
            <h3 class="text-white mt-2">Fecha de nacimiento:</h3>
            <input class="form-control" type="date" id="txtFechaNacimientoC">
            <h3 class="text-white mt-4">Genero:</h3>
            <select class="form-control" style="height: 28px;" id="selGenero">
                <option value="2">Seleccion una opcion</option>
                <option value="0">Masculino</option>
                <option value="1">Femenino</option>
            </select>

        </div>
    </div>
    <div id="listadoCliente" class="container-fluid">
    </div>
</body>

</html>