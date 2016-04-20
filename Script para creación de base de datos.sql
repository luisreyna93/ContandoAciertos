-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-04-2016 a las 17:45:14
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `trivia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AlumnoEnGrupo`
--

CREATE TABLE IF NOT EXISTS `AlumnoEnGrupo` (
  `idAlumno` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `AlumnoEnGrupo`
--

INSERT INTO `AlumnoEnGrupo` (`idAlumno`, `idGrupo`) VALUES
(38, 14),
(39, 14),
(40, 14),
(35, 15),
(36, 15),
(37, 15),
(41, 17),
(42, 17),
(43, 17),
(44, 18),
(45, 18),
(46, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AlumnoJuegaTema`
--

CREATE TABLE IF NOT EXISTS `AlumnoJuegaTema` (
  `idAlumno` int(11) NOT NULL,
  `idTema` int(11) NOT NULL,
  `Puntaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Grupo`
--

CREATE TABLE IF NOT EXISTS `Grupo` (
`idGrupo` int(11) NOT NULL,
  `idMaestro` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Grupo`
--

INSERT INTO `Grupo` (`idGrupo`, `idMaestro`, `idMateria`, `numero`) VALUES
(14, 34, 9, 1),
(15, 34, 9, 4),
(16, 34, 9, 5),
(17, 34, 10, 2),
(18, 34, 12, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Materia`
--

CREATE TABLE IF NOT EXISTS `Materia` (
`idMateria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Materia`
--

INSERT INTO `Materia` (`idMateria`, `nombre`, `clave`) VALUES
(9, 'FINANZAS PERSONALES ', 'FZ-1006'),
(10, 'MATEMÃTICAS FINANCI', 'FZ-1005'),
(12, 'EVALUACIÃ“N DE PROYE', 'FZ-2016');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pregunta`
--

CREATE TABLE IF NOT EXISTS `Pregunta` (
`idPregunta` int(11) NOT NULL,
  `idTema` int(11) NOT NULL,
  `pregunta` varchar(500) NOT NULL,
  `opcionA` varchar(500) NOT NULL,
  `opcionB` varchar(500) NOT NULL,
  `opcionC` varchar(500) NOT NULL,
  `opcionD` varchar(500) NOT NULL,
  `correcta` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tema`
--

CREATE TABLE IF NOT EXISTS `Tema` (
`idTema` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
`idUsuario` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`idUsuario`, `username`, `password`, `nombre`, `apellido`, `tipo`) VALUES
(-1, 'pendiente', 'pendiente', 'pendiente', 'pendiente', 'maestro'),
(32, 'admin', 'admin', 'Admin', 'Admin', 'admin'),
(34, 'L00201087', '201087', 'Luis', 'Prott', 'maestro'),
(35, 'A00516135', 'A00516135', 'FabiÃ¡n', 'GonzÃ¡lez HernÃ¡ndez', 'alumno'),
(36, 'A00618307', 'A00618307', 'Daniela Alejandra', 'Garza SÃ¡nchez', 'alumno'),
(37, 'A00813356', 'A00813356', 'JesÃºs Alejandro', 'GonzÃ¡lez Osuna', 'alumno'),
(38, 'A00807796', 'A00807796', 'Luis Arturo', 'SÃ¡nchez Cruz', 'alumno'),
(39, 'A00813067', 'A00813067', 'Erik Gerardo', 'RodrÃ­guez ChÃ¡vez', 'alumno'),
(40, 'A00813314', 'A00813314', 'Fernando', 'Gamboa LÃ³pez', 'alumno'),
(41, 'A00516498', 'A00516498', 'Mariafernanda', 'Flores HernÃ¡ndez', 'alumno'),
(42, 'A00814243', 'A00814243', 'Alejandro Antonio', 'Tijerina Urquieta', 'alumno'),
(43, 'A00814490', 'A00814490', 'Gladiana Aidaly', 'Ãvila JimÃ©nez', 'alumno'),
(44, 'A00510681', 'A00510681', 'JesÃºs Alfonso', 'Medina Acevedo', 'alumno'),
(45, 'A00513199', 'A00513199', 'JosÃ© Alberto', 'Manzur Kattas', 'alumno'),
(46, 'A00758717', 'A00758717', 'Luisa Fernanda', 'Ruiz Terrazas', 'alumno');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `AlumnoEnGrupo`
--
ALTER TABLE `AlumnoEnGrupo`
 ADD PRIMARY KEY (`idAlumno`,`idGrupo`), ADD KEY `idGrupo` (`idGrupo`);

--
-- Indices de la tabla `AlumnoJuegaTema`
--
ALTER TABLE `AlumnoJuegaTema`
 ADD PRIMARY KEY (`idAlumno`,`idTema`), ADD KEY `idTema` (`idTema`);

--
-- Indices de la tabla `Grupo`
--
ALTER TABLE `Grupo`
 ADD PRIMARY KEY (`idGrupo`), ADD KEY `idMaestro` (`idMaestro`), ADD KEY `idMateria` (`idMateria`);

--
-- Indices de la tabla `Materia`
--
ALTER TABLE `Materia`
 ADD PRIMARY KEY (`idMateria`), ADD UNIQUE KEY `clave` (`clave`);

--
-- Indices de la tabla `Pregunta`
--
ALTER TABLE `Pregunta`
 ADD PRIMARY KEY (`idPregunta`), ADD KEY `idTema` (`idTema`);

--
-- Indices de la tabla `Tema`
--
ALTER TABLE `Tema`
 ADD PRIMARY KEY (`idTema`), ADD KEY `idMateria` (`idMateria`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
 ADD PRIMARY KEY (`idUsuario`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Grupo`
--
ALTER TABLE `Grupo`
MODIFY `idGrupo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `Materia`
--
ALTER TABLE `Materia`
MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `Pregunta`
--
ALTER TABLE `Pregunta`
MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Tema`
--
ALTER TABLE `Tema`
MODIFY `idTema` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `AlumnoEnGrupo`
--
ALTER TABLE `AlumnoEnGrupo`
ADD CONSTRAINT `alumnoengrupo_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `Usuario` (`idUsuario`),
ADD CONSTRAINT `alumnoengrupo_ibfk_2` FOREIGN KEY (`idGrupo`) REFERENCES `Grupo` (`idGrupo`);

--
-- Filtros para la tabla `AlumnoJuegaTema`
--
ALTER TABLE `AlumnoJuegaTema`
ADD CONSTRAINT `alumnojuegatema_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `Usuario` (`idUsuario`),
ADD CONSTRAINT `alumnojuegatema_ibfk_2` FOREIGN KEY (`idTema`) REFERENCES `Tema` (`idTema`);

--
-- Filtros para la tabla `Grupo`
--
ALTER TABLE `Grupo`
ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`idMaestro`) REFERENCES `Usuario` (`idUsuario`),
ADD CONSTRAINT `grupo_ibfk_2` FOREIGN KEY (`idMateria`) REFERENCES `Materia` (`idMateria`);

--
-- Filtros para la tabla `Pregunta`
--
ALTER TABLE `Pregunta`
ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`idTema`) REFERENCES `Tema` (`idTema`);

--
-- Filtros para la tabla `Tema`
--
ALTER TABLE `Tema`
ADD CONSTRAINT `tema_ibfk_1` FOREIGN KEY (`idMateria`) REFERENCES `Materia` (`idMateria`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
