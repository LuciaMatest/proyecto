create database peluqueria;
use peluqueria;

CREATE TABLE roles (
    codigo CHAR(5) PRIMARY KEY,
	descripcion VARCHAR(30)
) engine=innodb;

create table usuarios (
	usuario CHAR(20) PRIMARY KEY,
	clave CHAR(40) NOT NULL,
	nombre VARCHAR(75) NOT NULL,
	correo VARCHAR(75) NOT NULL,
    fecha DATE NOT NULL,
	rol CHAR(5) NOT NULL,
	index (rol),
	foreign key (rol) references roles (codigo)
) engine=innodb;

CREATE TABLE productos (
    cod_producto INT PRIMARY KEY,
    imagen_alta CHAR(100),
    imagen_baja CHAR(100),
    nombre CHAR(30) NOT NULL,
    descripcion CHAR(140) NOT NULL,
    precio FLOAT (10,2) NOT NULL,
    stock INT(3) NOT NULL
) engine=innodb;

insert into roles (codigo, descripcion) values ('ADM01','Administrador');
insert into roles (codigo, descripcion) values ('M0001','Moderador');
insert into roles (codigo, descripcion) values ('U0001','Usuario');

insert into usuarios (usuario, clave, nombre, correo, fecha, rol) values ('Lulu','361c2042f695b5f3d30ee3ec0429750df6279a04','Lucia123','lucia@correo.com', '1994-10-11', 'ADM01');
insert into usuarios (usuario, clave, nombre, correo, fecha, rol) values ('Mod1','d2556a84b8b33416e0475cb7346fd65682bde4b6','Mod123','mod1@correo.com', '2015-09-14', 'M0001');
insert into usuarios (usuario, clave, nombre, correo, fecha, rol) values ('User1','1738fbf898038e1b9119d24c929804df51e506aa','Usu123','usu1@correo.com', '2001-05-22', 'U0001');

insert into productos (cod_producto, imagen_alta, imagen_baja, nombre, descripcion, precio, stock) values ('1117','1-1.png', '1-baja.png', 'Tahe Botanic','Mascarilla Aceite de Árgan, Aceite de Amapola y Aceite de Palo de Rosa 700 ml','21.80','7');
insert into productos (cod_producto, imagen_alta, imagen_baja, nombre, descripcion, precio, stock) values ('2596','2-2.png', '2-baja.png', 'Tahe Natural Hair','Champu Dermorelax Essence 1000 ml','19.95','10');
insert into productos (cod_producto, imagen_alta, imagen_baja, nombre, descripcion, precio, stock) values ('3030','3-3.png', '3-baja.png', 'Postquam','Champú de hierbas 1000 ml','6.90','4');
insert into productos (cod_producto, imagen_alta, imagen_baja, nombre, descripcion, precio, stock) values ('3152','4-4.png', '4-baja.png', 'Crawford','Champú nutrición 1000 ml','10.61','12');
insert into productos (cod_producto, imagen_alta, imagen_baja, nombre, descripcion, precio, stock) values ('3319','5-5.png', '5-baja.png', 'Revlon','Champú Micellar Equave hidratante con queratina 250 ml','13.81','6');
insert into productos (cod_producto, imagen_alta, imagen_baja, nombre, descripcion, precio, stock) values ('4497','6-6.png', '6-baja.png', 'Postquam','Emulsión Suavizante Cabellos Teñidos 1000 ml','8.90','2');

create table ventas (
    id_ventas INT PRIMARY KEY AUTO_INCREMENT,
    usuario_ventas CHAR(30) NOT NULL,
    fecha_compra DATE NOT NULL,
    cod_producto INT NOT NULL,
    cantidad INT NOT NULL,
    precio_total NUMERIC(10,2) NOT NULL,
	index(usuario_ventas),
    index(cod_Producto),
	foreign key (usuario_ventas) references usuarios (usuario),
	foreign key (cod_producto) references productos (cod_producto)
) engine=innodb;

create table albaran (
    id_albaran INT PRIMARY KEY AUTO_INCREMENT,
    fecha_albaran DATE NOT NULL,
    cod_producto INT NOT NULL,
    cantidad INT NOT NULL,
    usuario_albaran CHAR(30) NOT NULL,
    index(usuario_albaran),
    index(cod_Producto),
    foreign key (usuario_albaran) references usuarios (usuario),
	foreign key (cod_producto) references productos (cod_producto)
) engine=innodb;