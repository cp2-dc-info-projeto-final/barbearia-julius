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
    FOREIGN KEY (id_usuario) REFERENCES codigos_predefinidos(codigo)
);

DROP TABLE IF EXISTS codigos_predefinidos;
CREATE TABLE codigos_predefinidos (
    id_cod INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(10) NOT NULL,
    FOREIGN KEY (id_cod) REFERENCES usuarios(id_usuario)
);


DROP TABLE IF EXISTS funcionarios;
CREATE TABLE funcionarios(
    id_funcionario int NOT NULL AUTO_INCREMENT,
    nome varchar(30) NOT NULL,
    senha varchar(10) NOT NULL,
    numero varchar(11) NOT NULL,
    email varchar(30) NOT NULL,
    primary key(id_funcionario)
);
DROP TABLE IF EXISTS servico;
CREATE TABLE servico(
    id_servico int NOT NULL AUTO_INCREMENT,
    descricao varchar(30) NOT NULL,
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
    senha VARCHAR(8) NOT NULL,
    email VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_administrador)
);

INSERT INTO administradores (nome, senha, email) VALUES ('Administrador', '123456', 'adm@gmail.com');

INSERT INTO funcionarios (id_funcionario, nome, senha, numero, email) VALUES (1, "Julius", "ju1452", "21987456123", "julis@email.com");
INSERT INTO funcionarios (id_funcionario, nome, senha, numero, email) VALUES (2, "Chris", "ch5689", "21932145678", "chris@email.com");
INSERT INTO codigos_predefinidos (codigo) VALUES ('ABC12'),('DEF34'),('GHI56');
