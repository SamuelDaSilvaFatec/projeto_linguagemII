-- Criação do BD
CREATE DATABASE IF NOT EXISTS projeto;
USE projeto;

-- Tabela de produtos
CREATE TABLE IF NOT EXISTS produtos (
    id int(3) PRIMARY KEY AUTO_INCREMENT,
    nome varchar(120) not null
);

-- Exemplos de produtos
INSERT INTO produtos (id, nome) VALUES 
    (1, 'produto1'),
    (2, 'produto2'),
    (3, 'produto3'),
    (4, 'produto4'),
    (5, 'produto5'),
    (6, 'produto6'),
    (7, 'produto7'),
    (8, 'produto8'),
    (9, 'produto9'),
    (10, 'produto10');

-- Tabela de contas para cadastro e login    
CREATE TABLE IF NOT EXISTS account (
    id int(11) PRIMARY KEY AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL 
); 

INSERT INTO account (id, username, password) 
VALUES (NULL, 'admin', MD5(admin123));

