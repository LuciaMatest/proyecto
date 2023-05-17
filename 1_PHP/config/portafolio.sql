create database portafolio;  
use portafolio;

CREATE TABLE `categoria` (
  `id_categoria` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_categoria` varchar(255) NOT NULL
);

CREATE TABLE `producto` (
  `id_producto` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_producto` varchar(255) NOT NULL,
  `descripcion_producto` varchar(255) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int NOT NULL,
  `categoria_id` int,
  `proyecto_id` int,
  `imagen_id` int
);

CREATE TABLE `imagen` (
  `id_imagen` int PRIMARY KEY AUTO_INCREMENT,
  `url_imagen` varchar(255) NOT NULL
);

CREATE TABLE `proyecto` (
  `id_proyecto` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_proyecto` varchar(255) NOT NULL,
  `fecha_proyecto` datetime NOT NULL,
  `usuario_id` int,
  `factura_id` int
);

CREATE TABLE `usuario` (
  `id_usuario` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_usuario` varchar(255) NOT NULL,
  `telefono_usuario` int NOT NULL,
  `email_usuario` varchar(255) NOT NULL,
  `contrasena_usuario` varchar(255) UNIQUE NOT NULL,
  `borrado_usuario` boolean NOT NULL DEFAULT (0),
  `tipo_usuario` ENUM ('usuario', 'admin') NOT NULL DEFAULT ('usuario')
);

CREATE TABLE `mensaje` (
  `id_mensaje` int PRIMARY KEY AUTO_INCREMENT,
  `descripcion_mensaje` varchar(255) NOT NULL,
  `fecha_mensaje` datetime,
  `usuario_id` int,
  `admin_d` boolean NOT NULL
);

CREATE TABLE `factura` (
  `id_factura` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_factura` varchar(255) NOT NULL,
  `fecha_pago` datetime NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `estado` ENUM ('pendiente', 'pagado') NOT NULL DEFAULT ('pendiente')
);

ALTER TABLE `producto` ADD FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id_categoria`);

ALTER TABLE `producto` ADD FOREIGN KEY (`proyecto_id`) REFERENCES `proyecto` (`id_proyecto`);

ALTER TABLE `producto` ADD FOREIGN KEY (`imagen_id`) REFERENCES `imagen` (`id_imagen`);

ALTER TABLE `proyecto` ADD FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

ALTER TABLE `proyecto` ADD FOREIGN KEY (`factura_id`) REFERENCES `factura` (`id_factura`);

ALTER TABLE `mensaje` ADD FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

INSERT INTO categoria (nombre_categoria) VALUES('Diseño');
INSERT INTO categoria (nombre_categoria) VALUES('Ilustraciones');
INSERT INTO categoria (nombre_categoria) VALUES('Web');

INSERT INTO imagen (url_imagen) VALUES ('diseno1.jpg');
INSERT INTO imagen (url_imagen) VALUES ('ilustracion1.jpg');
INSERT INTO imagen (url_imagen) VALUES ('web1.jpg');

INSERT INTO producto (nombre_producto, descripcion_producto, precio, cantidad, categoria_id, proyecto_id, imagen_id) VALUES ('Diseño 1', '"El mundo de la Tierra Media: Ilustracion inspirada en El Señor de los Anillos"', 10.99, 100, 1, null, 1);
INSERT INTO producto (nombre_producto, descripcion_producto, precio, cantidad, categoria_id, proyecto_id, imagen_id) VALUES ('Ilustracion 1', '"En la Sala de los Menesteres Secretos, Harry descubre un lugar mágico lleno de tesoros y misterios que esperan ser explorados"', 20.84 , 100, 2, null, 2);
INSERT INTO producto (nombre_producto, descripcion_producto, precio, cantidad, categoria_id, proyecto_id, imagen_id) VALUES ('Web 1', '"El Doctor y su fiel TARDIS viajan por el tiempo y el espacio en una aventura intergaláctica"',5.41, 100, 3, null, 3);

INSERT INTO usuario (nombre_usuario, telefono_usuario, email_usuario, contrasena_usuario, tipo_usuario)
VALUES ('Lulú', 654702478, 'lulu1@gmail.com', SHA1('lulu1'), 'admin');
INSERT INTO usuario (nombre_usuario, telefono_usuario, email_usuario, contrasena_usuario)
VALUES ('Sara', 625451545, 'sara1@gmail.com', SHA1('sara1'));

-- INSERT INTO factura (nombre_factura, fecha_pago, fecha_factura, estado)VALUES (CONCAT("#", FLOOR(RAND() * 100000)), NOW(), NOW(), 'pendiente');

INSERT INTO proyecto (nombre_proyecto, fecha_proyecto, usuario_id) VALUES ('Ilustraciones familiares', NOW(), 2);

INSERT INTO mensaje (descripcion_mensaje, fecha_mensaje, usuario_id, admin_d)VALUES ('Hola, necesito ayuda con un diseño', NOW(), 2, 0);

-- Mediante un TRIGGER ejecutaremos automaticamente la misma consulta que consiste en enviar un mensaje de bienvenida al chat de los nuevos usuarios
DELIMITER //
CREATE TRIGGER enviar_mensaje_bienvenida
AFTER INSERT ON usuario
FOR EACH ROW
BEGIN
  INSERT INTO mensaje (descripcion_mensaje, fecha_mensaje, usuario_id, admin_d)
  VALUES ('Bienvenido al chat, si tienes alguna pregunta, no dudes en hacérmela saber.', NOW(), NEW.id_usuario, 1);
END;
//
DELIMITER ;

-- Mediante un TRIGGER ejecutaremos automaticamente la factura del proyecto que creemos.
DELIMITER //
CREATE TRIGGER generar_factura
BEFORE INSERT ON proyecto
FOR EACH ROW
BEGIN
  DECLARE factura_nombre VARCHAR(255);
  
  SET factura_nombre = CONCAT("#", FLOOR(RAND() * 100000));
  INSERT INTO factura (nombre_factura, fecha_pago, fecha_factura, estado)
  VALUES (factura_nombre, NEW.fecha_proyecto, NEW.fecha_proyecto, 'pendiente');
  
  SET NEW.factura_id = LAST_INSERT_ID();
END;
//
DELIMITER ;

