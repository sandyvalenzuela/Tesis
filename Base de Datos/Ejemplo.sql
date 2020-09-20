create database ejemplo;
use ejemplo;
set sql_mode='';



create table pedido(
	id int not null auto_increment primary key,
	persona_id int ,
	Usuario_id int ,
	operacion_tipo_id int default 2

	foreign key (operacion_tipo_id) references operacion_tipo(id),
	foreign key (Usuario_id) references Usuario(id),
	foreign key (persona_id) references persona(id),
	created_at datetime
);


create table operacion(
	id int not null auto_increment primary key,
	producto_id int,
	dinero float,
	operacion_tipo_id int,
	pedido_id int,
	
	foreign key (producto_id) references producto(id),
	foreign key (operacion_tipo_id) references operacion_tipo(id),
	foreign key (pedido_id) references pedido(id),
	created_at datetime
);





create table operacion_tipo(
	id int not null auto_increment primary key,
	nombre varchar(50)
);

insert into operacion_tipo (nombre) value ("Entrada");
insert into operacion_tipo (nombre) value ("salida");





create table configuracion(
	id int not null auto_increment primary key,
	titulo varchar(255) unique,
	nombre varchar(255) unique,
	tipo int,
	val varchar(255)
);
insert into configuracion(titulo,nombre,tipo,val) value("titulo","sistema de pedidos",2,"Sistema de Pedidos");
insert into configuracion(titulo,nombre,tipo,val) value("use_image_producto","Utilizar Imagenes en los productos",1,0);
insert into configuracion(titulo,nombre,tipo,val) value("active_clientes","Activar clientes",1,0);
insert into configuracion(titulo,nombre,tipo,val) value("active_providers","Activar proveedores",1,0);
insert into configuracion(titulo,nombre,tipo,val) value("active_categorias","Activar categorias",1,0);
insert into configuracion(titulo,nombre,tipo,val) value("active_reportes_word","Activar reportes en Word",1,0);
insert into configuracion(titulo,nombre,tipo,val) value("active_reportes_excel","Activar reportes en Excel",1,0);
insert into configuracion(titulo,nombre,tipo,val) value("active_reportes_pdf","Activar reportes en PDF",1,0);







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

insert into Usuario(nombre,apellido,email,password,is_active,is_admin,created_at) value ("Sandy", "Valenzuela","sandyvalenzuela1997@gmail.com","admin","90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad",1,1,NOW());

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
