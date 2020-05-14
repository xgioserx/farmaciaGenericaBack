<?php
include("views/banner.php");
?>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <div class="row">

        <div class="bg-dark col-3 border border-white ml-5 mr-5">
            <h1 class="text-center pt-3 pb-2 pl-4 text-white">Reportes CSV</h1>
        </div>
        <div class="col-1"></div>

        <div class=" col-3 bg-dark border border-white ml-5">
            <h1 class="text-center pt-3 pb-2 pl-2 text-white">Reportes gráficos</h1>
        </div>
    </div>
    <div class="row">

        <div class="col-3 ml-5 mt-2 mb-5 mr-5 text-center">

            <form method="post" action="resource/csv/VentasPorDiaCSV.php" target="_blank">
                <input class="btn btn-secondary mt-5  border border-dark" type="submit" value="Ventas e ingresos realizadas por dia - CSV ;">
            </form>
            <form method="post" action="resource/csv/VentasPorDiaCSV2puntos.php" target="_blank">
                <input class="btn btn-secondary mt-3 border border-dark" type="submit" value="Ventas e ingresos realizadas por dia - CSV :">
            </form>

            <form method="post" action="resource/csv/ProductosVentaCSV.php" target="_blank">
                <input class="btn btn-secondary mt-5  border border-dark" type="submit" value="Productos ordenados por mayor venta - CSV ;">
            </form>
            <form method="post" action="resource/csv/ProductosVentaCSV2puntos.php" target="_blank">
                <input class="btn btn-secondary mt-3 border border-dark" type="submit" value="Productos ordenados por mayor venta - CSV :">
            </form>

            <form method="post" action="resource/csv/ClientesComprasCSV.php" target="_blank">
                <input class="btn btn-secondary mt-5  border border-dark" type="submit" value="Clientes ordenados por mayor compras - CSV ;">
            </form>
            <form method="post" action="resource/csv/ClientesComprasCSV2puntos.php" target="_blank">
                <input class="btn btn-secondary mt-3 mb-4 border border-dark" type="submit" value="Clientes ordenados por mayor compras - CSV :">
            </form>

            <form method="post" action="resource/csv/EmpleadosVentasCSV.php" target="_blank">
                <input class="btn btn-secondary mt-4  border border-dark" type="submit" value="Empleados ordenados por mayor ventas - CSV ;">
            </form>
            <form method="post" action="resource/csv/EmpleadosVentasCSV2puntos.php" target="_blank">
                <input class="btn btn-secondary mt-3 mb-4  border border-dark" type="submit" value="Empleados ordenados por mayor ventas - CSV :">
            </form>

        </div>


        <div class="col-5 ml-5 mt-5 text-center">
          <form method="post" action="index.php?page=viewReports/clientesHombresMujeres">
                <input class="btn btn-secondary mt-3 mb-4 border border-dark" type="submit" value="Total de clientes hombres y mujeres">
            </form>

            <form method="post" action="index.php?page=viewReports/cantidadProductos">
                <input class="btn btn-secondary mt-4 mb-4 border border-dark" type="submit" value="Cantidad de productos en inventario" id="btnLlenarCantidad">
            </form>

            <form method="post" action="index.php?page=viewReports/ventasDiaDelMesIngresos">
                <input class="btn btn-secondary mt-4 mb-4 border border-dark" type="submit" value="Ventas por día del mes y sus ingresos diarios">
            </form>

            <form method="post" action="index.php?page=viewReports/cantidadProductosVendidosGanancias">
                <input class="btn btn-secondary mt-4 mb-4 border border-dark" type="submit" value="Cantidad de productos vendidos y sus ganancias">
            </form>

            <form method="post" action="index.php?page=viewReports/ventasDiaDeLaSemanaIngresos">
                <input class="btn btn-secondary mt-4 mb-4 border border-dark" type="submit" value="Ventas por día de la semana y sus ingresos diarios">
            </form>

            <form method="post" action="index.php?page=viewReports/empleadoVentasIngresos">
                <input class="btn btn-secondary mt-4 mb-4 border border-dark" type="submit" value="Cantidad de ventas por empleado y sus ingresos a la farmacia">
            </form>

            

        </div>
    </div>
</body>
</html>