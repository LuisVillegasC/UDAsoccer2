-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2016 a las 12:34:53
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `udasoccer`
--
CREATE DATABASE IF NOT EXISTS `udasoccer` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `udasoccer`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
`id_equipo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `pts_acumulados` varchar(50) NOT NULL,
  `total_goles` int(11) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `nombre`, `pts_acumulados`, `total_goles`, `fecha_registro`) VALUES
(1, 'Bolivar', '5', 0, '2016-05-05'),
(2, 'Wilsterman', '8', 0, '2016-05-21'),
(3, 'San Jose', '2', 0, '2016-05-21'),
(7, 'Oriente', '3', 0, '2016-05-22'),
(6, 'Guabira', '0', 0, '2016-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE IF NOT EXISTS `jugador` (
`id_jugador` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) NOT NULL,
  `ci` varchar(50) NOT NULL,
  `semestre` varchar(50) NOT NULL,
  `carrera` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id_jugador`, `id_equipo`, `nombre`, `paterno`, `materno`, `ci`, `semestre`, `carrera`, `fecha_nacimiento`) VALUES
(8, 3, 'aaaaaa', 'bbbbbbbbb', 'ccccccccc', '11111111', 'dddddddd', 'eeeeeeeee', '2016-05-22'),
(7, 3, 'Reynaldo', 'Coca', 'Rojas', '123456 LP', '6', 'informatica', '2016-05-22'),
(6, 1, 'a', 'b', 'c', '1', 'd', 'e', '2016-05-22'),
(9, 7, 'bbbbbbbbbbbb', 'ccccccccccccc', 'dddddddddd', '3333333333', 'zzzzzzzzzzz', 'ssssssssssss', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE IF NOT EXISTS `partido` (
`id_partido` int(11) NOT NULL,
  `fecha_torneo` int(11) NOT NULL,
  `nombre_equipo_1` varchar(50) NOT NULL,
  `nombre_equipo_2` varchar(50) NOT NULL,
  `nro_goles_equipo_1` int(11) NOT NULL,
  `nro_goles_equipo_2` int(11) NOT NULL,
  `resultado` varchar(50) NOT NULL,
  `fecha_partido` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`id_partido`, `fecha_torneo`, `nombre_equipo_1`, `nombre_equipo_2`, `nro_goles_equipo_1`, `nro_goles_equipo_2`, `resultado`, `fecha_partido`) VALUES
(51, 1, 'Bolivar', 'Wilsterman', 1, 3, 'perdio', '2016-05-22'),
(52, 2, 'Wilsterman', 'San Jose', 1, 1, 'empato', '2016-05-22'),
(53, 6, 'Bolivar', 'Wilsterman', 1, 1, 'empato', '2016-05-22'),
(54, 9, 'Wilsterman', 'Bolivar', 2, 1, 'gano', '2016-05-22'),
(55, 88, 'San Jose', 'Bolivar', 1, 1, 'empato', '2016-05-22'),
(56, 3, 'Guabira', 'Bolivar', 1, 2, 'perdio', '2016-05-22'),
(57, 1, 'Bolivar', 'Oriente', 1, 3, 'perdio', '2016-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  `estado_cuenta` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `nombre`, `paterno`, `materno`, `tipo_usuario`, `estado_cuenta`) VALUES
(1, 'superadmin', 'superadmin', 'Luis', 'Villegas', 'Coca', 'superadmin', 'activa'),
(2, 'admin', 'admin', 'Mauricio', 'Coca', 'Rojas', 'admin', 'activa'),
(3, 'admin2', 'admin2', 'aaa', 'bbb', 'ccc', 'admin', 'activa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
 ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
 ADD PRIMARY KEY (`id_jugador`,`id_equipo`), ADD KEY `id_equipo` (`id_equipo`), ADD KEY `id_equipo_2` (`id_equipo`);

--
-- Indices de la tabla `partido`
--
ALTER TABLE `partido`
 ADD PRIMARY KEY (`id_partido`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `partido`
--
ALTER TABLE `partido`
MODIFY `id_partido` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
