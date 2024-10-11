-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2024 a las 23:52:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendajuegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `Id_Juego` int(11) NOT NULL,
  `nombre_juego` varchar(20) NOT NULL,
  `generos` varchar(20) NOT NULL,
  `califiacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`Id_Juego`, `nombre_juego`, `generos`, `califiacion`) VALUES
(3, 'farcry', 'accion', 6),
(2, 'Hades', 'Rouge', 7),
(1, 'Hollow Knight', 'Soulslike', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidojuegos`
--

CREATE TABLE `pedidojuegos` (
  `Id_Juego` int(11) NOT NULL,
  `Id_Usario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidojuegos`
--

INSERT INTO `pedidojuegos` (`Id_Juego`, `Id_Usario`, `cantidad`, `precio`) VALUES
(1, 4, 54, 1400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usario` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usario`, `nombre_usuario`, `mail`, `fecha_nacimiento`) VALUES
(1, 'algo', 'titi@gmail.com', '2024-09-10'),
(2, 'Titi', 'cholo@gmail.com', '2024-09-26'),
(3, 'antonio', 'antonioi@gmail.com', '2024-09-10'),
(4, 'Mateo', 'm@gmail.com', '2024-09-15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`generos`),
  ADD UNIQUE KEY `nombre_juego` (`nombre_juego`),
  ADD UNIQUE KEY `Id_Juego` (`Id_Juego`);

--
-- Indices de la tabla `pedidojuegos`
--
ALTER TABLE `pedidojuegos`
  ADD PRIMARY KEY (`Id_Juego`),
  ADD UNIQUE KEY `Id_Usario` (`Id_Usario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usario`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidojuegos`
--
ALTER TABLE `pedidojuegos`
  ADD CONSTRAINT `pedidojuegos_ibfk_1` FOREIGN KEY (`Id_Juego`) REFERENCES `juego` (`Id_Juego`),
  ADD CONSTRAINT `pedidojuegos_ibfk_2` FOREIGN KEY (`Id_Usario`) REFERENCES `usuario` (`Id_Usario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
