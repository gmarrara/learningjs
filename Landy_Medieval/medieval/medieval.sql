-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 09-Fev-2020 às 22:07
-- Versão do servidor: 5.7.28
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `medieval`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `farm`
--

DROP TABLE IF EXISTS `farm`;
CREATE TABLE IF NOT EXISTS `farm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dono` int(25) NOT NULL,
  `city` varchar(50) COLLATE utf8_bin NOT NULL,
  `model` varchar(20) COLLATE utf8_bin NOT NULL,
  `region` varchar(20) COLLATE utf8_bin NOT NULL,
  `valor` int(20) NOT NULL,
  `size` int(20) NOT NULL,
  `gps` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `farm`
--

INSERT INTO `farm` (`id`, `dono`, `city`, `model`, `region`, `valor`, `size`, `gps`) VALUES
(10, 16, 'Ymir', 'auto', 'montanhas', 150, 1, 'Iceland');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posse`
--

DROP TABLE IF EXISTS `posse`;
CREATE TABLE IF NOT EXISTS `posse` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user` int(20) NOT NULL,
  `farm` int(20) NOT NULL,
  `produto` varchar(15) COLLATE utf8_bin NOT NULL,
  `quantidade` int(15) NOT NULL,
  `valor` float(20,0) NOT NULL COMMENT 'Valor medio do produto',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `posse`
--

INSERT INTO `posse` (`id`, `user`, `farm`, `produto`, `quantidade`, `valor`) VALUES
(10, 16, 10, 'porco', 3, 4),
(14, 16, 10, 'cabra', 1, 3),
(15, 16, 10, 'galinha', 1, 9),
(18, 16, 10, 'boi', 30, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `nick` varchar(20) COLLATE utf8_bin NOT NULL,
  `title` varchar(10) COLLATE utf8_bin NOT NULL,
  `wealth` int(20) NOT NULL,
  `birth` date NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `passwd` varchar(50) COLLATE utf8_bin NOT NULL,
  `gender` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `nick`, `title`, `wealth`, `birth`, `email`, `passwd`, `gender`) VALUES
(16, 'Jose Landy Giorio do vale', 'Mantrel', 'Peasent', 1836, '1974-08-07', 'joselandy@gmail.com', '202cb962ac59075b964b07152d234b70', 'M');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
