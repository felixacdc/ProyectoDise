-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2015 a las 17:58:53
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
-- Estructura de tabla para la tabla `asignacioncursos`
--

CREATE TABLE IF NOT EXISTS `asignacioncursos` (
  `idAsignacionCursos` int(11) NOT NULL,
  `IdGrado` int(11) NOT NULL,
  `IdCurso` int(11) NOT NULL,
  `IdCatedratico` int(11) NOT NULL,
  PRIMARY KEY (`idAsignacionCursos`),
  KEY `GradosAsigCursos_idx` (`IdGrado`),
  KEY `CursosAsigCursos_idx` (`IdCurso`),
  KEY `AsigCurCate_idx` (`IdCatedratico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciongrados`
--

CREATE TABLE IF NOT EXISTS `asignaciongrados` (
  `idAsignacionGrados` int(11) NOT NULL,
  `IdGrado` int(11) NOT NULL,
  `IdEstudiante` int(11) NOT NULL,
  `IdCicloEscolar` int(11) NOT NULL,
  PRIMARY KEY (`idAsignacionGrados`),
  KEY `EstudianteAsigGrado_idx` (`IdEstudiante`),
  KEY `AsigGrado_idx` (`IdGrado`),
  KEY `AsigGraCiclo_idx` (`IdCicloEscolar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacionseccion`
--

CREATE TABLE IF NOT EXISTS `asignacionseccion` (
  `idAsignacionSeccion` int(11) NOT NULL AUTO_INCREMENT,
  `idSeccion` int(11) NOT NULL,
  `idGrado` int(11) NOT NULL,
  PRIMARY KEY (`idAsignacionSeccion`),
  KEY `fkasigseccysecc_idx` (`idSeccion`),
  KEY `fkasiggradygrad_idx` (`idGrado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catedraticos`
--

CREATE TABLE IF NOT EXISTS `catedraticos` (
  `idCatedratico` int(11) NOT NULL AUTO_INCREMENT,
  `codigoCatedratico` int(11) NOT NULL,
  `nombreCatedratico` varchar(60) NOT NULL,
  `domicilioCatedratico` varchar(100) NOT NULL,
  `telefonoCatedratico` varchar(8) NOT NULL,
  `emailCatedratico` varchar(20) DEFAULT NULL,
  `Profesiones_idProfesion` int(11) NOT NULL,
  PRIMARY KEY (`idCatedratico`),
  UNIQUE KEY `codigoCatedratico_UNIQUE` (`codigoCatedratico`),
  KEY `fk_Catedraticos_Profesiones1_idx` (`Profesiones_idProfesion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cicloescolar`
--

CREATE TABLE IF NOT EXISTS `cicloescolar` (
  `idCicloEscolar` int(11) NOT NULL,
  `Año` int(11) NOT NULL,
  PRIMARY KEY (`idCicloEscolar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCurso` varchar(45) NOT NULL,
  PRIMARY KEY (`idCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalletransacciones`
--

CREATE TABLE IF NOT EXISTS `detalletransacciones` (
  `iddetalleTransaccion` int(11) NOT NULL AUTO_INCREMENT,
  `idTransaccion` int(11) NOT NULL,
  `idtipoTransaccion` int(11) NOT NULL,
  `IdMes` int(11) NOT NULL,
  `IdCicloEscolar` int(11) NOT NULL,
  `subTotal` decimal(20,2) NOT NULL,
  PRIMARY KEY (`iddetalleTransaccion`),
  KEY `fk_detalleTransaccion_Transacciones1_idx` (`idTransaccion`),
  KEY `fk_detalleTransaccion_tipoTransacciones1_idx` (`idtipoTransaccion`),
  KEY `fk_detalltransa_mes_idx` (`IdMes`),
  KEY `fk_detalletransa_ciclo_idx` (`IdCicloEscolar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargados`
--

CREATE TABLE IF NOT EXISTS `encargados` (
  `idEncargado` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEncargado` varchar(60) NOT NULL,
  `domicilioEncargado` varchar(100) NOT NULL,
  `numeroContacto` varchar(8) NOT NULL,
  `emailContacto` varchar(20) NOT NULL,
  PRIMARY KEY (`idEncargado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `encargados`
--

INSERT INTO `encargados` (`idEncargado`, `nombreEncargado`, `domicilioEncargado`, `numeroContacto`, `emailContacto`) VALUES
(1, 'Juan Perez Pop', '3ra ave. 5-89 zona 3 ', '57586625', 'JPP@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `tipoEstado` varchar(20) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`idEstado`, `tipoEstado`) VALUES
(1, 'Activo'),
(2, 'Desactivo');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE IF NOT EXISTS `grado` (
  `idGrado` int(11) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`idGrado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mes`
--

CREATE TABLE IF NOT EXISTS `mes` (
  `idMes` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idMes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivelesacademicos`
--

CREATE TABLE IF NOT EXISTS `nivelesacademicos` (
  `idnivelAcademico` int(11) NOT NULL AUTO_INCREMENT,
  `nivelAcademico` varchar(50) NOT NULL,
  `valorInscripcion` decimal(20,2) NOT NULL,
  `valorColegiatura` decimal(20,2) NOT NULL,
  PRIMARY KEY (`idnivelAcademico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesiones`
--

CREATE TABLE IF NOT EXISTS `profesiones` (
  `idProfesion` int(11) NOT NULL AUTO_INCREMENT,
  `Profesion` varchar(50) NOT NULL,
  PRIMARY KEY (`idProfesion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE IF NOT EXISTS `seccion` (
  `idSeccion` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(145) NOT NULL,
  PRIMARY KEY (`idSeccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopago`
--

CREATE TABLE IF NOT EXISTS `tipopago` (
  `idTipoPago` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`idTipoPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotransacciones`
--

CREATE TABLE IF NOT EXISTS `tipotransacciones` (
  `idtipoTransaccion` int(11) NOT NULL AUTO_INCREMENT,
  `tipoTransaccion` varchar(50) NOT NULL,
  PRIMARY KEY (`idtipoTransaccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE IF NOT EXISTS `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`idTipoUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `Descripcion`) VALUES
(1, 'Administrador'),
(2, 'Secretaria'),
(3, 'Profesor'),
(4, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE IF NOT EXISTS `transacciones` (
  `idTransaccion` int(11) NOT NULL AUTO_INCREMENT,
  `idEstudiante` int(11) NOT NULL,
  `IdTipoPago` int(11) NOT NULL,
  `IdNivelAcademico` int(11) NOT NULL,
  `fechaTransaccion` date NOT NULL,
  `montoTotal` decimal(20,2) NOT NULL,
  PRIMARY KEY (`idTransaccion`),
  KEY `fk_Transacciones_Estudiantes1_idx` (`idEstudiante`),
  KEY `fk_trasacciontipop_idx` (`IdTipoPago`),
  KEY `fk_trasaccionnivelAcad_idx` (`IdNivelAcademico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `IdTipoUsuario` int(11) NOT NULL,
  `IdEstudiante` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsuarios`),
  KEY `fk_Usuario_tipousuario_idx` (`IdTipoUsuario`),
  KEY `fk_Estudiante_Usuario_idx` (`IdEstudiante`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `usuario`, `contraseña`, `IdTipoUsuario`, `IdEstudiante`) VALUES
(1, 'Direc01', '12345', 1, NULL),
(2, 'Secre01', '45678', 2, NULL),
(3, 'Profe01', 'abcd12', 3, NULL),
(4, 'Alum01', 'efgh12', 4, 1),
(5, 'Alum02', '12345', 4, 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacioncursos`
--
ALTER TABLE `asignacioncursos`
  ADD CONSTRAINT `AsigCurCate` FOREIGN KEY (`IdCatedratico`) REFERENCES `catedraticos` (`idCatedratico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CursosAsigCursos` FOREIGN KEY (`IdCurso`) REFERENCES `cursos` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `GradosAsigCursos` FOREIGN KEY (`IdGrado`) REFERENCES `grado` (`idGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignaciongrados`
--
ALTER TABLE `asignaciongrados`
  ADD CONSTRAINT `AsigGraCiclo` FOREIGN KEY (`IdCicloEscolar`) REFERENCES `cicloescolar` (`idCicloEscolar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `AsigGrado` FOREIGN KEY (`IdGrado`) REFERENCES `grado` (`idGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `EstudianteAsigGrado` FOREIGN KEY (`IdEstudiante`) REFERENCES `estudiantes` (`idEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignacionseccion`
--
ALTER TABLE `asignacionseccion`
  ADD CONSTRAINT `fkasigseccysecc` FOREIGN KEY (`idSeccion`) REFERENCES `seccion` (`idSeccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkasiggradygrad` FOREIGN KEY (`idGrado`) REFERENCES `grado` (`idGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `catedraticos`
--
ALTER TABLE `catedraticos`
  ADD CONSTRAINT `fk_Catedraticos_Profesiones1` FOREIGN KEY (`Profesiones_idProfesion`) REFERENCES `profesiones` (`idProfesion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalletransacciones`
--
ALTER TABLE `detalletransacciones`
  ADD CONSTRAINT `fk_detalleTransaccion_tipoTransacciones1` FOREIGN KEY (`idtipoTransaccion`) REFERENCES `tipotransacciones` (`idtipoTransaccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalleTransaccion_Transacciones1` FOREIGN KEY (`idTransaccion`) REFERENCES `transacciones` (`idTransaccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalletransa_ciclo` FOREIGN KEY (`IdCicloEscolar`) REFERENCES `cicloescolar` (`idCicloEscolar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalltransa_mes` FOREIGN KEY (`IdMes`) REFERENCES `mes` (`idMes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `fk_Estudiantes_Encargados` FOREIGN KEY (`idEncargado`) REFERENCES `encargados` (`idEncargado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estudiantes_Estados1` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD CONSTRAINT `fk_Transacciones_Estudiantes1` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trasaccionnivelAcad` FOREIGN KEY (`IdNivelAcademico`) REFERENCES `nivelesacademicos` (`idnivelAcademico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trasacciontipop` FOREIGN KEY (`IdTipoPago`) REFERENCES `tipopago` (`idTipoPago`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Estudiante_Usuario` FOREIGN KEY (`IdEstudiante`) REFERENCES `estudiantes` (`idEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_tipousuario` FOREIGN KEY (`IdTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
