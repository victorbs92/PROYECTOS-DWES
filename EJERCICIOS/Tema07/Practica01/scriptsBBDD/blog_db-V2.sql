-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2021 a las 02:05:21
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog_db`
--
CREATE DATABASE IF NOT EXISTS `blog_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `blog_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--
-- Creación: 20-01-2021 a las 19:20:56
-- Última actualización: 21-01-2021 a las 01:03:58
--

DROP TABLE IF EXISTS `articulo`;
CREATE TABLE `articulo` (
  `idArticulo` int(30) NOT NULL,
  `fechaArticulo` date NOT NULL DEFAULT current_timestamp(),
  `tituloArticulo` varchar(50) NOT NULL,
  `descripcionArticulo` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `articulo`:
--

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idArticulo`, `fechaArticulo`, `tituloArticulo`, `descripcionArticulo`) VALUES
(1, '2021-01-19', 'ARTICULO 1', 'Oasdfmaspdf psmasdfoas asdfn asdf asdf asdf adsfdfasdf asdf asdf.'),
(2, '2021-01-21', 'ARTICULO 2', 'onfgknsmdofkgnsdofkgn\r\nasdfklasdf\r\nasdfassdf\r\nsdfasdfsdfsdfs'),
(3, '2021-01-21', 'ARTICULO 3', 'adfasdfasdf\r\nasdf\r\nsadfasd\r\nfasdfdfasdfasdfsadf\r\nasdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--
-- Creación: 20-01-2021 a las 23:57:30
-- Última actualización: 21-01-2021 a las 01:02:59
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(30) NOT NULL,
  `nickUsuario` varchar(30) NOT NULL,
  `passwordUsuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `usuario`:
--

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nickUsuario`, `passwordUsuario`) VALUES
(15, 'dwes', '$2y$15$2E3sDk8dqBlwqU2fu.6rvuHcgbpbk/erV3YmWQdH6AuPm0F//dwXO'),
(16, 'qqq', '$2y$15$.AIwFt.f4Y6I4hxng15dQOQQWxxsE/cQmRQOXTKa6zWW3wxULaGMm'),
(71, 'www', '$2y$15$KZrWcpNNr5AxOO4mM0iwVuSA/ul1NXjOq751ZkvgwS5up..3rX6EG'),
(82, 'eee', '$2y$15$Wnrep23AFrtgUhJljirv4uekSvJbdaQy0Ohk9Stqri1z.yV.FlKYq'),
(91, 'rrr', '$2y$15$dZbYcfEXL65VW8uH3Q7/jOLwM2PCtOBxscHAIXhX9wiIB/vfcv4qG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idArticulo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `nickUsuario` (`nickUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idArticulo` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;


--
-- Metadatos
--
USE `phpmyadmin`;

--
-- Metadatos para la tabla articulo
--

--
-- Metadatos para la tabla usuario
--

--
-- Metadatos para la base de datos blog_db
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
