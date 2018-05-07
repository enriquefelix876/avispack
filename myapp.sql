-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2018 a las 10:01:26
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
  `user_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id`, `user_id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 2, 'Prol Av Periferico 14B', 'Nacionalizacion del Golfo de California\r\n85477 Heroica Guaymas, Son', 27.000000, 110.000000, 'domicilio');

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
  `detalle` varchar(200) NOT NULL,
  `estado` enum('Solicitado','En camino','Entregado','Cancelado') NOT NULL DEFAULT 'Solicitado',
  `direccion_envio` int(11) NOT NULL,
  `fecha_pedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_en_camino` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `fecha_entregado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `fecha_cancelado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `envio`
--

INSERT INTO `envio` (`id`, `user_id`, `paquete_id`, `repartidor_id`, `pago`, `detalle`, `estado`, `direccion_envio`, `fecha_pedido`, `fecha_en_camino`, `fecha_entregado`, `fecha_cancelado`) VALUES
(33, 2, 28, 3, '35', '10 Kilos de papas -Super  del norte', 'En camino', 1, '2018-05-06 22:47:09', '2018-05-06 22:50:25', '2018-05-06 22:50:25', '2018-05-06 22:47:09'),
(35, 2, 30, 3, '35', 'Iphone X - Coppel', 'En camino', 1, '2018-05-06 22:51:56', '2018-05-06 22:59:39', '2018-05-06 22:59:39', '2018-05-06 22:51:56'),
(36, 2, 31, 3, '35', 'Hamburguera - Tienda Burbano', 'En camino', 1, '2018-05-06 23:55:46', '2018-05-07 00:02:29', '2018-05-07 00:02:29', '2018-05-06 23:55:46'),
(37, 2, 32, 3, '35', 'Pantalon dockers negro - Coppel', 'En camino', 1, '2018-05-07 00:11:47', '2018-05-07 00:12:53', '2018-05-07 00:12:53', '2018-05-07 00:11:47'),
(38, 2, 33, 3, '35', '12 de tecate - Super Six', 'En camino', 1, '2018-05-07 00:16:51', '2018-05-07 00:17:28', '2018-05-07 00:17:28', '2018-05-07 00:16:51'),
(39, 2, 34, NULL, '35', '', 'Cancelado', 1, '2018-05-07 00:40:56', '2018-05-07 00:54:40', '2018-05-07 00:54:40', '2018-05-07 00:54:40');

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
(28, '10 kilos de papas', '300'),
(30, 'Iphone X', '18000'),
(31, 'Hamburguesa del burbano', '100'),
(32, 'Pantalon talla 34', '400'),
(33, '12 de Tecate', '110'),
(34, 'Guante del infinito', NULL);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

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
