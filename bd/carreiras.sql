-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20-Set-2021 às 16:17
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `carreiras`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatos`
--

DROP TABLE IF EXISTS `candidatos`;
CREATE TABLE IF NOT EXISTS `candidatos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `curriculo` varchar(250) NOT NULL,
  `vaga` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_oportunidade` (`vaga`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lojas`
--

DROP TABLE IF EXISTS `lojas`;
CREATE TABLE IF NOT EXISTS `lojas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `loja` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `endereco` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `lojas`
--

INSERT INTO `lojas` (`id`, `loja`, `endereco`) VALUES
(1, 'Jacobina', 'Av. Orlando Oliveira Pires, 206  Centro'),
(2, 'Senhor do Bonfim', 'Pça. Rua Rui Barbosa, 08 Centro - '),
(3, 'Capim Grosso', 'Av. ACM, 01 Centro '),
(4, 'Juazeiro', 'Rua Américo Alves, 14  Centro'),
(5, 'Petrolina', 'Rua Dom Vital, 448-B Centro '),
(6, 'River Shopping', 'Av. Monsenhor Ângelo Sampaio, 100 Centro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oportunidade`
--

DROP TABLE IF EXISTS `oportunidade`;
CREATE TABLE IF NOT EXISTS `oportunidade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `loja` int NOT NULL,
  `status` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_loja` (`loja`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `candidatos`
--
ALTER TABLE `candidatos`
  ADD CONSTRAINT `fk_oportunidade` FOREIGN KEY (`vaga`) REFERENCES `oportunidade` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `oportunidade`
--
ALTER TABLE `oportunidade`
  ADD CONSTRAINT `fk_loja` FOREIGN KEY (`loja`) REFERENCES `lojas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
