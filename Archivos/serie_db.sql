-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2025 a las 20:23:35
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
-- Base de datos: `serie_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

CREATE TABLE `personajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`id`, `nombre`, `color`, `tipo`, `nivel`, `foto`) VALUES
(1, 'Monkey D. Luffy', 'Rojo', 'Usuario de Fruta del Diablo', 1500000000, 'assets/img/1751823420_luffy.webp'),
(3, 'Sanji', 'Amarillo', 'Cocinero', 177000000, 'assets/img/1751823945_sanji.webp'),
(4, 'Keison', 'Blanco', 'Dragon Celestial', 2147483647, 'assets/img/1751825180_yo 2.0.png'),
(5, 'Nami', 'Naranja', 'Navegante', 16000000, 'assets/img/1751825510_nami.png'),
(6, 'Roronoa Zoro', 'verde', 'Espadachin', 120000000, 'assets/img/1751825788_zoro.webp'),
(7, 'Ussop', 'Marron', 'Tirador', 30000000, 'assets/img/1751825987_ussop.webp'),
(8, 'chopper', 'rojo', 'Medico', 50, 'assets/img/1751826037_chopper.webp'),
(9, 'Robin', 'negro', 'Arqueologa', 79000000, 'assets/img/1751826064_robin.webp'),
(10, 'Franky', 'azul', 'Carpintero', 44000000, 'assets/img/1751826134_franky.webp'),
(11, 'Brook', 'negro', 'Musico', 33000000, 'assets/img/1751826164_brook.webp'),
(12, 'Jinbei', 'azul', 'Timonel', 438000000, 'assets/img/1751826190_jinbei.webp');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personajes`
--
ALTER TABLE `personajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
