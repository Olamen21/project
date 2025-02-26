create database if not exists cinema character set 'utf8' collate 'utf8_unicode_ci';

CREATE TABLE theloai(
matheloai int not null auto_increment,
tentheloai VARCHAR(100) not null,
constraint pk_theloai primary key(matheloai)
)engine=Innodb;

create table quocgia(
maquocgia int not null auto_increment,
tenquocgia varchar(100) not null,
constraint pk_quocgia primary key(maquocgia)
)engine=Innodb;

create table phanloai(
maphanloai int not null auto_increment,
tenphanloai varchar(100) not null,
constraint pk_phanloai primary key(maphanloai)
)engine=Innodb;

create table daodien(
id int not null auto_increment,
avatar varchar(500),
ten varchar(100) not null,
constraint pk_daodien primary key(id)
)engine=Innodb;

create table dienvien(
id int not null auto_increment,
avatar varchar(500),
ten varchar(100) not null,
constraint pk_dienvien primary key(id)
)engine=Innodb;


create table if not exists phim(
maphim int not null ,
tenphim varchar(100) not null,
anh varchar(500) not null,
background varchar(500) not null,
maloai int not null,
matheloai int not null,
mota varchar(500),
madaodien int ,
trailer varchar(500),
maquocgia int,
constraint pk_phim primary key(maphim),
constraint fk_theloai_phim foreign key(matheloai) references theloai(matheloai),
constraint fk_quocgia_phim foreign key(maquocgia) references quocgia(maquocgia),
constraint fk_phanloai_phim foreign key(maloai) REFERENCES phanloai(maphanloai),
constraint fk_daodien_phim foreign key(madaodien) references daodien(id)
)engine=Innodb;

create table role(
id int not null auto_increment,
ten varchar(100) not null,
constraint pk_role primary key(id)
)engine=Innodb;


create table phim_dienvien(
id int not null auto_increment,
id_phim int not null,
id_dienvien int not null,
role int not null,
constraint pk_phim_dienvien primary key(id),
constraint fk_phim foreign key(id_phim) references phim(maphim),
constraint fk_dienvien foreign key(id_dienvien) references dienvien(id),
constraint fk_role foreign key(role) references role(id)
)engine=Innodb;

create table movie(
id int not null auto_increment,
id_phim int not null,
tập_phim int not null,
thoigian varchar(100) not null,
link varchar(500) not null,
constraint pk_movie primary key(id),
constraint fk_movie_phim foreign key(id_phim) references phim(maphim)
)engine=Innodb;


create table type_user(
id_type int not null auto_increment,
name_type varchar(255) not null,
constraint pk_type_user primary key(id_type)
)engine=Innodb;

create table users(
id_user int not null auto_increment,
user_name varchar(255),
email varchar(255),
phone varchar(10),
pass varchar(255),
type_id int,
created timestamp null default current_timestamp,
constraint pk_users primary key(id_user),
constraint fk_users_type_user foreign key(type_id) references type_user(id_type)
)engine=Innodb;

create table interesting(
id int not null auto_increment,
id_user int not null,
id_phim int not null,
constraint pk_interesting primary key(id),
constraint fk_his_users foreign key(id_user) references users(id_user),
constraint fk_his_phim foreign key(id_phim) references phim(maphim)
)engine=Innodb;

insert into phanloai(tenphanloai) values 
('Phim bộ'),
('Phim lẻ');

insert into quocgia(tenquocgia) values 
('Việt Nam'),
('Nhật Bản'),
('Đài Loan'),
('Ấn Độ'),
('Thái Lan'),
('Trung Quốc'),
('Mỹ'),
('Hàn Quốc');

insert into theloai(tentheloai) values 
('Phim chiếu rạp'),
('Phim khoa học viễn tưởng'),
('Phim kinh dị'),
('Phim tình cảm'),
('Phim hoạt hình'),
('Phim bí ẩn'),
('Phim học đường');

insert into type_user(name_type) values 
('admin'),
('người dùng');

insert into users(user_name,pass,type_id) values 
('admin','admin123',1);

insert into role(ten) values 
('Nam chính'),
('Nữ chính'),
('Diễn viên phụ');

CREATE VIEW view_interesting AS
SELECT u.user_name, p.tenphim, p.anh
FROM interesting AS i, phim AS p, users AS u 
WHERE i.id_user = u.id_user AND i.id_phim = p.maphim;

insert into users(user_name,pass,type_id) values 
('An','An123',2);


