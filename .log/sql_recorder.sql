-- drop table `member` if exists `member` ;
create table member (
	id int auto_increment,
	username varchar(20),
	password binary(16),
	primary key (id)
);
-- insert into member values (null, 'admin', md5(admin)); -- fail