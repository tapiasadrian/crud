-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-07-2022 a las 16:12:55
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cbc1`
--
CREATE DATABASE IF NOT EXISTS `cbc1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cbc1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendices`
--

CREATE TABLE `aprendices` (
  `id_apre` int(10) NOT NULL,
  `apre_idtipo` varchar(3) NOT NULL,
  `apre_numid` varchar(20) NOT NULL,
  `apre_nombre` varchar(60) NOT NULL,
  `apre_apellidos` varchar(60) NOT NULL,
  `apre_direccion` varchar(80) NOT NULL,
  `apre_telefono` varchar(20) NOT NULL,
  `apre_ficha` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aprendices`
--

INSERT INTO `aprendices` (`id_apre`, `apre_idtipo`, `apre_numid`, `apre_nombre`, `apre_apellidos`, `apre_direccion`, `apre_telefono`, `apre_ficha`) VALUES
(153, 'CC', '1001882539', 'keyla johana', 'villazon', 'calle 50', '3013033847', 2889965),
(154, 'CC', '43571894', 'maria', 'villazon', 'calle 30', '3156413577', 2339956);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

CREATE TABLE `fichas` (
  `id_ficha` int(10) NOT NULL,
  `fichapro` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fichas`
--

INSERT INTO `fichas` (`id_ficha`, `fichapro`) VALUES
(2889965, 16),
(2339956, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id_prog` int(10) NOT NULL,
  `nombrepro` varchar(20) NOT NULL,
  `progra_tipo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id_prog`, `nombrepro`, `progra_tipo`) VALUES
(16, 'construccion', 2),
(17, 'Adsi', 1),
(18, 'ganaderia', 2),
(19, 'pisicultura', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposprograma`
--

CREATE TABLE `tiposprograma` (
  `id_tipos` int(10) NOT NULL,
  `tiposp_tipos` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiposprograma`
--

INSERT INTO `tiposprograma` (`id_tipos`, `tiposp_tipos`) VALUES
(1, 'Mixta'),
(2, 'diurna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(10) NOT NULL,
  `nombreuser` varchar(50) DEFAULT NULL,
  `contra` varchar(80) DEFAULT NULL,
  `usutipo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nombreuser`, `contra`, `usutipo`) VALUES
(7, 'karolaine_villero', '1001882539', 'ADMINISTRADOR');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD PRIMARY KEY (`id_apre`),
  ADD KEY `fk_fichas` (`apre_ficha`);

--
-- Indices de la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`id_ficha`),
  ADD KEY `fk_programa` (`fichapro`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id_prog`),
  ADD KEY `fk_tiposprograma` (`progra_tipo`);

--
-- Indices de la tabla `tiposprograma`
--
ALTER TABLE `tiposprograma`
  ADD PRIMARY KEY (`id_tipos`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  MODIFY `id_apre` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de la tabla `fichas`
--
ALTER TABLE `fichas`
  MODIFY `id_ficha` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122339957;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id_prog` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tiposprograma`
--
ALTER TABLE `tiposprograma`
  MODIFY `id_tipos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD CONSTRAINT `fk_fichas` FOREIGN KEY (`apre_ficha`) REFERENCES `fichas` (`id_ficha`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fk_programa` FOREIGN KEY (`fichapro`) REFERENCES `programa` (`id_prog`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `fk_tiposprograma` FOREIGN KEY (`progra_tipo`) REFERENCES `tiposprograma` (`id_tipos`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
