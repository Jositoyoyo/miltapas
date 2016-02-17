-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-02-2016 a las 12:58:31
-- Versión del servidor: 5.5.44-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `miltapas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `publicado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `publicado`) VALUES
(1, 'Pintxos', 1),
(2, 'Ostras y mariscos', 1),
(3, 'Tapas españolas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `local` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `img`
--

INSERT INTO `img` (`id`, `file`, `path`, `local`, `usuario`) VALUES
(10, '/tmp/phpRdCJ8z', '96dfc0a5f33c510aa56b28b800eb99f4b3a199cd.jpeg', 1, 1),
(11, '/tmp/phphTlmVz', '212e2d79c5b01322092611a6fbd22ce03a533a3f.jpeg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

CREATE TABLE IF NOT EXISTS `local` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `Ciudad` varchar(65) NOT NULL,
  `telefono` int(45) DEFAULT NULL,
  `web` varchar(65) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `coordenadas_x` double NOT NULL,
  `coordenadas_y` double NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `publicado` tinyint(1) DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `direccion_UNIQUE` (`direccion`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  KEY `fk_local_categoria1_idx` (`categoria`),
  KEY `fk_local_usuario1_idx` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `local`
--

INSERT INTO `local` (`id`, `nombre`, `direccion`, `Ciudad`, `telefono`, `web`, `fecha`, `coordenadas_x`, `coordenadas_y`, `img`, `publicado`, `categoria`, `usuario`) VALUES
(7, 'Bar el Ideal', 'Calle Virgen del Castañar, 11, 28027 Madrid, Madrid, España', 'Madrid', NULL, NULL, '2016-01-02', -3.6282992362976074, 40.329348932894, NULL, 1, 1, 1),
(8, 'El molino', 'Calle Florencia, 10, 28030 Madrid, Madrid, España', 'Madrid', NULL, NULL, '2016-01-01', -4.9589898933434435, 40.4018545292267, NULL, 1, 3, 1),
(9, 'La tapita', 'Av. de Moratalaz, 56, 28030 Madrid, Madrid, España', 'Madrid', NULL, NULL, NULL, -3.651433300000008, 40.401854529226675, NULL, NULL, 1, 1),
(11, 'La puerta del Jeronimo', 'Calle Luis de Hoyos Sainz,  172', 'Madrid', NULL, NULL, NULL, -3.628240099999971, 40.4028103, NULL, NULL, 1, 1),
(12, 'El puertito', 'Calle de Ricardo Ortiz,  118', 'Madrid', NULL, NULL, NULL, 40.4226965, -3.65641729999993, NULL, NULL, 1, 1),
(13, 'Taxi a Manhatan', 'Orense', 'Madrid', NULL, NULL, NULL, 22222, 2222, NULL, NULL, 1, 1),
(17, 'Bar Manolo', 'Orense 3', 'Madrid', NULL, NULL, NULL, 1, 1, NULL, NULL, 1, 1),
(18, 'Bear Station', 'Santo Domingo', 'Madrid', NULL, NULL, NULL, 2, 3, NULL, NULL, 1, 1),
(19, 'Bar Lola', 'Dolores', 'Madrid', NULL, NULL, NULL, 1, 2, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinion`
--

CREATE TABLE IF NOT EXISTS `opinion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `puntuacion` int(11) NOT NULL,
  `publicado` varchar(45) DEFAULT NULL,
  `local` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tapa_local_idx` (`local`),
  KEY `fk_opinion_usuario1_idx` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `roles` varchar(45) DEFAULT NULL,
  `publicado` tinyint(1) DEFAULT NULL,
  `codigo_seg` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `password`, `fecha`, `roles`, `publicado`, `codigo_seg`, `path`) VALUES
(1, 'jositoyoyo', 'jositoyoyo2@hotmail.com', 'jositoyoyo', '0000-00-00', 'ADMIN', 1, '', ''),
(17, 'juan', 'juan@hotmail.com', 'juandd', '2016-02-02', 'Registrado', 0, 'e10adc3949ba59abbe56e057f20f883e', '/');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `fk_local_categoria1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_local_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `fk_opinion_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tapa_local` FOREIGN KEY (`local`) REFERENCES `local` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
