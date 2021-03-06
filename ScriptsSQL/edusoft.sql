-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-11-2015 a las 20:03:05
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

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
  `idCicloEscolar` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignacioncursos`
--

INSERT INTO `asignacioncursos` (`idAsignacionCursos`, `IdGrado`, `IdCurso`, `IdCatedratico`, `idCicloEscolar`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 3, 2, 1),
(3, 1, 4, 2, 1),
(6, 1, 5, 1, 1),
(7, 1, 2, 5, 1),
(9, 2, 3, 2, 1),
(10, 2, 4, 2, 1),
(11, 1, 6, 4, 1),
(12, 1, 7, 3, 1),
(13, 1, 12, 5, 1),
(20, 3, 5, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciongrados`
--

CREATE TABLE IF NOT EXISTS `asignaciongrados` (
  `idAsignacionGrados` int(11) NOT NULL,
  `IdEstudiante` int(11) NOT NULL,
  `IdCicloEscolar` int(11) NOT NULL,
  `idAsignacionSeccion` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignaciongrados`
--

INSERT INTO `asignaciongrados` (`idAsignacionGrados`, `IdEstudiante`, `IdCicloEscolar`, `idAsignacionSeccion`) VALUES
(1, 3, 1, 1),
(2, 4, 1, 1),
(3, 5, 1, 1),
(4, 6, 1, 2),
(5, 7, 1, 3),
(9, 1, 1, 3),
(10, 2, 1, 3),
(11, 8, 1, 1),
(12, 9, 1, 1),
(13, 10, 1, 1),
(14, 16, 1, 1),
(15, 17, 1, 2),
(16, 18, 1, 2),
(17, 19, 1, 4),
(18, 20, 1, 2),
(19, 21, 1, 4),
(20, 22, 1, 3),
(24, 23, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AsignacionSeccion`
--

CREATE TABLE IF NOT EXISTS `AsignacionSeccion` (
  `idAsignacionSeccion` int(11) NOT NULL,
  `idSeccion` int(11) NOT NULL,
  `idGrado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `AsignacionSeccion`
--

INSERT INTO `AsignacionSeccion` (`idAsignacionSeccion`, `idSeccion`, `idGrado`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Bimester`
--

CREATE TABLE IF NOT EXISTS `Bimester` (
  `idBimester` int(11) NOT NULL,
  `Description` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Bimester`
--

INSERT INTO `Bimester` (`idBimester`, `Description`) VALUES
(1, 'Primer'),
(2, 'Segundo'),
(3, 'Tercer'),
(4, 'Cuarto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catedraticos`
--

CREATE TABLE IF NOT EXISTS `catedraticos` (
  `idCatedratico` int(11) NOT NULL,
  `nombreCatedratico` varchar(60) NOT NULL,
  `domicilioCatedratico` varchar(100) NOT NULL,
  `telefonoCatedratico` varchar(8) NOT NULL,
  `emailCatedratico` varchar(20) DEFAULT NULL,
  `Profesiones_idProfesion` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catedraticos`
--

INSERT INTO `catedraticos` (`idCatedratico`, `nombreCatedratico`, `domicilioCatedratico`, `telefonoCatedratico`, `emailCatedratico`, `Profesiones_idProfesion`) VALUES
(1, 'Vilma Echeverria', 'Retalhuleu', '45879562', 'vilech@gmail.com', 2),
(2, 'Juan Carlos Martinez', 'Retalhuelu', '45786958', 'problemas@gmail.com', 3),
(3, 'Ignacio Galvez Rodriguez', 'Retalhuelu', '23786600', 'email@gmail.com', 6),
(4, 'Vicente Arturo Banderas Rocha', 'Retalhuelu', '58564759', 'br@gmail.com', 7),
(5, 'María del Socorro Avendaño Núñez', 'Mazatenango', '77785425', 'ya012@gmail.com', 1),
(6, 'Jorge Alonso Campos Saito', 'San Felipe', '53330210', 'yanose@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cicloescolar`
--

CREATE TABLE IF NOT EXISTS `cicloescolar` (
  `idCicloEscolar` int(11) NOT NULL,
  `Año` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cicloescolar`
--

INSERT INTO `cicloescolar` (`idCicloEscolar`, `Año`) VALUES
(1, 2015),
(2, 2016);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `idCurso` int(11) NOT NULL,
  `nombreCurso` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`idCurso`, `nombreCurso`) VALUES
(1, 'Matematicas'),
(2, 'Ciencias Sociales'),
(3, 'Computacion'),
(4, 'Programacion'),
(5, 'Fisica'),
(6, 'Musica'),
(7, 'Educación Fisica'),
(8, 'Ciencias Naturales'),
(9, 'Química'),
(10, 'Artes Plasticas'),
(11, 'Comunicación y Lenguaje'),
(12, 'Ingles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DetailedRatings`
--

CREATE TABLE IF NOT EXISTS `DetailedRatings` (
  `idDetailedRatings` int(11) NOT NULL,
  `idRatigns` int(11) NOT NULL,
  `idStudent` int(11) NOT NULL,
  `Procedural` decimal(20,2) NOT NULL,
  `Actitudinal` decimal(20,2) NOT NULL,
  `Exam` decimal(20,2) NOT NULL,
  `TotalScore` decimal(20,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `DetailedRatings`
--

INSERT INTO `DetailedRatings` (`idDetailedRatings`, `idRatigns`, `idStudent`, `Procedural`, `Actitudinal`, `Exam`, `TotalScore`) VALUES
(71, 26, 3, '50.00', '20.00', '30.00', '100.00'),
(72, 26, 4, '41.00', '19.00', '29.00', '89.00'),
(73, 26, 5, '42.00', '18.00', '28.00', '88.00'),
(74, 26, 8, '43.00', '20.00', '27.00', '90.00'),
(75, 26, 9, '44.00', '19.00', '25.00', '88.00'),
(76, 26, 10, '33.00', '20.00', '20.00', '73.00'),
(77, 26, 16, '24.00', '10.00', '10.00', '44.00'),
(78, 27, 3, '50.00', '20.00', '20.00', '90.00'),
(79, 27, 4, '10.30', '30.00', '39.00', '79.30'),
(80, 27, 5, '27.00', '23.00', '30.00', '80.00'),
(81, 27, 8, '23.00', '34.00', '34.00', '91.00'),
(82, 27, 9, '3.00', '34.00', '45.00', '82.00'),
(83, 27, 10, '39.00', '5.00', '50.00', '94.00'),
(84, 27, 16, '40.00', '10.00', '10.00', '60.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalletransacciones`
--

CREATE TABLE IF NOT EXISTS `detalletransacciones` (
  `iddetalleTransaccion` int(11) NOT NULL,
  `idTransaccion` int(11) NOT NULL,
  `IdMes` int(11) NOT NULL,
  `IdCicloEscolar` int(11) NOT NULL,
  `subTotal` decimal(20,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalletransacciones`
--

INSERT INTO `detalletransacciones` (`iddetalleTransaccion`, `idTransaccion`, `IdMes`, `IdCicloEscolar`, `subTotal`) VALUES
(1, 1, 1, 1, '150.00'),
(2, 2, 2, 1, '250.00'),
(3, 2, 3, 1, '250.00'),
(4, 2, 4, 1, '250.00'),
(5, 2, 5, 1, '250.00'),
(6, 2, 6, 1, '250.00'),
(7, 2, 7, 1, '250.00'),
(8, 2, 8, 1, '250.00'),
(9, 2, 9, 1, '250.00'),
(10, 2, 10, 1, '250.00'),
(14, 4, 1, 1, '150.00'),
(15, 4, 2, 1, '250.00'),
(16, 5, 1, 1, '150.00'),
(17, 5, 2, 1, '250.00'),
(18, 5, 3, 1, '250.00'),
(19, 5, 4, 1, '250.00'),
(20, 6, 1, 1, '150.00'),
(21, 6, 2, 1, '250.00'),
(22, 6, 3, 1, '250.00'),
(23, 6, 4, 1, '250.00'),
(24, 6, 5, 1, '250.00'),
(25, 6, 6, 1, '250.00'),
(26, 7, 1, 1, '150.00'),
(27, 7, 2, 1, '250.00'),
(28, 8, 1, 1, '150.00'),
(29, 9, 1, 1, '150.00'),
(30, 9, 2, 1, '250.00'),
(31, 9, 3, 1, '250.00'),
(32, 9, 4, 1, '250.00'),
(33, 9, 5, 1, '250.00'),
(34, 9, 6, 1, '250.00'),
(35, 9, 7, 1, '250.00'),
(36, 9, 8, 1, '250.00'),
(37, 9, 9, 1, '250.00'),
(38, 9, 10, 1, '250.00'),
(39, 9, 11, 1, '250.00'),
(40, 10, 1, 1, '150.00'),
(41, 10, 2, 1, '250.00'),
(42, 11, 3, 1, '250.00'),
(43, 11, 4, 1, '250.00'),
(44, 11, 5, 1, '250.00'),
(45, 11, 6, 1, '250.00'),
(46, 11, 7, 1, '250.00'),
(47, 11, 8, 1, '250.00'),
(48, 12, 1, 1, '150.00'),
(49, 12, 2, 1, '250.00'),
(50, 12, 3, 1, '250.00'),
(51, 13, 4, 1, '250.00'),
(52, 13, 5, 1, '250.00'),
(53, 13, 6, 1, '250.00'),
(54, 14, 7, 1, '250.00'),
(55, 14, 8, 1, '250.00'),
(56, 14, 9, 1, '250.00'),
(57, 14, 10, 1, '250.00'),
(58, 15, 1, 1, '150.00'),
(59, 15, 2, 1, '250.00'),
(60, 16, 3, 1, '250.00'),
(61, 16, 4, 1, '250.00'),
(62, 16, 5, 1, '250.00'),
(63, 17, 6, 1, '250.00'),
(64, 17, 7, 1, '250.00'),
(65, 18, 1, 1, '150.00'),
(66, 19, 2, 1, '250.00'),
(67, 19, 3, 1, '250.00'),
(68, 20, 1, 1, '150.00'),
(69, 20, 2, 1, '250.00'),
(70, 21, 9, 1, '250.00'),
(71, 21, 10, 1, '250.00'),
(72, 21, 11, 1, '250.00'),
(73, 22, 3, 1, '250.00'),
(74, 22, 4, 1, '250.00'),
(75, 23, 11, 1, '250.00'),
(76, 24, 7, 1, '250.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargados`
--

CREATE TABLE IF NOT EXISTS `encargados` (
  `idEncargado` int(11) NOT NULL,
  `nombreEncargado` varchar(60) NOT NULL,
  `domicilioEncargado` varchar(100) NOT NULL,
  `numeroContacto` varchar(8) NOT NULL,
  `emailContacto` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encargados`
--

INSERT INTO `encargados` (`idEncargado`, `nombreEncargado`, `domicilioEncargado`, `numeroContacto`, `emailContacto`) VALUES
(1, 'Julio Antonio Lopez', '4ta calle 3-29 zona 5', '67542374', 'jal01@gmail.com'),
(2, 'Luis Alberto Rosales', 'Retalhuleu', '77714258', 'lar1@gmail.com'),
(3, 'Juan De Arco', 'Retalhuleu', '48458945', 'encargado@gmail.com'),
(4, 'Alemán Mundo Marcial', 'Retalhuelu', '56897458', 'ya@gmail.com'),
(5, 'Pascual Gerardo Alonso Ibarra', 'Canton Pamelita', '25232410', 'yano@gmail.com'),
(6, 'Miguel Angel Burguete GarcIa', 'Retalhuelu', '25263214', 'jjj@gmail.com'),
(7, 'Alejandro Casas Bastida', 'Retalhuleu', '55856789', 'Ale@gmail.com'),
(8, 'Carlos Gonzales', 'Reu', '57868542', 'notengo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `idEstado` int(11) NOT NULL,
  `tipoEstado` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
  `idEstudiante` int(11) NOT NULL,
  `numeroCarne` varchar(200) NOT NULL,
  `nombreEstudiante` varchar(60) NOT NULL,
  `direccionEstudiante` varchar(100) NOT NULL,
  `telefonoEstudiante` varchar(8) NOT NULL,
  `emailEstudiante` varchar(20) NOT NULL,
  `idEncargado` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`idEstudiante`, `numeroCarne`, `nombreEstudiante`, `direccionEstudiante`, `telefonoEstudiante`, `emailEstudiante`, `idEncargado`, `idEstado`) VALUES
(1, 'a1', 'Lucas Perez', 'Retalhuleu', '53625344', 'LP@gmail.com', 1, 1),
(2, 'b2', 'Maria Lopez', 'Retalhuleu', '56342122', 'ml01@gmail.com', 1, 2),
(3, 'maalro-15-3249', 'Maria Alejandra Rosales', 'Retalhuelu', '58595654', 'emalla@gmail.com', 2, 1),
(4, 'alroloma-15-897', 'Alejandro Roberto Lopez Marcos', 'Retalhuelu', '57485956', 'cadavez@hotmail.com', 1, 1),
(5, 'luandear-15-3362', 'Lucia Ana De Arco', 'Retalhuleu', '77781891', 'student@gmail.com', 3, 1),
(6, 'juroro-15-4925', 'Juan Rodrigo Rodolfo', 'reu', '12451245', 'reu@gmail.com', 2, 1),
(7, 'madear-15-3139', 'Marina De Arco', 'reu', '45784512', 'reu@gmail.com', 3, 1),
(8, 'pagealib-15-4704', 'Pascual Gerardo Alonso Ibarra', 'Retalhuelu', '25242152', 'kakakaka@gmail.com', 5, 1),
(9, 'frcagr-15-2320', 'Francisco Caballero Green', 'Canton Alameda', '25241526', 'iuj@gmail.com', 6, 1),
(10, 'maanc', 'Marco Ruan Cárdenas Lopez', 'Canton Ocosito', '25147896', 'uweo@gmail.com', 5, 1),
(16, 'maancaco-15-4568', 'Marco Antonio Cardenas Cornejo', 'Canton Ocosito', '25147896', 'uweo@gmail.com', 5, 1),
(17, 'erfecafi-15-2581', 'Erick Fernando Cano Figueroa', 'Reu', '11223344', 's25s@gmail.com', 6, 1),
(18, 'alcaba-15-2906', 'Alejandro Casas Bastida', 'Reu', '47856920', 'hhhfff2@gmailc.om', 7, 1),
(19, 'alcaba-15-734', 'Alejandra Casas Bastida', 'Retalhuleu', '45123560', 'pola@gmail.com', 7, 1),
(20, 'micaba-15-548', 'Milagro Casas Bastida', '8va ave 3-45 zona 3', '14002502', 'aklsi@gmail.com', 7, 1),
(21, 'alcaba-15-3005', 'Alex Casas Bastida', 'Retalhuleu', '54789658', 'asd@gmail.com', 7, 1),
(22, 'kaangoca-15-2001', 'Karla Antonia Gonzales Castillo', 'Reu', '88869925', 'aaabb@gmail.com', 8, 1),
(23, 'felu-15-4443', 'Fernando Luez', 'Retalhuleu', '12893278', 'Umg@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE IF NOT EXISTS `grado` (
  `idGrado` int(11) NOT NULL,
  `Descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`idGrado`, `Descripcion`) VALUES
(1, 'Primero Basico'),
(2, 'Segundo Basico'),
(3, 'Tercero Basico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mes`
--

CREATE TABLE IF NOT EXISTS `mes` (
  `idMes` int(11) NOT NULL,
  `Descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mes`
--

INSERT INTO `mes` (`idMes`, `Descripcion`) VALUES
(1, 'Inscripcion'),
(2, 'Enero'),
(3, 'Febrero'),
(4, 'Marzo'),
(5, 'Abril'),
(6, 'Mayo'),
(7, 'Junio'),
(8, 'Julio'),
(9, 'Agosto'),
(10, 'Septiembre'),
(11, 'Octubre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivelesacademicos`
--

CREATE TABLE IF NOT EXISTS `nivelesacademicos` (
  `idnivelAcademico` int(11) NOT NULL,
  `nivelAcademico` varchar(50) NOT NULL,
  `valorInscripcion` decimal(20,2) NOT NULL,
  `valorColegiatura` decimal(20,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nivelesacademicos`
--

INSERT INTO `nivelesacademicos` (`idnivelAcademico`, `nivelAcademico`, `valorInscripcion`, `valorColegiatura`) VALUES
(1, 'Basico', '150.00', '250.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesiones`
--

CREATE TABLE IF NOT EXISTS `profesiones` (
  `idProfesion` int(11) NOT NULL,
  `Profesion` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesiones`
--

INSERT INTO `profesiones` (`idProfesion`, `Profesion`) VALUES
(1, 'Administrador'),
(2, 'Contador'),
(3, 'Bachiller en Computacion'),
(4, 'Maestra de Educacion Infantil'),
(5, 'Secretaria Bilingue'),
(6, 'Maestro de Educación Fisica'),
(7, 'Maestro de Música ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ratings`
--

CREATE TABLE IF NOT EXISTS `Ratings` (
  `idRatings` int(11) NOT NULL,
  `idBimester` int(11) NOT NULL,
  `idAssignCourses` int(11) NOT NULL,
  `idAssignSections` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Ratings`
--

INSERT INTO `Ratings` (`idRatings`, `idBimester`, `idAssignCourses`, `idAssignSections`) VALUES
(26, 1, 1, 1),
(27, 1, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Seccion`
--

CREATE TABLE IF NOT EXISTS `Seccion` (
  `idSeccion` int(11) NOT NULL,
  `Descripcion` varchar(145) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Seccion`
--

INSERT INTO `Seccion` (`idSeccion`, `Descripcion`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopago`
--

CREATE TABLE IF NOT EXISTS `tipopago` (
  `idTipoPago` int(11) NOT NULL,
  `Descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipopago`
--

INSERT INTO `tipopago` (`idTipoPago`, `Descripcion`) VALUES
(1, 'Efectivo'),
(2, 'Cheque');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE IF NOT EXISTS `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `Descripcion`) VALUES
(1, 'Director'),
(2, 'Secretaria'),
(3, 'Catedratico'),
(4, 'Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE IF NOT EXISTS `transacciones` (
  `idTransaccion` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `IdTipoPago` int(11) NOT NULL,
  `IdNivelAcademico` int(11) NOT NULL,
  `fechaTransaccion` date NOT NULL,
  `montoTotal` decimal(20,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`idTransaccion`, `idEstudiante`, `IdTipoPago`, `IdNivelAcademico`, `fechaTransaccion`, `montoTotal`) VALUES
(1, 3, 1, 1, '2015-11-05', '150.00'),
(2, 3, 1, 1, '2015-11-09', '2500.00'),
(3, 3, 1, 1, '2015-11-09', '250.00'),
(4, 19, 2, 1, '2015-11-06', '400.00'),
(5, 18, 2, 1, '2015-11-06', '900.00'),
(6, 4, 1, 1, '2015-11-09', '1400.00'),
(7, 21, 2, 1, '2015-11-03', '400.00'),
(8, 17, 1, 1, '2015-11-08', '150.00'),
(9, 9, 1, 1, '2015-11-02', '2650.00'),
(10, 1, 2, 1, '2015-08-19', '400.00'),
(11, 1, 1, 1, '2015-09-29', '1500.00'),
(12, 5, 1, 1, '2015-01-02', '650.00'),
(13, 5, 2, 1, '2015-04-11', '750.00'),
(14, 5, 1, 1, '2015-07-03', '1000.00'),
(15, 6, 1, 1, '2015-01-12', '400.00'),
(16, 6, 2, 1, '2015-03-28', '750.00'),
(17, 6, 1, 1, '2015-07-06', '500.00'),
(18, 16, 1, 1, '2015-01-06', '150.00'),
(19, 16, 1, 1, '2015-02-04', '500.00'),
(20, 8, 1, 1, '2015-01-04', '400.00'),
(21, 1, 1, 1, '2015-09-12', '750.00'),
(22, 19, 1, 1, '2015-11-04', '500.00'),
(23, 3, 1, 1, '2015-11-04', '250.00'),
(24, 4, 1, 1, '2015-11-12', '250.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  `IdTipoUsuario` int(11) NOT NULL,
  `IdEstudiante` int(11) DEFAULT NULL,
  `idCatedratico` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `usuario`, `contraseña`, `IdTipoUsuario`, `IdEstudiante`, `idCatedratico`) VALUES
(1, 'admin01', '12345', 1, NULL, NULL),
(2, 'secre01', 'abcde', 2, NULL, NULL),
(3, 'master01', '12345', 3, NULL, NULL),
(4, 'alum01', 'abcde', 4, 1, NULL),
(5, 'alum02', '12345', 4, 2, NULL),
(6, 've-t90343', 'teacher66', 3, NULL, 1),
(7, 'jcm-t280319', 'teacher47', 3, NULL, 2),
(8, 'mar-390356', 'study53', 4, 3, NULL),
(9, 'arlm-460343', 'study11', 4, 4, NULL),
(10, 'lada-920637', 'study80', 4, 5, NULL),
(11, 'jrr-970609', 'study88', 4, 6, NULL),
(12, 'mda-630637', 'study63', 4, 7, NULL),
(13, 'igr-t90840', 'teacher6', 3, NULL, 3),
(14, 'vabr-t360838', 'teacher52', 3, NULL, 4),
(15, 'mdsan-t370831', 'teacher65', 3, NULL, 5),
(16, 'jacs-t120824', 'teacher53', 3, NULL, 6),
(17, 'pgai-370834', 'study57', 4, 8, NULL),
(18, 'fcg-980831', 'study77', 4, 9, NULL),
(19, 'macc-520855', 'study25', 4, 10, NULL),
(20, 'macc-260836', 'study2', 4, 16, NULL),
(21, 'efcf-250839', 'study83', 4, 17, NULL),
(22, 'acb-550821', 'study94', 4, 18, NULL),
(23, 'acb-590816', 'study20', 4, 19, NULL),
(24, 'mcb-920813', 'study94', 4, 20, NULL),
(25, 'acb-530957', 'study62', 4, 21, NULL),
(26, 'kagc-870934', 'study100', 4, 22, NULL),
(27, 'fl-941106', 'study2', 4, 23, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacioncursos`
--
ALTER TABLE `asignacioncursos`
  ADD PRIMARY KEY (`idAsignacionCursos`),
  ADD KEY `GradosAsigCursos_idx` (`IdGrado`),
  ADD KEY `CursosAsigCursos_idx` (`IdCurso`),
  ADD KEY `AsigCurCate_idx` (`IdCatedratico`),
  ADD KEY `fk_asignacioncursos_ciclo_idx` (`idCicloEscolar`);

--
-- Indices de la tabla `asignaciongrados`
--
ALTER TABLE `asignaciongrados`
  ADD PRIMARY KEY (`idAsignacionGrados`),
  ADD KEY `EstudianteAsigGrado_idx` (`IdEstudiante`),
  ADD KEY `AsigGraCiclo_idx` (`IdCicloEscolar`),
  ADD KEY `fkasiggrayasigsecc_idx` (`idAsignacionSeccion`);

--
-- Indices de la tabla `AsignacionSeccion`
--
ALTER TABLE `AsignacionSeccion`
  ADD PRIMARY KEY (`idAsignacionSeccion`),
  ADD KEY `fkasigseccysecc_idx` (`idSeccion`),
  ADD KEY `fkasiggradygrad_idx` (`idGrado`);

--
-- Indices de la tabla `Bimester`
--
ALTER TABLE `Bimester`
  ADD PRIMARY KEY (`idBimester`);

--
-- Indices de la tabla `catedraticos`
--
ALTER TABLE `catedraticos`
  ADD PRIMARY KEY (`idCatedratico`),
  ADD KEY `fk_Catedraticos_Profesiones1_idx` (`Profesiones_idProfesion`);

--
-- Indices de la tabla `cicloescolar`
--
ALTER TABLE `cicloescolar`
  ADD PRIMARY KEY (`idCicloEscolar`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indices de la tabla `DetailedRatings`
--
ALTER TABLE `DetailedRatings`
  ADD PRIMARY KEY (`idDetailedRatings`),
  ADD KEY `FK_detailedRatings_ratings` (`idRatigns`);

--
-- Indices de la tabla `detalletransacciones`
--
ALTER TABLE `detalletransacciones`
  ADD PRIMARY KEY (`iddetalleTransaccion`),
  ADD KEY `fk_detalleTransaccion_Transacciones1_idx` (`idTransaccion`),
  ADD KEY `fk_detalltransa_mes_idx` (`IdMes`),
  ADD KEY `fk_detalletransa_ciclo_idx` (`IdCicloEscolar`);

--
-- Indices de la tabla `encargados`
--
ALTER TABLE `encargados`
  ADD PRIMARY KEY (`idEncargado`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`idEstudiante`),
  ADD UNIQUE KEY `numeroCarne_UNIQUE` (`numeroCarne`),
  ADD KEY `fk_Estudiantes_Encargados_idx` (`idEncargado`),
  ADD KEY `fk_Estudiantes_Estados1_idx` (`idEstado`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`idGrado`);

--
-- Indices de la tabla `mes`
--
ALTER TABLE `mes`
  ADD PRIMARY KEY (`idMes`);

--
-- Indices de la tabla `nivelesacademicos`
--
ALTER TABLE `nivelesacademicos`
  ADD PRIMARY KEY (`idnivelAcademico`);

--
-- Indices de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  ADD PRIMARY KEY (`idProfesion`);

--
-- Indices de la tabla `Ratings`
--
ALTER TABLE `Ratings`
  ADD PRIMARY KEY (`idRatings`),
  ADD KEY `fk_Ratings_AssignCourse_idx` (`idAssignCourses`),
  ADD KEY `fk_Ratings_Bimester_idx` (`idBimester`);

--
-- Indices de la tabla `Seccion`
--
ALTER TABLE `Seccion`
  ADD PRIMARY KEY (`idSeccion`);

--
-- Indices de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  ADD PRIMARY KEY (`idTipoPago`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  ADD PRIMARY KEY (`idTransaccion`),
  ADD KEY `fk_Transacciones_Estudiantes1_idx` (`idEstudiante`),
  ADD KEY `fk_trasacciontipop_idx` (`IdTipoPago`),
  ADD KEY `fk_trasaccionnivelAcad_idx` (`IdNivelAcademico`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD KEY `fk_Usuario_tipousuario_idx` (`IdTipoUsuario`),
  ADD KEY `fk_Estudiante_Usuario_idx` (`IdEstudiante`),
  ADD KEY `fk_usuarios_catedratico_idx` (`idCatedratico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacioncursos`
--
ALTER TABLE `asignacioncursos`
  MODIFY `idAsignacionCursos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `asignaciongrados`
--
ALTER TABLE `asignaciongrados`
  MODIFY `idAsignacionGrados` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `AsignacionSeccion`
--
ALTER TABLE `AsignacionSeccion`
  MODIFY `idAsignacionSeccion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `Bimester`
--
ALTER TABLE `Bimester`
  MODIFY `idBimester` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `catedraticos`
--
ALTER TABLE `catedraticos`
  MODIFY `idCatedratico` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cicloescolar`
--
ALTER TABLE `cicloescolar`
  MODIFY `idCicloEscolar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `DetailedRatings`
--
ALTER TABLE `DetailedRatings`
  MODIFY `idDetailedRatings` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT de la tabla `detalletransacciones`
--
ALTER TABLE `detalletransacciones`
  MODIFY `iddetalleTransaccion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT de la tabla `encargados`
--
ALTER TABLE `encargados`
  MODIFY `idEncargado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `idEstudiante` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `idGrado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `mes`
--
ALTER TABLE `mes`
  MODIFY `idMes` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `nivelesacademicos`
--
ALTER TABLE `nivelesacademicos`
  MODIFY `idnivelAcademico` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `profesiones`
--
ALTER TABLE `profesiones`
  MODIFY `idProfesion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `Ratings`
--
ALTER TABLE `Ratings`
  MODIFY `idRatings` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `Seccion`
--
ALTER TABLE `Seccion`
  MODIFY `idSeccion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  MODIFY `idTipoPago` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `transacciones`
--
ALTER TABLE `transacciones`
  MODIFY `idTransaccion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacioncursos`
--
ALTER TABLE `asignacioncursos`
  ADD CONSTRAINT `AsigCurCate` FOREIGN KEY (`IdCatedratico`) REFERENCES `catedraticos` (`idCatedratico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CursosAsigCursos` FOREIGN KEY (`IdCurso`) REFERENCES `cursos` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `GradosAsigCursos` FOREIGN KEY (`IdGrado`) REFERENCES `grado` (`idGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignacioncursos_ciclo` FOREIGN KEY (`idCicloEscolar`) REFERENCES `cicloescolar` (`idCicloEscolar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asignaciongrados`
--
ALTER TABLE `asignaciongrados`
  ADD CONSTRAINT `AsigGraCiclo` FOREIGN KEY (`IdCicloEscolar`) REFERENCES `cicloescolar` (`idCicloEscolar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `EstudianteAsigGrado` FOREIGN KEY (`IdEstudiante`) REFERENCES `estudiantes` (`idEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkasiggrayasigsecc` FOREIGN KEY (`idAsignacionSeccion`) REFERENCES `AsignacionSeccion` (`idAsignacionSeccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `AsignacionSeccion`
--
ALTER TABLE `AsignacionSeccion`
  ADD CONSTRAINT `fkasiggradygrad` FOREIGN KEY (`idGrado`) REFERENCES `grado` (`idGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkasigseccysecc` FOREIGN KEY (`idSeccion`) REFERENCES `Seccion` (`idSeccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `catedraticos`
--
ALTER TABLE `catedraticos`
  ADD CONSTRAINT `fk_Catedraticos_Profesiones1` FOREIGN KEY (`Profesiones_idProfesion`) REFERENCES `profesiones` (`idProfesion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `DetailedRatings`
--
ALTER TABLE `DetailedRatings`
  ADD CONSTRAINT `FK_detailedRatings_ratings` FOREIGN KEY (`idRatigns`) REFERENCES `Ratings` (`idRatings`);

--
-- Filtros para la tabla `detalletransacciones`
--
ALTER TABLE `detalletransacciones`
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
-- Filtros para la tabla `Ratings`
--
ALTER TABLE `Ratings`
  ADD CONSTRAINT `fk_Ratings_AssignCourse` FOREIGN KEY (`idAssignCourses`) REFERENCES `asignacioncursos` (`idAsignacionCursos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ratings_Bimester` FOREIGN KEY (`idBimester`) REFERENCES `Bimester` (`idBimester`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_Usuario_tipousuario` FOREIGN KEY (`IdTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_catedratico` FOREIGN KEY (`idCatedratico`) REFERENCES `catedraticos` (`idCatedratico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
