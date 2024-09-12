create database escola;
use escola;

create table if not exists alunos(
	Matricula varchar(12) primary key,
    Nome varchar(120)
);

create table if not exists participantes(
	ID int primary key auto_increment,
    Nome varchar(120) unique
);

create table if not exists sorteados(
	numeros int primary key
);
