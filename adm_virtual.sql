/*
 Navicat MySQL Data Transfer

 Source Server         : admisiones.umbvirtualeduco
 Source Server Type    : MySQL
 Source Server Version : 50534
 Source Host           : 172.16.210.8
 Source Database       : adm_virtual

 Target Server Type    : MySQL
 Target Server Version : 50534
 File Encoding         : utf-8

 Date: 07/09/2014 17:57:30 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `academico`
-- ----------------------------
DROP TABLE IF EXISTS `academico`;
CREATE TABLE `academico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(300) CHARACTER SET latin1 DEFAULT '0',
  `Titulo` varchar(500) CHARACTER SET utf8 DEFAULT '0',
  `Institucion` varchar(500) CHARACTER SET utf8 DEFAULT '0',
  `FchEgreso` date DEFAULT NULL,
  `Identificacion` varchar(300) CHARACTER SET latin1 DEFAULT NULL,
  `idEstudiante` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `identificacion` (`Identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=432 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Agrega la informacion academica de los estudiantes';

-- ----------------------------
--  Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `passcode` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `perfil` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `clave`
-- ----------------------------
DROP TABLE IF EXISTS `clave`;
CREATE TABLE `clave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(500) DEFAULT NULL,
  `clave` varchar(500) DEFAULT NULL,
  `servicio` varchar(500) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `entrevista`
-- ----------------------------
DROP TABLE IF EXISTS `entrevista`;
CREATE TABLE `entrevista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `QuienSoy` varchar(500) DEFAULT NULL,
  `Interpersonal` varchar(500) DEFAULT NULL,
  `ProgramaAcademico` varchar(500) DEFAULT NULL,
  `Experiencia` varchar(500) DEFAULT NULL,
  `Virtual` varchar(500) DEFAULT NULL,
  `UMB` varchar(500) DEFAULT NULL,
  `Financiacion` varchar(500) DEFAULT NULL,
  `Computadora` varchar(500) DEFAULT NULL,
  `TIC` varchar(500) DEFAULT NULL,
  `Identificacion` varchar(500) DEFAULT NULL,
  `idEstudiante` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=538 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `estados`
-- ----------------------------
DROP TABLE IF EXISTS `estados`;
CREATE TABLE `estados` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(100) NOT NULL,
  `relacion` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `codigo_pais` (`relacion`)
) ENGINE=MyISAM AUTO_INCREMENT=4293 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `estudiante`
-- ----------------------------
DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE `estudiante` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `TipoId` varchar(300) CHARACTER SET utf8 DEFAULT '0',
  `Identificacion` varchar(300) CHARACTER SET latin1 DEFAULT '0',
  `Nombre` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `Apellido` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `FchNacimiento` date DEFAULT NULL,
  `LNacimiento` varchar(300) CHARACTER SET latin1 DEFAULT '0',
  `Direccion` varchar(500) CHARACTER SET latin1 DEFAULT '0',
  `Ciudad` int(11) DEFAULT '0',
  `Barrio` varchar(500) CHARACTER SET latin1 DEFAULT '0',
  `Telefono` varchar(500) CHARACTER SET latin1 DEFAULT '0',
  `Celular` varchar(500) CHARACTER SET latin1 DEFAULT '0',
  `Email` varchar(500) CHARACTER SET latin1 DEFAULT '0',
  `Genero` varchar(10) CHARACTER SET latin1 DEFAULT '0',
  `EstadoCivil` varchar(100) CHARACTER SET utf8 DEFAULT '0',
  `Fuente` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `Nacionalidad` varchar(500) CHARACTER SET latin1 DEFAULT '0',
  `Foto` varchar(500) CHARACTER SET latin1 DEFAULT '0',
  `Programa` int(11) DEFAULT '0',
  `Fch` datetime DEFAULT NULL,
  `Estado` char(11) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '1',
  `FchRespuesta` datetime DEFAULT NULL,
  `Observacion` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `umb` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'Aspirante',
  `Rh` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `Identificacion` (`Identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3147 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='Datos del Estudiante';

-- ----------------------------
--  Table structure for `formacion`
-- ----------------------------
DROP TABLE IF EXISTS `formacion`;
CREATE TABLE `formacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Formacion` varchar(300) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Categoria para los Programas de Universidad';

-- ----------------------------
--  Table structure for `laboral`
-- ----------------------------
DROP TABLE IF EXISTS `laboral`;
CREATE TABLE `laboral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(50) NOT NULL DEFAULT '0',
  `Institucion` varchar(500) DEFAULT '0',
  `FchInicio` date DEFAULT NULL,
  `FchFinal` date DEFAULT NULL,
  `Telefono` varchar(50) DEFAULT '0',
  `CiudadT` int(11) DEFAULT '0',
  `TipoVinculacion` varchar(50) DEFAULT '0',
  `Cargo` varchar(500) DEFAULT '0',
  `Identificacion` varchar(300) DEFAULT '0',
  `idEstudiante` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Estudiante` (`Identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=663 DEFAULT CHARSET=latin1 COMMENT='Informacion Laboral del estudiante';

-- ----------------------------
--  Table structure for `municipios`
-- ----------------------------
DROP TABLE IF EXISTS `municipios`;
CREATE TABLE `municipios` (
  `id` smallint(4) NOT NULL AUTO_INCREMENT,
  `municipio` char(27) DEFAULT NULL,
  `relacion` char(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1102 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `pago`
-- ----------------------------
DROP TABLE IF EXISTS `pago`;
CREATE TABLE `pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IdPersona` varchar(50) DEFAULT NULL,
  `Persona` varchar(300) DEFAULT NULL,
  `Expedido` int(11) DEFAULT NULL,
  `FchPago` date DEFAULT NULL,
  `Cuenta` varchar(100) DEFAULT '0',
  `TipoCuenta` varchar(100) DEFAULT '0',
  `Banco` varchar(300) DEFAULT '0',
  `Valor` varchar(300) DEFAULT '0',
  `ValorTexto` varchar(500) DEFAULT '0',
  `Tipo` varchar(100) DEFAULT '0',
  `Identificacion` varchar(300) DEFAULT '0',
  `idEstudiante` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1 COMMENT='Este Es el formulario que diligencia el estudiante para realizar el pago de la matricula o de la inscripcion';

-- ----------------------------
--  Table structure for `paises`
-- ----------------------------
DROP TABLE IF EXISTS `paises`;
CREATE TABLE `paises` (
  `id` int(3) unsigned NOT NULL DEFAULT '0',
  `pais` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `programa`
-- ----------------------------
DROP TABLE IF EXISTS `programa`;
CREATE TABLE `programa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Programa` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '0',
  `Matricula` varchar(255) DEFAULT NULL,
  `Inscripcion` varchar(300) CHARACTER SET latin1 DEFAULT '0',
  `Precio` varchar(11) DEFAULT '0',
  `Formacion` int(11) NOT NULL DEFAULT '0',
  `Url` varchar(255) DEFAULT NULL,
  `Imagen` varchar(255) DEFAULT NULL,
  `Asesor` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='Nombre de los Programas De la Universidad esta va unida a Categoria';

-- ----------------------------
--  Table structure for `pse`
-- ----------------------------
DROP TABLE IF EXISTS `pse`;
CREATE TABLE `pse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `ref_venta` varchar(255) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `moneda` char(3) DEFAULT NULL,
  `estado_pol` char(1) DEFAULT NULL,
  `identificacion` varchar(255) DEFAULT NULL,
  `fch` datetime DEFAULT NULL,
  `Pvalor` int(11) DEFAULT NULL,
  `Pestado_pol` char(1) DEFAULT NULL,
  `Pfch` datetime DEFAULT NULL,
  `Pmensaje` varchar(255) DEFAULT NULL,
  `Cvalor` int(11) DEFAULT NULL,
  `Cestado_pol` char(1) DEFAULT NULL,
  `Cfch` datetime DEFAULT NULL,
  `Cmensaje` varchar(255) DEFAULT NULL,
  `transaccion_id` int(11) DEFAULT NULL,
  `banco_id` int(255) DEFAULT NULL,
  `medio_pago_id` int(255) DEFAULT NULL,
  `transaccion_banco_id` int(255) DEFAULT NULL,
  `codigo_autorizacion` int(255) DEFAULT NULL,
  `email_comprador` varchar(255) DEFAULT NULL,
  `intentos` int(255) DEFAULT NULL,
  `ref_pol` int(255) DEFAULT NULL,
  `firma` varchar(255) DEFAULT NULL,
  `medio_pago` int(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `tarjeta_habiente` varchar(255) DEFAULT NULL,
  `franquicia` varchar(255) DEFAULT NULL,
  `direccionCobro` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100180 DEFAULT CHARSET=latin1;

-- ----------------------------
--  View structure for `edad`
-- ----------------------------
DROP VIEW IF EXISTS `edad`;
CREATE ALGORITHM=UNDEFINED DEFINER=`adm_virtual`@`%` SQL SECURITY DEFINER VIEW `edad` AS select timestampdiff(YEAR,`estudiante`.`FchNacimiento`,curdate()) AS `age` from `estudiante` where (`estudiante`.`FchNacimiento` is not null);

-- ----------------------------
--  Procedure structure for `edad`
-- ----------------------------
DROP PROCEDURE IF EXISTS `edad`;
delimiter ;;
CREATE DEFINER=`adm_virtual`@`%` PROCEDURE `edad`(IN autonumerico int)
    READS SQL DATA
BEGIN
    Select  timestampdiff(YEAR,`estudiante`.`FchNacimiento`,curdate()) AS `age`
    From   estudiante
	where Id=autonumerico;
END
 ;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
