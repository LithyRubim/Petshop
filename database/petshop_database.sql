create database petshop;

use petshop;

create table usuarios (
	id int(11) auto_increment primary key,
    nome varchar(60) not null,
    data_nascimento datetime,
    cpf bigint(11),
    email varchar(50),
    login varchar(25) not null,
    senha varchar(100) not null,
    id_perfil int(11) not null    
);

create table produtos (
	id int(11) auto_increment primary key,
    nome varchar(60) not null,
    valor_unitario float(10,2) not null,
    qtd_estoque int(3) not null
);

create table venda(
	id int(11) auto_increment primary key,
    id_cliente int(11) not null,
    id_produto int(11) not null,
    data_compra datetime not null,
    qtd_compra int(3) not null,
    valor_total float(10,2) not null
);

create table pet(
	id int(11) auto_increment primary key,
    id_dono int(11) not null,
    nome varchar(60) not null,
    idade int(3) not null,
    raca varchar(255) not null
);

create table especie(
	id int(11) auto_increment primary key,
    especie varchar(60) not null
);

create table raca(
	id int(11) auto_increment primary key,
    raca varchar(60) not null,
    id_especie int(11) not null
);

create table perfil(
	id int(11) auto_increment primary key,
    perfil varchar(60) not null,
    nivel_acesso int(3)
);

#-----------------------------------------------
# dados iniciais
#-----------------------------------------------

insert into perfil(perfil, nivel_acesso) values("Administrador", 777);
insert into perfil(perfil, nivel_acesso) values("Cliente", 444);

Insert into usuarios(nome, data_nascimento, cpf, email, login, senha, id_perfil) 
values("Administrador", "2020-01-01", 0, "exemplo@exemplo.com", "admin", md5("admin"), 1);

