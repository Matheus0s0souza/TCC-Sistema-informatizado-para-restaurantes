create database tcc;

use tcc;

CREATE TABLE `login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nasc` varchar(50) NOT NULL,
  `tel` int NOT NULL,
  `ende` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
)

select * from login; 
