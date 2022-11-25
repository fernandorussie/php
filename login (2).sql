-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Nov-2022 às 20:50
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

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

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(140) NOT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `credito` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `lista_produto_servico` (
  `cod_servico` int(7) NOT NULL,
  `nome_servico` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `pedido` (
  `cod_pedido` int(11) NOT NULL,
  `dia_pedido` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_status` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `email_cliente` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_prestador` int(11) NOT NULL,
  `email_prestador` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_produtos` int(11) NOT NULL,
  `cod_lista_produtos` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`cod_pedido`, `dia_pedido`, `cod_status`, `cod_cliente`, `email_cliente`, `cod_prestador`, `email_prestador`, `cod_produtos`, `cod_lista_produtos`) VALUES
(10001, '01/03/2022', 0, 1, 'cliente1@teste.com.br', 1, 'prestador1@teste.com.br', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestadores`
--

CREATE TABLE `prestadores` (
  `id` int(11) NOT NULL,
  `nome` varchar(140) NOT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `produto_servico` (
  `cod_produto` int(11) NOT NULL,
  `nome_produto` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco_produto` int(11) NOT NULL,
  `cod_servico` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `servicos` (
  `numero_id` int(7) NOT NULL,
  `nome_servico` varchar(220) NOT NULL,
  `descricao_servico` varchar(220) NOT NULL,
  `preco_servico` varchar(220) NOT NULL,
  `status_servico` varchar(30) NOT NULL,
  `id_cliente` varchar(100) NOT NULL,
  `email_cliente` varchar(140) NOT NULL,
  `id_prestador` int(100) NOT NULL,
  `email_prestador` varchar(140) NOT NULL,
  `dia_pedido` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`numero_id`, `nome_servico`, `descricao_servico`, `preco_servico`, `status_servico`, `id_cliente`, `email_cliente`, `id_prestador`, `email_prestador`, `dia_pedido`) VALUES
(100024, 'Bombeiro Hidraulico', 'Vazamento no Teto', '80', '1', '1', 'cliente1@teste.com.br', 2, 'prestado2@teste.com.br', '25/11/2022'),
(100025, 'Eletricista', 'Fio cortado', '80', '1', '1', 'cliente1@teste.com.br', 2, 'prestado2@teste.com.br', '25/11/2022'),
(100026, 'Mecanico', 'Carro quebrado', '80', '1', '1', 'cliente1@teste.com.br', 2, 'prestado2@teste.com.br', '25/11/2022'),
(100027, 'Bombeiro Hidraulico', 'Vazamento em Descarga', '80', '1', '1', 'cliente1@teste.com.br', 2, 'prestado2@teste.com.br', '25/11/2022');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(140) DEFAULT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(220) NOT NULL,
  `credito` decimal(20,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `credito`) VALUES
(1, 'cliente1', 'cliente1@teste.com.br', 'senha1', '40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios1`
--

CREATE TABLE `usuarios1` (
  `id` int(11) NOT NULL,
  `usuario` varchar(220) NOT NULL,
  `senha_usuario` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios1`
--

INSERT INTO `usuarios1` (`id`, `usuario`, `senha_usuario`) VALUES
(1, 'cesar@celke.com.br', 'senha1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lista_produto_servico`
--
ALTER TABLE `lista_produto_servico`
  ADD PRIMARY KEY (`cod_servico`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`cod_pedido`);

--
-- Índices para tabela `prestadores`
--
ALTER TABLE `prestadores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto_servico`
--
ALTER TABLE `produto_servico`
  ADD PRIMARY KEY (`cod_produto`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`numero_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios1`
--
ALTER TABLE `usuarios1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `lista_produto_servico`
--
ALTER TABLE `lista_produto_servico`
  MODIFY `cod_servico` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100014;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `cod_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;

--
-- AUTO_INCREMENT de tabela `prestadores`
--
ALTER TABLE `prestadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produto_servico`
--
ALTER TABLE `produto_servico`
  MODIFY `cod_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `numero_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100029;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usuarios1`
--
ALTER TABLE `usuarios1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
