
create database formas;
use formas;
create table quadrado (
    id int primary key auto_increment,
    lado varchar(250),
    cor varchar(250),
    id_un int,
    foreign key (id_un) references unidademedida(id));


create table unidademedida(
    id int primary key auto_increment,
    un varchar(3)
);
    
    alter table quadrado
    add column fundo varchar(250);
    
    commit;
    create table circulo(
    id int primary key auto_increment,
    raio varchar(250),
    cor varchar(250),
    id_un int, foreign key (id_un) references unidademedida(id));
    
CREATE TABLE triangulo (
    id INT PRIMARY KEY AUTO_INCREMENT,
    ladoA VARCHAR(250),
    ladoB VARCHAR(250),
    ladoC VARCHAR(250),
    cor VARCHAR(250),
    id_un INT,
    FOREIGN KEY (id_un) REFERENCES unidademedida(id)
);

ALTER TABLE triangulo
ADD COLUMN fundo VARCHAR(250);

ALTER TABLE triangulo 
ADD COLUMN anguloA FLOAT, 
ADD COLUMN anguloB FLOAT, 
ADD COLUMN anguloC FLOAT,
ADD COLUMN area FLOAT,
ADD COLUMN perimetro FLOAT;