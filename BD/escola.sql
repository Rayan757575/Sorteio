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


insert into alunos (Matricula, Nome)
values 	('202211640020', 'Rayan CP'),
		('202211640023', 'jaqueline CP'),
		('202211640030', 'joão CP'),
		('202211640023', 'Fernando Oliveira'),
		('202211640030', 'Marcos rodrigo'),
		('202211640026', 'lucas CP');
       

