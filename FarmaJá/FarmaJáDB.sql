CREATE DATABASE FARMAJA;

USE FARMAJA;

CREATE TABLE FARMACIAS(
id_farmacia int primary key auto_increment not null,
nome varchar(30) not null,
endereco varchar(50) not null,
telefone varchar(20) not null,
CNPJ varchar(20) not null
)ENGINE = InnoDB;

CREATE TABLE REMEDIOS(
id_remedio int primary key auto_increment not null,
nome_quimico varchar(50) not null,
nome_generico varchar(50) not null,
nome_comercial varchar(50) not null,
preco decimal(10,2) not null,
descricao text not null
)ENGINE = InnoDB;

CREATE TABLE PLANOS(
id_plano int primary key auto_increment not null,
nome varchar(20) not null,
preco decimal(10,2) not null,
beneficios text
)ENGINE = InnoDB;

INSERT INTO PLANOS VALUES (default, "Grátis", 0, "Suporte 24h");
INSERT INTO PLANOS VALUES (default, "Gold", 19.90, "Suporte 24h e agendamento de entrega");
INSERT INTO PLANOS VALUES (default, "Diamond", 29.90, "Suporte 24h, agendamento de entrega e frete grátis");

CREATE TABLE CLIENTES(
id_cliente int primary key auto_increment not null,
nome varchar(50) not null,
email varchar(50) not null,
senha varchar(30) not null,
fk_id_plano int not null,

constraint fk_id_plano foreign key (fk_id_plano) references PLANOS (id_plano)
)ENGINE = InnoDB;