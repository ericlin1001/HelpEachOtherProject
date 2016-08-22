create table think_user_info(uid int(8) not null auto_increment,username varchar(255) not null,password varchar(255) not null,gender char(1) not null,email varchar(255) not null,gpp int(8) not null default 20,area varchar(255) not null,primary key (uid)) engine=MyISAM default charset=utf8;

 create table think_task_info(tid int(8) not null auto_increment,pid int(8) not null,rid int(8) default -1,type varchar(255),title varchar(255),description varchar(255),rgender char(1),taskgpp int(8) default 0,note varchar(255),status varchar(255) default "New Poser",primary key (tid)) engine=MyISAM default charset=utf8;

 insert into think_user_info(uid,username) values(-1,'NULL');
