create database gn_database;

use gn_database;

create table produto(
	id int primary key auto_increment,
    nome varchar(100) not null,
    valor float not null
);

create table compra(
	id_compra int primary key auto_increment,
	link_pdf varchar(255) not null,
    id_boleto int not null,
    telefone_comprador varchar(11) not null
);
