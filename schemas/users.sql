create table users(
	id int(10) primary key auto_increment,
	name varchar(20) not null,
	email varchar(20) not null
)ENGINE=Innodb DEFAULT CHARSET=utf8;