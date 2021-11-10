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

insert into produto (nome, valor) values ('Folha A4', 19.8);
insert into compra (link_pdf, id_boleto, telefone_comprador) values ('https://download.gerencianet.com.br/93084_3656_CHOZE0/93084-1623-DONEM8.pdf?sandbox=true', 1438850, '3299887766');

