create database if not exists cake character set 'utf8' collate 'utf8_unicode_ci';

CREATE TABLE type_user(
id int not null auto_increment,
type_name VARCHAR(100) not null,
constraint pk_type_user primary key(id)
)engine=Innodb;

CREATE TABLE users(
id_user int not null auto_increment,
username VARCHAR(255) not null,
address varchar(255),
phone varchar(11),
email varchar(255),
pass varchar(255) not null,
usertype int not null,
constraint pk_users primary key(id_user),
constraint fk_users_type_user foreign key(usertype) references type_user(id)
)engine=Innodb;

CREATE TABLE typecake(
id int not null auto_increment,
typename VARCHAR(255) not null,
constraint pk_typecale primary key(id)
)engine=Innodb;

CREATE TABLE cake(
id_cake int not null auto_increment,
ava VARCHAR(255),
cakename VARCHAR(255) not null,
caketype int not null,
price DECIMAL(10,3) not null,
quantity int not null,
decription VARCHAR(255) not null,
constraint pk_cake primary key(id_cake),
constraint fk_cake_typecake foreign key(caketype) references typecake(id)
)engine=Innodb;

CREATE TABLE cart(
id int not null auto_increment,
userid int not null,
cakeid int not null,
quantity int not null,
constraint pk_cart primary key(id),
constraint fk_cart_users foreign key(userid) references users(id_user),
constraint fk_cart_cake foreign key(cakeid) references cake(id_cake)
)engine=Innodb;

CREATE TABLE history(
id int not null auto_increment,
userid int not null,
cakeid int not null,
quantity int not null,
date timestamp null default current_timestamp,
username varchar(255) not null,
phone varchar(255) not null,
address varchar(255) not null,
note varchar(255) null,
constraint pk_history primary key(id),
constraint fk_his_user foreign key(userid) references users(id_user),
constraint fk_his_cake foreign key(cakeid) references cake(id_cake)
)engine=Innodb;

create table favorite(
id int not null auto_increment,
id_user int not null,
id_cake int not null,
constraint pk_interesting primary key(id),
constraint fk_fav_users foreign key(id_user) references users(id_user),
constraint fk_fav_cake foreign key(id_cake) references cake(id_cake)
)engine=Innodb;


insert into type_user(type_name) values 
('admin'),
('người dùng');

create view lich_su_dat_banh AS
select h.id, h.date, h.userid, u.username, c.id_cake, c.cakename, h.quantity, c.price, (c.price * h.quantity) as total
from history as h, users as u, cake as c
where h.userid = u.id_user and h.cakeid = c.id_cake;

create view gio_hang AS
select ca.id, ca.userid, u.username, c.id_cake, c.ava, c.cakename, ca.quantity, c.price, (c.price * ca.quantity) as total
from cart as ca, cake as c, users as u
where ca.cakeid=c.id_cake and ca.userid=u.id_user;

insert into users(username,pass,usertype) values 
('admin','admin123',1);


create table contact(
id int not null auto_increment,
uname varchar(255) not null,
email varchar(255) not null,
phone varchar(255) not null,
content varchar(500) not null,
constraint pk_content primary key(id)
)engine=Innodb;


