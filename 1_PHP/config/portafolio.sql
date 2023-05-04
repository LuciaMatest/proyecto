CREATE DATABASE portafolio;  
USE portafolio;

-- CATEGORIAS DE LOS PRODUCTOS
CREATE TABLE categoria (
  `id_categoria` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_categoria` varchar(255) NOT NULL
);

-- PRODUCTOS QUE COMPONEN UN PROYECTO
CREATE TABLE producto (
  `id_producto` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_producto` varchar(255) NOT NULL,
  `descripcion_producto` varchar(255) NOT NULL,
  `imagen_producto` varchar(255) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int NOT NULL,
  `categoria_id` int,
  `proyecto_id` int
);

-- TRABAJOS REALIZADOS
CREATE TABLE proyecto (
  `id_proyecto` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_proyecto` varchar(255) NOT NULL,
  `fecha_proyecto` datetime NOT NULL,
  `usuario_id` int,
  `factura_id` int
);

-- DOCUMENTOS QUE COMPARTIR CON EL CLIENTE
CREATE TABLE archivo (
  `id_archivo` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_archivo` varchar(255) NOT NULL,
  `url_archivo` varchar(255) NOT NULL,
  `descripcion_archivo` varchar(255) NOT NULL,
  `proyecto_id` int
);

-- USUARIO
CREATE TABLE usuario (
  `id_usuario` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_usuario` varchar(255) NOT NULL,
  `telefono_usuario` int NOT NULL,
  `email_usuario` varchar(255) NOT NULL,
  `contrasena_usuario` varchar(255) UNIQUE NOT NULL,
  `borrado_usuario` boolean NOT NULL DEFAULT 0,
  `tipo_usuario` ENUM('usuario', 'admin') NOT NULL DEFAULT 'usuario'
);

-- CHAT
CREATE TABLE mensaje (
  `id_mensaje` int PRIMARY KEY AUTO_INCREMENT,
  `descripcion_mensaje` varchar(255) NOT NULL,
  `fecha_mensaje` datetime,
  `id_usuario_envia` int,
  `id_usuario_recibe` int
); 

-- FACTURA
CREATE TABLE factura (
  `id_factura` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_factura` varchar(255) NOT NULL,
  `fecha_pago` datetime NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `estado` ENUM ('pendiente', 'pagado') NOT NULL
);

ALTER TABLE `producto` ADD FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id_categoria`);

ALTER TABLE `producto` ADD FOREIGN KEY (`proyecto_id`) REFERENCES `proyecto` (`id_proyecto`);

ALTER TABLE `proyecto` ADD FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

ALTER TABLE `proyecto` ADD FOREIGN KEY (`factura_id`) REFERENCES `factura` (`id_factura`);

ALTER TABLE `archivo` ADD FOREIGN KEY (`proyecto_id`) REFERENCES `proyecto` (`id_proyecto`);

ALTER TABLE `mensaje` ADD FOREIGN KEY (`id_usuario_envia`) REFERENCES `usuario` (`id_usuario`);

ALTER TABLE `mensaje` ADD FOREIGN KEY (`id_usuario_recibe`) REFERENCES `usuario` (`id_usuario`);

INSERT INTO categoria (nombre_categoria) VALUES('Diseño');
INSERT INTO categoria (nombre_categoria) VALUES('Ilustraciones');
INSERT INTO categoria (nombre_categoria) VALUES('Web');


INSERT INTO usuario (nombre_usuario,telefono_usuario,email_usuario,contrasena_usuario,borrado_usuario,tipo_usuario) VALUES ('Lulú',656656565,'admin@gmail.com','admin', 0, 'admin');
INSERT INTO usuario (nombre_usuario,telefono_usuario,email_usuario,contrasena_usuario,borrado_usuario,tipo_usuario) VALUES('Alfredo',666666666,'usuario1@gmail.com','usuario1', 0 ,'usuario');

INSERT INTO producto (nombre_producto, descripcion_producto, imagen_producto, precio, cantidad, categoria_id, proyecto_id) VALUES ('Diseño 1', '"El mundo de la Tierra Media: Ilustracion inspirada en El Señor de los Anillos"', 'diseno1.jpg', 99.99, 10, 1, null);
INSERT INTO producto (nombre_producto, descripcion_producto, imagen_producto, precio, cantidad, categoria_id, proyecto_id) VALUES ('Ilustracion 1', '"En la Sala de los Menesteres Secretos, Harry descubre un lugar mágico lleno de tesoros y misterios que esperan ser explorados"', 'ilustracion1.jpg', 79.99, 3, 2, null);
INSERT INTO producto (nombre_producto, descripcion_producto, imagen_producto, precio, cantidad, categoria_id, proyecto_id) VALUES ('Web 1', '"El Doctor y su fiel TARDIS viajan por el tiempo y el espacio en una aventura intergaláctica"', 'web1.jpg', 45.90, 4, 3, null);

INSERT INTO factura (nombre_factura, fecha_pago, fecha_factura, estado)
VALUES ('Factura 1', '2023-05-01 00:00:00', '2023-04-30 00:00:00', 'pendiente');
INSERT INTO factura (nombre_factura, fecha_pago, fecha_factura, estado)
VALUES ('Factura 2', NOW(), NOW(), 'pendiente');
INSERT INTO factura (nombre_factura, fecha_pago, fecha_factura, estado)
VALUES ('Factura 3', NOW(), NOW(), 'pagado');

SET @ultimo_id_factura = LAST_INSERT_ID();
INSERT INTO proyecto (nombre_proyecto, fecha_proyecto, usuario_id, factura_id)
VALUES ('Ilustraciones familiares', '2023-05-01 00:00:00', 2, @ultimo_id_factura);

INSERT INTO proyecto (nombre_proyecto, fecha_proyecto, usuario_id, factura_id)
VALUES ('Logotipo tienda', NOW(), 4, @ultimo_id_factura);
INSERT INTO proyecto (nombre_proyecto, fecha_proyecto, usuario_id, factura_id)
VALUES ('Diseño web - tienda', NOW(), 4, @ultimo_id_factura);

INSERT INTO mensaje (descripcion_mensaje, fecha_mensaje, id_usuario_envia, id_usuario_recibe) VALUES ('Bienvenido al chat, si tienes alguna pregunta, no dudes en hacérmela saber.', NOW(), 1, 4);
INSERT INTO mensaje (descripcion_mensaje, fecha_mensaje, id_usuario_envia, id_usuario_recibe) VALUES ('Hola, necesito ayuda con un diseño', NOW(), 2, 1);
INSERT INTO mensaje (descripcion_mensaje, fecha_mensaje, id_usuario_envia, id_usuario_recibe) VALUES ('Hola, ¿cuales son tus precios?', NOW(), 3, 1);
INSERT INTO mensaje (descripcion_mensaje, fecha_mensaje, id_usuario_envia, id_usuario_recibe) VALUES ('Estos son los precios, un saludo', NOW(), 1, 3);


-- Mediante un TRIGGER ejecutaremos automaticamente la misma consulta que consiste en enviar un mensaje de bienvenida al chat de los nuevos usuarios
DELIMITER //
CREATE TRIGGER enviar_mensaje_bienvenida
AFTER INSERT ON usuario
FOR EACH ROW
BEGIN
  INSERT INTO mensaje (descripcion_mensaje, fecha_mensaje, id_usuario_envia, id_usuario_recibe)
  VALUES ('Bienvenido al chat, si tienes alguna pregunta, no dudes en hacérmela saber.', NOW(), 1, NEW.id_usuario);
END;
//
DELIMITER ;
