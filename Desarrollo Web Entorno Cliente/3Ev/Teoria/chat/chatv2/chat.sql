-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-04-2019 a las 15:40:12
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chat`
--
CREATE DATABASE IF NOT EXISTS `chat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `chat`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversacion`
--

DROP TABLE IF EXISTS `conversacion`;
CREATE TABLE IF NOT EXISTS `conversacion` (
  `idConversation` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  PRIMARY KEY (`idConversation`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conversacion`
--

INSERT INTO `conversacion` (`idConversation`, `usuario`, `mensaje`) VALUES
(1, 'root', 'Este es una prueba'),
(2, 'root', 'Prueba'),
(3, 'root', 'EE'),
(4, 'root', 'Mariavilloso'),
(5, 'root', 'Pepe'),
(6, 'root', 'fff'),
(7, 'Prueba', 'Ahora si');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
