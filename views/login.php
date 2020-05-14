<html class="bg-info">

<body>
    <div class="container-fluid mt-2">
        <form name="formularioLogin" method="post" action="controller/ctlLogin.php">
            <div class="bg-white p-3 mb-4  rounded border-right border-bottom border-secondary">
                <hr class="bg-dark pt-1 col-11">
                <div class="text-center mb-4"><img src="resource/images/LOGO-EAM.png" height="60px" class=" mt-3 mb-3"></<img>
                </div>
                <hr class="bg-dark pt-1 mt-2 col-11">
            </div>
            <div class="bg-white border border-dark p-5 col-2 mx-auto rounded">

                <u class="text-primary">
                    <h1 class=" text-dark text-center pb-3">Iniciar sesión</h1>
                </u>
                <div class="text-center">
                    <div>
                        <input class=" col-11 mt-3 text-center text-dark" type="text" placeholder="Usuario" name="usuario" id="txtUsuario">
                    </div>
                    <div>
                        <input class="col-11 mt-3 text-center" type="password" placeholder="Contraseña" name="password" id="txtPassword">
                    </div>
                    <div>
                        <input type="text" name="type" style="display: none">
                        <input type="botton" id="btnLogin" class="col-7 btn btn-primary mt-5" onclick="validarLogin(formularioLogin, 'con')" value="Ingresar">
                    </div>
                </div>
            </u>
        </form>
    </div>
</body>

</html>