-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16-Maio-2024 às 22:43
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--
CREATE DATABASE IF NOT EXISTS `tcc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `tcc`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` int(11) NOT NULL,
  `tel` int(11) NOT NULL,
  `ende` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_funcionario`
--

DROP TABLE IF EXISTS `login_funcionario`;
CREATE TABLE IF NOT EXISTS `login_funcionario` (
  `id_func` int(11) NOT NULL AUTO_INCREMENT,
  `nm_func` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_func` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha_func` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf_func` int(50) NOT NULL,
  `cargo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hierarquia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_func`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `login_funcionario`
--

INSERT INTO `login_funcionario` (`id_func`, `nm_func`, `email_func`, `senha_func`, `cpf_func`, `cargo`, `hierarquia`, `img`) VALUES
(1, 'vic', 'vic@email', 'senha456', 123, 'chef', '1', 'carro.webp'),
(7, 'marco', 'marcp@email', '123', 123, 'chef', '3', 'eyy.png'),
(13, 'jo', 'jo@email', '123', 123, 'pa', '12', 'yay.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ingredientes`
--

DROP TABLE IF EXISTS `tb_ingredientes`;
CREATE TABLE IF NOT EXISTS `tb_ingredientes` (
  `id_ingr` int(11) NOT NULL AUTO_INCREMENT,
  `nm_ingr` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gra_ingr` int(100) NOT NULL,
  `desc_ingr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_ingr`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_ingredientes`
--

INSERT INTO `tb_ingredientes` (`id_ingr`, `nm_ingr`, `gra_ingr`, `desc_ingr`) VALUES
(1, 'frango', 100, 'frango assado a vapor e ervas'),
(2, 'salada de tomate', 50, 'salada de tomates com azeite'),
(3, 'peixe grelhado', 100, 'peixe assado na grelha'),
(5, 'macarrao', 50, 'macarrao cozido'),
(6, 'arroz', 50, 'arroz cozido'),
(7, 'batata frita', 50, 'batatas fritas pequenas'),
(10, 'gilo', 50, 'salada de gilo com vinagrete');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pratos`
--

DROP TABLE IF EXISTS `tb_pratos`;
CREATE TABLE IF NOT EXISTS `tb_pratos` (
  `id_prato` int(11) NOT NULL AUTO_INCREMENT,
  `nm_prato` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prato_ingr_1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prato_ingr_2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prato_ingr_3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preco_prato` int(11) DEFAULT NULL,
  `desconto` int(50) DEFAULT NULL,
  `val_tot` int(50) DEFAULT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_prato`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_pratos`
--

INSERT INTO `tb_pratos` (`id_prato`, `nm_prato`, `prato_ingr_1`, `prato_ingr_2`, `prato_ingr_3`, `preco_prato`, `desconto`, `val_tot`, `img`) VALUES
(1, 'arroz', 'arroz', 'milho', 'ervilha', 100, 50, 50, 'yay.png'),
(2, 'feijoada', 'feijão', 'linguiça', '', 100, 50, 50, 'eyy.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
