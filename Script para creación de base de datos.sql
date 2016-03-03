--
-- Base de datos: `TRIVIA`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Materia`
--

CREATE TABLE IF NOT EXISTS `Materia` (
`idMateria` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
`idUsuario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(20) NOT NULL UNIQUE,
  `password` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Grupo`
--

CREATE TABLE IF NOT EXISTS `Grupo` (
`idGrupo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idMaestro` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  FOREIGN KEY(`idMaestro`) REFERENCES `Usuario`(`idUsuario`),
  FOREIGN KEY(`idMateria`) REFERENCES `Materia`(`idMateria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tema`
--

CREATE TABLE IF NOT EXISTS `Tema` (
`idTema` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idMateria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  FOREIGN KEY(`idMateria`) REFERENCES `Materia`(`idMateria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pregunta`
--

CREATE TABLE IF NOT EXISTS `Pregunta` (
`idPregunta` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idTema` int(11) NOT NULL,
  `pregunta` varchar(120) NOT NULL,
  `opcionA` varchar(80) NOT NULL,
  `opcionB` varchar(80) NOT NULL,
  `opcionC` varchar(80) NOT NULL,
  `opcionD` varchar(80) NOT NULL,
  `correcta` varchar(1) NOT NULL,
  FOREIGN KEY(`idTema`) REFERENCES `Tema`(`idTema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AlumnoEnGrupo`
--

CREATE TABLE IF NOT EXISTS `AlumnoEnGrupo` (
`idAlumno` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  PRIMARY KEY(`idAlumno`, `idGrupo`),
  FOREIGN KEY(`idAlumno`) REFERENCES `Usuario`(`idUsuario`),
  FOREIGN KEY(`idGrupo`) REFERENCES `Grupo`(`idGrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AlumnoJuegaTema`
--

CREATE TABLE IF NOT EXISTS `AlumnoJuegaTema` (
`idAlumno` int(11) NOT NULL,
  `idTema` int(11) NOT NULL,
  `Puntaje` int(11) NOT NULL,
  PRIMARY KEY(`idAlumno`, `idTema`),
  FOREIGN KEY(`idAlumno`) REFERENCES `Usuario`(`idUsuario`),
  FOREIGN KEY(`idTema`) REFERENCES `Tema`(`idTema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------