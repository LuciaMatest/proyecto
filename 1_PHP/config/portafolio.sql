CREATE DATABASE portafolio;  
USE portafolio;

-- CATEGORIAS DE LOS PRODUCTOS
CREATE TABLE `categoria` (
  `id_categoria` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_categoria` varchar(255) NOT NULL
);

-- PRODUCTOS QUE COMPONEN UN PROYECTO
CREATE TABLE `producto` (
  `id_producto` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_producto` varchar(255) NOT NULL,
  `descripcion_producto` varchar(255) NOT NULL,
  `imagen_producto` varchar(255) NOT NULL,
  `categoria_id` int
);

-- TRABAJOS REALIZADOS
CREATE TABLE `proyecto` (
  `id_proyecto` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_proyecto` varchar(255) NOT NULL,
  `fecha_proyecto` datetime NOT NULL,
  `producto_id` int,
  `archivo_id` int,
  `usuario_id` int
);

-- DOCUMENTOS QUE COMPARTIR CON EL CLIENTE
CREATE TABLE `archivo` (
  `id_archivo` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_archivo` varchar(255) NOT NULL,
  `url_archivo` varchar(255) NOT NULL,
  `descripcion_archivo` varchar(255) NOT NULL
);

-- USUARIO
CREATE TABLE `usuario` (
  `id_usuario` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_usuario` varchar(255) NOT NULL,
  `telefono_usuario` int NOT NULL,
  `email_usuario` varchar(255) NOT NULL,
  `contrasena_usuario` varchar(255) UNIQUE NOT NULL,
  `tipo_usuario` ENUM ('usuario', 'admin') NOT NULL
);

-- CHAT
CREATE TABLE `mensajes` (
  `id_mensajes` int PRIMARY KEY AUTO_INCREMENT,
  `descripcion_mensajes` varchar(255) NOT NULL,
  `admin_mensajes` boolean NOT NULL,
  `fecha_mensajes` datetime,
  `usuario_id` int
);

-- FACTURA
CREATE TABLE `factura` (
  `id_factura` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_factura` varchar(255) NOT NULL,
  `fecha_pago` datetime NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `estado` ENUM ('pendiente', 'pagado') NOT NULL,
  `proyecto_id` int,
  `detalles_id` int
);

-- DETALLES DE LA FACTURA
CREATE TABLE `detalles` (
  `id_detalles` int PRIMARY KEY AUTO_INCREMENT,
  `descripcion_detalles` varchar(255) NOT NULL,
  `precio` float NOT NULL,
  `IVA` int NOT NULL,
  `cantidad` int NOT NULL
);

ALTER TABLE `producto` ADD FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id_categoria`);

ALTER TABLE `proyecto` ADD FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`);

ALTER TABLE `proyecto` ADD FOREIGN KEY (`archivo_id`) REFERENCES `archivo` (`id_archivo`);

ALTER TABLE `proyecto` ADD FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

ALTER TABLE `mensajes` ADD FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`);

ALTER TABLE `factura` ADD FOREIGN KEY (`proyecto_id`) REFERENCES `proyecto` (`id_proyecto`);

ALTER TABLE `factura` ADD FOREIGN KEY (`detalles_id`) REFERENCES `detalles` (`id_detalles`);

INSERT INTO categoria (nombre_categoria) VALUES('Ilustraciones');
INSERT INTO categoria (nombre_categoria) VALUES('Diseño');
INSERT INTO categoria (nombre_categoria) VALUES('Desarrollo web');


INSERT INTO usuario (nombre_usuario,telefono_usuario,email_usuario,contrasena_usuario,tipo_usuario) VALUES('ADMIN',654702478,'lulu.ilustracion@gmail.com','admin','admin');
INSERT INTO usuario (nombre_usuario,telefono_usuario,email_usuario,contrasena_usuario,tipo_usuario) VALUES('USER',666666666,'usuario1@gmail.com','usuario1','usuario');