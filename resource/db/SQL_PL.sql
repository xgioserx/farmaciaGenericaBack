DELIMITER //

CREATE PROCEDURE login (
  vusuario varchar(45),
  vpassword varchar(45)) 
COMMENT 'Procedimiento para loguearse'
BEGIN
SELECT usuario,password,nombre,cedula,id FROM usuario WHERE usuario=vusuario AND password=vpassword;
END //

CREATE FUNCTION guardarCliente (
  vid INT,
  vnombre VARCHAR(45) ,
  vapellido VARCHAR(45),
  vcedula VARCHAR(15),
  vgenero CHAR(2) ,
  vfecha_nacimiento DATE) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que almacena un cliente'
BEGIN
DECLARE res int DEFAULT 0;
IF NOT EXISTS(SELECT id FROM cliente WHERE cedula=vcedula and id<>vid)
THEN
INSERT INTO cliente(id,nombre,apellido,cedula,genero,fecha_nacimiento) 
VALUES(vid,vnombre,vapellido,vcedula,vgenero,vfecha_nacimiento);
set res=1;
END IF;
RETURN res;
END //

CREATE FUNCTION guardarInventario (
  vid INT,
  vnombre VARCHAR(45) ,
  vdescripcion VARCHAR(500),
  vfecha_vencimiento DATE,
  vcantidad INT ,
  vfecha_fabricacion DATE,
  vprecio DOUBLE ,
  vusuario_id INT,
  vlaboratorio_id INT) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que almacena un medicamento'
BEGIN
DECLARE res int DEFAULT 0;
IF NOT EXISTS(SELECT id FROM inventario_medico WHERE id<>vid)
THEN
INSERT INTO inventario_medico(id,nombre, descripcion, fecha_vencimiento,cantidad, fecha_fabricacion, precio, usuario_id, laboratorio_id) 
VALUES (vid,vnombre, vdescripcion, vfecha_vencimiento,vcantidad, vfecha_fabricacion, vprecio, vusuario_id, vlaboratorio_id);
set res=1;
END IF;
RETURN res;
END //

CREATE FUNCTION guardarUsuario (
  vid INT,
  vcedula VARCHAR(15) ,
  vnombre VARCHAR(45),
  vapellido VARCHAR(45),
  vcorreo VARCHAR(45) ,
  vusuario VARCHAR(45),
  vpassword VARCHAR(45)) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que almacena un usuario'
BEGIN
DECLARE res int DEFAULT 0;
IF NOT EXISTS(SELECT id FROM usuario WHERE usuario=vusuario and cedula=vcedula and id<>vid)
THEN
INSERT INTO usuario(id,cedula,nombre,apellido,correo,usuario,password) 
VALUES (vid,vcedula,vnombre,vapellido,vcorreo,vusuario,vpassword);
set res=1;
END IF;
RETURN res;
END //

CREATE FUNCTION guardarLaboratorio(
  vid INT,
  vnombre VARCHAR(45),
  vdescripcion VARCHAR(500)) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que almacena un laboratorio'
BEGIN
DECLARE res int DEFAULT 0;
IF NOT EXISTS(SELECT id FROM laboratorio WHERE nombre=vnombre and id<>vid)
THEN
INSERT INTO laboratorio(id,nombre,descripcion) 
VALUES (vid,vnombre,vdescripcion);
set res=1;
END IF;
RETURN res;
END //

CREATE FUNCTION modificarCliente (
  vid INT,
  vnombre VARCHAR(45) ,
  vapellido VARCHAR(45),
  vcedula VARCHAR(15),
  vgenero CHAR(2) ,
  vfecha_nacimiento DATE) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que actualiza un cliente'
BEGIN
DECLARE res int DEFAULT 0;
IF NOT EXISTS(SELECT id FROM cliente WHERE cedula=vcedula and id<>vid)
THEN
UPDATE cliente set nombre=vnombre,apellido=vapellido,cedula=vcedula,genero=vgenero,fecha_nacimiento=vfecha_nacimiento where id=vid;
set res=1;
END IF;
RETURN res;
END //

CREATE FUNCTION modificarUsuario (
  vid INT,
  vcedula VARCHAR(15) ,
  vnombre VARCHAR(45),
  vapellido VARCHAR(45),
  vcorreo VARCHAR(45) ,
  vusuario VARCHAR(45),
  vpassword VARCHAR(45)) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que actualiza un usuario'
BEGIN
DECLARE res int DEFAULT 0;
IF NOT EXISTS(SELECT usuario FROM usuario WHERE usuario=vusuario and id<>vid)
THEN
UPDATE usuario set cedula=vcedula,nombre=vnombre,apellido=vapellido,correo=vcorreo,usuario=vusuario,password=vpassword where id=vid;
set res=1;
END IF;
RETURN res;
END //

CREATE FUNCTION modificarLaboratorio (
  vid INT,
  vnombre VARCHAR(45) ,
  vdescripcion VARCHAR(500)) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que actualiza un laboratorio'
BEGIN
DECLARE res int DEFAULT 0;
IF NOT EXISTS(SELECT id FROM laboratorio WHERE nombre=vnombre and id<>vid)
THEN
UPDATE laboratorio set nombre=vnombre,descripcion=vdescripcion where id=vid;
set res=1;
END IF;
RETURN res;
END //

CREATE FUNCTION modificarInventario (
  vid INT,
  vnombre VARCHAR(45) ,
  vdescripcion VARCHAR(500),
  vfecha_vencimiento DATE,
  vcantidad INT ,
  vfecha_fabricacion DATE,
  vprecio DOUBLE,
  vusuario_id INT,
  vlaboratorio_id INT) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que actualiza un inventario'
BEGIN
DECLARE res int DEFAULT 0;
IF NOT EXISTS(SELECT id FROM inventario_medico WHERE nombre=vnombre and id<>vid)
THEN
UPDATE inventario_medico set nombre=vnombre,descripcion=vdescripcion,fecha_vencimiento=vfecha_vencimiento
,cantidad=vcantidad,fecha_fabricacion=vfecha_fabricacion,precio=vprecio,usuario_id=vusuario_id,
laboratorio_id=vlaboratorio_id where id=vid;                                                                   
set res=1;
END IF;
RETURN res;
END //

CREATE FUNCTION eliminarCliente (vid INT) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que elimina a un cliente'
BEGIN
DECLARE res int DEFAULT 0;
DELETE from cliente where id=vid;
set res=1;
RETURN res;
END //

CREATE FUNCTION eliminarInventario (vid INT) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que elimina un inventario'
BEGIN
DECLARE res int DEFAULT 0;
DELETE from inventario_medico where id=vid;
set res=1;
RETURN res;
END //

CREATE FUNCTION eliminarLaboratorio (vid INT) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que elimina a un laboratorio'
BEGIN
DECLARE res int DEFAULT 0;
DELETE from laboratorio where id=vid;
set res=1;
RETURN res;
END //

CREATE FUNCTION eliminarUsuario (vid INT) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que elimina a un usuario'
BEGIN
DECLARE res int DEFAULT 0;
DELETE from usuario where id=vid;
set res=1;
RETURN res;
END //

CREATE PROCEDURE buscarCliente (vid INT) 
COMMENT 'Procedimiento que busca un cliente'
BEGIN
SELECT id,nombre,apellido,cedula,genero,fecha_nacimiento from cliente where id=vid;
END //

CREATE PROCEDURE buscarUsuario (vid INT) 
COMMENT 'Procedimiento que busca un usuario'
BEGIN
SELECT id,cedula,nombre,apellido,correo,usuario from usuario where id=vid;
END //

CREATE PROCEDURE buscarLaboratorio (vid INT) 
COMMENT 'Procedimiento que busca un laboratorio'
BEGIN
SELECT id,nombre,descripcion from laboratorio where id = vid ;
END //

CREATE PROCEDURE buscarInventario (vid INT) 
COMMENT 'Procedimiento que busca un producto'
BEGIN
SELECT id,nombre,descripcion,fecha_vencimiento,cantidad,fecha_fabricacion,precio,usuario_id,laboratorio_id from inventario_medico where id = vid;
END //

CREATE PROCEDURE listarClientes(vid INT) 
COMMENT 'Procedimiento que lista clientes'
BEGIN
SELECT id,cedula,nombre,apellido,genero,fecha_nacimiento from cliente ;
END //

CREATE PROCEDURE listarUsuarios (vid INT) 
COMMENT 'Procedimiento que lista usuarios'
BEGIN
SELECT id,cedula,nombre,apellido,correo,usuario from usuario;
END //

CREATE PROCEDURE listarLaboratorios (vid INT) 
COMMENT 'Procedimiento que lista laboratorios'
BEGIN
SELECT id,nombre,descripcion from laboratorio;
END //

CREATE PROCEDURE listarInventario (vid INT)
COMMENT 'Procedimiento que lista inventario'
BEGIN
SELECT im.id,im.nombre,im.cantidad,im.precio,im.fecha_fabricacion fabricacion,im.fecha_vencimiento vencimiento,l.nombre laboratorio,im.descripcion,u.cedula usuario from inventario_medico im inner join laboratorio l on im.laboratorio_id=l.id inner join usuario u on u.id=im.usuario_id ORDER by im.id;
END //


/*Se debe mostrar un informe de los clientes, ordenados del que más compras a realizado al que menos compras a realizado, mostrando el total de compras y el total de dinero invertido en la farmacia*/

CREATE PROCEDURE clientesMayorCompras()
COMMENT 'Procedimiento que lista clientes ordenados por mayor compras'
BEGIN
SELECT c.id,c.nombre,c.apellido,c.cedula,count(v.id) total_compras, sum(v.valor_total) total_invertido from cliente c  join venta v on v.cliente_id=c.id GROUP BY c.id ORDER BY total_compras desc;
END //

/*Se debe mostrar un informe de todos los empleados, ordenados del empleado que más ventas ha realizado al que menos ventas ha realizado. Además, de cada empleado se debe mostrar cuantos ingresos por ventas ha generado a la farmacia*/

CREATE PROCEDURE empleadosMayorVentas()
COMMENT 'Procedimiento que lista los empleados ordenados por mayor ventas'
BEGIN
SELECT u.id,u.cedula,u.nombre,u.apellido,u.correo,u.usuario,count(v.id) total_ventas ,sum(v.valor_total) total_ingresos  from usuario u  join venta v on v.usuario_id=u.id GROUP By u.id ORDER BY total_ventas desc;
END //

 /*Se debe mostrar un informe de los productos más vendidos al menos vendido. Indicando por cada producto la cantidad total que se ha vendido cada producto.*/

CREATE PROCEDURE productosMayorVenta()
COMMENT 'Procedimiento que lista los productos ordenados por mayor venta'
BEGIN
SELECT im.id,im.nombre, im.descripcion ,im.cantidad, im.precio precio_unidad, l.nombre laboratorio ,sum(dv.cantidad) total_vendidos  from inventario_medico im  join detalle_venta dv on dv.inventario_medico_id=im.id JOIN laboratorio l on l.id=im.laboratorio_id GROUP By im.id ORDER BY total_vendidos desc;
END //


 /*Se debe mostrar un informe que indique por día, cuantas ventas se ha realizado, y el total de ingresos generados por día.*/

CREATE PROCEDURE ventasIngresosPorDia()
COMMENT 'Procedimiento que lista ventas e ingresos realizadas por dia'
BEGIN
SELECT id,fecha_venta,valor_total, count(id) total_ventas ,sum(valor_total) total_ingresos  from venta GROUP By fecha_venta ORDER BY fecha_venta desc;
END //

 /*Se debe generar un gráfico que indique la cantidad de los productos y su distribución en porcentaje*/

CREATE PROCEDURE cantidadProductosPorProducto()
COMMENT 'Procedimiento que lista la cantidad de productos por producto'
BEGIN
SELECT nombre, sum(cantidad) cantidad from inventario_medico GROUP By nombre ORDER BY cantidad;
END //

 /*Se debe mostrar un gráfico que indique la cantidad de productos vendidos por cada producto, y que además indique las ganancias generadas por cada producto en el mismo gráfico.*/

CREATE PROCEDURE cantidadProductosVendidosPorProductoGanancias()
COMMENT 'Procedimiento que lista la cantidad de los productos vendidos por producto y sus respectivas ganacias'
BEGIN
SELECT im.nombre nombre, sum(dv.cantidad) cantidad, im.precio*sum(dv.cantidad) ganancia from inventario_medico im INNER JOIN detalle_venta dv on dv.inventario_medico_id=im.id GROUP By im.id ORDER BY ganancia desc;
END //

 /*Se debe generar un gráfico que indique el total de clientes hombres y mujeres y su distribución en porcentajes*/

CREATE PROCEDURE clientesHombresMujeres()
COMMENT 'Procedimiento que lista el total de clientes hombres y mujeres'
BEGIN
SELECT genero, count(id) cantidad from cliente GROUP by genero ORDER BY cantidad desc;
END //

 /*Se debe mostrar un gráfico que indique por empleado la cantidad de ventas ha realizado al que menos ventas ha realizado. Además, de cada empleado se debe mostrar cuantos ingresos por ventas ha generado a la farmacia.*/

CREATE PROCEDURE ventasPorEmpleadoIngresoso()
COMMENT 'Procedimiento que lista ventas por empleado ingresos'
BEGIN
SELECT u.usuario, COUNT(v.id) cantidad, sum(v.valor_total) ingresos  from venta v  join usuario u on u.id=v.usuario_id GROUP By usuario ORDER BY ingresos desc;
END //

 /*Se debe mostrar un gráfico que indique por día del mes, cuantas ventas se ha realizado, y el total de ingresos generados por día.*/

CREATE PROCEDURE ventasPorDiaDelMesIngresosDiarios()
COMMENT 'Procedimiento que listar ventas por día del mes y sus ingresos diarios'
BEGIN
SELECT DAY(fecha_venta) dia, count(id) total_ventas ,sum(valor_total) total_ingresos from venta GROUP By dia ORDER BY dia;
END //


 /*Se debe mostrar un gráfico que indique por día de la semana, cuantas ventas se ha realizado, y el total de ingresos generados por día de la semana.*/

CREATE PROCEDURE ventasPorDiaDeLaSemanaIngresosDia()
COMMENT 'Procedimiento que lista ventas por día de la semana y sus ingresos diarios'
BEGIN
SELECT weekday(fecha_venta) dia, count(id) total_ventas ,sum(valor_total) total_ingresos from venta GROUP By dia ORDER BY dia;
END //

DELIMITER ;



DELIMITER //

CREATE FUNCTION guardarVenta (
  vid INT,
  vfecha_venta DATE,
  vhora TIME,
  vvalor_total DOUBLE,
  vcliente_id INT,
  vusuario_id INT) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que almacena una venta'
BEGIN
DECLARE res int DEFAULT 0;
IF NOT EXISTS(SELECT id FROM venta WHERE id<>vid)
THEN
INSERT INTO venta(id,fecha_venta,hora,valor_total,cliente_id,usuario_id) 
VALUES (vid,vfecha_venta,vhora,vvalor_total,vcliente_id,vusuario_id);
set res=1;
END IF;
RETURN res;
END //

CREATE FUNCTION modificarVenta (
  vid INT,
  vfecha_venta DATE,
  vhora TIME,
  vvalor_total DOUBLE,
  vcliente_id INT,
  usuario_id INT) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que actualiza una Venta'
BEGIN
DECLARE res int DEFAULT 0;
IF NOT EXISTS(SELECT id FROM venta WHERE id<>vid)
THEN
UPDATE venta set fecha_venta=vfecha_venta,hora=vhora,valor_total=vvalor_total, cliente_id=vcliente_id, usuario_id=vusuario_id where id=vid;     
set res=1;
END IF;
RETURN res;
END //

CREATE FUNCTION eliminarVenta (vid INT) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que elimina una venta y sus detalles'
BEGIN
DECLARE res int DEFAULT 0;
DELETE from detalle_venta where venta_id=vid;
DELETE from venta where id=vid;
set res=1;
RETURN res;
END //

CREATE PROCEDURE buscarVenta (vid INT) 
COMMENT 'Procedimiento que busca una venta'
BEGIN
SELECT id,fecha_venta,hora,valor_total,cliente_id,usuario_id from venta where id = vid ;
END //

CREATE PROCEDURE listarVentas (vid INT)
COMMENT 'Procedimiento que lista ventas'
BEGIN
SELECT v.id,v.fecha_venta fecha,v.hora hora,v.valor_total,c.cedula cliente,u.cedula usuario from venta v inner join cliente c on v.cliente_id=c.id INNER JOIN usuario u on v.usuario_id=u.id ;
END //

CREATE PROCEDURE listarCarritoVenta (vid INT)
COMMENT 'Procedimiento que lista el carrito de una venta'
BEGIN
SELECT dv.id,dv.cantidad,im.nombre producto,dv.venta_id from detalle_venta dv inner join inventario_medico im on dv.inventario_medico_id=im.id where dv.venta_id=vid;
END //

CREATE FUNCTION eliminarDetalle (vid INT) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que elimina un detalle de la venta'
BEGIN
DECLARE res int DEFAULT 0;
DELETE from detalle_venta where id=vid;
set res=1;
RETURN res;
END //






CREATE FUNCTION eliminarItemCarrito (vid INT) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que elimina item del carrito'
BEGIN
DECLARE res int DEFAULT 0;
DELETE from carrito where id=vid;
set res=1;
RETURN res;
END //


CREATE PROCEDURE listarCarrito (vid INT)
COMMENT 'Procedimiento que lista el carrito'
BEGIN
SELECT c.id,c.cantidad,im.nombre producto,c.venta_id from carrito c inner join inventario_medico im on c.inventario_medico_id=im.id ORDER by c.id desc;
END //


CREATE FUNCTION guardarItemCarrito (
  vid INT,
  vcantidad INT,
  vinventario_medico_id INT,
  vventa_id INT) RETURNS int(1)
READS SQL DATA
DETERMINISTIC
COMMENT 'Funcion que almacena un item en carrito'
BEGIN
DECLARE res int DEFAULT 0;
IF NOT EXISTS(SELECT id FROM carrito WHERE id=vid)
THEN
INSERT INTO carrito (id,cantidad,inventario_medico_id,venta_id) 
VALUES (vid,vcantidad,vinventario_medico_id,vventa_id);
set res=1;
END IF;
RETURN res;
END //



CREATE PROCEDURE eliminarTodosLosItems (vid INT)
COMMENT 'Procedimiento que elimina todos los datos de la tabla carrito'
BEGIN
DELETE FROM carrito;
END //


CREATE PROCEDURE guardarItemsAVenta(vventa_id INT)
COMMENT 'Procedimiento guardar los items del carrito a la venta'
BEGIN
INSERT INTO detalle_venta SELECT 0,cantidad,inventario_medico_id,vventa_id from carrito;
DELETE FROM carrito;
END //




DELIMITER ;





CREATE PROCEDURE precioPorGrupoCarrito(vid INT)
COMMENT 'Procedimiento calcula el precio por grupo del carrito de compras'
BEGIN
SELECT c.id,im.nombre nombre,sum(c.cantidad) cantidad,im.precio*sum(c.cantidad) sub_total from inventario_medico im INNER JOIN carrito c on c.inventario_medico_id=im.id GROUP By im.id;
END //








combinar tablas




precio por conjunto de productos

SELECT c.id,im.nombre nombre,sum(c.cantidad) cantidad,im.precio*sum(c.cantidad) sub_total from inventario_medico im INNER JOIN carrito c on c.inventario_medico_id=im.id GROUP By im.id