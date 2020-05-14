<body>
    <div>
        <div class="bg-white">
            <div class="row">
                <div class="col-3">
                    <h3 class="text-dark pt-2 pl-3">
                        <?php
                        echo "Bienvenido " . $_SESSION["nameUser"]
                        ?></h3>
                </div>
                <div class="text-center col-7 mt-5 ml-3"><img src="resource/images/LOGO-EAM.png" height="65px"></<img>
                </div>
            </div>
            <nav>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active bg-secondary text-white" href="index.php?page=venta"><strong>Ventas</strong></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active bg-secondary text-white" href="index.php?page=inventarioMedico"><strong>Inventario</strong></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active bg-secondary text-white" href="index.php?page=usuario"><strong>Usuarios</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active bg-secondary text-white" href="index.php?page=cliente"><strong>Clientes</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active bg-secondary text-white" href="index.php?page=laboratorio"><strong>Laboratorios</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active bg-secondary text-white" href="index.php?page=reportes"><strong>Reportes</strong></a>
                    </li>
                    <div class="col-md text-right">
                    <form name="formularioLogout" method="post" action="controller/ctlLogin.php">
                            <input type="text" name="type" style="display: none" id="btnCerrarSession">
                            <input class="btn btn-link text-primary" type="button" value="Cerrar Session" id="btnCerrarSession" onclick="validarLogin(formularioLogout, 'desc')"></<input>
                        </form>
                    </div>
                </ul>
        </div>

</body>