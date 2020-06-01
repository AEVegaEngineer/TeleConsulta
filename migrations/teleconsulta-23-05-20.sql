-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-05-2020 a las 22:26:48
-- Versión del servidor: 10.3.20-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `teleconsulta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospersonales`
--

DROP TABLE IF EXISTS `datospersonales`;
CREATE TABLE IF NOT EXISTS `datospersonales` (
  `datId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `datUsuarioDni` int(11) UNSIGNED NOT NULL,
  `datObraSocial` varchar(100) DEFAULT NULL,
  `datNombres` varchar(100) NOT NULL,
  `datAppelidos` varchar(100) NOT NULL,
  PRIMARY KEY (`datId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE IF NOT EXISTS `medicos` (
  `medId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `medUsuarioId` int(11) UNSIGNED NOT NULL,
  `medCodigo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`medId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuDni` int(11) NOT NULL,
  `usuUsuario` varchar(50) NOT NULL,
  `usuContrasena` varchar(100) NOT NULL,
  `usuEmail` varchar(50) NOT NULL,
  `usuObrasocial` varchar(100) DEFAULT NULL,
  `usuTipoUsuario` enum('paciente','medico','administrador','superusuario') NOT NULL DEFAULT 'paciente',
  PRIMARY KEY (`usuDni`),
  UNIQUE KEY `usuDni` (`usuDni`),
  UNIQUE KEY `usuUsuario` (`usuUsuario`),
  UNIQUE KEY `usuEmail` (`usuEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuDni`, `usuUsuario`, `usuContrasena`, `usuEmail`, `usuObrasocial`, `usuTipoUsuario`) VALUES
(123456, 'test', '$2y$10$/7LcG01uh83GXIK1NdKLi.UzzXkaZsahUtVEA4M7z9UmR04aXOfA.', 'test@test.test', 'asdasd', 'paciente'),
(1234567, 'test2', '$2y$10$cj.z8/DwgK5y0KHQMiQgJO2/KBNI5A98n2l2DyWBUeJUztwlPnOLO', 'test2@test.test', 'asdasd', 'paciente'),
(19422581, 'admin', '$2y$10$Oshp35VP6ONhZ/eY7dm1Kuc2aua4JdAXcprSK7CtLco.wrlTpSDcG', 'aevega1991@gmail.com', 'kajshdgsajd', 'medico');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
