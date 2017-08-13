-- DDL
create table board (
	id int unsigned not null primary key auto_increment,
	title varchar(100) not null,
	content text not null,
	date datetime not null,
	hit int unsigned not null default 0,
	writer varchar(20) not null,
	password varchar(100) not null
);

create table comment (
	id int unsigned not null primary key auto_increment,
	postid int unsigned not null,
	depth int unsigned not null default 0,
	content text not null,
	writer varchar(20) not null,
	password varchar(100) not null
);

