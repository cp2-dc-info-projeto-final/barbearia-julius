CREATE DATABASE IF NOT EXISTS BARBEARIAJULIUS;
USE BARBEARIAJULIUS;

DROP USER IF EXISTS 'barbeariajulius'@'localhost';
CREATE USER 'barbeariajulius'@'localhost' IDENTIFIED BY '123';
GRANT ALL PRIVILEGES ON BARBEARIAJULIUS.* TO 'barbeariajulius'@'localhost';

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    senha VARCHAR(255) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

DROP TABLE IF EXISTS funcionarios;
CREATE TABLE funcionarios(
    id_funcionario int NOT NULL AUTO_INCREMENT,
    nome varchar(30) NOT NULL,
    senha varchar(255) NOT NULL,
    numero varchar(11) NOT NULL,
    email varchar(30) NOT NULL,
    primary key(id_funcionario)
);
DROP TABLE IF EXISTS servico;
CREATE TABLE servico(
    id_servico int NOT NULL AUTO_INCREMENT,
    descricao varchar(50) NOT NULL,
    preco float NOT NULL,
    primary key(id_servico)
);
DROP TABLE IF EXISTS agendamento;
CREATE TABLE agendamento(
    id_agendamento int NOT NULL AUTO_INCREMENT,
    horario_inicio VARCHAR(5) NOT NULL,
    data_agenda date NOT NULL,
    id_usuario int,  
    id_funcionario int,
    id_servico int,
    primary key(id_agendamento),
    foreign key(id_usuario) references usuario(id_usuario),
    foreign key(id_funcionario) references funcionario(id_funcionario),
    foreign key(id_servico) references servico(id_servico)

);
DROP TABLE IF EXISTS administradores;
CREATE TABLE administradores (
    id_administrador INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_administrador)
);

INSERT INTO administradores (nome, senha, email) VALUES ('Administrador', '123456', 'adm@gmail.com');
INSERT INTO servico (descricao, preco) VALUES ("Corte", 20);
INSERT INTO servico (descricao, preco) VALUES ("Barba", 15);
INSERT INTO servico (descricao, preco) VALUES ("Sobrancelha", 10);
INSERT INTO servico (descricao, preco) VALUES ("Corte + Barba", 30);
INSERT INTO servico (descricao, preco) VALUES ("Corte + Sobrancelha", 25);
INSERT INTO servico (descricao, preco) VALUES ("Corte + Barba + Sobrancelha", 35);
INSERT INTO servico (descricao, preco) VALUES ("Barba + Sobrancelha", 20);

alter table agendamento
add CONSTRAINT agendamento_indisponivel_constraint unique (data_agenda, id_funcionario, horario_inicio);