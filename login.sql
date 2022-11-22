-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Nov-2022 às 20:30
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
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `numero_id` int(7) NOT NULL,
  `nome_servico` varchar(220) NOT NULL,
  `descricao_servico` varchar(220) NOT NULL,
  `preco_servico` varchar(220) NOT NULL,
  `status_servico` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`numero_id`, `nome_servico`, `descricao_servico`, `preco_servico`, `status_servico`) VALUES
(1, 'Bombeiro Hidraulico', 'Vazamento Cano', '100', '2'),
(100000, 'Bombeiro', '123', '80', '1'),
(100001, 'Bombeiro', '58', '80', '1'),
(100002, 'Bombeiro', '7774', '80', '1'),
(100003, 'Bombeiro', 'cano', '80', '1'),
(100004, 'Mecanico', 'cano', '80', '1');

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
-- Índices para tabela `prestadores`
--
ALTER TABLE `prestadores`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de tabela `prestadores`
--
ALTER TABLE `prestadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `numero_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100005;

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
