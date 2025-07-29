-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-04-2018 a las 06:25:24
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tesis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `tDocumento` varchar(50) NOT NULL,
  `nDocumento` int(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `celular` int(50) NOT NULL,
  `gSanguineo` varchar(50) NOT NULL,
  `contacto` int(50) NOT NULL,
  `estrato` int(50) NOT NULL,
  `interes` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `nSerie` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `nombres`, `apellidos`, `tDocumento`, `nDocumento`, `genero`, `fecha`, `email`, `direccion`, `ciudad`, `celular`, `gSanguineo`, `contacto`, `estrato`, `interes`, `marca`, `referencia`, `nSerie`, `color`, `tipo`, `estado`) VALUES
(3, 'santiago', 'ruiz', 'CC', 1233493792, 'Masculino', '2018-04-02', 'santiago1@gmail.com', 'cll 54', 'Bogota', 2147483647, 'O+', 2147483647, 2, 'BMX', 'Gw', 'old', '120132756', 'azul', 'Urbana', 'Recuperada'),
(4, 'sebastian', 'ramirez', 'CC', 1233493792, 'Masculino', '2018-04-05', 'sebas@gmail.com', 'cll 90', 'Bogota', 2147483647, 'O-', 2147483647, 2, 'MTB', 'shimano', 'new', '130145789', 'beige', 'Triathlon', 'Recuperada'),
(5, 'Camilo', 'Torres', 'CC', 1245637893, 'Masculino', '2018-04-27', 'camilo@gmail.com', 'cll 8', 'Bogota', 2147483647, 'B-', 2147483647, 2, 'Fixie', 'scott', ' dosruedas', '141145789', 'roja', 'Tandem', 'Recuperada'),
(6, 'maicol', 'torres', 'CC', 1245789654, 'Masculino', '2007-01-10', 'maicol@gmail.com', 'cll 21', 'Bogota', 2147483647, 'B-', 2147483647, 2, 'BMX', 'Treck', 'new', '199145789', 'black', 'Turismo/Treking', 'Recuperada'),
(7, 'diana', 'rodriguez', 'CC', 52186824, 'Femenino', '1976-07-07', 'diana@gmail.com', 'cll 54 ', 'Bogota', 2147483647, 'O+', 2147483647, 2, 'Triathlon', 'Shimano', 'Gris y Blanca', '155145789', 'Gris y Blanca', 'Plegable', 'Recuperada'),
(8, 'Manuel', 'Tovar', 'CC', 41600834, 'Masculino', '1960-01-31', 'manuel@gmail.com', 'cll 41', 'Bogota', 2147483647, 'O-', 2147483647, 5, 'Urbano', 'Gw', 'Guardabarros', '166145789', 'Roja', 'All Mountain', 'Robada'),
(11, 'asd', 'asd', '1264', 13461, 'da', '2018-04-10', 'asd@gmail.com', 'asd', 'asd', 941, 'asd', 314615, 314615, 'asd', '14616', '51513', '123456789', 'asda', 'asd', 'Recuperada'),
(12, 'asdasd', 'asddasd', 'CC', 987654321, 'Masculino', '2018-04-10', 'cuaro@gmail.com', 'cll8', 'Bogota', 2147483647, 'AB', 2147483647, 2, 'Fixie', 'gasd', 'fsdafas', '123456789', 'asdasd', 'MTB', 'Robada'),
(13, 'nicolasdm', 'asdas', '1561', 1553, 'asdasd', '2018-04-09', 'nicolasdm@gmail.com', 'cllasd', 'asdas', 113213132, 'asdas', 113213132, 25, 'asdas', 'asdas', 'asd', '54682', 'asd', 'asdas', 'Recuperada'),
(14, 'laura', 'torres', '12153', 21474836, 'asda', '2018-04-02', 'laura@gmail.com', 'cll153 ', 'asdasd', 9456231, 'asd', 9456231, 2, 'asda', 'asd', 'asd', '4568429846', 'asdas', 'asdas', 'Recuperada'),
(15, 'holman', 'morris', 'CC', 1233145678, 'Masculino', '2016-06-16', 'holman@gmail.com', 'cll 45', 'Bogota', 2147483647, 'O+', 2147483647, 1, 'BMX', 'Trek', 'guardabarros', '966145789', 'amarilla', 'Turismo/Treking', 'Robada'),
(16, 'cristian', 'rodriguez', 'CC', 126547899, 'Masculino', '2013-06-15', 'cristian@gmail.com', 'cll 456', 'Ciudad', 2147483647, 'O+', 2147483647, 0, 'BMX', 'Gw', 'asdas', '766145789', 'beige', 'All Mountain', 'Recuperada');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
