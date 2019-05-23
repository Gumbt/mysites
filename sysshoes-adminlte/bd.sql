-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 01/07/2018 às 00:08
-- Versão do servidor: 10.2.15-MariaDB
-- Versão do PHP: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u385906863_bd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf`, `data_nasc`, `email`, `endereco`, `cep`, `telefone`, `sexo`) VALUES
(3, 'Gabriel', '21321312', '1998-01-20', 'fdsadfsfsd', 'sadsadsa', '321432432', '432432432', 'O'),
(5, 'Gustavo Miquelluzzi Bonassa', '09845549985', '1998-02-27', 'gustavo.bonassa1@gmail.com', 'Rua sei la kkkk trab, 2278', '98285000', '(47)99916-9194', 'M'),
(8, 'Felipe Amarau', '0293483721', '1990-08-20', 'felipeamarau@hotmail.com', 'Rua emanuel caramujo', '286000000', '(47)99532-2458', 'M'),
(9, 'raimundo', '213421312', '1999-12-12', 'sajndjas@dibyhashinda', 'dsanjkjnldasjnl', '4213432423423', '4321431231', 'M'),
(14, 'Haduken Hamakja', '4817237989', '1993-12-06', 'dasdas@dsada.dsasa', 'Rua babnsadns', '231412312', '3421312312312', 'F'),
(15, 'aaaaa', '48217237989', '1993-12-06', 'dasdas@dsada.dsasa', 'Rua babnsadns', '231412312', '3421312312312', 'F'),
(17, 'Trab dsamdsa', '08217237989', '1993-12-06', 'dasdas@dsada.dsasa', 'Rua babnsadns', '231412312', '3421312312312', 'F'),
(18, 'Trab fon', '68217237989', '1993-12-06', 'dasdas@dsada.dsasa', 'Rua babnsadns', '231412312', '3421312312312', 'F'),
(19, 'fsddgfdsfgfdsgsdf', '32443242342', '1992-03-03', 'hue@br.kkk', 'dfsdfsdfds', '4324324423432', '(47)99999-9999', 'M'),
(20, 'Adalberto', '31232131233', '1998-11-11', 'thfrdghdfgf@dfsadas', 'sadasdsadsa', '231231321', '231412312', 'O'),
(22, 'Novo Cliente', '00000000000', '1999-09-09', 'novoemail@email.com', 'novo endereco', '000000000', '(41)99585-5487', 'F'),
(23, 'Lucas Renan da Silva', '03564698674', '1985-06-12', 'lucas.renan@gmail.com', 'Rua arlindo cruz', '983586989', '(47)35647-5698', 'M'),
(24, 'trew', '31221323123', '2001-11-11', 'dads@dsa', 'zXCxz', '23112312', '32321321', 'M'),
(26, 'Jubilei', '02134521132', '1983-05-05', 'jubileu@hotmail.com', 'Rua almeida', '42142133', '321321321', 'M'),
(28, 'Guilherme Siewert', '07613399907', '1998-06-28', 'havenges@gmail.com', 'Rua Gerard Ravache', '89222580', '988463113', 'M'),
(29, 'tenis', '45798231654', '0000-00-00', 'oi@oi.com.br', 'rua xxx', '12548796', '(55) 4002-8922', 'O');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `marca` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fornecedor` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modelo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `descricao`, `preco`, `marca`, `fornecedor`, `modelo`, `foto`) VALUES
(27, 'dsadsa', 'Tenis legal', 150.35, 'adidas', 'adidas', 'dsadas', '.jpg'),
(28, 'ahhaha', 'lindo', 13, 'dasuda', 'djasjdsa', 'sdajdjsaj', '.jpg'),
(29, 'xdxd', 'teste a', 350.43, 'adidas', 'nao sei', 'kkk trab', '0'),
(30, 'Vhccbh', 'Ggg vvvc', 584, 'Cuvcg', 'Chvcc', 'Vvbvfc', '0'),
(31, 'test', 'asddasdsa dsaasasd', 424, 'asddsa', 'dsadasdsa', 'dsadsad', '0'),
(33, 'NOME FICTICIO PARA TESTE', 'NAO SEI AO CERTO AS INFORMAÇOES DO PRODUTO POR ISSO ESTOU ESCREVENDO SO PRA DAR VOLUME NESSA PORRA', 120.98, 'Adidas', 'Desconhecido', 'GTX1050', '.jpg'),
(35, 'test', 'asddasdsa dsaasasd', 3000, 'asddsa', 'dsadasdsa', 'dsadsad', '.jpg'),
(39, 'Tenis pogchamp', 'produto elgal', 350.25, 'Adidas', 'Nike', 'Nao sei', '0'),
(40, 'rgsdtrsd', 'dasdasdas', 43123, 'dsasa', 'dasdas', 'dasdas', '0'),
(41, 'dsadasdasdas', 'dasdasdasdasdasdsdsadsa', 300, 'sadasdsadas', 'asdasdasdas', 'dasdasdasdasdas', '.jpg'),
(42, 'tenis top', 'tenis outfit', 5000, 'gucci', 'supreme', 'xxv', '.jpg'),
(43, 'bbbbbbb', 'bbbbbbbbbbbbbbbbbbbbbbbb', 500, 'bbbbbbbbbbb', 'bbbbbbbbbb', 'bbbbbbbbbbbb', '.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidades`
--

CREATE TABLE `unidades` (
  `id_unidades` int(10) UNSIGNED NOT NULL,
  `tamanho` int(10) UNSIGNED DEFAULT NULL,
  `unidades` int(10) UNSIGNED DEFAULT NULL,
  `cor` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_produto` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `unidades`
--

INSERT INTO `unidades` (`id_unidades`, `tamanho`, `unidades`, `cor`, `id_produto`) VALUES
(27, 34, 2, 'Preto', 28),
(28, 38, 1, 'Verde', 28),
(29, 37, 2, 'Azul', 28),
(30, 36, 8, 'Amarelo', 28),
(31, 42, 20, 'Laranja', 28),
(32, 40, 1, 'Rosa', 28),
(33, 36, 9, 'Branco', 28),
(34, 34, 5, 'Roxo', 28),
(35, 40, 10, 'Preto', 29),
(36, 38, 0, 'Marrom', 29),
(37, 36, 0, 'Amarelo', 29),
(38, 33, 0, 'Branco', 29),
(39, 40, 12, 'Branco', 30),
(40, 40, 12, 'Verde', 30),
(41, 40, 12, 'Vermelho', 30),
(42, 38, 1, 'Preto', 31),
(43, 37, 1, 'Amarelo', 31),
(44, 34, 5, 'Marrom', 31),
(49, 39, 10, 'Preto', 33),
(50, 27, 12, 'Vermelho', 33),
(51, 31, 9, 'Branco', 33),
(67, 39, 6, 'Preto', 27),
(68, 32, 5, 'Rosa', 27),
(69, 40, 3, 'Preto', 27),
(75, 33, 50, 'Marrom', 41),
(76, 40, 40, 'Vermelho', 42),
(77, 38, 20, 'Laranja', 42),
(78, 38, 40, 'Roxo', 42),
(79, 33, 1, 'Cinza', 42),
(80, 33, 1, 'Roxo', 40),
(81, 33, 1, 'Roxo', 40),
(82, 33, 1, 'Roxo', 40),
(83, 33, 1, 'Roxo', 40),
(84, 34, 0, 'Amarelo', 35),
(86, 40, 5, 'Amarelo', 43),
(87, 40, 5, 'Branco', 43),
(88, 36, 10, 'Azul', 39),
(89, 35, 50, 'Branco', 39);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cargo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `user`
--

INSERT INTO `user` (`id_user`, `nome`, `cpf`, `data_nasc`, `email`, `endereco`, `cep`, `telefone`, `sexo`, `cargo`, `usuario`, `senha`) VALUES
(1, 'Gustavo Bonassa', '09845549985', '1998-02-27', 'gustavo.bonassa1@gmail.com', 'Rua Joao adolfo mulle, 227', '98485478', '47999145274', 'M', 'Admin', 'admin', '123'),
(4, 'testea', '32432423432', '1111-11-11', 'saddas@dawdsa', 'dasdsa dasdas 5', '213123123123', '55555555555', 'M', 'Gerente', 'dsadasdasa', '123'),
(6, 'Guilherme Bianeck', '01454874125', '1998-03-21', 'guilhermeb@gmail.com', 'Rua Arlindo, 331', '234423232', '(47)99123-3214', 'M', 'Admin', 'guilherme', '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(10) UNSIGNED NOT NULL,
  `id_produto` int(10) UNSIGNED DEFAULT NULL,
  `desconto` float DEFAULT NULL,
  `pagamento` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_venda` date DEFAULT NULL,
  `hora_venda` time DEFAULT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `id_cliente` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `id_produto`, `desconto`, `pagamento`, `data_venda`, `hora_venda`, `id_user`, `id_cliente`) VALUES
(1, 29, 10, 'Dinheiro', '2018-06-30', '18:42:12', 1, 5),
(4, 29, 3, 'Dinheiro', '2018-06-30', '19:21:11', 1, 5),
(5, 29, 11, 'Dinheiro', '2018-06-30', '19:22:01', 1, 5),
(7, 29, 3, 'Dinheiro', '2018-06-30', '19:25:02', 1, 5),
(9, 33, 5, 'Crédito', '2018-06-30', '19:52:48', 1, 5),
(10, 35, 13, 'Dinheiro', '2018-06-30', '19:55:16', 1, 5),
(11, 42, 15, 'Dinheiro', '2018-06-30', '19:56:42', 6, 5),
(12, 27, 10, 'Dinheiro', '2018-06-30', '20:34:28', 6, 20),
(13, 39, 15, 'Crédito', '2018-06-30', '20:39:00', 1, 26),
(14, 39, 15, 'Crédito', '2018-06-30', '20:39:07', 1, 26);

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda_unidades`
--

CREATE TABLE `venda_unidades` (
  `id_venda_unidades` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `cor` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tamanho` int(11) NOT NULL,
  `unidades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `venda_unidades`
--

INSERT INTO `venda_unidades` (`id_venda_unidades`, `id_venda`, `cor`, `tamanho`, `unidades`) VALUES
(1, 1, 'Marrom', 38, 10),
(2, 1, 'Amarelo', 36, 5),
(5, 4, 'Marrom', 38, 9),
(6, 4, 'Amarelo', 36, 5),
(7, 5, 'Preto', 40, 10),
(8, 5, 'Amarelo', 36, 4),
(9, 5, 'Branco', 33, 1),
(10, 9, 'Preto', 39, 1),
(11, 10, 'Amarelo', 34, 1),
(12, 11, 'Laranja', 38, 20),
(13, 12, 'Preto', 39, 2),
(14, 12, 'Rosa', 32, 1),
(15, 14, 'Bege', 40, 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`id_unidades`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`);

--
-- Índices de tabela `venda_unidades`
--
ALTER TABLE `venda_unidades`
  ADD PRIMARY KEY (`id_venda_unidades`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `unidades`
--
ALTER TABLE `unidades`
  MODIFY `id_unidades` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `venda_unidades`
--
ALTER TABLE `venda_unidades`
  MODIFY `id_venda_unidades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
