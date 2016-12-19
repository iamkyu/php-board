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


-- SAMPLE DATA
INSERT INTO `board` (`id`, `title`, `content`, `date`, `hit`, `writer`, `password`)
VALUES (1, 'hello', 'nice to meet you', '2016-12-13 22:37:10', 3, 'nam', '1234');

INSERT INTO `board` (`id`, `title`, `content`, `date`, `hit`, `writer`, `password`)
VALUES (2, 'how are you', 'nice to meet you', '2016-12-15 22:37:10', 0, 'kim', '1234');