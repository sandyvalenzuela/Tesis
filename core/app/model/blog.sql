

create table post (
	id int not null auto_increment primary key,
	title varchar(200) not null,
	content varchar(1000) not null,
	image varchar(255),	
	is_public boolean not null default 0,
	created_at datetime not null,
	user_id int not null,
	foreign key(user_id) references user(id)
);