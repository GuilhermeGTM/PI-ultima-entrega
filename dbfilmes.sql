-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/02/2024 às 03:10
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbfilmes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `genero` varchar(32) NOT NULL,
  `sinopse`	varchar(10000) NULL,
  `nota` float null
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `filmes`
--

INSERT INTO `filmes` (`id`, `nome`, `genero`,`nota`,`sinopse`) VALUES
(22, 'Senhor das Armas', 'Guerra, Drama', 4.1,'Um agente incorruptível da Interpol persegue um negociante de armas chamado Yuri Orlov, que ficou milionário se aproveitando do fim da Guerra Fria, do colapso da União Soviética e do crescimento do terrorismo internacional para fazer negócios em todas as partes do mundo.'),
(21, 'Bastardos Inglorious ', 'Guerra, Ação', 4.6,'Durante a Segunda Guerra Mundial, na França, judeus americanos espalham o terror entre o terceiro Reich. Ao mesmo tempo, Shosanna, uma judia que fugiu dos nazistas, planeja vingança quando um evento em seu cinema reunirá os líderes do partido.'),
(20, 'Avatar', 'Ação, Ficção cientifica',4.86,'No exuberante mundo alienígena de Pandora vivem os Navi, seres que parecem ser primitivos, mas são altamente evoluídos. Como o ambiente do planeta é tóxico, foram criados os avatares, corpos biológicos controlados pela mente humana que se movimentam livremente em Pandora. Jake Sully, um ex-fuzileiro naval paralítico, volta a andar através de um avatar e se apaixona por uma Navi. Esta paixão leva Jake a lutar pela sobrevivência de Pandora.'),
(23, 'Infiltrado', 'Ação, Suspense ', 4.9,'Harry, conhecido apenas como H, é um homem misterioso que trabalha para uma empresa de carros-fortes e movimenta grandes quantias de dinheiro pela cidade de Los Angeles. Quando, ao impedir um assalto, ele surpreende a todos com suas habilidades de combate, suas verdadeiras intenções começam a ser questionadas e um plano maior é revelado.'),
(24, 'Jogos Vorazes', 'Ação, Aventura', 4.3,'Na região antigamente conhecida como América do Norte, a Capital de Panem controla 12 distritos e os força a escolher um garoto e uma garota, conhecidos como tributos, para competir em um evento anual televisionado. Todos os cidadãos assistem aos temidos jogos, no qual os jovens lutam até a morte, de modo que apenas um saia vitorioso. A jovem Katniss Everdeen, do Distrito 12, confia na habilidade de caça e na destreza com o arco, além dos instintos aguçados, nesta competição mortal.');


-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `token`) VALUES
(5, 'Guilherme Timm Moreira', 'guilherme-gtm@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '79acd0709520dc6c92cda6dd45cce8a3');

-- --------------------------------------------------------

--
-- Estrutura para tabela `votos`
--

CREATE TABLE `votos` (
  `id` int(4) NOT NULL,
  `cod_filmes` int(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `votos`
--

INSERT INTO `votos` (`id`, `cod_filmes`, `nome`, `email`, `data`) VALUES
(32, 15, 'guilherme', 'guilherme-gtm@hotmail.com', '0000-00-00'),
(33, 14, 'pedro', 'pedro@hotmail.com', '0000-00-00'),
(34, 15, 'laura', 'laura@hotmail.com', '0000-00-00'),
(35, 16, 'joao', 'joao@hotmail.com', '0000-00-00'),
(36, 20, 'Guilherme', 'guilherme@hotmail.com', '0000-00-00'),
(37, 22, 'Gustavo', 'gustavo@hotmail.com', '0000-00-00'),
(38, 24, 'Michela', 'michela@hotmail.com', '0000-00-00'),
(39, 20, 'teste1', 'teste1@hotmail.com', '0000-00-00'),
(40, 20, 'teste2', 'teste2@hotmail.com', '0000-00-00'),
(41, 22, 'teste3', 'teste3@hotmail.com', '0000-00-00'),
(42, 25, 'teste4', 'teste4@hotmail.com', '0000-00-00');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `senha` (`senha`);

--
-- Índices de tabela `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `votos`
--
ALTER TABLE `votos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;






