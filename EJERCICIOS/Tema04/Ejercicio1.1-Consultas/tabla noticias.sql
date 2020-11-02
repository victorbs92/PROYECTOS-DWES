# phpMyAdmin MySQL-Dump
# version 2.3.2
# http://www.phpmyadmin.net/ (download page)
#
# servidor: localhost
# Tiempo de generación: 03-02-2004 a las 16:34:02
# Versión del servidor: 4.00.12
# Versión de PHP: 4.3.1
# Base de datos : `lindavista`
# --------------------------------------------------------

#
# Estructura de tabla para la tabla `noticias`
#

CREATE TABLE noticias (
  id smallint(5) unsigned NOT NULL auto_increment,
  titulo varchar(100) NOT NULL default '',
  texto text NOT NULL,
  categoria enum('promociones','ofertas','costas') NOT NULL default 'promociones',
  fecha date NOT NULL default '0000-00-00',
  imagen varchar(100) default NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM COMMENT='Noticias de la inmobiliaria Lindavista';

#
# Volcar la base de datos para la tabla `noticias`
#

INSERT INTO noticias VALUES (1, 'Nueva promocion en Nervion', '145 viviendas de lujo en urbanizacion ajardinada situadas en un entorno privilegiado', 'promociones', '2004-02-04', NULL);
INSERT INTO noticias VALUES (2, 'Últimas viviendas junto al río', 'Apartamentos de 1 y 2 dormitorios, con fantásticas vistas. Excelentes condiciones de financiación.', 'ofertas', '2004-02-05', NULL);
INSERT INTO noticias VALUES (3, 'Apartamentos en el Puerto de Sta María', 'En la playa de Valdelagrana, en primera línea de playa. Pisos reformados y completamente amueblados.', 'costas', '2004-02-06', 'apartamento8.jpg');
INSERT INTO noticias VALUES (4, 'Casa reformada en el barrio de la Judería', 'Dos plantas y ático, 5 habitaciones, patio interior, amplio garaje. Situada en una calle tranquila y a un paso del centro histórico.', 'promociones', '2004-02-07', NULL);
INSERT INTO noticias VALUES (5, 'Promoción en Costa Ballena', 'Con vistas al campo de golf, magníficas calidades, entorno ajardinado con piscina y servicio de vigilancia.', 'costas', '2004-02-09', 'apartamento9.jpg');