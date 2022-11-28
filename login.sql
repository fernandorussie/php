-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Nov-2022 às 04:23
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
-- Estrutura da tabela `lista_produto_servico`
--

DROP TABLE IF EXISTS `lista_produto_servico`;
CREATE TABLE IF NOT EXISTS `lista_produto_servico` (
  `cod_servico` int(7) NOT NULL AUTO_INCREMENT,
  `nome_servico` varchar(220) NOT NULL,
  PRIMARY KEY (`cod_servico`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lista_produto_servico`
--

INSERT INTO `lista_produto_servico` (`cod_servico`, `nome_servico`) VALUES
(1, 'Bombeiro Hidraulico'),
(2, 'Carpintaria'),
(3, 'Eletricista'),
(4, 'Chaveiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `cod_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `dia_pedido` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_status` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `email_cliente` varchar(140) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_prestador` int(11) NOT NULL,
  `email_prestador` varchar(140) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_produtos` int(11) NOT NULL,
  `cod_lista_produtos` int(11) NOT NULL,
  PRIMARY KEY (`cod_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=10002 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`cod_pedido`, `dia_pedido`, `cod_status`, `cod_cliente`, `email_cliente`, `cod_prestador`, `email_prestador`, `cod_produtos`, `cod_lista_produtos`) VALUES
(10001, '01/03/2022', 0, 1, 'cliente1@teste.com.br', 1, 'prestador1@teste.com.br', 0, 1);

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
-- Estrutura da tabela `produto_servico`
--

DROP TABLE IF EXISTS `produto_servico`;
CREATE TABLE IF NOT EXISTS `produto_servico` (
  `cod_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(140) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco_produto` int(11) NOT NULL,
  `cod_servico` int(11) NOT NULL,
  PRIMARY KEY (`cod_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto_servico`
--

INSERT INTO `produto_servico` (`cod_produto`, `nome_produto`, `preco_produto`, `cod_servico`) VALUES
(1, 'Vazamento em Descarga', 200, 1),
(2, 'Vazamento em Torneira', 180, 1),
(3, 'Vazamento no Teto', 250, 1),
(4, 'Reparo em armário', 150, 2),
(5, 'Reparo em cadeira', 100, 2),
(6, 'Interruptor não funciona', 80, 3),
(7, 'Fio com mal-contato', 75, 3),
(8, 'Destrancar porta', 120, 4),
(9, 'Destrancar cadeado', 80, 4),
(10, 'Conserto de tomada', 40, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `numero_id` int(7) NOT NULL AUTO_INCREMENT,
  `nome_servico` varchar(220) CHARACTER SET latin1 NOT NULL,
  `descricao_servico` varchar(220) CHARACTER SET latin1 NOT NULL,
  `preco_produto` varchar(100) COLLATE utf8_bin NOT NULL,
  `status_servico` varchar(30) CHARACTER SET latin1 NOT NULL,
  `id_cliente` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email_cliente` varchar(140) CHARACTER SET latin1 NOT NULL,
  `id_prestador` int(100) NOT NULL,
  `email_prestador` varchar(140) CHARACTER SET latin1 NOT NULL,
  `dia_pedido` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`numero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100052 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`numero_id`, `nome_servico`, `descricao_servico`, `preco_produto`, `status_servico`, `id_cliente`, `email_cliente`, `id_prestador`, `email_prestador`, `dia_pedido`) VALUES
(100046, 'Bombeiro Hidraulico', 'Vazamento no Teto', '250', '1', '1', 'cliente1@teste.com.br', 1, 'prestado1@teste.com.br', '10 / 12 / 2022'),
(100047, 'Carpintaria', 'Reparo em cadeira', '100', '1', '1', 'cliente1@teste.com.br', 1, 'prestado1@teste.com.br', '04 / 12 / 2022'),
(100048, 'Eletricista', 'Conserto de tomada', '40', '1', '1', 'cliente1@teste.com.br', 1, 'prestado1@teste.com.br', '25 / 11 / 2022'),
(100049, '4', 'Destrancar cadeado', '80', '1', '1', 'cliente1@teste.com.br', 2, 'prestado2@teste.com.br', '26 / 11 / 2022'),
(100050, 'Eletricista', 'Fio com mal-contato', '75', '1', '1', 'cliente1@teste.com.br', 2, 'prestado2@teste.com.br', '10 / 12 / 2022'),
(100051, 'Eletricista', 'Fio com mal-contato', '75', '2', '1', 'cliente1@teste.com.br', 1, 'prestado1@teste.com.br', '10 / 12 / 2022');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
