-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Nov-2022 às 20:51
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
  `email_prestador` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`numero_id`, `nome_servico`, `descricao_servico`, `preco_servico`, `status_servico`, `id_cliente`, `email_cliente`, `id_prestador`, `email_prestador`) VALUES
(1, 'Bombeiro Hidraulico', 'Vazamento Cano', '100', '2', '1', 'cliente1@teste.com.br', 2, 'prestador2@teste.com.br'),
(100005, 'Bombeiro', 'Cano quebrado', '80', '1', '2', 'cliente2@teste.com.br', 1, 'prestador1@teste.com.br'),
(100008, 'Bombeiro', 'Cano Quebrado', '80', '1', '1', 'cliente1@teste.com.br', 2, 'prestador2@teste.com.br'),
(100009, 'Bombeiro', 'Cano Quebrado cliente2', '80', '1', '2', 'cliente2@teste.com.br', 1, 'prestador1@teste.com.br'),
(100016, 'Bombeiro Hidráulico', 'Teste de painel do prestador', '80', '1', '1', '', 0, '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`numero_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `numero_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100017;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
