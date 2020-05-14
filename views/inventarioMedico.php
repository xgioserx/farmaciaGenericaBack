<?php
include("views/banner.php");
?>
<html>

<head>
    <meta charset="UTF-8">
    <script src="resource/js/gestionInventarioMedico.js" type="text/javascript"></script>
</head>

<body>
    <div class="row col-11">
        <div class="bg-dark col-3 border border-white ml-4 ">
            <h1 class="text-center pt-3 pb-2 pl-4 text-white">Gestion medicamentos</h1>
        </div>
        <div class="ml-5 alert alert-primary">
            <h4 id="alertaI"></h4>
        </div>
    </div>
    <input type="text" id="txtIdInventarioMedico" style="display: none" value="">
    <div class="row">
        <div class="col-3 ml-3 mt-2 mb-5 text-center">
            <input class="col-sm-5 btn btn-primary mt-4 border border-dark" type="button" value="Nuevo producto" id="btnNuevoProducto">
            <br>
            <input class="col-sm-5 btn btn-primary mt-4 border border-dark" type="button" value="Guardar" id="btnGuardarInventario">
            <br>
            <input class="col-sm-5 btn btn-primary mt-4 border border-dark" type="button" value="Modificar" id="btnModificarInventario">
            <br>
            <input class="col-sm-5 btn btn-primary mt-4 border border-dark" type="button" value="Eliminar" id="btnEliminarInventario">
            <form method="post" action="resource/pdf/inventarioPDF.php" target="_blank">
                <input class="col-sm-4 btn btn-secondary mt-4 border border-dark" type="submit" value="Generar PDF">
            </form>
            <form method="post" action="resource/csv/inventarioCSV.php" target="_blank">
                <input class="col-sm-4 btn btn-secondary mt-4  border border-dark" type="submit" value="Generar CSV ;">
            </form>
            <form method="post" action="resource/csv/inventarioCSV2puntos.php" target="_blank">
                <input class="col-sm-4 btn btn-secondary mt-4  border border-dark" type="submit" value="Generar CSV :">
            </form>
        </div>
        <input type="text" id="txtCedulaUsuarioI" style="display: none" value="<?php echo $_SESSION["idUser"] ?>">

        <div class="col-2 mr-3">
            <br>
            <h3 class="text-white">Nombre:</h3>
            <input class="form-control" type="text" id="txtNombreI">
            <h3 class="text-white mt-4">Descripcion:</h3>
            <textarea class="form-control" id="txtDescripcionI" rows="3"></textarea>
            <h3 class="text-white mt-4">Laboratorio:</h3>
            <select class="form-control" style="height: 28px;" id="selLaboratorio">
            </select>
        </div>
        <div class="col-3 mt-4">
            <div class="col-8">
                <h3 class="text-white mb-2 mt-3">Fecha de vencimiento:</h3>
                <input class="form-control " type="date" id="txtFechaVencimientoI">
                <h3 class="text-white mt-4">Fecha de fabricacion:</h3>
                <input class="form-control" type="date" id="txtFechaFabricacionI">
                <h3 class="text-white mt-4">Cantidad:</h3>
                <input class="form-control" type="number" id="txtCantiadI">
                <h3 class="text-white 
                mt-4">Precio:</h3>
                <input class="form-control" type="number" id="txtPrecioI">

            </div>
        </div>
    </div>
    <div id="listadoInventario" class="container-fluid">
    </div>
</body>

</html>