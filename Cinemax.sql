-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Out-2024 às 19:54
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinemax`
--
DROP DATABASE IF EXISTS `cinemax`;
CREATE DATABASE IF NOT EXISTS `cinemax` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cinemax`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `cod_adm` int(11) NOT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`cod_adm`, `senha`, `usuario`) VALUES
(1, '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `cod_agen` int(11) NOT NULL,
  `cod_cli` int(11) NOT NULL,
  `cod_se` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `assento` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cod_cli` int(11) NOT NULL,
  `usuario` varchar(40) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `cpf` bigint(20) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `telefone` bigint(20) DEFAULT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `nacimento` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `filme`
--

CREATE TABLE `filme` (
  `cod_fil` int(11) NOT NULL,
  `cod_gen` int(11) NOT NULL,
  `titulo` varchar(40) DEFAULT NULL,
  `diretor` varchar(40) DEFAULT NULL,
  `duracao` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `cod_gen` int(11) NOT NULL,
  `nome` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessao`
--

CREATE TABLE `sessao` (
  `cod_se` int(11) NOT NULL,
  `cod_fil` int(11) NOT NULL,
  `hora` time DEFAULT NULL,
  `valor` decimal(4,2) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`cod_adm`);

--
-- Indexes for table `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`cod_agen`),
  ADD KEY `cod_cli` (`cod_cli`),
  ADD KEY `fk` (`cod_se`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cli`);

--
-- Indexes for table `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`cod_fil`),
  ADD KEY `cod_gen` (`cod_gen`);

--
-- Indexes for table `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`cod_gen`);

--
-- Indexes for table `sessao`
--
ALTER TABLE `sessao`
  ADD PRIMARY KEY (`cod_se`),
  ADD KEY `cod_fil` (`cod_fil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
