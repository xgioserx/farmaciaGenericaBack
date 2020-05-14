<?php
include("views/banner.php");
?>
<html>

<head>
    <meta charset="UTF-8">
    <script src="resource/js/gestionLaboratorio.js" type="text/javascript"></script>
</head>

<body>

    <div class="row col-11">
        <div class="bg-dark col-3 border border-white ml-4 ">
            <h1 class="text-center pt-3 pb-2 pl-4 text-white">Gestion laboratorios</h1>
        </div>
        <div class="ml-5 alert alert-primary">
            <h4 id="alertaL"></h4>
        </div>
    </div>

    <input type="text" id="txtIdLaboratorio" style="display: none" value="">
    <div class="row">
        <div class="col-3 ml-3 mt-4 mb-5 mr-5 text-center">
            <input class="col-sm-5 btn btn-primary mt-5 border border-dark" type="button" value="Nuevo laboratorio" id="btnNuevoLaboratorio">
            <br>
            <input class="col-sm-5 btn btn-primary mt-4 border border-dark" type="button" value="Guardar" id="btnGuardarLaboratorio">
            <br>
            <input class="col-sm-5 btn btn-primary mt-4  border border-dark" type="button" value="Modificar" id="btnModificarLaboratorio">
            <br>
            <input class="col-sm-5 btn btn-primary mt-4  border border-dark" type="button" value="Eliminar" id="btnEliminarLaboratorio">
        </div>

        <div class="ml-4 mr-5 col-2 mb-4">
            <br>
            <h3 class="text-white mt-1">Nombre:</h3>
            <input class="form-control" type="text" id="txtNombreL">
            <h3 class="text-white mt-4">Descripcion:</h3>
            <textarea class="form-control" id="txtDescripcionL" rows="5"></textarea>
        </div>
    </div>
    <div id="listadoLaboratorio" class="container-fluid">
    </div>
</body>

</html>