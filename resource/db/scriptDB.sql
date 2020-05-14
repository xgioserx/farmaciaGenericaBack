CREATE DATABASE farmacia;

CREATE TABLE IF NOT EXISTS usuario (
  id INT NOT NULL AUTO_INCREMENT,
  cedula VARCHAR(15) NOT NULL,
  nombre VARCHAR(45) NOT NULL,
  apellido VARCHAR(45) NOT NULL,
  correo VARCHAR(45) NOT NULL,
  usuario VARCHAR(45) NOT NULL,
  password VARCHAR(45) NOT NULL,
  PRIMARY KEY (id));
ALTER TABLE `usuario` ADD UNIQUE(`cedula`);
ALTER TABLE `usuario` ADD UNIQUE(`usuario`);

CREATE TABLE IF NOT EXISTS laboratorio (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(45) NOT NULL,
  descripcion VARCHAR(500) NOT NULL,
  PRIMARY KEY (id));

CREATE TABLE IF NOT EXISTS inventario_medico (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(45) NOT NULL,
  descripcion VARCHAR(500) NOT NULL,
  fecha_vencimiento DATE NOT NULL,
  cantidad INT NOT NULL,
  fecha_fabricacion DATE NOT NULL,
  precio DOUBLE NOT NULL,
  usuario_id INT NOT NULL,
  laboratorio_id INT NOT NULL,
  PRIMARY KEY (id),
CONSTRAINT fk_inventario_medico_usuario
 FOREIGN KEY (usuario_id) REFERENCES usuario (id),
  CONSTRAINT fk_inventario_medico_laboratorio1
    FOREIGN KEY (laboratorio_id)
    REFERENCES laboratorio (id));

CREATE TABLE IF NOT EXISTS cliente (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(45) NOT NULL,
  apellido VARCHAR(45) NOT NULL,
  cedula VARCHAR(15) NOT NULL,
  genero CHAR(2) NOT NULL,
  fecha_nacimiento DATE NOT NULL,
  PRIMARY KEY (id));
ALTER TABLE `cliente` ADD UNIQUE(`cedula`);

CREATE TABLE IF NOT EXISTS venta (
  id INT NOT NULL AUTO_INCREMENT,
  fecha_venta DATE NOT NULL,
  hora TIME NOT NULL,
  valor_total DOUBLE NOT NULL,
  cliente_id INT NOT NULL,
  usuario_id INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_venta_cliente1
    FOREIGN KEY (cliente_id)
    REFERENCES cliente (id),
    CONSTRAINT fk_venta_usuario1
    FOREIGN KEY (usuario_id)
    REFERENCES usuario (id));

CREATE TABLE IF NOT EXISTS detalle_venta(
  id INT NOT NULL AUTO_INCREMENT,
  cantidad INT NOT NULL,
  inventario_medico_id INT NOT NULL,
  venta_id INT NOT NULL,
  PRIMARY KEY (id),
 CONSTRAINT fk_detalle_venta_inventario_medico1
    FOREIGN KEY (inventario_medico_id)
    REFERENCES inventario_medico (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_detalle_venta_venta1
    FOREIGN KEY (venta_id)
    REFERENCES venta (id));



INSERT INTO `usuario` VALUES(0, '1029394901', 'Sergio', 'Hernandez', 'xgioserx@gmail.com', 'sergio', '202cb962ac59075b964b07152d234b70');
INSERT INTO `usuario` VALUES(0, '42001232', 'Andres', 'Pinto', 'Anpi@gmail.com', 'andres', '202cb962ac59075b964b07152d234b70');
INSERT INTO `usuario` VALUES(0, '13023454', 'Paola', 'Ramirez', 'pao@gmail.com', 'paola', '202cb962ac59075b964b07152d234b70');

INSERT INTO `cliente` VALUES(0, 'Christian', 'Hernandez', '1094935643', '0', '1990-04-02');
INSERT INTO `cliente` VALUES(0, 'Andrea', 'Giraldo', '1949209230', '1', '2000-12-11');
INSERT INTO `cliente` VALUES(0, 'Fernando', 'Sanchez', '41889037', '0', '1980-04-22');

INSERT INTO `laboratorio` VALUES(0, 'Laboratorio del quindio', 'El mejor laboratorio de la region');
INSERT INTO `laboratorio` VALUES(0, 'LabMax', 'Maximo distribuidor farmaceutico');
INSERT INTO `laboratorio` VALUES(0, 'LaboratorioSAS', 'Laboratorio regional antimotines');

INSERT INTO `inventario_medico` VALUES(0, 'Dritan', 'Alivia el dolor de garganta', '2021-06-17', 500, '2018-04-02', 600, 1, 1);
INSERT INTO `inventario_medico` VALUES(0, 'Tapabocas gerson', 'el mejor tapabocas contra el cov-19', '2022-04-02', 300, '2020-01-01', 5000, 3, 2);
INSERT INTO `inventario_medico` VALUES(0, 'Gel antibacterial', 'Lucha contra los virus y germenes', '2023-07-29', 200, '2020-01-13', 8000, 2, 3);

INSERT INTO `venta` VALUES(0, '2020-04-05', '11:23:57', 1000, 1, 2);
INSERT INTO `venta` VALUES(0, '2020-04-09', '01:23:57', 1500, 3, 1);
INSERT INTO `venta` VALUES(0, '2020-04-07', '09:37:54', 4500, 1, 1);

INSERT INTO `detalle_venta` VALUES(0, 3, 2, 3);
INSERT INTO `detalle_venta` VALUES(0, 15, 1, 2);
INSERT INTO `detalle_venta` VALUES(0, 2, 3, 1);
INSERT INTO `detalle_venta` VALUES(0, 2, 2, 1);
INSERT INTO `detalle_venta` VALUES(0, 12, 1, 1);


CREATE TABLE IF NOT EXISTS carrito(
  id INT NOT NULL AUTO_INCREMENT,
  cantidad INT NOT NULL,
  inventario_medico_id INT NOT NULL,
  venta_id int,
  PRIMARY KEY (id));