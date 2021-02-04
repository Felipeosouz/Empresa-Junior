-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Maio-2020 às 07:04
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `advocacia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id_msg` int(11) NOT NULL,
  `id_nome` int(11) NOT NULL,
  `mensagem` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id_msg`, `id_nome`, `mensagem`) VALUES
(1, 1, 'Boa noite'),
(2, 2, 'Boa noite!!!'),
(3, 4, 'Estou com uma dúvida, quais são as espécies de tributos que podem ser instituídos pela União, Estados, Distrito Federal e Municípios?'),
(4, 1, 'Segundo a Constituição Federal, a União, os Estados, o Distrito Federal e os Municípios poderão instituir os seguintes tributos:\r\nI - impostos;\r\n\r\nII - taxas, em razão do exercício do poder de polícia ou pela utilização, efetiva ou potencial, de serviços públicos específicos e divisíveis, prestados ao contribuinte ou postos a sua disposição;\r\n\r\nIII - contribuição de melhoria, decorrente de obras públicas.'),
(5, 4, 'Muito obrigado!'),
(6, 3, 'Boa tarde!'),
(7, 4, 'Boa tarde Garibaldo!'),
(8, 3, 'Eu tenho uma questionamento, como se dá a ação penal em crimes complexos?'),
(9, 2, 'Quando a lei considera como elemento ou circunstâncias do tipo legal fatos que, por si mesmos, constituem crimes, cabe ação pública em relação àquele, desde que, em relação a qualquer destes, se deva proceder por iniciativa do Ministério Público.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nome`, `senha`, `tipo`) VALUES
(1, 'harvey', 'Harvey Specter', '$2y$10$Be6Tin67HxDfAgz3f59AqeHWd1IdITgM6/rzj3YswEkZDmzdKi.BK', 'Advogado'),
(2, 'mike', 'Mike Ross', '$2y$10$Be6Tin67HxDfAgz3f59AqeHWd1IdITgM6/rzj3YswEkZDmzdKi.BK', 'Advogado'),
(3, 'garibaldo', 'Garibaldo Junior', '$2y$10$GMG1HYasT0aJ9rStbS12b.Cp3WHBpmKitsL43xE28FRgp669.Wo8q', 'Visitante'),
(4, 'ortis', 'Ortis Boi', '$2y$10$h1.Alaq22iv6OnsIrTybqelQ075ChwwvcXLLU9i2m58/h.h4LifO.', 'Visitante'),
(5, 'yagod', 'Yago Lima Azevedo', '$2y$10$nRug9vkFGF1VH7A0ybbCAOKpOSEhuZeXnnYd3pMr9DG3ejeenUi1i', 'Visitante');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id_msg`),
  ADD KEY `id_nome` (`id_nome`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `mensagens_ibfk_1` FOREIGN KEY (`id_nome`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
