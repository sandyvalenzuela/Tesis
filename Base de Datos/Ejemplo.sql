create database ejemplo;
use ejemplo;
set sql_mode='';

create table Usuario(
	id int not null auto_increment primary key,
	nombre varchar(50),
	apellido varchar(50),
	username varchar(50),
	email varchar(200),
	password varchar(50),
	image varchar(500),
	is_active boolean not null default 1,
	is_admin boolean not null default 0,
	created_at datetime
);

insert into Usuario(nombre,apellido,email,password,is_active,is_admin,created_at) value ("Sandy", "Valenzuela","admin","90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad",1,1,NOW());

create table categoria(
	id int not null auto_increment primary key,
	nombre varchar(50),
	created_at datetime
);


create table producto(
	id int not null auto_increment primary key,
	image varchar(255),
	nombre varchar(50),
	descripcion text,
	presentacion varchar(255),
	Usuario_id int,
	categoria_id int,
	created_at datetime,
	is_active boolean default 1,
	foreign key (categoria_id) references categoria(id),
	foreign key (Usuario_id) references Usuario(id)
);



create table persona(
	id int not null auto_increment primary key,
	image varchar(255),
	nombre varchar(255),
	apellido varchar(50),
	direccion varchar(50),
	telefono varchar(50),
	email1 varchar(50),
	kind int,
	created_at datetime
);

create table operacion(
	id int not null auto_increment primary key,
	producto_id int,
	q float,
	tipooperacion_id int,
	sell_id int,
	created_at datetime,
	foreign key (product_id) references producto(id),
	foreign key (tipooperacion_id) references tipooperacion(id),
	foreign key (sell_id) references sell(id)
);
