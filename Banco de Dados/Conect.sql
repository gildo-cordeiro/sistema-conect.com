create database `conect`;

use `conect`;

CREATE TABLE IF NOT EXISTS `funcionario`(
`nome` VARCHAR(15) NOT NULL,
`sobreNome` VARCHAR(35) NOT NULL,
`cpf` VARCHAR(14) NOT NULL,
`tel` VARCHAR(15) NOT NULL,
`email` VARCHAR(35) NOT NULL,
`senha` VARCHAR(40) NOT NULL,
`adm` boolean,
PRIMARY KEY (`email`)
);
select *from funcionario;
drop table funcionario;
INSERT INTO `funcionario`(nome,sobreNome,cpf,tel,email,senha,adm) VALUES 
('Gildo', 'Cordeiro Duarte','707.545.684-90','84991557032','mhenrique00@gmail.com','12345', 0);


INSERT INTO `funcionario`(nome,sobreNome,cpf,tel,email,senha,adm) VALUES ('Gildo', 'Cordeiro Duarte','707.545.684-90','84991557032','gildocordeiro2.0@gmail.com','gildogc222', 1);

CREATE TABLE IF NOT EXISTS `usuarios`(
`nome` VARCHAR(15) NOT NULL,
`sobreNome` VARCHAR(35) NOT NULL,
`cpf` VARCHAR(14) NOT NULL,
`tel` VARCHAR(15) NOT NULL,
`cep` VARCHAR(15) NOT NULL,
`estado` VARCHAR(35) NOT NULL,
`endereco` VARCHAR(100) NOT NULL,
`cidade` VARCHAR(20) NOT NULL,
`email` VARCHAR(35) NOT NULL,
`senha` VARCHAR(40) NOT NULL,
PRIMARY KEY (`email`)
);
select *from usuarios;

CREATE TABLE `arquivo`(
`id` INT NOT NULL AUTO_INCREMENT,
`arquivo` VARCHAR(40) NOT NULL,
`data` DATETIME NOT NULL,
`usuario` VARCHAR(35) NOT NULL,
unique(usuario),
PRIMARY KEY (`id`),
FOREIGN KEY(usuario) REFERENCES Usuarios(email)
);

CREATE TABLE `FuncPerfi`(
`id` INT NOT NULL AUTO_INCREMENT,
`arquivo` VARCHAR(40) NOT NULL,
`data` DATETIME NOT NULL,
`usuario` VARCHAR(35) NOT NULL,
unique(usuario),
PRIMARY KEY (`id`),
FOREIGN KEY(usuario) REFERENCES funcionario(email)
);
SELECT *FROM `FuncPerfi`;
INSERT INTO arquivo (arquivo, data,usuario) VALUES('gildo.duartec@gmail.com.jpg',NOW(),'gildo.duartec@gmail.com');

drop table arquivo;



/*-------------------------------------*/

drop database `Conect`;


