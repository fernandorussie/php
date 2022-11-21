-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 21-Nov-2022 às 22:16
-- Versão do servidor: 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(140) NOT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `credito` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `senha`, `credito`) VALUES
(1, 'cliente1', 'cliente1@teste.com.br', 'senha123', 40),
(2, 'cliente2', 'cliente2@teste.com.br', 'senha321', 0),
(5, 'teste', 'conta@teste.com', '123', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestadores`
--

DROP TABLE IF EXISTS `prestadores`;
CREATE TABLE IF NOT EXISTS `prestadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(140) NOT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prestadores`
--

INSERT INTO `prestadores` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'prestador1', 'prestador1@teste.com.br', 'senha456'),
(2, 'prestador2', 'prestador2@teste.com.br', 'senha654');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_id` int(7) NOT NULL,
  `nome_servico` varchar(220) NOT NULL,
  `descricao_servico` varchar(220) NOT NULL,
  `preco_servico` varchar(220) NOT NULL,
  `status_servico` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `numero_id`, `nome_servico`, `descricao_servico`, `preco_servico`, `status_servico`) VALUES
(2, 1234567, 'Carpintaria', 'Reparo armario', '80', '1'),
(3, 123123, 'Bombeiro Hidraulico', 'Vazamento Cano', '100', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(140) DEFAULT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(220) NOT NULL,
  `credito` decimal(20,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `credito`) VALUES
(1, 'cliente1', 'cliente1@teste.com.br', 'senha1', '40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios1`
--

DROP TABLE IF EXISTS `usuarios1`;
CREATE TABLE IF NOT EXISTS `usuarios1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(220) NOT NULL,
  `senha_usuario` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios1`
--

INSERT INTO `usuarios1` (`id`, `usuario`, `senha_usuario`) VALUES
(1, 'cesar@celke.com.br', 'senha1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
