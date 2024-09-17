-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2024 at 10:21 PM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inscrito`
--
CREATE DATABASE IF NOT EXISTS `inscrito` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inscrito`;

-- --------------------------------------------------------

--
-- Table structure for table `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `cpf`, `email`, `senha`) VALUES
(1, 'LARISSA CRISTINA BENTO SANTANA', '26547713857', 'larissa.santana.ae2020@gmail.com', '123'),
(2, 'KAREN CRISTINA BENTO DA SILVA', '562.219.818-67', 'bentolarissa41@gmail.com', '1234'),
(3, 'Rodrigo Paulo Santana', '111111111111', 'lari@lari', '12345'),
(4, 'Larissa Cristina', '2222222222', 'lala@lala', '123'),
(5, 'Larissa Cristina', '44444444', 'L@L', '123'),
(6, 'Larissa Cristina', '5555555555', 'l@LL', '123'),
(7, 'Larissa Cristina', '1111111111111111111', 'l@S', '123'),
(8, 'Larissa Cristina', '99999999999', 'G@d', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
