# phpMyAdmin MySQL-Dump
# version 2.3.2
# http://www.phpmyadmin.net/ (download page)
#
# servidor: localhost
# Tiempo de generación: 09-02-2004 a las 01:14:27
# Versión del servidor: 4.00.12
# Versión de PHP: 4.3.1
# Base de datos : `lindavista`
# --------------------------------------------------------

#
# Estructura de tabla para la tabla `viviendas`
#

CREATE TABLE viviendas (
  id smallint(5) unsigned NOT NULL auto_increment,
  tipo enum('Piso','Adosado','Chalet','Casa') NOT NULL default 'Piso',
  zona enum('Centro','Nervión','Triana','Aljarafe','Macarena') NOT NULL default 'Centro',
  direccion varchar(100) NOT NULL default '',
  ndormitorios enum('1','2','3','4','5') NOT NULL default '3',
  precio decimal(10,0) NOT NULL default '0',
  tamano decimal(10,0) NOT NULL default '0',
  extras set('Piscina','Jardín','Garage') NOT NULL default '',
  foto varchar(50) default NULL,
  observaciones text,
  PRIMARY KEY  (id)
) TYPE=MyISAM COMMENT='Viviendas de la inmobiliaria Lindavista';

#
# Volcar la base de datos para la tabla `viviendas`
#

INSERT INTO viviendas VALUES (1, 'Piso', 'Nervión', 'Avda de la Buhaira', '4', '360000', '125', 'Garage', 'piso1.jpg', 'Aire acondicionado frío/calor, trastero, amueblado, reciente construcción');
INSERT INTO viviendas VALUES (2, 'Chalet', 'Aljarafe', 'Calle del Rosal', '4', '450000', '180', 'Piscina,Jardín,Garage', 'chalet1.jpg', 'Chalet independiente de una sóla planta en parcela de 1000 metros cuadrados con piscina y cancha de tenis, dentro de una urbanización cerrada y vigilada con club social');
INSERT INTO viviendas VALUES (3, 'Piso', 'Nervión', 'Avda de Kansas City', '2', '215000', '89', '', 'apartamento1.jpg', 'Luminoso y bien situado. Reformado recientemente. Oportunidad');
INSERT INTO viviendas VALUES (4, 'Piso', 'Macarena', 'Ronda de los Olmos', '3', '165000', '83', '', 'piso3.jpg', 'Completamente reformado. Soleado. Vistas al río');
INSERT INTO viviendas VALUES (5, 'Adosado', 'Aljarafe', 'Urb. Santa Mónica', '4', '300000', '130', 'Piscina,Jardín,Garage', 'adosado1.jpg', 'Urbanización de reciente construcción. Zona ajardinada interior con piscina y pistas de paddle-tenis. Amplias facilidades');
INSERT INTO viviendas VALUES (6, 'Casa', 'Centro', 'Pintor Murillo', '2', '150000', '93', 'Garage', 'casa1.jpg', 'Edificio reformado en pleno centro histórico de la ciudad. Patio interior cubierto');

    