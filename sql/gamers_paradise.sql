-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 09-05-2013 a las 02:30:42
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `gamers_paradise`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_choices`
-- 

CREATE TABLE `tb_choices` (
  `choice_id` int(11) NOT NULL,
  `text` varchar(300) NOT NULL,
  PRIMARY KEY  (`choice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_choices`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_choice_game`
-- 

CREATE TABLE `tb_choice_game` (
  `choice_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  PRIMARY KEY  (`choice_id`,`game_id`),
  KEY `game_id` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_choice_game`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_console`
-- 

CREATE TABLE `tb_console` (
  `console_id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY  (`console_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `tb_question`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tb_question_choice`
-- 

CREATE TABLE `tb_question_choice` (
  `question_id` int(11) NOT NULL,
  `choice_id` int(11) NOT NULL,
  PRIMARY KEY  (`question_id`,`choice_id`),
  KEY `choice_id` (`choice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `tb_users`
-- 

INSERT INTO `tb_users` VALUES ('kporras07', 'Kevin', 'Porras', 'kporras07@gmail.com', '899eed8ceddd1f40dd1991f69f5b990a', '8327dc24f48a257ceb89850ff549d71e8314334a7ee2722c7f74592cc510c577ed0d235c89c53afcd6f54632c2a2bf196447c89fd7fc0e9de4f8cb7018ffbfa1');

-- 
-- Filtros para las tablas descargadas (dump)
-- 

-- 
-- Filtros para la tabla `tb_choice_game`
-- 
ALTER TABLE `tb_choice_game`
  ADD CONSTRAINT `tb_choice_game_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `tb_game` (`game_id`),
  ADD CONSTRAINT `tb_choice_game_ibfk_1` FOREIGN KEY (`choice_id`) REFERENCES `tb_choices` (`choice_id`);

-- 
-- Filtros para la tabla `tb_game_console`
-- 
ALTER TABLE `tb_game_console`
  ADD CONSTRAINT `tb_game_console_ibfk_2` FOREIGN KEY (`console_id`) REFERENCES `tb_console` (`console_id`),
  ADD CONSTRAINT `tb_game_console_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `tb_game` (`game_id`);

-- 
-- Filtros para la tabla `tb_game_contestant`
-- 
ALTER TABLE `tb_game_contestant`
  ADD CONSTRAINT `tb_game_contestant_ibfk_3` FOREIGN KEY (`console_id`) REFERENCES `tb_console` (`console_id`),
  ADD CONSTRAINT `tb_game_contestant_ibfk_1` FOREIGN KEY (`contestant_id`) REFERENCES `tb_contestant` (`contestant_id`),
  ADD CONSTRAINT `tb_game_contestant_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `tb_game` (`game_id`);

-- 
-- Filtros para la tabla `tb_game_pictures`
-- 
ALTER TABLE `tb_game_pictures`
  ADD CONSTRAINT `tb_game_pictures_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `tb_game` (`game_id`);

-- 
-- Filtros para la tabla `tb_question_choice`
-- 
ALTER TABLE `tb_question_choice`
  ADD CONSTRAINT `tb_question_choice_ibfk_2` FOREIGN KEY (`choice_id`) REFERENCES `tb_choices` (`choice_id`),
  ADD CONSTRAINT `tb_question_choice_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `tb_question` (`question_id`);
