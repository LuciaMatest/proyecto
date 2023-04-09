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
  `cliente_id` int
);

-- DOCUMENTOS QUE COMPARTIR CON EL CLIENTE
CREATE TABLE `archivo` (
  `id_archivo` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_archivo` varchar(255) NOT NULL,
  `url_archivo` varchar(255) NOT NULL,
  `descripcion_archivo` varchar(255) NOT NULL
);

-- CLIENTE
CREATE TABLE `cliente` (
  `id_cliente` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_cliente` varchar(255) NOT NULL,
  `telefono_cliente` int NOT NULL,
  `email_cliente` varchar(255) NOT NULL,
  `contrasena_cliente` varchar(255) UNIQUE NOT NULL
);

-- CHAT
CREATE TABLE `mensajes` (
  `id_mensajes` int PRIMARY KEY AUTO_INCREMENT,
  `descripcion_mensajes` varchar(255) NOT NULL,
  `admin_mensajes` boolean NOT NULL,
  `fecha_mensajes` datetime,
  `cliente_id` int
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

ALTER TABLE `proyecto` ADD FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`);

ALTER TABLE `mensajes` ADD FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id_cliente`);

ALTER TABLE `factura` ADD FOREIGN KEY (`proyecto_id`) REFERENCES `proyecto` (`id_proyecto`);

ALTER TABLE `factura` ADD FOREIGN KEY (`detalles_id`) REFERENCES `detalles` (`id_detalles`);
