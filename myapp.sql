-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2018 a las 09:14:15
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
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id` int(11) NOT NULL,
  `envio_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id`, `envio_id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 1, 'Prol Av Periferico 14B', 'Nacionalización del Golfo de California\r\n85477 Heroica Guaymas, Son.', 27.000000, 110.000000, 'domicilio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `paquete_id` int(11) NOT NULL,
  `repartidor_id` int(11) DEFAULT NULL,
  `pago` varchar(10) DEFAULT NULL,
  `estado` enum('Solicitado','En camino','Entregado','Cancelado') NOT NULL DEFAULT 'Solicitado',
  `direccion_envio` int(11) NOT NULL,
  `fecha_pedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_en_camino` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `fecha_entregado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `envio`
--

INSERT INTO `envio` (`id`, `user_id`, `paquete_id`, `repartidor_id`, `pago`, `estado`, `direccion_envio`, `fecha_pedido`, `fecha_en_camino`, `fecha_entregado`) VALUES
(2, 2, 1, 3, '35', 'Entregado', 1, '2018-05-02 20:55:59', '2018-05-02 23:46:20', '2018-05-02 23:46:20'),
(7, 2, 3, NULL, '35', 'Solicitado', 1, '2018-05-02 23:06:56', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 2, 4, NULL, '35', 'Solicitado', 1, '2018-05-02 23:08:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 2, 5, NULL, '35', 'Solicitado', 1, '2018-05-02 23:13:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 2, 6, NULL, '35', 'Solicitado', 1, '2018-05-02 23:16:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 2, 7, NULL, '35', 'Solicitado', 1, '2018-05-02 23:18:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 2, 8, NULL, '35', 'Solicitado', 1, '2018-05-02 23:29:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 2, 9, NULL, '35', 'Solicitado', 1, '2018-05-02 23:42:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 2, 10, NULL, '35', 'Solicitado', 1, '2018-05-02 23:45:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 2, 11, NULL, '35', 'Solicitado', 1, '2018-05-02 23:53:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 2, 12, NULL, '35', 'Solicitado', 1, '2018-05-03 00:00:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 2, 13, NULL, '35', 'Solicitado', 1, '2018-05-03 00:11:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `id` int(11) NOT NULL,
  `contenido` varchar(100) NOT NULL,
  `valor` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paquete`
--

INSERT INTO `paquete` (`id`, `contenido`, `valor`) VALUES
(1, '2 Pizzas Little Caesars', '180'),
(2, 'Paquete 1 Comida chica', '55'),
(3, 'Tacos de los mortales. 12 normales.', '200'),
(4, '12 de Tecate', '200'),
(5, 'Muchas cosas', '1000'),
(6, 'Un Tiranosaurio Rex', '1000'),
(7, 'Tachas, tachas y perico', NULL),
(8, 'Gema del espacio', NULL),
(9, 'Gema de la mente', NULL),
(10, 'Gema del tiempo', NULL),
(11, 'Gema del ama', NULL),
(12, 'Gema del poder', NULL),
(13, 'Pan con queso', NULL);

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
  `rol` enum('Miembro','Administrador','Repartidor') NOT NULL DEFAULT 'Miembro',
  `phonenumber` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `email`, `password`, `rol`, `phonenumber`, `created_at`) VALUES
(1, 'Enrique Felix', 'enriquefelix876', 'enriquefelix876@gmail.com', 'admin', 'Administrador', '6221643493', '2018-03-15 17:14:51'),
(2, 'Sebastian Carmona', 'sebas', 'sebasmasmas@hotmail.com', 'sebas', 'Miembro', '6221556038', '2018-03-19 15:00:47'),
(3, 'Rosca Vela', 'roscavela', 'roscavela@gmail.com', 'roscavela', 'Repartidor', '6221449836', '2018-04-11 09:36:13'),
(5, 'Ignacio Libre', 'nacholibre', 'nacho_wwe@gmail.com', 'nacholibre', 'Administrador', '6221264582', '2018-04-23 21:03:53'),
(6, 'Alonso Gomez', 'Alongshoot', 'alngsht@hotmail.com', '$2y$10$fRtSJBLktIx6PD7dUaWBsuHOp8V9Kr0/Lmh/fzk9cquh8XO2PWVlO', 'Miembro', '6221207038', '2018-04-23 21:07:59'),
(7, 'Riko Chet', 'rikochet', 'riko@chet.com', '$2y$10$0VkYnqYuch8TJ4sNI1FV.OgcuDl1f1Yf2txeCZh2yQczB560Oa9/i', 'Miembro', '6225791046', '2018-04-23 22:05:52'),
(8, 'Tobey Maguire', 'tobias', 'tobey@gmail.com', '$2y$10$5eIrNk291KQ2ZyX4BFC6seTjQExyq3Gim/02nwuzw3SbSGDh43Q7a', 'Repartidor', '6225791048', '2018-04-23 23:35:31'),
(10, 'Carlos Carballo', 'carballo', 'carballo@gmail.com', '$2y$10$2q6KBdjmmgKIP6ib6EHOpOm69HUlNf7tFRiDPBv4KhyVHmfidxbgK', 'Repartidor', '6221739331', '2018-04-24 09:20:43'),
(11, 'sebas loco', 'sebas', 'sebas@hotmail.com', '$2y$10$di.41JoPPmLrCevhs3.sy.cQmkHwgxXc4R40KuAxMOvsiHC6l0ZW.', 'Miembro', '6221204560', '2018-04-24 09:21:53'),
(13, 'Chino Vela', 'chino', 'chino@gmail.com', '$2y$10$ejBGPhLdOMnjvKqc8YVGle9KVjVpMrpPN5hYMKHUA9OIonW755/eG', 'Miembro', '6221091678', '2018-04-24 10:17:30'),
(14, 'Edwin Rios', 'edwin', 'edwin@gmail.com', '$2y$10$sKjNHzHWt1JuUPthj0vQZuj2wvwJ8NE3ZcBIimwgMduC0bDTnJj.y', 'Administrador', '6221214524', '2018-04-24 10:47:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `direccion_envio` (`direccion_envio`),
  ADD KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `paquete_id` (`paquete_id`) USING BTREE,
  ADD KEY `repartidor_id` (`repartidor_id`) USING BTREE;

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `envio`
--
ALTER TABLE `envio`
  ADD CONSTRAINT `envio_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `envio_ibfk_2` FOREIGN KEY (`paquete_id`) REFERENCES `paquete` (`id`),
  ADD CONSTRAINT `envio_ibfk_3` FOREIGN KEY (`repartidor_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `envio_ibfk_4` FOREIGN KEY (`direccion_envio`) REFERENCES `direccion` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
