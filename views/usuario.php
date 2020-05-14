<?php
include("views/banner.php");
?>
<html>

<head>
    <meta charset="UTF-8">
    <script src="resource/js/gestionUsuario.js" type="text/javascript"></script>
</head>

<body>
    <div class="row col-11">
        <div class="bg-dark col-3 border border-white ml-4 ">
            <h1 class="text-center pt-3 pb-2 pl-4 text-white">Gestion usuarios</h1>
        </div>
        <div class="ml-5 alert alert-primary">
            <h4 id="alertaU"></h4>
        </div>
    </div>

    <input type="text" id="txtIdUsuario" style="display: none" value="">
    <div class="row">
        <div class="col-3 ml-3 mt-2 mb-5 mr-5 text-center">
            <input class="col-sm-5 btn btn-primary mt-4 border border-dark" type="button" value="Nuevo usuario" id="btnNuevoUsuario">
            <br>
            <input class="col-sm-5 btn btn-primary mt-4 border border-dark" type="button" value="Guardar" id="btnGuardarUsuario">
            <br>
            <input class="col-sm-5 btn btn-primary mt-4 border border-dark" type="button" value="Modificar" id="btnModificarUsuario">
            <br>
            <input class="col-sm-5 btn btn-primary mt-4 border border-dark" type="button" value="Eliminar" id="btnEliminarUsuario">
            <form method="post" action="resource/pdf/usuarioPDF.php" target="_blank">
                <input class="col-sm-4 btn btn-secondary mt-4 border border-dark" type="submit" value="Generar PDF">
            </form>
            <form method="post" action="resource/csv/usuarioCSV.php" target="_blank">
                <input class="col-sm-4 btn btn-secondary mt-4  border border-dark" type="submit" value="Generar CSV ;">
            </form>
            <form method="post" action="resource/csv/usuarioCSV2puntos.php" target="_blank">
                <input class="col-sm-4 btn btn-secondary mt-4  border border-dark" type="submit" value="Generar CSV :">
            </form>
        </div>
        <div class="ml-4 mr-5 col-2 mb-4">
            <br>
            <h3 class="text-white ">Cedula:</h3>
            <input class="form-control" type="text" id="txtCedulaU">
            <h3 class="text-white mt-4">Nombre:</h3>
            <input class="form-control" type="text" id="txtNombreU">
            <h3 class="text-white mt-4">Apellido:</h3>
            <input class="form-control" type="text" id="txtApellidoU">
            <h3 class="text-white mt-4">Correo:</h3>
            <input class="form-control" type="email" id="txtCorreoU">
        </div>
        <div class="col-2">
            <br><br><br>
            <h3 class="text-white mt-4">Usuario:</h3>
            <input class="form-control" type="text" id="txtUsuarioU">
            <h3 class="text-white mt-4">Contraseña:</h3>
            <input class="form-control" type="password" id="txtPass1">
        </div>
    </div>
    <div id="listadoUsuario" class="container-fluid">
    </div>
</body>

</html>