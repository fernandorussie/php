-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21-Nov-2022 às 13:51
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `login`
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
  `credito` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `senha`, `credito`) VALUES
(1, 'cliente1', 'cliente1@teste.com.br', 'senha123', 40.00),
(2, 'cliente2', 'cliente2@teste.com.br', 'senha321', 0.00);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prestadores`
--

INSERT INTO `prestadores` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'prestador1', 'prestador1@teste.com.br', 'senha456'),
(2, 'prestador2', 'prestador2@teste.com.br', 'senha654');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `credito`) VALUES
(1, 'cliente1', 'cliente1@teste.com.br', 'senha1', '40'),
(10, 'fernando', 'fernando-fut@live.com', '123456', '800'),
(11, 'Fernando Cesar ', 'fernandocesarrussiefelip@gmail.com', '123', '0'),
(12, 'Fernando Cesar ', 'fernandocesarrussiefelip@gmail.com', '123', '0'),
(13, 'duda', 'dudinhagata@gmail.com', '123', '0');

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
