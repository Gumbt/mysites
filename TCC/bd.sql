-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2015 at 06:00 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `colaborador`
--

CREATE TABLE IF NOT EXISTS `colaborador` (
  `id_colab` int(10) unsigned NOT NULL,
  `nome_colab` varchar(50) DEFAULT NULL,
  `snome_colab` varchar(50) DEFAULT NULL,
  `email_colab` varchar(50) DEFAULT NULL,
  `end_colab` varchar(45) DEFAULT NULL,
  `cep_colab` varchar(15) DEFAULT NULL,
  `cpf_colab` varchar(15) DEFAULT NULL,
  `status_colab` varchar(10) DEFAULT NULL,
  `tel_colab` varchar(15) DEFAULT NULL,
  `rfid_colab` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colaborador`
--

INSERT INTO `colaborador` (`id_colab`, `nome_colab`, `snome_colab`, `email_colab`, `end_colab`, `cep_colab`, `cpf_colab`, `status_colab`, `tel_colab`, `rfid_colab`) VALUES
(1, 'Yuri', 'Korber', 'yurikgorges@gmail.com', 'Rua Joao Adolfo Muller, 227', '2147483647', '11111111111', 'inativo', '04799212121', '21321321'),
(2, 'Andre', 'Cristofolini', 'andre.cristofolini2006@gmail.com', 'Rua Antonio G. Pereira, 157', '2131232', '33333333333', 'ativo', '04799252525', '32121433');

-- --------------------------------------------------------

--
-- Table structure for table `colaborador_has_sala`
--

CREATE TABLE IF NOT EXISTS `colaborador_has_sala` (
  `colaborador_id_colab` int(10) unsigned NOT NULL,
  `sala_id_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colaborador_has_sala`
--

INSERT INTO `colaborador_has_sala` (`colaborador_id_colab`, `sala_id_sala`) VALUES
(1, 1),
(1, 8),
(2, 8),
(3, 1),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `consultor`
--

CREATE TABLE IF NOT EXISTS `consultor` (
  `id_cons` int(10) unsigned NOT NULL,
  `nome_cons` varchar(45) DEFAULT NULL,
  `snome_cons` varchar(45) DEFAULT NULL,
  `email_cons` varchar(45) DEFAULT NULL,
  `tel_cons` varchar(15) DEFAULT NULL,
  `end_cons` varchar(45) DEFAULT NULL,
  `cep_cons` varchar(15) DEFAULT NULL,
  `cpf_cons` varchar(15) DEFAULT NULL,
  `login_cons` varchar(15) DEFAULT NULL,
  `senha_cons` varchar(15) DEFAULT NULL,
  `status_cons` varchar(10) DEFAULT NULL,
  `rfid_cons` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultor`
--

INSERT INTO `consultor` (`id_cons`, `nome_cons`, `snome_cons`, `email_cons`, `tel_cons`, `end_cons`, `cep_cons`, `cpf_cons`, `login_cons`, `senha_cons`, `status_cons`, `rfid_cons`) VALUES
(1, 'Gustavo', 'Bonassa', 'gustavo.bonassa1@gmail.com', '04799169194', 'Rua Joao Adolfo Muller', '32132132132', '32132132443', 'gustavo', 'Gumb123@', 'ativo', '123');

-- --------------------------------------------------------

--
-- Table structure for table `consultor_cad_colab`
--

CREATE TABLE IF NOT EXISTS `consultor_cad_colab` (
  `id_relcadcolab` int(10) unsigned NOT NULL,
  `colaborador_id_colab` int(10) unsigned NOT NULL,
  `consultor_id_cons` int(10) unsigned NOT NULL,
  `dt_relcolab` date DEFAULT NULL,
  `hr_relcolab` time DEFAULT NULL,
  `tipo_relcolab` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultor_cad_colab`
--

INSERT INTO `consultor_cad_colab` (`id_relcadcolab`, `colaborador_id_colab`, `consultor_id_cons`, `dt_relcolab`, `hr_relcolab`, `tipo_relcolab`) VALUES
(1, 2, 1, '2015-10-30', '21:13:39', 1),
(2, 2, 1, '2015-10-30', '21:22:12', 2),
(3, 3, 1, '2015-10-30', '21:53:11', 1),
(4, 2, 1, '2015-10-30', '21:53:45', 2),
(5, 2, 1, '2015-10-30', '21:53:53', 2),
(6, 3, 1, '2015-10-30', '21:53:59', 2),
(7, 1, 1, '2015-11-20', '13:12:26', 2),
(8, 1, 1, '2015-11-20', '13:12:50', 2),
(9, 1, 1, '2015-11-20', '13:13:44', 2),
(10, 1, 1, '2015-11-20', '13:13:58', 2),
(11, 1, 1, '2015-11-20', '13:17:38', 2);

-- --------------------------------------------------------

--
-- Table structure for table `consultor_cad_sala`
--

CREATE TABLE IF NOT EXISTS `consultor_cad_sala` (
  `id_relcadsala` int(10) unsigned NOT NULL,
  `sala_id_sala` int(11) NOT NULL,
  `consultor_id_cons` int(10) unsigned NOT NULL,
  `dt_relsala` date DEFAULT NULL,
  `hr_relsala` time DEFAULT NULL,
  `tipo_relsala` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultor_cad_sala`
--

INSERT INTO `consultor_cad_sala` (`id_relcadsala`, `sala_id_sala`, `consultor_id_cons`, `dt_relsala`, `hr_relsala`, `tipo_relsala`) VALUES
(1, 1, 1, '2015-10-30', '21:10:47', 1),
(2, 0, 1, '2015-10-30', '21:48:03', 3),
(3, 5, 1, '2015-10-30', '21:52:34', 1),
(4, 6, 1, '2015-10-30', '21:52:42', 1),
(5, 7, 1, '2015-10-30', '21:53:20', 1),
(6, 8, 1, '2015-10-30', '21:53:29', 1),
(7, 7, 1, '2015-10-30', '21:54:10', 2),
(8, 7, 1, '2015-10-30', '21:54:18', 2),
(9, 0, 1, '2015-10-30', '21:54:24', 3);

-- --------------------------------------------------------

--
-- Table structure for table `relatorio_colaborador`
--

CREATE TABLE IF NOT EXISTS `relatorio_colaborador` (
  `id_relcolab` int(10) unsigned NOT NULL,
  `colaborador_id_colab` int(10) unsigned NOT NULL,
  `sala_id_sala` int(11) NOT NULL,
  `dt_relcolab` date DEFAULT NULL,
  `hr_relcolab` time DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relatorio_colaborador`
--

INSERT INTO `relatorio_colaborador` (`id_relcolab`, `colaborador_id_colab`, `sala_id_sala`, `dt_relcolab`, `hr_relcolab`) VALUES
(1, 2, 8, '2015-11-20', '13:32:50'),
(2, 2, 8, '2015-11-20', '13:37:38'),
(3, 1, 8, '2015-11-20', '13:39:04'),
(4, 2, 8, '2015-11-20', '13:41:24'),
(5, 2, 8, '2015-11-20', '13:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `relatorio_consultor`
--

CREATE TABLE IF NOT EXISTS `relatorio_consultor` (
  `id_relcons` int(10) unsigned NOT NULL,
  `consultor_id_cons` int(10) unsigned NOT NULL,
  `sala_id_sala` int(11) NOT NULL,
  `dt_relcons` date DEFAULT NULL,
  `hr_relcons` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sala`
--

CREATE TABLE IF NOT EXISTS `sala` (
  `id_sala` int(11) NOT NULL,
  `nr_sala` varchar(20) DEFAULT NULL,
  `bloco_sala` varchar(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sala`
--

INSERT INTO `sala` (`id_sala`, `nr_sala`, `bloco_sala`) VALUES
(1, 'Secretária', 'A'),
(5, 'Depósito', 'B'),
(6, 'c301', 'C'),
(8, 'c302', 'C'),
(9, 'Sala de informática', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `sala_has_consultor`
--

CREATE TABLE IF NOT EXISTS `sala_has_consultor` (
  `sala_id_sala` int(11) NOT NULL,
  `consultor_id_cons` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colaborador`
--
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`id_colab`);

--
-- Indexes for table `colaborador_has_sala`
--
ALTER TABLE `colaborador_has_sala`
  ADD PRIMARY KEY (`colaborador_id_colab`,`sala_id_sala`), ADD KEY `colaborador_has_sala_FKIndex1` (`colaborador_id_colab`), ADD KEY `colaborador_has_sala_FKIndex2` (`sala_id_sala`);

--
-- Indexes for table `consultor`
--
ALTER TABLE `consultor`
  ADD PRIMARY KEY (`id_cons`);

--
-- Indexes for table `consultor_cad_colab`
--
ALTER TABLE `consultor_cad_colab`
  ADD PRIMARY KEY (`id_relcadcolab`,`colaborador_id_colab`,`consultor_id_cons`), ADD KEY `colaborador_has_consultor_FKIndex1` (`colaborador_id_colab`), ADD KEY `colaborador_has_consultor_FKIndex2` (`consultor_id_cons`);

--
-- Indexes for table `consultor_cad_sala`
--
ALTER TABLE `consultor_cad_sala`
  ADD PRIMARY KEY (`id_relcadsala`,`sala_id_sala`,`consultor_id_cons`), ADD KEY `sala_has_consultor_FKIndex1` (`sala_id_sala`), ADD KEY `sala_has_consultor_FKIndex2` (`consultor_id_cons`);

--
-- Indexes for table `relatorio_colaborador`
--
ALTER TABLE `relatorio_colaborador`
  ADD PRIMARY KEY (`id_relcolab`), ADD KEY `relatorio_colaborador_FKIndex1` (`sala_id_sala`), ADD KEY `relatorio_colaborador_FKIndex2` (`colaborador_id_colab`);

--
-- Indexes for table `relatorio_consultor`
--
ALTER TABLE `relatorio_consultor`
  ADD PRIMARY KEY (`id_relcons`), ADD KEY `relatorio_consultor_FKIndex1` (`sala_id_sala`), ADD KEY `relatorio_consultor_FKIndex2` (`consultor_id_cons`);

--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indexes for table `sala_has_consultor`
--
ALTER TABLE `sala_has_consultor`
  ADD PRIMARY KEY (`sala_id_sala`,`consultor_id_cons`), ADD KEY `sala_has_consultor_FKIndex1` (`sala_id_sala`), ADD KEY `sala_has_consultor_FKIndex2` (`consultor_id_cons`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `id_colab` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `consultor`
--
ALTER TABLE `consultor`
  MODIFY `id_cons` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `consultor_cad_colab`
--
ALTER TABLE `consultor_cad_colab`
  MODIFY `id_relcadcolab` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `consultor_cad_sala`
--
ALTER TABLE `consultor_cad_sala`
  MODIFY `id_relcadsala` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `relatorio_colaborador`
--
ALTER TABLE `relatorio_colaborador`
  MODIFY `id_relcolab` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `relatorio_consultor`
--
ALTER TABLE `relatorio_consultor`
  MODIFY `id_relcons` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
