-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 17-Ago-2014 às 04:17
-- Versão do servidor: 5.5.32
-- versão do PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `orcamento`
--
CREATE DATABASE IF NOT EXISTS `orcamento` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `orcamento`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_produto`
--

CREATE TABLE IF NOT EXISTS `categoria_produto` (
  `id_Categoria_Produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_Categoria_Produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `categoria_produto`
--

INSERT INTO `categoria_produto` (`id_Categoria_Produto`, `nome_categoria`) VALUES
(1, 'salgado'),
(2, 'pirulito'),
(3, 'pipoca');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estabelecimento`
--

CREATE TABLE IF NOT EXISTS `estabelecimento` (
  `id_Estabelecimento` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fantasia_estabelecimento` varchar(60) NOT NULL,
  `razao_social_estabelecimento` varchar(60) NOT NULL,
  `logradouro_estabelecimento` varchar(70) DEFAULT NULL,
  `numero_estabelecimento` varchar(6) DEFAULT NULL,
  `complemento_estabelecimento` varchar(45) DEFAULT NULL,
  `bairro_estabelecimento` varchar(45) NOT NULL,
  `cidade_estabelecimento` varchar(45) NOT NULL,
  `UF_estabelecimento` char(1) NOT NULL,
  `inclusao_estabelecimento` datetime DEFAULT NULL,
  PRIMARY KEY (`id_Estabelecimento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `estabelecimento`
--

INSERT INTO `estabelecimento` (`id_Estabelecimento`, `nome_fantasia_estabelecimento`, `razao_social_estabelecimento`, `logradouro_estabelecimento`, `numero_estabelecimento`, `complemento_estabelecimento`, `bairro_estabelecimento`, `cidade_estabelecimento`, `UF_estabelecimento`, `inclusao_estabelecimento`) VALUES
(1, 'Bom Bom brasil', 'bom bom', 'Avenida brasil', '23', '', 'rio doce', 'olinda', 'P', NULL),
(2, 'Bonieli ', 'bombom mania ', 'rua 28 ', '28', '', 'recife', 'vazea', 'P', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento_historico`
--

CREATE TABLE IF NOT EXISTS `orcamento_historico` (
  `id_orcamento` int(11) NOT NULL AUTO_INCREMENT,
  `qtd_produto_vc_orcamento` varchar(45) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_produto` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_orcamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `orcamento_historico`
--

INSERT INTO `orcamento_historico` (`id_orcamento`, `qtd_produto_vc_orcamento`, `id_usuario`, `id_produto`) VALUES
(1, '10', 3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id_Produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(100) NOT NULL,
  `fabricante_produto` varchar(45) DEFAULT NULL,
  `especificao_produto` varchar(100) DEFAULT NULL,
  `inclusao_dt_produto` datetime DEFAULT NULL,
  `id_Categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_Produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_Produto`, `nome_produto`, `fabricante_produto`, `especificao_produto`, `inclusao_dt_produto`, `id_Categoria`) VALUES
(1, '7 belos', '7 belos', 'nada definido', '2014-08-16 22:48:42', 1),
(2, 'pop', 'pop', 'pop', '2014-08-16 22:49:08', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_has_estabelecimento`
--

CREATE TABLE IF NOT EXISTS `produto_has_estabelecimento` (
  `id_Produto` int(11) NOT NULL,
  `id_Estabelecimento` int(11) NOT NULL,
  `preco_produto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto_has_estabelecimento`
--

INSERT INTO `produto_has_estabelecimento` (`id_Produto`, `id_Estabelecimento`, `preco_produto`) VALUES
(2, 2, '0.15'),
(1, 1, '0.10'),
(2, 1, '0.25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(100) DEFAULT NULL,
  `CPF_usuario` varchar(11) DEFAULT NULL,
  `email_usuario` varchar(45) DEFAULT NULL,
  `senha_usuario` varchar(200) DEFAULT NULL,
  `tipo_usuario` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `CPF_usuario`, `email_usuario`, `senha_usuario`, `tipo_usuario`) VALUES
(1, 'Felipe Fernandes de Lima Melo', '123', 'felipef1990@gmail.com', '2002ed4f0f109e045fd75853271974f9', '2'),
(2, 'waleska dias de souza', '08898723487', 'waleska.dsouza@gmail.com', 'd4b7b207e89652ddb0e2ebbbd108b9d0', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
