-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 10/07/2019 às 15:13
-- Versão do servidor: 10.3.15-MariaDB
-- Versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `calendario`
-- utf8_general_ci
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `convites`
--

CREATE TABLE `convites` (
  `id_convite` int(11) NOT NULL,
  `fk_id_destinatario` int(11) NOT NULL,
  `fk_id_remetente` int(11) NOT NULL,
  `fk_id_evento` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `convites`
--

INSERT INTO `convites` (`id_convite`, `fk_id_destinatario`, `fk_id_remetente`, `fk_id_evento`, `status`) VALUES
(1, 2, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `fk_id_usuario` int(11) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `cor` varchar(7) DEFAULT NULL,
  `inicio` datetime NOT NULL,
  `termino` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `eventos`
--

INSERT INTO `eventos` (`id_evento`, `fk_id_usuario`, `titulo`, `descricao`, `cor`, `inicio`, `termino`) VALUES
(1, 1, 'Aniversario', 'Aniversario do Fulano', '#40E0D0', '2019-07-06 13:30:00', '2019-07-06 16:30:00'),
(2, 1, 'Entrevista Tecnica', 'Entrevista com Carlos da TokenLab.', '#FF0000', '2019-07-11 09:30:00', '2019-07-11 10:30:00'),
(3, 2, 'Jogatina', 'Dia de jogatina com amigos.', '#0071c5', '2019-07-12 18:00:00', '2019-07-13 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `senha` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `senha`) VALUES
(1, 'Gabriel', '63ab910cb3a7bc89faae5a46aa337aa22f5f4d30'),
(2, 'Carlos', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `convites`
--
ALTER TABLE `convites`
  ADD PRIMARY KEY (`id_convite`),
  ADD KEY `fk_id_destinatario` (`fk_id_destinatario`),
  ADD KEY `fk_id_remetente` (`fk_id_remetente`),
  ADD KEY `fk_id_evento` (`fk_id_evento`);

--
-- Índices de tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `convites`
--
ALTER TABLE `convites`
  MODIFY `id_convite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `convites`
--
ALTER TABLE `convites`
  ADD CONSTRAINT `convites_ibfk_1` FOREIGN KEY (`fk_id_destinatario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `convites_ibfk_2` FOREIGN KEY (`fk_id_remetente`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `convites_ibfk_3` FOREIGN KEY (`fk_id_evento`) REFERENCES `eventos` (`id_evento`);

--
-- Restrições para tabelas `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
