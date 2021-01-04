-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.17 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para bdcamptort_d6wn4
CREATE DATABASE IF NOT EXISTS `bdcamptort_d6wn4` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bdcamptort_d6wn4`;

-- Volcando estructura para procedimiento bdcamptort_d6wn4.SP01RegistrarUsuario
DELIMITER //
CREATE PROCEDURE `SP01RegistrarUsuario`(
	IN `Nom` VARCHAR(40),
	IN `Ap` VARCHAR(20),
	IN `Am` VARCHAR(20),
	IN `Cel` VARCHAR(15),
	IN `Cor` VARCHAR(100),
	IN `Con` VARCHAR(130),
	IN `Tip` INT
)
BEGIN
	INSERT INTO tusuarios
		(Nombre, ApellidoPaterno, ApellidoMaterno, Celular, Correo, Contrasena, TipoUsuario)
	VALUES
		(Nom, Ap, Am, Cel, Cor, Con, Tip);
	SELECT '1' AS Codigo;
END//
DELIMITER ;

-- Volcando estructura para tabla bdcamptort_d6wn4.tcatadoptado
CREATE TABLE IF NOT EXISTS `tcatadoptado` (
  `Adoptado` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`Adoptado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdcamptort_d6wn4.tcatadoptado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tcatadoptado` DISABLE KEYS */;
/*!40000 ALTER TABLE `tcatadoptado` ENABLE KEYS */;

-- Volcando estructura para tabla bdcamptort_d6wn4.tcattipousuario
CREATE TABLE IF NOT EXISTS `tcattipousuario` (
  `TipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`TipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdcamptort_d6wn4.tcattipousuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tcattipousuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tcattipousuario` ENABLE KEYS */;

-- Volcando estructura para tabla bdcamptort_d6wn4.tlogconsultas
CREATE TABLE IF NOT EXISTS `tlogconsultas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(30) NOT NULL,
  `Consulta` varchar(100) NOT NULL,
  `FechaHora` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_TLogConsultas_tusuarios` (`Usuario`),
  CONSTRAINT `FK_TLogConsultas_tusuarios` FOREIGN KEY (`Usuario`) REFERENCES `tusuarios` (`Nick`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdcamptort_d6wn4.tlogconsultas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tlogconsultas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tlogconsultas` ENABLE KEYS */;

-- Volcando estructura para tabla bdcamptort_d6wn4.tloginicio
CREATE TABLE IF NOT EXISTS `tloginicio` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(30) NOT NULL,
  `FechaHora` datetime NOT NULL,
  `Contrasena` varchar(130) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_TLogInicio_tusuarios` (`Usuario`),
  CONSTRAINT `FK_TLogInicio_tusuarios` FOREIGN KEY (`Usuario`) REFERENCES `tusuarios` (`Nick`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdcamptort_d6wn4.tloginicio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tloginicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tloginicio` ENABLE KEYS */;

-- Volcando estructura para tabla bdcamptort_d6wn4.tmultimediapublicacion
CREATE TABLE IF NOT EXISTS `tmultimediapublicacion` (
  `Publicacion` int(11) DEFAULT NULL,
  `Arhicov` varchar(100) DEFAULT NULL,
  `Extension` int(11) DEFAULT NULL,
  `Tamano` int(11) DEFAULT NULL,
  KEY `FK_TMultimediaPublicacion_TPublicaciones` (`Publicacion`),
  CONSTRAINT `FK_TMultimediaPublicacion_TPublicaciones` FOREIGN KEY (`Publicacion`) REFERENCES `tpublicaciones` (`Publicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdcamptort_d6wn4.tmultimediapublicacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tmultimediapublicacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmultimediapublicacion` ENABLE KEYS */;

-- Volcando estructura para tabla bdcamptort_d6wn4.tnidos
CREATE TABLE IF NOT EXISTS `tnidos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nido` varchar(50) NOT NULL,
  `Huevos` int(11) NOT NULL,
  `Adoptado` int(11) NOT NULL,
  `Adopta` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_TNidos_TCatAdoptado` (`Adoptado`),
  KEY `FK_TNidos_tusuarios` (`Adopta`),
  CONSTRAINT `FK_TNidos_TCatAdoptado` FOREIGN KEY (`Adoptado`) REFERENCES `tcatadoptado` (`Adoptado`),
  CONSTRAINT `FK_TNidos_tusuarios` FOREIGN KEY (`Adopta`) REFERENCES `tusuarios` (`Nick`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdcamptort_d6wn4.tnidos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tnidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tnidos` ENABLE KEYS */;

-- Volcando estructura para tabla bdcamptort_d6wn4.tpublicaciones
CREATE TABLE IF NOT EXISTS `tpublicaciones` (
  `Publicacion` int(11) NOT NULL AUTO_INCREMENT,
  `Texto` varchar(2048) NOT NULL,
  `FechaHora` datetime NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Token` varchar(130) NOT NULL,
  PRIMARY KEY (`Publicacion`),
  KEY `FK_TPublicaciones_tusuarios` (`Usuario`),
  CONSTRAINT `FK_TPublicaciones_tusuarios` FOREIGN KEY (`Usuario`) REFERENCES `tusuarios` (`Nick`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdcamptort_d6wn4.tpublicaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tpublicaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpublicaciones` ENABLE KEYS */;

-- Volcando estructura para tabla bdcamptort_d6wn4.tusuarios
CREATE TABLE IF NOT EXISTS `tusuarios` (
  `Nick` varchar(30) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `ApellidoPaterno` varchar(20) NOT NULL,
  `ApellidoMaterno` varchar(20) NOT NULL,
  `Celular` varchar(15) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Contrasena` varchar(130) NOT NULL,
  `TipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`Nick`),
  KEY `FK_tusuarios_TCatTipoUsuario` (`TipoUsuario`),
  CONSTRAINT `FK_tusuarios_TCatTipoUsuario` FOREIGN KEY (`TipoUsuario`) REFERENCES `tcattipousuario` (`TipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bdcamptort_d6wn4.tusuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tusuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tusuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
