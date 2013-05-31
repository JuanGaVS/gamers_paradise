-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 31-05-2013 a las 00:54:25
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `gamers_paradise`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_choices`
-- 

CREATE TABLE IF NOT EXISTS `tb_choices` (
  `choice_id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(300) NOT NULL,
  PRIMARY KEY (`choice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

-- 
-- Volcar la base de datos para la tabla `tb_choices`
-- 

INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (1, 'RPG(Rol Play Game)');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (2, 'First Person');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (3, 'Survival Horror');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (4, 'Estrategia');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (5, 'Peleas');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (6, 'Plataforma');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (7, '0 a menos de 1 años');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (8, '1 a menos de 5 años');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (9, '5 a menos de 10 años');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (10, 'Toda la vida');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (11, 'Salir a una aventura');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (12, 'Quedarte en casa descansando');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (13, 'Jugar una partida de ajedrez');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (14, 'Cualquiera te da igual');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (15, 'Ser un héroe');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (16, 'Un villano');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (17, 'Un general');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (18, 'Un personaje secundario');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (19, 'Solo es mejor');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (20, 'Lo mejor es jugar con los amigos');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (21, 'Juego online entonces estoy solamente acompañado');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (22, 'Provocar la guerra');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (23, 'Salvar el mundo');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (24, '0 a menos de 1 hora');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (25, '1 a menos de 5 horas');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (26, '5 a menos de 10 horas');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (27, 'Me pagan por jugar');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (28, 'Del año 2000 y anteriores');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (29, 'De los años posteriores');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (30, 'Amo las historias complejas');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (32, 'No me gusta leer diálogos');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (33, 'Me da igual');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (34, 'Pago por todo');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (35, 'No pago nada');
INSERT INTO `tb_choices` (`choice_id`, `text`) VALUES (36, 'Pago únicamente si lo vale');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_choice_game`
-- 

CREATE TABLE IF NOT EXISTS `tb_choice_game` (
  `choice_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  PRIMARY KEY (`choice_id`,`game_id`),
  KEY `game_id` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_choice_game`
-- 

INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (6, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (7, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (8, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (9, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (10, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (12, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (13, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (14, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (15, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (18, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (20, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (23, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (24, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (27, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (28, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (32, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (33, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (35, 1);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (2, 2);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (7, 2);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (8, 2);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (10, 2);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (11, 2);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (14, 2);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (17, 2);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (20, 2);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (22, 2);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (25, 2);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (27, 2);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (29, 2);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (32, 2);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (33, 2);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (35, 2);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (2, 3);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (7, 3);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (8, 3);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (10, 3);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (11, 3);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (14, 3);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (16, 3);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (19, 3);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (22, 3);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (25, 3);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (27, 3);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (29, 3);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (30, 3);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (33, 3);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (34, 3);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (36, 3);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (6, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (7, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (8, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (9, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (10, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (11, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (14, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (15, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (19, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (23, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (25, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (27, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (29, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (30, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (33, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (34, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (36, 4);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (1, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (9, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (10, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (13, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (14, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (15, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (18, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (19, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (20, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (21, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (23, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (26, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (27, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (28, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (30, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (33, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (34, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (36, 5);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (1, 6);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (7, 6);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (8, 6);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (10, 6);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (11, 6);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (14, 6);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (16, 6);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (19, 6);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (22, 6);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (25, 6);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (27, 6);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (29, 6);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (30, 6);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (33, 6);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (35, 6);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (7, 7);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (8, 7);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (10, 7);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (11, 7);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (14, 7);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (16, 7);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (18, 7);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (20, 7);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (22, 7);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (24, 7);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (27, 7);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (29, 7);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (32, 7);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (33, 7);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (35, 7);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (3, 8);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (8, 8);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (9, 8);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (10, 8);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (11, 8);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (14, 8);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (15, 8);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (19, 8);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (23, 8);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (25, 8);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (27, 8);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (28, 8);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (30, 8);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (33, 8);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (35, 8);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (1, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (4, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (9, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (10, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (13, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (14, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (15, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (16, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (17, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (19, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (20, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (21, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (22, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (23, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (26, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (27, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (28, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (30, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (33, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (34, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (36, 9);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (5, 10);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (9, 10);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (10, 10);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (12, 10);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (14, 10);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (15, 10);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (16, 10);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (18, 10);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (20, 10);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (21, 10);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (24, 10);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (27, 10);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (28, 10);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (32, 10);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (33, 10);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (34, 10);
INSERT INTO `tb_choice_game` (`choice_id`, `game_id`) VALUES (36, 10);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_console`
-- 

CREATE TABLE IF NOT EXISTS `tb_console` (
  `console_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`console_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- 
-- Volcar la base de datos para la tabla `tb_console`
-- 

INSERT INTO `tb_console` (`console_id`, `name`) VALUES (1, 'PS3');
INSERT INTO `tb_console` (`console_id`, `name`) VALUES (2, 'Wii');
INSERT INTO `tb_console` (`console_id`, `name`) VALUES (3, 'Xbox 360');
INSERT INTO `tb_console` (`console_id`, `name`) VALUES (4, 'Wii U');
INSERT INTO `tb_console` (`console_id`, `name`) VALUES (5, 'Nintendo DS');
INSERT INTO `tb_console` (`console_id`, `name`) VALUES (6, 'PC');
INSERT INTO `tb_console` (`console_id`, `name`) VALUES (7, 'Xbox 720');
INSERT INTO `tb_console` (`console_id`, `name`) VALUES (8, 'PS4');
INSERT INTO `tb_console` (`console_id`, `name`) VALUES (9, 'PS Vita');
INSERT INTO `tb_console` (`console_id`, `name`) VALUES (10, 'Nintendo 3DS');
INSERT INTO `tb_console` (`console_id`, `name`) VALUES (11, 'OUYA');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_contestant`
-- 

CREATE TABLE IF NOT EXISTS `tb_contestant` (
  `contestant_id` varchar(70) NOT NULL COMMENT 'Revisar longitud',
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `locale` varchar(20) NOT NULL,
  `age_range_min` int(2) NOT NULL,
  `age_range_max` int(2) NOT NULL,
  `birthday` varchar(15) NOT NULL,
  `date_added` varchar(15) NOT NULL,
  PRIMARY KEY (`contestant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_contestant`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_game`
-- 

CREATE TABLE IF NOT EXISTS `tb_game` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `trailer_url` varchar(255) NOT NULL,
  `description` varchar(400) NOT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- Volcar la base de datos para la tabla `tb_game`
-- 

INSERT INTO `tb_game` (`game_id`, `name`, `trailer_url`, `description`) VALUES (1, 'New Super Mario Bros Wii', 'http://www.youtube.com/embed/8mIjseFBqxo', 'La historia inicia cuando se está celebrando el cumpleaaños de Peach en su castillo y un extraño pastel se recibe en la puerta. Cuando llega a Peach, salen del pastel Bowser Jr. y los otros siete Koopalings, quienes atrapan a la princesa del Reino Champiñón en el mismo pastel del que salieron y se la llevan; y en persecución de estos, van Mario, Luigi, un Toad azul y un Toad amarillo. Los items tr');
INSERT INTO `tb_game` (`game_id`, `name`, `trailer_url`, `description`) VALUES (2, 'Splinter Cell Blacklist', 'http://www.youtube.com/embed/wYGoFH6bWXg', 'Splinter Cell Blacklist de Tom Clancy ofrece un modo cooperativo para dos jugadores con 4 tipos de misiones y 14 mapas con pantalla partida para 2 jugadores. Juega como Sam Fisher o Isaac Briggs (un aperativo de la CIA) y juega a dos: ayuda a tu compañero de equipo a acceder a partes del mapa a las que no podrías acceder tú solo, crea tus propias tácticas en función de tu estilo de juego y cubríos');
INSERT INTO `tb_game` (`game_id`, `name`, `trailer_url`, `description`) VALUES (3, 'Call of Juarez Gunslinger', 'http://www.youtube.com/embed/OHh2RHuswqA', 'Call of Juarez Gunslinger es un auténtico homenaje al Salvaje Oeste y sus historias. Los jugadores vivirán el épico viaje de Silas Greaves, un rudo cazarecompensas que pasó su vida persiguiendo a los forajidos más conocidos de la época. Ha llegado la hora de que Silas cuente narre sus vivencias, vinculadas por completo a las del Salvaje Oeste, una mezcla de mitos y hechos históricos.');
INSERT INTO `tb_game` (`game_id`, `name`, `trailer_url`, `description`) VALUES (4, 'Batman Arkham Origins', 'http://www.youtube.com/embed/zhfVYdhb0jo', 'Batman: Arkham Origins estará basado en una ciudad de Gotham aun más extensa y será una precuela que tendrá lugar unos años antes de que se produjeran los hechos narrados en Batman: Arkham Asylum y Batman: Arkham City, los dos primeros juegos de la franquicia. Ambientado antes de que los criminales más peligrosos aterrorizaran a los habitantes de Gotham, el juego mostrará a un joven Batman que deb');
INSERT INTO `tb_game` (`game_id`, `name`, `trailer_url`, `description`) VALUES (5, 'Diablo 3', 'http://www.youtube.com/embed/de2KlsLnIVU', 'Diablo III es un videojuego de rol de acción (aRPG), desarrollado por Blizzard Entertainment. Ésta es la continuación de Diablo II y la tercera parte de la serie que fue creada por la compañía estadounidense Blizzard. Su temática es de fantasía oscura y terrorífica.');
INSERT INTO `tb_game` (`game_id`, `name`, `trailer_url`, `description`) VALUES (6, 'Assassin''s Creed 4 Black Flag', 'http://www.youtube.com/embed/R2EVWKn1HcQ', 'Assassin''s Creed 4 Black Flag nos sumerge en la aterradora vida de los piratas . Únete a la tripulación del Capitán Edward Kenway bajo la badera negra y explora este corto pero brutal periodo de la historia.');
INSERT INTO `tb_game` (`game_id`, `name`, `trailer_url`, `description`) VALUES (7, 'Ride to Hell Route 666', 'http://www.youtube.com/embed/5CY3q76VfVc', '¿Harto de dudar entre la acción y la estrategia? Deep Silver combina ahora ambos aspectos en un solo juego: Ride to Hell: Route 666 permite a los jugadores experimentar todo el estilo de vida de las bandas de moteros, aunque aquellos que pretendan dominar la infame Ruta 66 tendrán que actuar con inteligencia.');
INSERT INTO `tb_game` (`game_id`, `name`, `trailer_url`, `description`) VALUES (8, 'Resident Evil Revelations', 'http://www.youtube.com/embed/A5QTLtLr844', 'Iniciándose la aventura cuando Jill Valentine y su compañero Parker Luciani llegan al Queen Zenobia, un buque abandonado en mitad del Mediterráneo en el que tan solo 94 minutos antes se había perdido contacto con Chris Redfield, aunque no tardaremos en darnos cuenta que todo es una trampa del grupo terrorista Veltro, el cual se creía ya disuelto.A partir de ahí el juego nos invita a superar una se');
INSERT INTO `tb_game` (`game_id`, `name`, `trailer_url`, `description`) VALUES (9, 'Heroes Of Might And Magic 6', 'http://www.youtube.com/embed/wEBGPcRBnQU', 'Heroes of Might and Magic (Héroes de magia y poder) es un saga de videojuegos que se desarrolla en el mismo universo ficticio de espadas, dragones y fantasía medieval que la saga Might and Magic. Sin embargo, mientras que Might and Magic es una serie de videojuegos de rol en primera persona, Heroes son videojuegos de rol táctico por turno.El jugador controla un ejército compuesto por héroes y una ');
INSERT INTO `tb_game` (`game_id`, `name`, `trailer_url`, `description`) VALUES (10, 'Super Street Fighter IV', 'http://www.youtube.com/embed/pzyog8wzGRQ', 'Super Street Fighter IV es un videojuego de lucha producido por Capcom para las consolas PlayStation 3, Xbox 360 y Nintendo 3DS. La mayor novedad será la inclusión de diez nuevos personajes. Primero la inédita Juri Han y los dos clásicos de Street Fighter II que faltaban en el plantel de Street Fighter IV, T. Hawk y Dee Jay. Más adelante se confirmaron tres personajes más: Guy y Cody (provenientes');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_game_console`
-- 

CREATE TABLE IF NOT EXISTS `tb_game_console` (
  `game_id` int(11) NOT NULL,
  `console_id` int(11) NOT NULL,
  PRIMARY KEY (`game_id`,`console_id`),
  KEY `console_id` (`console_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_game_console`
-- 

INSERT INTO `tb_game_console` (`game_id`, `console_id`) VALUES (2, 1);
INSERT INTO `tb_game_console` (`game_id`, `console_id`) VALUES (3, 1);
INSERT INTO `tb_game_console` (`game_id`, `console_id`) VALUES (4, 1);
INSERT INTO `tb_game_console` (`game_id`, `console_id`) VALUES (6, 1);
INSERT INTO `tb_game_console` (`game_id`, `console_id`) VALUES (8, 1);
INSERT INTO `tb_game_console` (`game_id`, `console_id`) VALUES (10, 1);
INSERT INTO `tb_game_console` (`game_id`, `console_id`) VALUES (1, 2);
INSERT INTO `tb_game_console` (`game_id`, `console_id`) VALUES (7, 3);
INSERT INTO `tb_game_console` (`game_id`, `console_id`) VALUES (9, 6);
INSERT INTO `tb_game_console` (`game_id`, `console_id`) VALUES (5, 8);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_game_contestant`
-- 

CREATE TABLE IF NOT EXISTS `tb_game_contestant` (
  `contestant_id` varchar(70) NOT NULL,
  `game_id` int(11) NOT NULL,
  `console_id` int(11) NOT NULL,
  PRIMARY KEY (`contestant_id`),
  KEY `game_id` (`game_id`),
  KEY `console_id` (`console_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_game_contestant`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_game_pictures`
-- 

CREATE TABLE IF NOT EXISTS `tb_game_pictures` (
  `game_id` int(11) NOT NULL,
  `picture_url` varchar(255) NOT NULL,
  PRIMARY KEY (`game_id`,`picture_url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_game_pictures`
-- 

INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (1, 'games/snmb/01.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (1, 'games/snmb/02.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (1, 'games/snmb/03.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (2, 'games/SplinterCellBlacklist/01.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (2, 'games/SplinterCellBlacklist/02.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (2, 'games/SplinterCellBlacklist/03.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (2, 'games/SplinterCellBlacklist/03.png');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (3, 'games/CallofJuarezGunslinger/01.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (3, 'games/CallofJuarezGunslinger/02.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (3, 'games/CallofJuarezGunslinger/03.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (4, 'games/BatmanArkhamOrigins/01.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (4, 'games/BatmanArkhamOrigins/02.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (4, 'games/BatmanArkhamOrigins/03.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (5, 'games/Diablo3/01.jpeg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (5, 'games/Diablo3/01.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (5, 'games/Diablo3/02.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (5, 'games/Diablo3/03.jpeg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (5, 'games/Diablo3/03.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (6, 'games/Assassin''sCreed4BlackFlag/01.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (6, 'games/Assassin''sCreed4BlackFlag/02.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (6, 'games/Assassin''sCreed4BlackFlag/03.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (7, 'games/RidetoHellRoute666/01.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (7, 'games/RidetoHellRoute666/02.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (7, 'games/RidetoHellRoute666/03.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (8, 'games/ResidentEvilRevelations/01.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (8, 'games/ResidentEvilRevelations/02.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (8, 'games/ResidentEvilRevelations/03.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (9, 'games/HeroesOfMightAndMagic6/01.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (9, 'games/HeroesOfMightAndMagic6/02.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (9, 'games/HeroesOfMightAndMagic6/03.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (10, 'games/SuperStreetFighterIV/01.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (10, 'games/SuperStreetFighterIV/02.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (10, 'games/SuperStreetFighterIV/03.jpg');
INSERT INTO `tb_game_pictures` (`game_id`, `picture_url`) VALUES (10, 'games/SuperStreetFighterIV/03.png');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_question`
-- 

CREATE TABLE IF NOT EXISTS `tb_question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(300) NOT NULL,
  `type_multiple` tinyint(1) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- 
-- Volcar la base de datos para la tabla `tb_question`
-- 

INSERT INTO `tb_question` (`question_id`, `text`, `type_multiple`) VALUES (1, '¿Qué géneros de juegos te gustan?', 1);
INSERT INTO `tb_question` (`question_id`, `text`, `type_multiple`) VALUES (2, '¿Qué género de juego prefieres?', 0);
INSERT INTO `tb_question` (`question_id`, `text`, `type_multiple`) VALUES (3, '¿Hace cuánto juega videojuegos?', 0);
INSERT INTO `tb_question` (`question_id`, `text`, `type_multiple`) VALUES (4, 'Escoge la opción que va más acorde a tu personalidad', 0);
INSERT INTO `tb_question` (`question_id`, `text`, `type_multiple`) VALUES (5, 'Si fueras un personaje de un videojuego que preferirías', 0);
INSERT INTO `tb_question` (`question_id`, `text`, `type_multiple`) VALUES (6, '¿Te gusta juegos solo o acompañado?', 0);
INSERT INTO `tb_question` (`question_id`, `text`, `type_multiple`) VALUES (7, 'Si en un videojuego tuvieras la decisión de salvar al mundo <br/> o provocar una guerra que eligirías?', 0);
INSERT INTO `tb_question` (`question_id`, `text`, `type_multiple`) VALUES (8, '¿Cuántas horas al día le dedicas a los videojuegos?', 0);
INSERT INTO `tb_question` (`question_id`, `text`, `type_multiple`) VALUES (9, 'Si tuvieras que elegir una opción, entre solo jugar videojuegos anteriores al año 2000 o solo posteriores al año 2000 para toda tu vida qué escogerías?', 0);
INSERT INTO `tb_question` (`question_id`, `text`, `type_multiple`) VALUES (10, '¿Te gustan los juegos con diálogos extensos?', 0);
INSERT INTO `tb_question` (`question_id`, `text`, `type_multiple`) VALUES (11, '¿Te gusta pagar por contenido extra en los videojuegos?', 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_question_choice`
-- 

CREATE TABLE IF NOT EXISTS `tb_question_choice` (
  `question_id` int(11) NOT NULL,
  `choice_id` int(11) NOT NULL,
  PRIMARY KEY (`question_id`,`choice_id`),
  KEY `choice_id` (`choice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_question_choice`
-- 

INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (1, 1);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (2, 1);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (1, 2);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (2, 2);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (1, 3);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (2, 3);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (1, 4);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (2, 4);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (1, 5);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (2, 5);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (1, 6);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (2, 6);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (3, 7);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (3, 8);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (3, 9);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (3, 10);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (4, 11);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (4, 12);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (4, 13);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (4, 14);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (5, 15);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (5, 16);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (5, 17);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (5, 18);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (6, 19);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (6, 20);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (6, 21);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (7, 22);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (7, 23);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (8, 24);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (8, 25);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (8, 26);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (8, 27);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (9, 28);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (9, 29);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (10, 30);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (10, 32);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (10, 33);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (11, 34);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (11, 35);
INSERT INTO `tb_question_choice` (`question_id`, `choice_id`) VALUES (11, 36);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_users`
-- 

CREATE TABLE IF NOT EXISTS `tb_users` (
  `username` varchar(15) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `salt` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_users`
-- 

INSERT INTO `tb_users` (`username`, `first_name`, `last_name`, `email`, `salt`, `password`) VALUES ('admin', 'administrador', 'administrador', 'adminapp.com66', 'a8abeec0672096b6a8c48017dc29a0cc', 'fe9f94f2d2f046dc408ed215ead53c0c27b83d7d5075c3be796939541cf50b28391940ccbe75445d3b2b7b2e70033b0a5669f5fa9399348a320d0bbc3e06bd39');
INSERT INTO `tb_users` (`username`, `first_name`, `last_name`, `email`, `salt`, `password`) VALUES ('asdf', 'asdf', 'asdf', 'asdf@e.com', '489225e8166ef8b9a8f54e89e6a9f510', 'ae5e158b07744d1fc3d56bda688567a0883480d170336190ad87d52821a4a09ef91a1466d88cbe01e6369ca3dd1826738d3252f7f220c393ff2ed47703aa4b36');
INSERT INTO `tb_users` (`username`, `first_name`, `last_name`, `email`, `salt`, `password`) VALUES ('awsd', 'awsd', 'awsd', 'kevinporras07@hotmail.com', 'd5c253016ba9144a1c137b3699a37725', '548f83408126c6c735792f7444e76730e022717265efd4a6c0b708fbf283ab863bd6f84746540c1100cd0014ddf6f0d2ccc9c0355a5bd4a1e42d4a6b20d752be');
INSERT INTO `tb_users` (`username`, `first_name`, `last_name`, `email`, `salt`, `password`) VALUES ('dfgh', 'dfgh', 'dfgh', 'df@gmail.com', 'cd034f53f10035ff5650e9eb29a17a6c', '3a7f9741e21376fbbe50ac218581c20e8720c816915592fc8eb1b7b3ac951622a969751468c93a7dac58374136d1094fc0d4c9bff49342dfed937e4d2ecf46fa');
INSERT INTO `tb_users` (`username`, `first_name`, `last_name`, `email`, `salt`, `password`) VALUES ('erty', 'erty', 'erty', 'kevinporras07@hotmail.com', '25bd93be1682f0226d430031cab00272', '09cb4561572f8871c904d9e42c850d3652eb4dbd0bbef36539f281328c92d7c5a1c843f094949dcca5e21f0d330d9ad606358e86b93f96eaea99149122d43a6a');
INSERT INTO `tb_users` (`username`, `first_name`, `last_name`, `email`, `salt`, `password`) VALUES ('fghj', 'fghj', 'fghj', 'kevinporras07@hotmail.com', '93cfbf39cb8e7db47c4c7845a696ef31', '41407920ac4102748a147f5367d3086589dd70ffbd7505db68f024bd375cd1407ce1ccf11e48513885fbaec91c6f2a0d43c8f0597ad3529952428f1ebacec9eb');
INSERT INTO `tb_users` (`username`, `first_name`, `last_name`, `email`, `salt`, `password`) VALUES ('ghjk', 'ghjk', 'ghjk', 'kevinporras07@hotmail.com', 'c1c71ef712e37225daf242c2f64f4c16', '075e799f993b8be17c0936efc1c450d6559d1b753c06cc8f3b479f152678adc4a7198c26b6530bd92bb1b82f5c8150286887f0a6ceb5ac0e0dd595d78d3a858e');
INSERT INTO `tb_users` (`username`, `first_name`, `last_name`, `email`, `salt`, `password`) VALUES ('hjklh', 'hjkl', 'hjkl', 'kevinporras07@hotmail.com', 'c40c8dc44aec5c335790abbdb9198be1', 'e910cb5c2b93ee23cf5243997595fb71442d4d0b0aa3db2c4c94d0a0b471ddde95b21bb928be46f8b61dd54cfea4f7e525810e2ddfe399bdbcc76380cf686078');
INSERT INTO `tb_users` (`username`, `first_name`, `last_name`, `email`, `salt`, `password`) VALUES ('kporras07', 'Kevin', 'Porras Zumbado', 'kporras07@gmail.com', 'f863fac9357502b600c48410883e76c7', 'd2fa23e8b66c8fdc274f68df92320c657a6e10bb3dbbe961411db99fa7f167c37c55a959e5a64ab3b2f5a581099b12286958cfcd176d643324ceac99c1c2a124');
INSERT INTO `tb_users` (`username`, `first_name`, `last_name`, `email`, `salt`, `password`) VALUES ('qwer', 'qwer', 'Porras Zumbado', 'kevinporras07@hotmail.com', '3cc9493cb1db369d563795aaede30c93', 'a151e9e3f97cb8af630f06f6674cf126024bff46e3022ab6865ac4bfb511aa5a8fd58e0bb85cb1e2d05c3a46a5ba12d7308bd8b1e27b69441ad4548e2b6245cf');
INSERT INTO `tb_users` (`username`, `first_name`, `last_name`, `email`, `salt`, `password`) VALUES ('sdfg', 'sdfg', 'sdfg', 'sdfg@e.com', '30692e10808353ca993ea020d88536b7', '6408a81a94c8445b150a4577910d920a1d081380ff53cf042d95b660b1f88500ef0d68181202b1848e2823cbefe4bfc89da073f2ce32cc9a7fc24dad11bbcff8');
INSERT INTO `tb_users` (`username`, `first_name`, `last_name`, `email`, `salt`, `password`) VALUES ('wert', 'wert', 'wert', 'kevinporras07@hotmail.com', 'd5c304763d4b791623eba578ba0d05a8', 'd6e231262b146692c9861fd256b51306be06264334d96f619a94c50b1720c0b899fa45e3b259d4975952ad85b15f1893f7ff18df2539039c0c5a0ef93e661d3d');

-- 
-- Filtros para las tablas descargadas (dump)
-- 

-- 
-- Filtros para la tabla `tb_choice_game`
-- 
ALTER TABLE `tb_choice_game`
  ADD CONSTRAINT `tb_choice_game_ibfk_1` FOREIGN KEY (`choice_id`) REFERENCES `tb_choices` (`choice_id`),
  ADD CONSTRAINT `tb_choice_game_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `tb_game` (`game_id`);

-- 
-- Filtros para la tabla `tb_game_console`
-- 
ALTER TABLE `tb_game_console`
  ADD CONSTRAINT `tb_game_console_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `tb_game` (`game_id`),
  ADD CONSTRAINT `tb_game_console_ibfk_2` FOREIGN KEY (`console_id`) REFERENCES `tb_console` (`console_id`);

-- 
-- Filtros para la tabla `tb_game_contestant`
-- 
ALTER TABLE `tb_game_contestant`
  ADD CONSTRAINT `tb_game_contestant_ibfk_1` FOREIGN KEY (`contestant_id`) REFERENCES `tb_contestant` (`contestant_id`),
  ADD CONSTRAINT `tb_game_contestant_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `tb_game` (`game_id`),
  ADD CONSTRAINT `tb_game_contestant_ibfk_3` FOREIGN KEY (`console_id`) REFERENCES `tb_console` (`console_id`);

-- 
-- Filtros para la tabla `tb_game_pictures`
-- 
ALTER TABLE `tb_game_pictures`
  ADD CONSTRAINT `tb_game_pictures_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `tb_game` (`game_id`);

-- 
-- Filtros para la tabla `tb_question_choice`
-- 
ALTER TABLE `tb_question_choice`
  ADD CONSTRAINT `tb_question_choice_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `tb_question` (`question_id`),
  ADD CONSTRAINT `tb_question_choice_ibfk_2` FOREIGN KEY (`choice_id`) REFERENCES `tb_choices` (`choice_id`);
