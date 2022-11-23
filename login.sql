-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23-Nov-2022 às 22:48
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `numero_id` int(7) NOT NULL AUTO_INCREMENT,
  `nome_servico` varchar(220) NOT NULL,
  `descricao_servico` varchar(220) NOT NULL,
  `preco_servico` varchar(220) NOT NULL,
  `status_servico` varchar(30) NOT NULL,
  `id_cliente` varchar(100) NOT NULL,
  `email_cliente` varchar(140) NOT NULL,
  `id_prestador` int(100) NOT NULL,
  `email_prestador` varchar(140) NOT NULL,
  PRIMARY KEY (`numero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100017 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`numero_id`, `nome_servico`, `descricao_servico`, `preco_servico`, `status_servico`, `id_cliente`, `email_cliente`, `id_prestador`, `email_prestador`) VALUES
(1, 'Bombeiro Hidraulico', 'Vazamento Cano', '100', '0', '1', 'cliente1@teste.com.br', 2, 'prestador2@teste.com.br'),
(100005, 'Bombeiro', 'Cano quebrado', '80', '1', '2', 'cliente2@teste.com.br', 1, 'prestador1@teste.com.br'),
(100008, 'Bombeiro', 'Cano Quebrado', '80', '1', '1', 'cliente1@teste.com.br', 2, 'prestador2@teste.com.br'),
(100009, 'Bombeiro', 'Cano Quebrado cliente2', '80', '0', '2', 'cliente2@teste.com.br', 1, 'prestador1@teste.com.br'),
(100016, 'Bombeiro Hidráulico', 'Teste de painel do prestador', '80', '2', '1', 'fernando', 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos1`
--

DROP TABLE IF EXISTS `servicos1`;
CREATE TABLE IF NOT EXISTS `servicos1` (
  `numero_id` int(7) NOT NULL AUTO_INCREMENT,
  `nome_servico` varchar(220) NOT NULL,
  `descricao_servico` varchar(220) NOT NULL,
  `preco_servico` varchar(220) NOT NULL,
  `status_servico` varchar(30) NOT NULL,
  `id_clientes` varchar(100) NOT NULL,
  `id_prestadores` varchar(100) NOT NULL,
  PRIMARY KEY (`numero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100014 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos1`
--

INSERT INTO `servicos1` (`numero_id`, `nome_servico`, `descricao_servico`, `preco_servico`, `status_servico`, `id_clientes`, `id_prestadores`) VALUES
(1, 'Bombeiro Hidraulico', 'Vazamento Cano', '100', '2', '1', ''),
(100010, 'Bombeiro', 'teste cliente2', '80', '1', '2', ''),
(100011, 'Bombeiro', 'teste cliente2', '80', '1', '2', ''),
(100012, 'Eletricista', 'teste cliente1', '80', '1', '1', '');

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
