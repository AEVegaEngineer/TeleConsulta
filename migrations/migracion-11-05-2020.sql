-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.12-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para teleconsulta
CREATE DATABASE IF NOT EXISTS `teleconsulta` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `teleconsulta`;

-- Volcando estructura para tabla teleconsulta.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dni` int(11) NOT NULL,
  `obrasocial` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla teleconsulta.usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT IGNORE INTO `usuarios` (`username`, `password`, `email`, `dni`, `obrasocial`) VALUES
	('asd', 'asd', 'dd', 123, 'a');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;


-- Volcando estructura de base de datos para teleconsultasanatorio
CREATE DATABASE IF NOT EXISTS `teleconsultasanatorio` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `teleconsultasanatorio`;

-- Volcando estructura para tabla teleconsultasanatorio.medicos
CREATE TABLE IF NOT EXISTS `medicos` (
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `dni` int(10) unsigned NOT NULL,
  `especialidad` int(10) unsigned NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla teleconsultasanatorio.medicos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
