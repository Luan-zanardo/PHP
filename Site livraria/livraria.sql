-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 02/05/2024 às 21h39min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `livraria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `nacionalidade` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `codigo` int(5) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacao`
--

CREATE TABLE IF NOT EXISTS `classificacao` (
  `codigo` int(5) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
  `codigo` int(5) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `codcategoria` int(5) NOT NULL,
  `codclassificacao` int(5) NOT NULL,
  `ano` int(4) NOT NULL,
  `edicao` varchar(50) NOT NULL,
  `codautor` int(5) NOT NULL,
  `editora` varchar(50) NOT NULL,
  `paginas` int(5) NOT NULL,
  `fotocapa` varchar(100) NOT NULL,
  `valor` float(10,2) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codcategoria` (`codcategoria`),
  KEY `codclassificacao` (`codclassificacao`),
  KEY `codautor` (`codautor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
