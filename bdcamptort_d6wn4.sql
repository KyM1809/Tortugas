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
CREATE DATABASE IF NOT EXISTS `bdcamptort_d6wn4` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
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
		(Nick, Nombre, ApellidoPaterno, ApellidoMaterno, Celular, Correo, Contrasena, TipoUsuario)
	VALUES
		(Correo, Nom, Ap, Am, Cel, Cor, Con, Tip);
	SELECT '1' AS Codigo;
END//
DELIMITER ;

-- Volcando estructura para procedimiento bdcamptort_d6wn4.SP02ComprobarExisteUsuario
DELIMITER //
CREATE PROCEDURE `SP02ComprobarExisteUsuario`(
	IN `PUsuario` VARCHAR(50),
	IN `PContrasena` VARCHAR(130)
)
BEGIN
	SELECT COUNT(Nombre) AS Numero FROM tusuarios WHERE Nick = PUsuario AND Contrasena = PContrasena;
END//
DELIMITER ;

-- Volcando estructura para procedimiento bdcamptort_d6wn4.SP03ObtenerDatosUsuario
DELIMITER //
CREATE PROCEDURE `SP03ObtenerDatosUsuario`(
	IN `PUsuario` VARCHAR(50),
	IN `PContrasena` VARCHAR(130)
)
BEGIN
	SELECT Nick AS Usuario, Nombre, ApellidoPaterno, ApellidoMaterno, Celular, TipoUsuario, Celular, Correo
	FROM tusuarios
	WHERE Nick = PUsuario AND Contrasena = PContrasena;
END//
DELIMITER ;

-- Volcando estructura para procedimiento bdcamptort_d6wn4.SP04CrearNido
DELIMITER //
CREATE PROCEDURE `SP04CrearNido`(
	IN `Nombre` VARCHAR(50),
	IN `NHuevos` INT
)
BEGIN
	INSERT INTO
		tnidos(Nido, Huevos, Adoptado, Adopta)
	VALUES
		(Nombre, NHuevos, 2, Null);
	SELECT '1' AS Codigo;
END//
DELIMITER ;

-- Volcando estructura para procedimiento bdcamptort_d6wn4.SP05ListaNidos
DELIMITER //
CREATE PROCEDURE `SP05ListaNidos`()
BEGIN
	SELECT * FROM tnidos;
END//
DELIMITER ;

-- Volcando estructura para procedimiento bdcamptort_d6wn4.SP06ListaNidosNoAdoptados
DELIMITER //
CREATE PROCEDURE `SP06ListaNidosNoAdoptados`()
BEGIN
	SELECT * FROM tnidos WHERE tnidos.Adoptado = 2;
END//
DELIMITER ;

-- Volcando estructura para tabla bdcamptort_d6wn4.tcatadoptado
CREATE TABLE IF NOT EXISTS `tcatadoptado` (
  `Adoptado` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Adoptado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla bdcamptort_d6wn4.tcatadoptado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tcatadoptado` DISABLE KEYS */;
INSERT INTO `tcatadoptado` (`Adoptado`, `Descripcion`) VALUES
	(1, 'Adoptado'),
	(2, 'Disponible para adoptar');
/*!40000 ALTER TABLE `tcatadoptado` ENABLE KEYS */;

-- Volcando estructura para tabla bdcamptort_d6wn4.tcattipousuario
CREATE TABLE IF NOT EXISTS `tcattipousuario` (
  `TipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`TipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla bdcamptort_d6wn4.tcattipousuario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tcattipousuario` DISABLE KEYS */;
INSERT INTO `tcattipousuario` (`TipoUsuario`, `Descripcion`) VALUES
	(1, 'Admin'),
	(2, 'Usuario');
/*!40000 ALTER TABLE `tcattipousuario` ENABLE KEYS */;

-- Volcando estructura para tabla bdcamptort_d6wn4.tlogconsultas
CREATE TABLE IF NOT EXISTS `tlogconsultas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Consulta` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `FechaHora` datetime NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_TLogConsultas_tusuarios` (`Usuario`),
  CONSTRAINT `FK_TLogConsultas_tusuarios` FOREIGN KEY (`Usuario`) REFERENCES `tusuarios` (`Nick`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla bdcamptort_d6wn4.tlogconsultas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tlogconsultas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tlogconsultas` ENABLE KEYS */;

-- Volcando estructura para tabla bdcamptort_d6wn4.tloginicio
CREATE TABLE IF NOT EXISTS `tloginicio` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `FechaHora` datetime NOT NULL,
  `Contrasena` varchar(130) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_TLogInicio_tusuarios` (`Usuario`),
  CONSTRAINT `FK_TLogInicio_tusuarios` FOREIGN KEY (`Usuario`) REFERENCES `tusuarios` (`Nick`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla bdcamptort_d6wn4.tloginicio: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tloginicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tloginicio` ENABLE KEYS */;

-- Volcando estructura para tabla bdcamptort_d6wn4.tmultimediapublicacion
CREATE TABLE IF NOT EXISTS `tmultimediapublicacion` (
  `Publicacion` int(11) DEFAULT NULL,
  `Archivo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Extension` int(11) DEFAULT NULL,
  `Tamano` int(11) DEFAULT NULL,
  KEY `FK_TMultimediaPublicacion_TPublicaciones` (`Publicacion`),
  CONSTRAINT `FK_TMultimediaPublicacion_TPublicaciones` FOREIGN KEY (`Publicacion`) REFERENCES `tpublicaciones` (`Publicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla bdcamptort_d6wn4.tmultimediapublicacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tmultimediapublicacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmultimediapublicacion` ENABLE KEYS */;

-- Volcando estructura para tabla bdcamptort_d6wn4.tnidos
CREATE TABLE IF NOT EXISTS `tnidos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nido` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Huevos` int(11) NOT NULL,
  `Adoptado` int(11) NOT NULL,
  `Adopta` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_TNidos_TCatAdoptado` (`Adoptado`),
  KEY `FK_TNidos_tusuarios` (`Adopta`),
  CONSTRAINT `FK_TNidos_TCatAdoptado` FOREIGN KEY (`Adoptado`) REFERENCES `tcatadoptado` (`Adoptado`),
  CONSTRAINT `FK_TNidos_tusuarios` FOREIGN KEY (`Adopta`) REFERENCES `tusuarios` (`Nick`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla bdcamptort_d6wn4.tnidos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tnidos` DISABLE KEYS */;
INSERT INTO `tnidos` (`Id`, `Nido`, `Huevos`, `Adoptado`, `Adopta`) VALUES
	(3, 'Nido 1', 5, 2, NULL),
	(4, 'Nido 2', 21, 2, NULL);
/*!40000 ALTER TABLE `tnidos` ENABLE KEYS */;

-- Volcando estructura para tabla bdcamptort_d6wn4.tpublicaciones
CREATE TABLE IF NOT EXISTS `tpublicaciones` (
  `Publicacion` int(11) NOT NULL AUTO_INCREMENT,
  `Texto` varchar(2048) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `FechaHora` datetime NOT NULL,
  `Usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Token` varchar(130) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Publicacion`),
  KEY `FK_TPublicaciones_tusuarios` (`Usuario`),
  CONSTRAINT `FK_TPublicaciones_tusuarios` FOREIGN KEY (`Usuario`) REFERENCES `tusuarios` (`Nick`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla bdcamptort_d6wn4.tpublicaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tpublicaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpublicaciones` ENABLE KEYS */;

-- Volcando estructura para tabla bdcamptort_d6wn4.tusuarios
CREATE TABLE IF NOT EXISTS `tusuarios` (
  `Nick` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'VACIO',
  `Nombre` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'VACIO',
  `ApellidoPaterno` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'VACIO',
  `ApellidoMaterno` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'VACIO',
  `Celular` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'VACIO',
  `Correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'VACIO',
  `Contrasena` varchar(130) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'VACIO',
  `TipoUsuario` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`Nick`),
  KEY `FK_tusuarios_tcattipousuario` (`TipoUsuario`),
  CONSTRAINT `FK_tusuarios_tcattipousuario` FOREIGN KEY (`TipoUsuario`) REFERENCES `tcattipousuario` (`TipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla bdcamptort_d6wn4.tusuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tusuarios` DISABLE KEYS */;
INSERT INTO `tusuarios` (`Nick`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `Celular`, `Correo`, `Contrasena`, `TipoUsuario`) VALUES
	('u1@u.com', 'Eduardo', 'Velazquez', 'Cerda', '753', 'u1@u.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 1),
	('u2@u.com', 'Alonso', 'Velazquez', 'Cerda', '753', 'u2@u.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 2);
/*!40000 ALTER TABLE `tusuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
