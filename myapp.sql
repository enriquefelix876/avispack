-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2018 a las 05:37:36
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
  `address` varchar(100) NOT NULL,
  `predeterminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id`, `user_id`, `address`, `predeterminado`) VALUES
(5, 6, 'Isla de Pajaros 18 de noviembre 85470 Guaymas Sonora', 0),
(6, 6, 'Colina baja 8, Las Colinas,  85440, Guaymas Sonora', 1),
(12, 2, 'Colina baja 8, Las Colinas,  85440, Guaymas Sonora', 1);

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
  `fecha_en_camino` datetime NOT NULL,
  `fecha_entregado` datetime NOT NULL,
  `fecha_cancelado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `id` int(11) NOT NULL,
  `contenido` varchar(100) NOT NULL,
  `valor` varchar(10) DEFAULT NULL
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
  `rol` enum('Miembro','Administrador','Repartidor') NOT NULL DEFAULT 'Miembro',
  `phonenumber` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `email`, `password`, `rol`, `phonenumber`, `created_at`) VALUES
(1, 'Enrique Felix', 'enriquefelix876', 'enriquefelix876@gmail.com', '$2y$10$Y6CE5KC0.COSxMnALTEpR.lDCOZYVbfG/57xc6udQpd.e6g6yt2H6', 'Administrador', '6221643493', '2018-03-15 17:14:51'),
(2, 'Sebastian Carmona', 'sebas', 'sebasmasmas@hotmail.com', '$2y$10$exDL3XAltSJt1q6pczfkbuuAj5ZI2FKDGY6rap7mkTvmm3fhEoBme', 'Miembro', '6221556038', '2018-03-19 15:00:47'),
(3, 'Rosca Vela', 'roscavela', 'roscavela@gmail.com', '$2y$10$6nbfH/hItjfJYiKyft9/EerK5TsVUHpRy05Xqxu7Pfye4sXAdipDW', 'Repartidor', '6221449836', '2018-04-11 09:36:13'),
(5, 'Ignacio Libre', 'nacholibre', 'nacho_wwe@gmail.com', '$2y$10$nv9YcWQ2HfXRIbLGewSZEerLCTb1MO3dqWdaUOHk5GM0QD0QBU.2W', 'Miembro', '6221264582', '2018-04-23 21:03:53'),
(6, 'Alonso Gomez', 'Alongshoot', 'alngsht@hotmail.com', '$2y$10$Y1M5LffOu.BSl9qwKIfIM.oVv94VrsHG8yEBZ7lWWeGPkX9Iw7Uf.', 'Miembro', '6221207038', '2018-04-23 21:07:59'),
(8, 'Tobey Maguire', 'tobias', 'tobey@gmail.com', '$2y$10$5eIrNk291KQ2ZyX4BFC6seTjQExyq3Gim/02nwuzw3SbSGDh43Q7a', 'Repartidor', '6225791048', '2018-04-23 23:35:31'),
(10, 'Carlos Carballo', 'carballo', 'carballo@gmail.com', '$2y$10$2q6KBdjmmgKIP6ib6EHOpOm69HUlNf7tFRiDPBv4KhyVHmfidxbgK', 'Repartidor', '6221739331', '2018-04-24 09:20:43'),
(11, 'sebas loco', 'sebasloco', 'sebas@hotmail.com', '$2y$10$di.41JoPPmLrCevhs3.sy.cQmkHwgxXc4R40KuAxMOvsiHC6l0ZW.', 'Miembro', '6221204560', '2018-04-24 09:21:53'),
(13, 'Chino Vela', 'chino', 'chino@gmail.com', '$2y$10$ejBGPhLdOMnjvKqc8YVGle9KVjVpMrpPN5hYMKHUA9OIonW755/eG', 'Miembro', '6221091678', '2018-04-24 10:17:30'),
(14, 'Edwin Rios', 'edwin', 'edwin@gmail.com', '$2y$10$X/EniU33ZQ3FrpNb3JifwOLlNRQFBOVMCguys9mqY6Av.UpNeu22u', 'Administrador', '6221214524', '2018-04-24 10:47:23');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
