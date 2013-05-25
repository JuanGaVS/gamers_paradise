-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 21-05-2013 a las 16:24:09
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `gamersparadise`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_choices`
-- 

CREATE TABLE `tb_choices` (
  `choice_id` int(11) NOT NULL auto_increment,
  `text` varchar(300) NOT NULL,
  PRIMARY KEY  (`choice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

-- 
-- Volcar la base de datos para la tabla `tb_choices`
-- 

INSERT INTO `tb_choices` VALUES (1, 'RPG(Rol Play Game)');
INSERT INTO `tb_choices` VALUES (2, 'First Person');
INSERT INTO `tb_choices` VALUES (3, 'Survival Horror');
INSERT INTO `tb_choices` VALUES (4, 'Estrategia');
INSERT INTO `tb_choices` VALUES (5, 'Peleas');
INSERT INTO `tb_choices` VALUES (6, 'Plataforma');
INSERT INTO `tb_choices` VALUES (7, '0 a menos de 1 años');
INSERT INTO `tb_choices` VALUES (8, '1 a menos de 5 años');
INSERT INTO `tb_choices` VALUES (9, '5 a menos de 10 años');
INSERT INTO `tb_choices` VALUES (10, 'Toda la vida');
INSERT INTO `tb_choices` VALUES (11, 'Salir a una aventura');
INSERT INTO `tb_choices` VALUES (12, 'Quedarte en casa descansando');
INSERT INTO `tb_choices` VALUES (13, 'Jugar una partida de ajedrez');
INSERT INTO `tb_choices` VALUES (14, 'Cualquiera te da igual');
INSERT INTO `tb_choices` VALUES (15, 'Ser un héroe');
INSERT INTO `tb_choices` VALUES (16, 'Un villano');
INSERT INTO `tb_choices` VALUES (17, 'Un general');
INSERT INTO `tb_choices` VALUES (18, 'Un personaje secundario');
INSERT INTO `tb_choices` VALUES (19, 'Solo es mejor');
INSERT INTO `tb_choices` VALUES (20, 'Lo mejor es jugar con los amigos');
INSERT INTO `tb_choices` VALUES (21, 'Juego online entonces estoy solamente acompañado');
INSERT INTO `tb_choices` VALUES (22, 'Provocar la guerra');
INSERT INTO `tb_choices` VALUES (23, 'Salvar el mundo');
INSERT INTO `tb_choices` VALUES (24, '0 a menos de 1 hora');
INSERT INTO `tb_choices` VALUES (25, '1 a menos de 5 horas');
INSERT INTO `tb_choices` VALUES (26, '5 a menos de 10 horas');
INSERT INTO `tb_choices` VALUES (27, 'Me pagan por jugar');
INSERT INTO `tb_choices` VALUES (28, 'Del año 2000 y anteriores');
INSERT INTO `tb_choices` VALUES (29, 'De los años posteriores');
INSERT INTO `tb_choices` VALUES (30, 'Amo las historias complejas');
INSERT INTO `tb_choices` VALUES (32, 'No me gusta leer, por eso me brinco los diálogos');
INSERT INTO `tb_choices` VALUES (33, 'Me da igual');
INSERT INTO `tb_choices` VALUES (34, 'Pago por todo');
INSERT INTO `tb_choices` VALUES (35, 'No pago nada');
INSERT INTO `tb_choices` VALUES (36, 'Pago únicamente si lo vale');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_choice_game`
-- 

CREATE TABLE `tb_choice_game` (
  `choice_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  PRIMARY KEY  (`choice_id`,`game_id`),
  KEY `game_id` (`game_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_choice_game`
-- 

INSERT INTO `tb_choice_game` VALUES (0, 0);
INSERT INTO `tb_choice_game` VALUES (1, 1);
INSERT INTO `tb_choice_game` VALUES (1, 2);
INSERT INTO `tb_choice_game` VALUES (1, 3);
INSERT INTO `tb_choice_game` VALUES (1, 4);
INSERT INTO `tb_choice_game` VALUES (1, 5);
INSERT INTO `tb_choice_game` VALUES (1, 6);
INSERT INTO `tb_choice_game` VALUES (2, 1);
INSERT INTO `tb_choice_game` VALUES (2, 2);
INSERT INTO `tb_choice_game` VALUES (2, 3);
INSERT INTO `tb_choice_game` VALUES (2, 4);
INSERT INTO `tb_choice_game` VALUES (2, 5);
INSERT INTO `tb_choice_game` VALUES (2, 6);
INSERT INTO `tb_choice_game` VALUES (3, 7);
INSERT INTO `tb_choice_game` VALUES (3, 8);
INSERT INTO `tb_choice_game` VALUES (3, 9);
INSERT INTO `tb_choice_game` VALUES (3, 10);
INSERT INTO `tb_choice_game` VALUES (4, 11);
INSERT INTO `tb_choice_game` VALUES (4, 12);
INSERT INTO `tb_choice_game` VALUES (4, 13);
INSERT INTO `tb_choice_game` VALUES (4, 14);
INSERT INTO `tb_choice_game` VALUES (5, 15);
INSERT INTO `tb_choice_game` VALUES (5, 16);
INSERT INTO `tb_choice_game` VALUES (5, 17);
INSERT INTO `tb_choice_game` VALUES (5, 18);
INSERT INTO `tb_choice_game` VALUES (6, 19);
INSERT INTO `tb_choice_game` VALUES (6, 20);
INSERT INTO `tb_choice_game` VALUES (6, 21);
INSERT INTO `tb_choice_game` VALUES (7, 22);
INSERT INTO `tb_choice_game` VALUES (7, 23);
INSERT INTO `tb_choice_game` VALUES (8, 24);
INSERT INTO `tb_choice_game` VALUES (8, 25);
INSERT INTO `tb_choice_game` VALUES (8, 26);
INSERT INTO `tb_choice_game` VALUES (8, 27);
INSERT INTO `tb_choice_game` VALUES (9, 28);
INSERT INTO `tb_choice_game` VALUES (9, 29);
INSERT INTO `tb_choice_game` VALUES (10, 30);
INSERT INTO `tb_choice_game` VALUES (10, 31);
INSERT INTO `tb_choice_game` VALUES (10, 32);
INSERT INTO `tb_choice_game` VALUES (11, 34);
INSERT INTO `tb_choice_game` VALUES (11, 35);
INSERT INTO `tb_choice_game` VALUES (11, 36);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_console`
-- 

CREATE TABLE `tb_console` (
  `console_id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`console_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `tb_console`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_contestant`
-- 

CREATE TABLE `tb_contestant` (
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
  PRIMARY KEY  (`contestant_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_contestant`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_game`
-- 

CREATE TABLE `tb_game` (
  `game_id` int(11) NOT NULL auto_increment,
  `name` varchar(70) NOT NULL,
  `trailer_url` varchar(255) NOT NULL,
  `description` varchar(400) NOT NULL,
  PRIMARY KEY  (`game_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `tb_game`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_game_console`
-- 

CREATE TABLE `tb_game_console` (
  `game_id` int(11) NOT NULL,
  `console_id` int(11) NOT NULL,
  PRIMARY KEY  (`game_id`,`console_id`),
  KEY `console_id` (`console_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_game_console`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_game_contestant`
-- 

CREATE TABLE `tb_game_contestant` (
  `contestant_id` varchar(70) NOT NULL,
  `game_id` int(11) NOT NULL,
  `console_id` int(11) NOT NULL,
  PRIMARY KEY  (`contestant_id`),
  KEY `game_id` (`game_id`),
  KEY `console_id` (`console_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_game_contestant`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_game_pictures`
-- 

CREATE TABLE `tb_game_pictures` (
  `game_id` int(11) NOT NULL,
  `picture_url` varchar(255) NOT NULL,
  PRIMARY KEY  (`game_id`,`picture_url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_game_pictures`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_question`
-- 

CREATE TABLE `tb_question` (
  `question_id` int(11) NOT NULL auto_increment,
  `text` varchar(300) NOT NULL,
  `type_multiple` tinyint(1) NOT NULL,
  PRIMARY KEY  (`question_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- 
-- Volcar la base de datos para la tabla `tb_question`
-- 

INSERT INTO `tb_question` VALUES (1, '¿Qué géneros de juegos te gustan?', 1);
INSERT INTO `tb_question` VALUES (2, '¿Qué género de juego prefieres?', 0);
INSERT INTO `tb_question` VALUES (3, '¿Hace cuánto juega videojuegos?', 0);
INSERT INTO `tb_question` VALUES (4, 'Escoge la opción que va más acorde a tu personalidad', 0);
INSERT INTO `tb_question` VALUES (5, 'Si fueras un personaje de un videojuego que preferirías', 0);
INSERT INTO `tb_question` VALUES (6, '¿Te gusta juegos solo o acompañado?', 0);
INSERT INTO `tb_question` VALUES (7, 'Si en un videojuego tuvieras la decisión de Salvar al mundo o provocar una guerra que eligirías?', 0);
INSERT INTO `tb_question` VALUES (8, '¿Cuántas horas al día le dedicas a los videojuegos?', 0);
INSERT INTO `tb_question` VALUES (9, 'Si tuvieras que elegir una opción, entre solo jugar videojuegos anteriores al año 2000 o solo posteriores al año 2000 para toda tu vida qué escogerías?', 0);
INSERT INTO `tb_question` VALUES (10, '¿Te gustan los juegos con diálogos extensos?', 0);
INSERT INTO `tb_question` VALUES (11, '¿Te gusta pagar por contenido extra en los videojuegos?', 0);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_question_choice`
-- 

CREATE TABLE `tb_question_choice` (
  `question_id` int(11) NOT NULL,
  `choice_id` int(11) NOT NULL,
  PRIMARY KEY  (`question_id`,`choice_id`),
  KEY `choice_id` (`choice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_question_choice`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_users`
-- 

CREATE TABLE `tb_users` (
  `username` varchar(15) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `salt` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_users`
-- 

INSERT INTO `tb_users` VALUES ('kporras07', 'Kevin', 'Porras', 'kporras07@gmail.com', '899eed8ceddd1f40dd1991f69f5b990a', '8327dc24f48a257ceb89850ff549d71e8314334a7ee2722c7f74592cc510c577ed0d235c89c53afcd6f54632c2a2bf196447c89fd7fc0e9de4f8cb7018ffbfa1');




INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('1', '1');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('1', '2');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('1', '3');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('1', '4');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('1', '5');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('1', '6');

INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('2', '1');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('2', '2');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('2', '3');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('2', '4');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('2', '5');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('2', '6');

INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('3', '7');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('3', '8');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('3', '9');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('3', '10');

INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('4', '11');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('4', '12');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('4', '13');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('4', '14');

INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('5', '15');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('5', '16');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('5', '17');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('5', '18');

INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('6', '19');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('6', '20');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('6', '21');

INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('7', '22');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('7', '23');

INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('8', '24');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('8', '25');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('8', '26');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('8', '27');

INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('9', '28');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('9', '29');

INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('10', '30');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('10', '32');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('10', '33');

INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('11', '34');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('11', '35');
INSERT INTO `gamers_paradise`.`tb_question_choice` ( `question_id` , `choice_id` )
VALUES ('11', '36');