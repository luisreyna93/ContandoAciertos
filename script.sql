-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-05-2016 a las 09:32:31
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
(40, 14),
(51, 14),
(35, 15),
(36, 15),
(37, 15),
(41, 17),
(42, 17),
(43, 17),
(51, 17),
(44, 18),
(45, 18),
(46, 18),
(51, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AlumnoJuegaTema`
--

CREATE TABLE IF NOT EXISTS `AlumnoJuegaTema` (
  `idAlumno` int(11) NOT NULL,
  `idTema` int(11) NOT NULL,
  `Puntaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `AlumnoJuegaTema`
--

INSERT INTO `AlumnoJuegaTema` (`idAlumno`, `idTema`, `Puntaje`) VALUES
(32, 1, 10),
(35, 1, 90),
(36, 1, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Grupo`
--

CREATE TABLE IF NOT EXISTS `Grupo` (
`idGrupo` int(11) NOT NULL,
  `idMaestro` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Grupo`
--

INSERT INTO `Grupo` (`idGrupo`, `idMaestro`, `idMateria`, `numero`) VALUES
(14, 48, 9, 1),
(15, 48, 9, 4),
(16, 48, 9, 5),
(17, 48, 10, 2),
(18, 48, 12, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Materia`
--

CREATE TABLE IF NOT EXISTS `Materia` (
`idMateria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

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
  `pregunta` varchar(1000) NOT NULL,
  `opcionA` varchar(80) NOT NULL,
  `opcionB` varchar(80) NOT NULL,
  `opcionC` varchar(80) NOT NULL,
  `opcionD` varchar(80) NOT NULL,
  `correcta` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Pregunta`
--

INSERT INTO `Pregunta` (`idPregunta`, `idTema`, `pregunta`, `opcionA`, `opcionB`, `opcionC`, `opcionD`, `correcta`) VALUES
(3, 1, 'Un CETE con plazo de 91 dÃ­as y Tasa de Descuento del 1.986732% sobre su valor nominal de $10.00 puede ser comprado 30 dÃ­as despuÃ©s de su emisiÃ³n en el Mercado de Dinero con una Tasa de Descuento del 1.806120%. SI SE COMPRA el  CETE Â¿cuÃ¡l serÃ­a el RENDIMIENTO ANUAL EQUIVALENTE (XX.xxxxxx%) ', '1.83%', '2.00%', '2.01%', '0.31%', ''),
(4, 1, 'Una emisiÃ³n de bonos con valor nominal de $180.612 que serÃ¡n redimidos en 12 aÃ±os aL 110% y que pagarÃ¡n un interÃ©s del 7% semestral. Â¿A quÃ© precio deben ser comprados para obtener un rendimiento del 22% anual capitalizable mensual?', '$116.28', '$101.76', '$12.64', '$198.67', ''),
(5, 1, 'Un bono con valor nominal de $1,806.12 y plazo de redenciÃ³n de 12 aÃ±os es ofrecido hoy en venta a $1,890.6626 del cupÃ³n es del 2% trimestral y su redenciÃ³n es a la par. Si a la fecha de hoy han transcurrido 4 aÃ±os desde su emisiÃ³n, Â¿cuÃ¡l serÃ­a el rendimiento capitalizable trimestral si el bono es comprado hoy?', '1.81%', '2.00%', '22.00%', '5.42%', ''),
(6, 1, 'La empresa "A, S. A." deberÃ¡ pagar un dividendo de $3.239120 por acciÃ³n para el prÃ³ximo aÃ±o y TÃš ESPERAS que su precio de mercado sea $180.612000 por acciÃ³n tambiÃ©n dentro de un aÃ±o. Si hoy su precio de mercado es $160.701333 y el rendimiento esperado en el mercado (k) para acciones (tÃ­tulos) con riesgo similar al de esta acciÃ³n es de 20.00%. Â¿CuÃ¡l es el  VALOR INTRÃSECO (Vo) de esta acciÃ³n hoy?  ', '$153.21', '$150.51', '$2.70', '$160.70', ''),
(7, 1, 'Las acciones de la empresa "AcciÃ³n, S. A." fueron emitidas con un valor nominal de $126  por acciÃ³n, y actualmente se venden en el Mercado de Capitales con una prima del 10.00% sobre su valor nominal y un costo de intermediaciÃ³n de $3 por acciÃ³n. EstÃ¡ acciÃ³n pagarÃ¡ un dividendo de $5 en 101 dÃ­as a partir hoy, y se espera que pueda ser vendida en $180.612 un aÃ±o despuÃ©s de haber sido comprada, si la tasa de interÃ©s libre de riesgo (rendimiento CETES) se ha estima que serÃ¡ del 14.00% anual efectivo. Â¿CuÃ¡l serÃ¡ el rendimiento anual equivalente (tasa efectiva anual) que tendrÃ­a esta acciÃ³n si es comprada hoy? Nota: usar aÃ±o de 365 en dÃ­as los cÃ¡lculos.  ', '31.43%', '31.08%', '27.55%', '3.88%', ''),
(8, 1, 'Las acciones comunes de la empresa "A, S. A."  tienen rendimiento esperado (Ra) del 1.806120% y las de "B, S. A." un rendimiento esperado (Rb) del 1.228162% Si se forma un portafolio invirtiendo $900 millones en acciones de "A, S. A." y $700 millones en las de "B, S. A.", Â¿CuÃ¡l serÃ­a la Rendimiento (Rpp) de este portafolio?', '1.55%', '1.52%', '1.48%', '3.03%', ''),
(9, 1, 'La empresa "X, S. A." cuenta con Capital Social ComÃºn por $18,061,200.00 de Valor Nominal Total, y tiene planeada una nueva emisiÃ³n de 1,444,896 nuevas acciones comunes. Si el Valor nominal por acciÃ³n es de $10.00 por acciÃ³n, y estÃ¡n valuadas en el Mercado con una PRIMA del 8.00% sobre su valor nominal. Â¿CuÃ¡l serÃ­a el Costo de Capital del financiamiento con Acciones Comunes de NUEVA EMISIÃ“N estimÃ¡ndolo con el MODELO de GORDON (Crecimiento Constante de los Dividendos)?, si hay un Costo  de ColocaciÃ³n Unitario de $0.70 por acciÃ³n comÃºn y esta empresa espera una crecimiento del 3.00% anual para los Dividendos por AcciÃ³n y se esperan Utilidades Netas el prÃ³ximo aÃ±o equivalente al 9.00% del Capital Social ComÃºn (a valor nominal), y la polÃ­tica de retenciÃ³n de utilidades es del 65.00%.', '4.73%', '1.73%', '4.75%', '4.62%', ''),
(10, 1, 'La empresa "X, S. A." contratÃ³ un PrÃ©stamo Bancario por $1,806,120.00 y al cual se aplicaron las siguientes condiciones: a) aplica Descuento Bancario; b) Saldo de Reciprocidad de $30,000 en cuenta de cheques; y c) Gastos Legales y de Manejo de Cuenta de equivalentes al 10.00% del monto del prÃ©stamo Â¿CuÃ¡l serÃ­a el Costo de Capital del Financiamiento Bancario si se aplica a este crÃ©dito una tasa de interÃ©s del 14.00% anual capitalizable bimestralmente, el plazo del crÃ©dito es de 3 aÃ±os, y la tasa de Impuestos del 35.00%?', '25.64%', '39.45%', '171.18%', '13.15%', ''),
(11, 1, 'La empresa "X, S. A." cuenta con financiamiento a Largo Plazo consistente en: $18,061,200.00 de Capital Social ComÃºn; $7,224,480 de Utilidades Retenidas; $5,418,360 de Bonos; y adicionalmente se tiene contemplada una nueva colocaciÃ³n de Acciones Comunes con Valor Nominal Total de $10,836,720. Las Acciones Comunes se cotizan actualmente con un DESCUENTO del 6.00%, mientras que los bonos se venden con una PRIMA o sobreprecio del 10.00% Â¿CuÃ¡l serÃ¡ el Costo de Capital Promedio Ponderado estimado con los Valores de Mercado de las fuentes de financiamiento? ', '13.01%', '13.77%', '13.90%', '13.30%', ''),
(12, 1, '"La empresa â€œX, S. A.â€ desea determinar su presupuesto Ã³ptimo de inversiÃ³n y cuenta con la siguiente informaciÃ³n: Proy. #    TIR     Io en Proyecto     RANGO (miles de pesos $)                Ka,i 1               8%     $144,489.00             $0.00   a $180,612.00                             7% 2              19%    $108,367.00            $180,613.00  a $202,286.56                  9% 3              24%    $90,306.00               $202,287.56  a $226,562.07               12% 4              16%    $126,428.00             $226,563.07  a $283,203.83               15% 5               20%   $54,183.00               $283,204.83  a $368,166.28               17% 6               18%   $36,122.00               $368,167.28  en adelante                  21%"', '$288,978.00', '$144,489.00', '$252,856.00', '$415,406.00', ''),
(13, 1, 'La empresa "X, S. A." cambiarÃ¡ su PolÃ­tica General de Capital de Trabajo de CONSERVADORA a AGRESIVA con lo que esperarÃ­a una DISMINUCIÃ“N del 16.00% en las ventas del prÃ³ximo aÃ±o, y una DISMINUCIÃ“N del 22.00% en los Activos Circulantes que se aplicarÃ­a en un 40.00% como reducciÃ³n al CAPITAL y el resto serÃ­a reducciÃ³n a la deuda financiado con DEUDA.  La utilidad UAFIR (Utilidad antes de Gastos Financieros e Impuestos) se espera que siga siendo un 12.00% de las ventas, la tasa de interÃ©s aplicable a la deuda es del 15.00%, y la tasa de impuesto que paga la empresa es del 32.00%. El aÃ±o anterior los Activos Totales de 18,061,200.0  fueron financiados con un 50% de pasivo, las ventas del aÃ±o anterior fueron de $33,774,444.00 y los circulantes $7,224,480.00. Al efectuar el cambio de polÃ­tica el RENDIMIENTO DE LOS ACCIONISTAS (ROE) serÃ­a de XX.XX%.', '17.76%', '20.32%', '18.46%', '16.51%', ''),
(14, 1, 'La empresa "Efectivo S. A." tiene COBRANZA MENSUAL y SALIDAS constantes de efectivo. La tasa anual de interÃ©s que en promedio se espera tengan los valores negociables es del 22.00% anual efectiva. Se ha estimado un monto Ã³ptimo de $180,612.00 por RETIRO de la cuenta de inversiones. Se esperan ingresos de efectivo anuales de $124,224,933.60 pesos, y gasto (desembolsos de efectivo) anuales de $99,379,946.88. Los costos por depÃ³sito a inversiones son de $400 de costo mÃ­nimo mÃ¡s una comisiÃ³n del  0.20% sobre el monto depositado, y los costos por retiro son de $25 de costo mÃ­nimo mÃ¡s una comisiÃ³n del 0.40% sobre el monto retirado. Â¿CuÃ¡l serÃ¡ el costo de TODOS los RETIROS del periodo mensual?', '$32,887.71', '$20,434.69', '$747.45', '$1,447.93', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tema`
--

CREATE TABLE IF NOT EXISTS `Tema` (
`idTema` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Tema`
--

INSERT INTO `Tema` (`idTema`, `idMateria`, `nombre`) VALUES
(1, 9, 'Rendimiento de un bono sin cupones ( Po CETE).');

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`idUsuario`, `username`, `password`, `nombre`, `apellido`, `tipo`) VALUES
(-1, 'pendiente', 'pendiente', 'pendiente', 'pendiente', 'maestro'),
(32, 'eduardo', 'eduardo', 'Eduardo', 'Cristerna', 'admin'),
(35, 'A00516135', 'A00516135', 'Luis', 'Prott', 'alumno'),
(36, 'A00618307', 'A00618307', 'Daniela Alejandra', 'Garza SÃ¡nchez', 'alumno'),
(37, 'A00813356', 'A00813356', 'JesÃºs Alejandro', 'GonzÃ¡lez Osuna', 'alumno'),
(38, 'A00807796', 'A00807796', 'Luis', 'Prott', 'alumno'),
(40, 'A00813314', 'A00813314', 'Fernando', 'Gamboa LÃ³pez', 'alumno'),
(41, 'A00516498', 'A00516498', 'Mariafernanda', 'Flores HernÃ¡ndez', 'alumno'),
(42, 'A00814243', 'A00814243', 'Alejandro Antonio', 'Tijerina Urquieta', 'alumno'),
(43, 'A00814490', 'A00814490', 'Gladiana Aidaly', 'Ãvila JimÃ©nez', 'alumno'),
(44, 'A00510681', 'A00510681', 'JesÃºs Alfonso', 'Medina Acevedo', 'alumno'),
(45, 'A00513199', 'A00513199', 'JosÃ© Alberto', 'Manzur Kattas', 'alumno'),
(46, 'A00758717', 'A00758717', 'Luisa Fernanda', 'Ruiz Terrazas', 'alumno'),
(48, 'L00201087', '201087', 'Luis', 'Prott', 'maestro'),
(51, 'A01139550', 'pass', 'Eduardo', 'Cristerna', 'alumno'),
(52, 'L01139550', 'pass', 'Eduardo', 'Cristerna', 'maestro');

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
MODIFY `idGrupo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `Materia`
--
ALTER TABLE `Materia`
MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `Pregunta`
--
ALTER TABLE `Pregunta`
MODIFY `idPregunta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `Tema`
--
ALTER TABLE `Tema`
MODIFY `idTema` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
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
