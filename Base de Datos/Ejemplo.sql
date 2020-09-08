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
