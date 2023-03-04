
--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int NOT NULL,
  `asunto` text   NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(255) NOT NULL,
  `id_cliente` int NOT NULL,
  `id_mascota` int NOT NULL
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `asunto`, `fecha`, `estado`, `id_cliente`, `id_mascota`) VALUES
(10, 'Fractura de pata', '2023-03-01 03:30:00', 'Taken', 1, 3),
(11, 'A mi perro le cuesta respirar', '2023-03-12 14:00:00', 'Not taken', 1, 3),
(12, 'fasdfdsafasdfsadfasfas', '2023-01-31 03:21:00', 'Not taken', 1, 3),
(17, 'fasdfdsafasdfsadfasfas', '2023-01-31 03:21:00', 'Not taken', 1, 3),
(18, 'fasdfdsafasdfsadfasfas', '2023-01-31 03:21:00', 'Not taken', 1, 3),
(19, 'si   ', '2023-02-27 21:57:00', 'Taken', 1, 3),
(20, 'Mi perro no come', '2023-03-02 11:30:00', 'Not taken', 2, 2),
(21, 'wazados', '2024-01-31 03:21:00', 'Taken', 2, 1),
(23, 'Mi gato no come', '2023-11-11 11:11:00', 'Not taken', 2, 1),
(28, 'ajam', '2023-05-23 10:00:00', 'Not taken', 2, 1),
(29, 'prueba con gerardo', '2023-02-12 03:21:00', 'Taken', 1, 16),
(30, 'prueba', '2023-11-11 12:01:00', 'Not taken', 2, 17),
(31, 'Mi perro está desanimado', '2023-03-04 12:00:00', 'Not taken', 1, 16),
(32, 'Mi perro está desanimado', '2023-03-04 12:00:00', 'Not taken', 1, 16),
(33, 'Mi perrito está enfermo', '2023-07-06 14:00:00', 'Not taken', 1, 16);

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
) ENGINE=InnoDB;

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
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `clientemascotas`
--

INSERT INTO `clientemascotas` (`id`, `id_mascota`, `id_cliente`) VALUES
(1, 1, 2),
(2, 3, 1),
(3, 2, 2),
(10, 16, 1),
(11, 17, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `especie` varchar(255) NOT NULL,
  `raza` varchar(255) NOT NULL,
  `edad` int NOT NULL,
  `genero` varchar(15) NOT NULL
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id`, `nombre`, `especie`, `raza`, `edad`, `genero`) VALUES
(1, 'Aristides', 'Canino', 'Náhuat', 1000, 'Macho'),
(2, 'canelon', 'Canino', 'aguacatero', 3, 'Macho'),
(3, 'fernandoflo', 'Ave', 'si', 2, 'Hembra'),
(16, 'Gerardo', 'Felino', 'Balinés', 2, 'Hembra'),
(17, 'Juca', 'Canino', 'Hush puppie', 3, 'Hembra');

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
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `registro_medico`
--

INSERT INTO `registro_medico` (`id`, `examenes`, `resultados`, `enfermedades`, `medicamentos`, `id_mascota`) VALUES
(1, '- Análisis de sangre\r\n- Medición de la presión\r\n- Análisis de orina \r\n- Análisis de glaucoma', '- Sangre: B+\r\n- Presión: Regular\r\n- Orina: Normal\r\n- Glaucoma: Normal', '- Hepatitis infecciosa\r\n- Gastroenteritis', '- Carprofeno\r\n- Deracoxib', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE `veterinario` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasenia` varchar(255)   NOT NULL
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `veterinario`
--

INSERT INTO `veterinario` (`id`, `nombre`, `apellido`, `correo`, `contrasenia`) VALUES
(1, 'Juan ', 'Quinteros', 'quinterosaraujo@gmail.com', 'sofia123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinariocitas`
--

CREATE TABLE `veterinariocitas` (
  `id` int NOT NULL,
  `id_veterinario` int NOT NULL,
  `id_cita` int NOT NULL
) ENGINE=InnoDB;

--
-- Volcado de datos para la tabla `veterinariocitas`
--

INSERT INTO `veterinariocitas` (`id`, `id_veterinario`, `id_cita`) VALUES
(1, 1, 21),
(4, 1, 10),
(6, 1, 19),
(7, 1, 29);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
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
  MODIFY `id_cita` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientemascotas`
--
ALTER TABLE `clientemascotas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `registro_medico`
--
ALTER TABLE `registro_medico`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `veterinariocitas`
--
ALTER TABLE `veterinariocitas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Filtros para la tabla `registro_medico`
--
ALTER TABLE `registro_medico`
  ADD CONSTRAINT `registro_medico_ibfk_1` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `veterinariocitas`
--
ALTER TABLE `veterinariocitas`
  ADD CONSTRAINT `veterinariocitas_ibfk_1` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `veterinariocitas_ibfk_2` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id_cita`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

