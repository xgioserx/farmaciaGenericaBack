<?php
include("views/banner.php");
?>
<html>

<head>
    <meta charset="UTF-8">
    <script src="resource/js/gestionVenta.js" type="text/javascript"></script>
</head>

<body>
    <div class="row col-11">
        <div class="bg-dark col-3 border border-white ml-4 ">
            <h1 class="text-center pt-3 pb-2 pl-4 text-white">Gestion ventas</h1>
        </div>
        <div class="ml-5 alert alert-primary">
            <h4 id="alertaV"></h4>
        </div>
        <div class="text-center col-6 mt-3 "><img src="resource/images/carrito.png" height="35px"></<img>
        </div>
    </div>

    <input type="text" id="txtIdVenta" style="display: none" value="">

    <div class="row">
        <div class="col-3 ml-3 mt-2 mb-5 mr-3 text-center">
            <input class="col-sm-5 btn btn-primary mt-4 border border-dark" type="button" value="Nueva venta" id="btnNuevaVenta">
            <br>
            <input class="col-sm-5 btn btn-primary mt-4 border border-dark" type="button" value="Guardar" id="btnGuardarVenta">
            <br>
            <input class="col-sm-5 btn btn-primary mt-4 border border-dark" type="button" value="Modificar" id="btnModificarVenta">
            <br>
            <input class="col-sm-5 btn btn-primary mt-4 border border-dark" type="button" value="Eliminar" id="btnEliminarVenta">
            <form method="post" action="resource/pdf/ventaPDF.php" target="_blank">
                <input class="col-sm-4 btn btn-secondary mt-4  border border-dark" type="submit" value="Generar PDF">
            </form>
            <form method="post" action="resource/csv/ventaCSV.php" target="_blank">
                <input class="col-sm-4 btn btn-secondary mt-4  border border-dark" type="submit" value="Generar CSV ;">
            </form>
            <form method="post" action="resource/csv/ventaCSV2puntos.php" target="_blank">
                <input class="col-sm-4 btn btn-secondary mt-4  border border-dark" type="submit" value="Generar CSV :">
            </form>
        </div>
        <div class="col-ms-1 ml-4 mb-4">
            <br><br>
            <input type="text" id="txtCedulaUsuarioV" style="display: none" value="<?php echo $_SESSION["idUser"] ?>">
            <h3 class="text-white ">Cliente:</h3>
            <select class="form-control" style="height: 28px;" id="selCliente">
            </select>
            <h3 class="text-white mt-4">Fecha de la venta:</h3>
            <input class="form-control" type="date" id="txtFechaVentaV">
            <h3 class="text-white mt-4">Hora de la venta:</h3>
            <input class="form-control" type="time" id="txtHoraV">
        </div>
        <div class="col-6 shadow bg-info border container mb-3">
            <div class="row">
                <div class="col-5 ml-3 mb-4">
                    <h3 class="text-white mt-3">Producto:</h3>
                    <select class="form-control mt-2" style="height: 28px;" id="selProducto">
                    </select>
                </div>
                <div class="col-2 ml-2">
                    <h3 class="text-white mt-4">Cantidad:</h3>
                    <input class="form-control col-10" type="number" min="1" id="txtCantidadV">
                </div>
                <div class=" mt-2">
                    <input class="btn btn-primary mt-5 border border-dark" type="button" value="Agregar al carrito" id="btnAgregarProductoVenta">
                </div>
                <div class="col-2 ml-4">
                    <u><h3 class="text-white text-center mt-4">Total</h3></u>
                    <input class="form-control " type="number" id="txtTotalV" >
                    <!-- <input class="form-control " type="number" id="txtTotalV" disabled> -->
                </div>
            </div>
            <div id="listadoCarrito" class="container-fluid">
            </div>
        </div>
    </div>
    <div id="listadoVenta" class="container-fluid">
    </div>
</body>

</html>