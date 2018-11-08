-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 13/09/2018 às 22:41
-- Versão do servidor: 10.2.17-MariaDB
-- Versão do PHP: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u257738273_clash`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clan`
--

CREATE TABLE `clan` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `local` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `icone` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lvl` int(11) NOT NULL,
  `trofeus` int(11) NOT NULL,
  `membros` int(11) NOT NULL,
  `wins` int(11) NOT NULL,
  `frequencia` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `requiredtrophies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `clan`
--

INSERT INTO `clan` (`id`, `nome`, `tag`, `tipo`, `descricao`, `local`, `icone`, `lvl`, `trofeus`, `membros`, `wins`, `frequencia`, `requiredtrophies`) VALUES
(1, 'PSICOWAR', '#2LULCGP8', 'inviteOnly', 'Bem vindo ao PSICOWAR! Clan de viciados no jogo,rumo ao top Br. Site: www.psicowar.ga Melhor doador da temporada:GERMANO,33mil doadas. Regras: 21981126495. Top 1 BR na última temporada.', 'Brazil', 'https://api-assets.clashofclans.com/badges/200/EhsMhDtdX5YOz-lgliBXLNAiaFC7s_2tYywJp-CZ0MQ.png', 16, 58577, 49, 331, 'always', 4200),
(2, 'PSICO REBORN', '#C08PQC9G', 'inviteOnly', '◾️PSICO REBORN - Family PSICOWAR - WAR CLAN FP- Recrutando players mínimo Titã e CV12, heróis 50+.Ao entrar,mande msg p/ +8190-5498-9105 p/receber as regras.Jogos do Clã sempre completados, MÍNIMO 800 medalhas por player!!! www.psicowar.ga', 'Brazil', 'https://api-assets.clashofclans.com/badges/200/_dHmcebPqR1pWM6G__Ee4xddi9_PxVXTEYPQg3ZTMak.png', 11, 47127, 42, 114, 'always', 3200),
(3, 'LIGA DE METAL', '#8UVPYCGL', 'inviteOnly', 'Bem vindo ao LIGA DE METAL,clan de viciados no jogo rumo ao top 10 Br. Recrutamento minimo Tita,Cv 11,herois 40. Clan da familia PSICOWAR. Regras do clan mande um zap pra: 21981126495,PENDRAGON, site: www.psicowar.ga', 'Brazil', 'https://api-assets.clashofclans.com/badges/200/cM53gWxNpYFsWgQtiXVlZOf5rrlRz0z2OOM7juiBGR8.png', 13, 52094, 49, 266, 'always', 4200),
(4, 'Dinastia Clã', '#2YGL80CY', 'inviteOnly', 'CLA DA FAMILIA PSICOWAR,estamos recrutando viciados no jogo,rumo ao top 10 br,minimo TITÃ .REGRAS NO ZAP,LAMPAR 77-99959-4442 - Recrutamento apenas cv10(heróis mínimo 30) e cv11(heróis mínimo 40).Visite nosso sit. WWW.PSICOWAR.GA ....... CLÃ DE FARM', 'Brazil', 'https://api-assets.clashofclans.com/badges/200/IBxihAZpYcexNS1_tEhWRN93tnodW3VVmP6QzUnMLJs.png', 12, 42985, 49, 273, 'always', 4200),
(5, 'Caçadores', '#9LP8YJLY', 'inviteOnly', 'TOP 6 BR. CLÃ DA FAMÍLIA PSICOWAR☁ grupo no whats (65) 9920 4.2.0.2 . www.psicowar.ga ? regras doacao: GGR =golem + um gg e furia. LLR=lava 1 balao furia defesa 211=duas bruxas e 1 bbdg.', 'Brazil', 'https://api-assets.clashofclans.com/badges/200/_dHmcebPqR1pWM6G__Ee4xddi9_PxVXTEYPQg3ZTMak.png', 11, 53971, 48, 114, 'always', 4200),
(6, 'Gato Preto', '#YPVJ0GGY', 'inviteOnly', 'ᴘᴜsʜ ᴇ ɢᴜᴇʀʀᴀ ᴅᴏᴇ ᴀɴᴛᴇs ᴅᴇ ᴘᴇᴅɪʀ ᴍᴀɴᴛᴇɴʜᴀ ᴀ ᴘᴏsᴛᴜʀᴀ  ʀᴇᴄʀᴜᴛ. :ᴛʜ10+ ᴄ/ᴛʀᴏᴘᴀs ғᴜʟʟ/+25ᴋ ɴᴏs ᴊᴏɢᴏs_ᴘsɪᴄᴏᴡᴀʀ.ɢᴀ_', 'Brazil', 'https://api-assets.clashofclans.com/badges/200/0rIjeUELQSwOlBCLPdMcgwg3TizMtf2oM8Isv8G9ZSo.png', 11, 41710, 48, 162, 'always', 4200),
(7, 'SKILLBRUTA', '#P0PV0V28', 'inviteOnly', 'Bem vindo a família SKILLBRUTA! ✔️Doe antes de pedir; ✔️cv9 fazer os ataques na guerra dentro das 12hrs iniciais;✔️Respeite para ser respeitado; clã de GUERRA, se nao curte guerra está no lugar errado;✔️ Não sabe oq fazer, pergunte para um co lider.', 'Brazil', 'https://api-assets.clashofclans.com/badges/200/IBxihAZpYcexNS1_tEhWRN93tnodW3VVmP6QzUnMLJs.png', 12, 36989, 49, 218, 'always', 4200),
(8, 'Fúria Topteam', '#PL08Q80', 'inviteOnly', 'Record TOP 10 BR CLÃ DA FAMÍLIA “PSICOWAR” grupo do whatsapp (41) 99937 7.9.1.8 www.psicowar.ga regras doação: GGR: Golem + GG + Fúria. LLR: Lava + Balão + Fúria. Defesa 211: 2 Bx 1 BbDg. Clã de viciados.', 'Brazil', 'https://api-assets.clashofclans.com/badges/200/cM53gWxNpYFsWgQtiXVlZOf5rrlRz0z2OOM7juiBGR8.png', 13, 54066, 49, 244, 'always', 4200);

-- --------------------------------------------------------

--
-- Estrutura para tabela `email`
--

CREATE TABLE `email` (
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mensagem` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `lida` int(11) NOT NULL,
  `respondida` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_resposta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `email`
--

INSERT INTO `email` (`nome`, `email`, `mensagem`, `data`, `hora`, `lida`, `respondida`, `id`, `id_resposta`) VALUES
('Teste', 'teste@teste.com', 'SIGYHDUHISA DHUOASDUH IASUHI DUIHSUIHADHJ S UODHJ OSAH JD UHOASJDJN AS JHDAJHSHUD AHJSDJHKASJHDASJLDA ', '2018-05-12', '22:00:00', 0, 0, 1, 0),
('Gumb', 'gumbgo@gmail.com', 'oi essa mensagem é para testar xdxd', '0000-00-00', '01:33:31', 0, 0, 2, 0),
('Xesque', 'xaruto@gmail.com', 'xesque dasuonuhknnuJDNJKAS  DSAUHND UNASU HNun nu du jaudnnjasdn jsaundn ulsanuidnulasdasdsadasdas', '2018-05-06', '01:35:28', 0, 0, 3, 0),
('Xesque', 'xaruto@gmail.com', 'xesque dasuonuhknnuJDNJKAS  DSAUHND UNASU HNun nu du jaudnnjasdn jsaundn ulsanuidnulasdasdsadasdas', '2018-05-06', '01:35:28', 0, 0, 4, 0),
('Testando', 'teste@teste.com', 'MENSAGEM DE TESTE LALALALALALALALLALALALALALALALALAL', '2018-05-06', '20:33:53', 0, 0, 5, 0),
('xdxdxdxd', 'xdxd@gmail.com', 'RECEITA DE BOLO DE CENOURA SDJKLHBADKHGSAKYHBDKUHASUJLKDLJNASLJNDJLKASKJDASK', '2018-05-06', '20:38:32', 0, 0, 6, 0),
('fdask.jhnbujkhlas@dsajkndjlkn.', 'fdask.jhnbujkhlas@dsajkndjlkn.', 'dsfyfuigkvksdayuig d uihasiuh yduhsadhuiashudhjkaskhjdaskhjdjkh asuhdasjhkl d huklasukh d jhkasuhdjsahujdhjlasjlhdjlhkasjhdashjl uhdashudu hasulhdhuajsduhljasulhjdhjlasjlhdcaukdsuasulkdnuj asdhas kudjasjhdjasdfuhoasuhoduoasnfjohasuohjfuohasuhdasjndiuhjasduijho asdasdjhasfjhsajno fasdasasd', '2018-05-06', '21:03:22', 0, 0, 7, 0),
('fon@trab', 'fon@trab.com', 'trab euhauheuaheuhauheuhahueuaheuha heahueh uauheauh', '2018-05-06', '21:24:01', 0, 0, 8, 0),
('fon222222@trab', 'fon2222@trab.com', 'trab2222222222222222 euhauheuaheuhauheuhahueuaheuha heahueh uauheauh', '2018-05-06', '21:31:53', 0, 0, 9, 0),
('R3TSN0M', 'gugussterra@gmail.com', 'Sou muito fã de todos vcs eu acompanho vcs desde quando eu era Cv5 e agora sou Cv7 eu gosto bastante dos nomes que vcs usaram no Clash o nome dos Clans como Gato Preto,PSICOWAR,PSICO REBORN,e muitos outros vcs são muito Feras todos ou a maioria é cv 10,11,12 o clã de vcs principalmente o PSICOWAR deu muito trabalho para ter as vilas e os clãs ainda com liga Lendária e eu aqui tentando ir pra ouro 3.\r\nAutor: R3TSN0M\r\nSem Clã\r\nXp:53\r\nCv:7\r\nTAG:#PJ9G28QQY', '2018-06-29', '18:27:18', 0, 0, 10, 0),
('LION', 'lionpsicowar@gmail.com', 'Parabéns pela organização dos clãns. ', '2018-07-28', '12:09:04', 0, 0, 11, 0),
('LION', 'lionpsicowar@gmail.com', 'Parabéns pela organização dos clãns. ', '2018-07-28', '12:09:05', 0, 0, 12, 0),
('Thiago Azevedo', 'thiagoazevedo.mx@hotmail.com', 'Bom dia, conheci o cla atraves do jogador MASCOTE, que me falou de vocês e quero muito fazer parte do cla. Se para fazer parte do cla for trofeus, estou com 5400 (hj ultimo dia da temporada) mas minha meta é bater os 5800 na proxima. Sou cv12 casal (rei47, rainha 58 grande guardiao18). Meu nick no jogo é Thiago Roxz e meu whats é 11 98333-5715.  Espero poder ter a oportunidade de jogar com vcs. Sempre compro gema e jogo todo dia.', '2018-07-29', '13:07:49', 0, 0, 13, 0),
('Guilherme Siewert', 'guilherme.swrt@gmail.com', 'Boa noite.\r\nGostaria de ordenar os membros do clan por nome, favor adicionar essa melhoria.\r\nAtt,\r\nGuilherme Siewert\r\n(47)98846-3113', '2018-08-02', '02:58:42', 0, 0, 14, 0),
('Andy', 'andypooters@gmail.com', 'Hello,\r\n\r\nis your site available for open source? i really like the design, nice work\r\n', '2018-08-08', '11:08:33', 0, 0, 15, 0),
('Danilo', 'danilosouzajunior1305@gmail.co', 'Olha eu ando MT tentando entrar em um Clan de vocês mas infelizmente eu acabei perdendo minha conta de 5256 troféus então eu entrei em contato com a supercel e eles não fizeram absolutamente nada!\r\nOlha se ouver uma chance se eu recuperar minha conta eu poderia entrar em seu Clan?\r\n\r\nEm breve entrarei em contato com minha vila.\r\nObg e bom dia', '2018-08-15', '03:24:45', 0, 0, 16, 0),
('Felipe ', 'felipehgabipereira@gmail.com', 'Olá Mano Só Um CV 9 Recente Tenho Chance Com Seu Clã ? Tenho 11 Anos Morro Em MANGUEIRINHA PR ✌ ', '2018-08-22', '13:54:37', 0, 0, 17, 0),
('ZAP', 'foo-bar@example.com', '', '2018-08-27', '02:42:51', 0, 0, 18, 0),
('ZAP', 'foo-bar@example.com', '', '2018-08-27', '03:02:37', 0, 0, 19, 0),
('ZAP', 'foo-bar@example.com', '', '2018-08-28', '02:39:38', 0, 0, 20, 0),
('ZAP', 'foo-bar@example.com', '', '2018-08-28', '04:25:31', 0, 0, 21, 0),
('Matheus', 'michaelwolff153@gmail.com', 'oi queria sabe como vcs criaram o site pro seu cla pode me dizer como?', '2018-08-31', '15:56:05', 0, 0, 22, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `user`
--

INSERT INTO `user` (`id_user`, `email`, `senha`) VALUES
(1, 'gumb@psicowar.ga', '1234567g');

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos`
--

CREATE TABLE `videos` (
  `idvideo` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `criador` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `videos`
--

INSERT INTO `videos` (`idvideo`, `titulo`, `criador`, `url`) VALUES
(2, 'PSICO REBORN War Recap 16', 'fernando shinya', 'rxEC6L1JlxQ'),
(3, 'PSICO REBORN WAR RECAP 17', 'fernando shinya', 'QqEtu1e2PoA'),
(4, 'PSICO REBORN WAR RECAP 18', 'fernando shinya', 'iqEZ_PcpLGY'),
(5, 'PSICO REBORN x DR DARK. TH12 WAR RECAP', 'fernando shinya', 'rBDQHRaROR8'),
(6, 'PSICO REBORN x HYPER RAGE. TH12 WAR RECAP', 'fernando shinya', 'EOKt19yuxVk'),
(7, 'PSICO REBORN x BRITISHBULLDOGS. TH12 WAR RECAP', 'fernando shinya', 'L0T6U_y1MVI'),
(8, 'PSICO REBORN x SAUDI ARABIA. TH12 WAR RECAP', 'fernando shinya', '5iLEHVwyvTM'),
(9, 'PSICO REBORN x FENERBAHCE SK. TH12 WAR RECAP', 'fernando shinya', 'BUqQHhhIgH4'),
(10, 'PSICO REBORN x TURKISH TITANS . TH12 War Recap #24', 'fernando shinya', 'InBeLvo2tGs');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `clan`
--
ALTER TABLE `clan`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Índices de tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`idvideo`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `clan`
--
ALTER TABLE `clan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `idvideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
