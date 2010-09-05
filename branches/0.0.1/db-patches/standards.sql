-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb5+lenny4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Xerado en: 05 de Set de 2010 ás 16:56
-- Versión do servidor: 5.0.51
-- Versión do PHP: 5.2.6-1+lenny8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Datos: `chuza_desenrolo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `standards`
--

CREATE TABLE IF NOT EXISTS `standards` (
  `id_standard` int(11) NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `short_name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `filename` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id_standard`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Extraindo datos da tabela `standards`
--

INSERT INTO `standards` (`id_standard`, `name`, `short_name`, `filename`) VALUES
(1, 'Galego-Português', 'es_ES.utf8', ''),
(2, 'Galego-RAG', 'gl_ES.utf8', '');
