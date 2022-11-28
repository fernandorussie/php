-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Nov-2022 às 01:26
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
  `dia_pedido` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_status` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `email_cliente` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_prestador` int(11) NOT NULL,
  `email_prestador` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_produtos` int(11) NOT NULL,
  `cod_lista_produtos` int(11) NOT NULL,
  PRIMARY KEY (`cod_pedido`)
) ENGINE=MyISAM AUTO_INCREMENT=10002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `nome_produto` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco_produto` int(11) NOT NULL,
  `cod_servico` int(11) NOT NULL,
  PRIMARY KEY (`cod_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `nome_servico` varchar(220) NOT NULL,
  `descricao_servico` varchar(220) NOT NULL,
  `preco_servico` varchar(220) NOT NULL,
  `status_servico` varchar(30) NOT NULL,
  `id_cliente` varchar(100) NOT NULL,
  `email_cliente` varchar(140) NOT NULL,
  `id_prestador` int(100) NOT NULL,
  `email_prestador` varchar(140) NOT NULL,
  `dia_pedido` varchar(30) NOT NULL,
  PRIMARY KEY (`numero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100035 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`numero_id`, `nome_servico`, `descricao_servico`, `preco_servico`, `status_servico`, `id_cliente`, `email_cliente`, `id_prestador`, `email_prestador`, `dia_pedido`) VALUES
(100024, 'Bombeiro Hidraulico', 'Vazamento no Teto', '80', '1', '1', 'cliente1@teste.com.br', 2, 'prestado2@teste.com.br', '25/11/2022'),
(100025, 'Eletricista', 'Fio cortado', '80', '1', '1', 'cliente1@teste.com.br', 2, 'prestado2@teste.com.br', '25/11/2022'),
(100026, 'Mecanico', 'Carro quebrado', '80', '1', '1', 'cliente1@teste.com.br', 2, 'prestado2@teste.com.br', '25/11/2022'),
(100027, 'Bombeiro Hidraulico', 'Vazamento em Descarga', '80', '1', '1', 'cliente1@teste.com.br', 2, 'prestado2@teste.com.br', '25/11/2022'),
(100029, '4', 'Destrancar porta', '40', '1', '1', 'cliente1@teste.com.br', 1, 'prestado1@teste.com.br', '26/11/2022'),
(100030, '1', 'Vazamento no Teto', '40', '1', '1', 'cliente1@teste.com.br', 2, 'prestado2@teste.com.br', '26/11/2022'),
(100031, '1', 'Vazamento no Teto', '40', '1', '1', 'cliente1@teste.com.br', 2, 'prestado2@teste.com.br', '26/11/2022'),
(100032, 'Bombeiro Hidraulico', 'Vazamento em Torneira', '40', '1', '1', 'cliente1@teste.com.br', 2, 'prestado2@teste.com.br', '26/11/2022'),
(100033, 'Eletricista', 'Reparo em armï¿½rio', '40', '1', '1', 'cliente1@teste.com.br', 2, 'prestado2@teste.com.br', '26/11/2022'),
(100034, 'Bombeiro Hidraulico', 'Vazamento em Descarga', '40', '1', '1', 'cliente1@teste.com.br', 2, 'prestado2@teste.com.br', '26/11/2022');

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
