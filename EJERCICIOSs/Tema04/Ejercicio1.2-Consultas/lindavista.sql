-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2020 a las 10:56:40
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lindavista`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `texto` text NOT NULL,
  `categoria` enum('promociones','ofertas','costas') NOT NULL DEFAULT 'promociones',
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `texto`, `categoria`, `fecha`, `imagen`) VALUES
(1, 'Nueva promocion en Nervion', '145 viviendas de lujo en urbanizacion ajardinada situadas en un entorno privilegiado', 'promociones', '2004-02-04', NULL),
(2, 'Últimas viviendas junto al río', 'Apartamentos de 1 y 2 dormitorios, con fantásticas vistas. Excelentes condiciones de financiación.', 'ofertas', '2004-02-05', NULL),
(3, 'Apartamentos en el Puerto de Sta María', 'En la playa de Valdelagrana, en primera línea de playa. Pisos reformados y completamente amueblados.', 'costas', '2004-02-06', 'apartamento8.jpg'),
(4, 'Casa reformada en el barrio de la Judería', 'Dos plantas y ático, 5 habitaciones, patio interior, amplio garaje. Situada en una calle tranquila y a un paso del centro histórico.', 'promociones', '2004-02-07', NULL),
(5, 'Promoción en Costa Ballena', 'Con vistas al campo de golf, magníficas calidades, entorno ajardinado con piscina y servicio de vigilancia.', 'costas', '2004-02-09', 'apartamento9.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE `votos` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `votos1` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `votos2` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`id`, `votos1`, `votos2`) VALUES
(1, 49, 12);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `votos`
--
ALTER TABLE `votos`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
