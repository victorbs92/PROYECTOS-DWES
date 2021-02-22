-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2021 a las 01:25:01
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
-- Estructura de tabla para la tabla `amistad`
--
-- Creación: 21-02-2021 a las 21:57:32
--

DROP TABLE IF EXISTS `amistad`;
CREATE TABLE `amistad` (
  `idAmistad` int(30) NOT NULL,
  `idUsuarioA` int(12) NOT NULL,
  `idUsuarioB` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `amistad`:
--   `idUsuarioA`
--       `usuarios` -> `idUsuario`
--   `idUsuarioB`
--       `usuarios` -> `idUsuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--
-- Creación: 21-02-2021 a las 21:48:39
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `idPerfil` int(30) NOT NULL,
  `idUsuario` int(12) NOT NULL,
  `edadUsuario` int(3) NOT NULL,
  `descripcionUsuario` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `perfil`:
--   `idUsuario`
--       `usuarios` -> `idUsuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--
-- Creación: 21-02-2021 a las 21:46:53
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
-- Creación: 21-02-2021 a las 21:33:05
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idUsuario` int(12) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONES PARA LA TABLA `usuarios`:
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amistad`
--
ALTER TABLE `amistad`
  ADD PRIMARY KEY (`idAmistad`),
  ADD KEY `amistadUsuarioAFKusuarios` (`idUsuarioA`),
  ADD KEY `amistadUsuarioBFKusuarios` (`idUsuarioB`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`),
  ADD KEY `perfilFKusuarios` (`idUsuario`);

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
-- AUTO_INCREMENT de la tabla `amistad`
--
ALTER TABLE `amistad`
  MODIFY `idAmistad` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerfil` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(12) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amistad`
--
ALTER TABLE `amistad`
  ADD CONSTRAINT `amistadUsuarioAFKusuarios` FOREIGN KEY (`idUsuarioA`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amistadUsuarioBFKusuarios` FOREIGN KEY (`idUsuarioB`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Metadatos para la tabla amistad
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
('redsocial', 'amistad', @LAST_PAGE, 506, 386),
('redsocial', 'perfil', @LAST_PAGE, 560, 97),
('redsocial', 'post', @LAST_PAGE, 273, 43),
('redsocial', 'usuarios', @LAST_PAGE, 48, 184);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
