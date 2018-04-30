-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2018 a las 06:34:37
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `myapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `value` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `payment` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(500) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('Miembro','Administrador') NOT NULL DEFAULT 'Miembro',
  `phonenumber` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `email`, `password`, `rol`, `phonenumber`, `created_at`) VALUES
(1, 'Enrique Felix', 'enriquefelix876', 'enriquefelix876@gmail.com', 'admin', 'Administrador', '6221643493', '2018-03-15 17:14:51'),
(2, 'Sebas Creisi', 'sebasloco', 'sebasmasmas@hotmail.com', 'sebas', 'Miembro', '6221556038', '2018-03-19 15:00:47'),
(3, 'Rosca Vela', 'roscavela', 'roscavela@gmail.com', '1234', 'Miembro', '6221449836', '2018-04-11 09:36:13'),
(5, 'Ignacio Libre', 'nacholibre', 'nacho_wwe@gmail.com', 'nachonacho', 'Miembro', '6221264583', '2018-04-23 21:03:53'),
(6, 'Alonso Gomez', 'Alongshoot', 'alngsht@hotmail.com', 'lngsht', 'Miembro', NULL, '2018-04-23 21:07:59'),
(7, 'Riko Chet', 'rikochet', 'riko.chet@rikochet.com', 'muchalucha', 'Miembro', NULL, '2018-04-23 22:05:52'),
(8, 'Tobey Maguire', 'tobias', 'tobey@gmail.com', 'spider', 'Miembro', NULL, '2018-04-23 23:35:31'),
(10, 'Carlos Carballo', 'carballo', 'carballo@gmail.com', '$2y$10$2q6KBdjmmgKIP6ib6EHOpOm69HUlNf7tFRiDPBv4KhyVHmfidxbgK', 'Miembro', NULL, '2018-04-24 09:20:43'),
(11, 'sebas loco', 'sebas', 'sebas@hotmail.com', '$2y$10$di.41JoPPmLrCevhs3.sy.cQmkHwgxXc4R40KuAxMOvsiHC6l0ZW.', 'Miembro', NULL, '2018-04-24 09:21:53'),
(13, 'Chino Vela', 'chino', 'chino@gmail.com', '$2y$10$ejBGPhLdOMnjvKqc8YVGle9KVjVpMrpPN5hYMKHUA9OIonW755/eG', 'Miembro', NULL, '2018-04-24 10:17:30'),
(14, 'edwin rios', 'Edwub', 'edwin@gmail.com', '$2y$10$sKjNHzHWt1JuUPthj0vQZuj2wvwJ8NE3ZcBIimwgMduC0bDTnJj.y', 'Miembro', NULL, '2018-04-24 10:47:23'),
(21, 'Steve Rogers', 'captain.america', 'captain_america@marvel.com', '$2y$10$VLLKeKCRAdCmkmvhaLqoeeF2QVQfuyBAXGf3rmrfkSZtdiWtj0Zde', 'Miembro', NULL, '2018-04-28 01:09:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_adress`
--

CREATE TABLE `user_adress` (
  `id` int(11) NOT NULL,
  `adress` varchar(200) NOT NULL,
  `user_adress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `shipper_id` (`shipper_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `user_adress`
--
ALTER TABLE `user_adress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_adress` (`user_adress`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `user_adress`
--
ALTER TABLE `user_adress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `shipping_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `package` (`id`),
  ADD CONSTRAINT `shipping_ibfk_3` FOREIGN KEY (`shipper_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `user_adress`
--
ALTER TABLE `user_adress`
  ADD CONSTRAINT `user_adress_ibfk_1` FOREIGN KEY (`user_adress`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;