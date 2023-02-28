-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-02-2023 a las 21:50:44
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int NOT NULL,
  `asunto` text NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(255) NOT NULL,
  `id_cliente` int NOT NULL,
  `id_mascota` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasenia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `correo`, `contrasenia`) VALUES
(1, 'Leandro', 'Valencia', 'quinterosmachista@gmail.com', '12345'),
(2, 'Lucas', 'Jimenez', 'machado@gmail.com', 'machado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientemascotas`
--

CREATE TABLE `clientemascotas` (
  `id` int NOT NULL,
  `id_mascota` int NOT NULL,
  `id_cliente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `clientemascotas`
--

INSERT INTO `clientemascotas` (`id`, `id_mascota`, `id_cliente`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emergencias`
--

CREATE TABLE `emergencias` (
  `id` int NOT NULL,
  `hora` datetime NOT NULL,
  `id_cliente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `raza` varchar(255) NOT NULL,
  `edad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id`, `nombre`, `raza`, `edad`) VALUES
(1, 'Aristides', 'Náhuat', 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_medico`
--

CREATE TABLE `registro_medico` (
  `id` int NOT NULL,
  `examenes` text NOT NULL,
  `resultados` text NOT NULL,
  `enfermedades` text NOT NULL,
  `medicamentos` text NOT NULL,
  `id_mascota` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE `veterinario` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasenia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinariocitas`
--

CREATE TABLE `veterinariocitas` (
  `id` int NOT NULL,
  `id_veterinario` int NOT NULL,
  `id_cita` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_mascota` (`id_mascota`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientemascotas`
--
ALTER TABLE `clientemascotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mascota` (`id_mascota`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `emergencias`
--
ALTER TABLE `emergencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_medico`
--
ALTER TABLE `registro_medico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mascota` (`id_mascota`);

--
-- Indices de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `veterinariocitas`
--
ALTER TABLE `veterinariocitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_veterinario` (`id_veterinario`),
  ADD KEY `id_cita` (`id_cita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientemascotas`
--
ALTER TABLE `clientemascotas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `emergencias`
--
ALTER TABLE `emergencias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registro_medico`
--
ALTER TABLE `registro_medico`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `veterinariocitas`
--
ALTER TABLE `veterinariocitas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_4` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientemascotas`
--
ALTER TABLE `clientemascotas`
  ADD CONSTRAINT `clientemascotas_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientemascotas_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `emergencias`
--
ALTER TABLE `emergencias`
  ADD CONSTRAINT `emergencias_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_medico`
--
ALTER TABLE `registro_medico`
  ADD CONSTRAINT `registro_medico_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `veterinariocitas`
--
ALTER TABLE `veterinariocitas`
  ADD CONSTRAINT `veterinariocitas_ibfk_1` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `veterinariocitas_ibfk_2` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
