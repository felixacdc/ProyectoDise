-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2015 a las 17:53:24
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `edusoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE IF NOT EXISTS `estudiantes` (
  `idEstudiante` int(11) NOT NULL AUTO_INCREMENT,
  `numeroCarne` int(11) NOT NULL,
  `nombreEstudiante` varchar(60) NOT NULL,
  `direccionEstudiante` varchar(100) NOT NULL,
  `telefonoEstudiante` varchar(8) NOT NULL,
  `emailEstudiante` varchar(20) NOT NULL,
  `idEncargado` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL,
  PRIMARY KEY (`idEstudiante`),
  UNIQUE KEY `numeroCarne_UNIQUE` (`numeroCarne`),
  KEY `fk_Estudiantes_Encargados_idx` (`idEncargado`),
  KEY `fk_Estudiantes_Estados1_idx` (`idEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`idEstudiante`, `numeroCarne`, `nombreEstudiante`, `direccionEstudiante`, `telefonoEstudiante`, `emailEstudiante`, `idEncargado`, `idEstado`) VALUES
(1, 1, 'Juan Luis Perez', '3ra ave. 5-89 zona 3', '47895621', 'JuanitoTra@gmail.com', 1, 1),
(2, 2, 'Rodrigo Perez', '3ra ave. 5-89 zona 3', '57463242', 'RoPe@gmail.com', 1, 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `fk_Estudiantes_Encargados` FOREIGN KEY (`idEncargado`) REFERENCES `encargados` (`idEncargado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estudiantes_Estados1` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
