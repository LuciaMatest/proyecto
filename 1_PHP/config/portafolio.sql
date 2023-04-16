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
  `borrado_usuario` boolean NOT NULL,
  `tipo_usuario` ENUM('usuario', 'admin') NOT NULL DEFAULT 'usuario'
);

-- CHAT
CREATE TABLE mensaje (
  `id_mensaje` int PRIMARY KEY AUTO_INCREMENT,
  `descripcion_mensaje` varchar(255) NOT NULL,
  `admin_mensaje` boolean NOT NULL,
  `fecha_mensaje` datetime,
  `usuario_id` int
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

ALTER TABLE `mensaje` ADD FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

INSERT INTO categoria (nombre_categoria) VALUES('disenos');
INSERT INTO categoria (nombre_categoria) VALUES('ilustraciones');
INSERT INTO categoria (nombre_categoria) VALUES('web');


INSERT INTO usuario (nombre_usuario,telefono_usuario,email_usuario,contrasena_usuario,borrado_usuario,tipo_usuario) VALUES ('ADMIN',656656565,'admin@gmail.com','admin', 0, 'admin');
INSERT INTO usuario (nombre_usuario,telefono_usuario,email_usuario,contrasena_usuario,borrado_usuario,tipo_usuario) VALUES('USER',666666666,'usuario1@gmail.com','usuario1', 0 ,'usuario');

INSERT INTO producto (nombre_producto, descripcion_producto, imagen_producto, precio, cantidad, categoria_id, proyecto_id) VALUES ('Diseño 1', '"El mundo de la Tierra Media: Ilustracion inspirada en El Señor de los Anillos"', 'diseno1.jpg', 99.99, 10, 1, null);
