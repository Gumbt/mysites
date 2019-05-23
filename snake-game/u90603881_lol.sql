-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: mysql796.umbler.com
-- Generation Time: 02-Jul-2017 às 13:57
-- Versão do servidor: 5.6.34-log
-- PHP Version: 5.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u90603881_lol`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `snake`
--

CREATE TABLE IF NOT EXISTS `snake` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `pontos` int(11) NOT NULL,
  `dificuldade` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `snake`
--

INSERT INTO `snake` (`id`, `nome`, `pontos`, `dificuldade`) VALUES
(3, 'Gustavo', 1088, 'medio'),
(4, 'Joao', 50, 'medio'),
(5, 'Claudio', 415, 'dificil'),
(6, 'Pedro', 740, 'medio'),
(7, 'Maria', 745, 'medio'),
(8, 'Gabriel', 1491, 'medio'),
(9, 'Gustavo', 3567, 'dificil'),
(10, 'CobrinhaMastes', 34, 'medio'),
(11, 'Amigo', 73, 'medio'),
(12, 'Yoda', 772, 'medio'),
(13, 'Gustavo', 1778, 'facil'),
(14, 'Vitor', 34, 'facil'),
(20, 'Debora', 1119, 'dificil'),
(21, 'Leao', 400, 'medio'),
(22, 'Leni', 1491, 'medio'),
(23, 'Player', 394, 'facil'),
(24, 'debora', 404, 'medio'),
(25, 'Gustavo', 4248, 'dificil'),
(26, 'aaaaaaaa', 6484, 'dificil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `snake`
--
ALTER TABLE `snake`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `snake`
--
ALTER TABLE `snake`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
