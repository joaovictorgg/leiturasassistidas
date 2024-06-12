-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/06/2024 às 05:06
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `listas_assistidas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `animes`
--

CREATE TABLE `animes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `diretor` varchar(255) NOT NULL,
  `ano_lancamento` int(11) NOT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `assistido` tinyint(1) DEFAULT 0,
  `nota` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `animes`
--

INSERT INTO `animes` (`id`, `titulo`, `diretor`, `ano_lancamento`, `genero`, `assistido`, `nota`, `usuario_id`) VALUES
(2, 'Demons Slayer', 'Yao Ming', 2015, 'Ação', 1, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `diretor` varchar(255) NOT NULL,
  `ano_lancamento` int(11) NOT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  `lido` tinyint(1) DEFAULT 0,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `diretor`, `ano_lancamento`, `genero`, `nota`, `lido`, `usuario_id`) VALUES
(2, 'Harry Potter 2', 'J.K Rowling', 2025, 'Fantasia', 7, 1, 0),
(3, 'Harry Potter 2', 'J.K Rowling', 2025, 'Fantasia', 7, 1, 0),
(4, 'Harry Potter 2', 'J.K Rowling', 2025, 'Fantasia', 7, 1, 1),
(5, 'Harry Potter 2', 'J.K Rowling', 2025, 'Fantasia', 7, 1, 7),
(6, 'Harry Potter 2', 'J.K Rowling', 2025, 'Fantasia', 7, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `ano_publicacao` int(11) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `lido` tinyint(1) NOT NULL DEFAULT 0,
  `nota` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `autor`, `ano_publicacao`, `genero`, `lido`, `nota`, `usuario_id`) VALUES
(15, 'top', 'Joao', 2023, 'Ação', 1, 9, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `diretor` varchar(255) NOT NULL,
  `ano_lancamento` int(11) NOT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `assistido` tinyint(1) DEFAULT 0,
  `nota` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `series`
--

INSERT INTO `series` (`id`, `titulo`, `diretor`, `ano_lancamento`, `genero`, `assistido`, `nota`, `usuario_id`) VALUES
(2, 'New Girl', 'N/A', 2010, 'Comédia', 1, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome_completo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_completo`, `email`, `senha`) VALUES
(1, 'joao victor', 'joaovictorgomesde55@gmail.com', '123'),
(2, 'manuxcm', 'manuxcm@gmail.com', '12345'),
(3, 'salvador melo', 'salvas@gmail.com', 'salva'),
(4, 'joao zinho', 'jose@gmail.com', '1234'),
(5, 'joao victor', 'joaovictorgomesde55@gmail.com', '111'),
(6, 'salvador ', 'salvando@gmail.com', '123'),
(7, 'jojo jojo', 'jojojojo@gmail.com', '321');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `animes`
--
ALTER TABLE `animes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animes`
--
ALTER TABLE `animes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `animes`
--
ALTER TABLE `animes`
  ADD CONSTRAINT `animes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
