-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2021 a las 06:08:11
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
-- Base de datos: `redsocial`
--
CREATE DATABASE IF NOT EXISTS `redsocial` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `redsocial`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

DROP TABLE IF EXISTS `amigos`;
CREATE TABLE `amigos` (
  `idUsuarioA` int(12) NOT NULL,
  `idUsuarioB` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `amigos`:
--   `idUsuarioA`
--       `usuarios` -> `idUsuario`
--   `idUsuarioB`
--       `usuarios` -> `idUsuario`
--

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`idUsuarioA`, `idUsuarioB`) VALUES
(53, 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `idPerfil` int(30) NOT NULL,
  `idUsuario` int(12) NOT NULL,
  `nombreUsuario` varchar(30) NOT NULL,
  `edadUsuario` int(3) NOT NULL,
  `descripcionUsuario` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `perfil`:
--   `idUsuario`
--       `usuarios` -> `idUsuario`
--

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `idUsuario`, `nombreUsuario`, `edadUsuario`, `descripcionUsuario`) VALUES
(16, 53, 'pepe', 23, 'aaaaaaaaaaaaaaaaaaaaa'),
(17, 56, 'qqq', 1, 'qqqqqqqqqqqqqqqqq'),
(18, 57, 'www', 2, 'wwwwwwwwwwwwwwwwwwwww'),
(19, 58, 'eee', 3, 'eeeeeeeeeeeee'),
(20, 59, 'rrr', 4, 'rrrrrrrrrrrr'),
(21, 60, 'ttt', 5, 'ttttttttttttttttttttt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `idPost` int(30) NOT NULL,
  `idUsuario` int(12) NOT NULL,
  `post` varchar(255) NOT NULL,
  `fechaPost` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `post`:
--   `idUsuario`
--       `usuarios` -> `idUsuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idUsuario` int(12) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `usuarios`:
--

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nick`, `pass`) VALUES
(53, 'dwes', '$2y$10$8nVaQt4jNAncJnS2fbPKyemQM2nGz/bzlAqkMO98xThMANqVbeEzW'),
(56, 'qqq', '$2y$10$TeMwLEhwXm7LI9jzlehgC.3XioXYqYlM5cvK.AkwvwkDwVfEfz7sG'),
(57, 'www', '$2y$10$95GKtJYzkUJBEAqMye.GZuuHJXC5HWeX3/HN8IXt.b0yxMo1q2I2O'),
(58, 'eee', '$2y$10$fLnoEr9pnZUNxLRfZFhYHOX4FuENAi.qJ6wNvEsuTPUjydc6gHEj2'),
(59, 'rrr', '$2y$10$kzhB5.C5t8i/Hh2Cvl4jIOJ3CIz/IUnOFUzq4F0kyIjDsxff52Euq'),
(60, 'ttt', '$2y$10$EUXjH3JOcsIvMtn.V3CFc.g/27aFpuSAoxggaFm2Cg3oK0tnFuHrK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`idUsuarioA`,`idUsuarioB`),
  ADD KEY `idUsuarioB` (`idUsuarioB`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`),
  ADD UNIQUE KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`),
  ADD KEY `postFKusuarios` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerfil` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `amigos_ibfk_1` FOREIGN KEY (`idUsuarioA`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amigos_ibfk_2` FOREIGN KEY (`idUsuarioB`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfilFKusuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `postFKusuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Metadatos
--
USE `phpmyadmin`;

--
-- Metadatos para la tabla amigos
--

--
-- Metadatos para la tabla perfil
--

--
-- Metadatos para la tabla post
--

--
-- Metadatos para la tabla usuarios
--

--
-- Metadatos para la base de datos redsocial
--

--
-- Volcado de datos para la tabla `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_descr`) VALUES
('redsocial', 'redSocial');

SET @LAST_PAGE = LAST_INSERT_ID();

--
-- Volcado de datos para la tabla `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('redsocial', 'amigos', @LAST_PAGE, 330, 360),
('redsocial', 'perfil', @LAST_PAGE, 560, 97),
('redsocial', 'post', @LAST_PAGE, 273, 43),
('redsocial', 'usuarios', @LAST_PAGE, 48, 184);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
