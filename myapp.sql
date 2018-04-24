-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2018 a las 20:04:07
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
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(500) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('Miembro','Administrador') NOT NULL DEFAULT 'Miembro',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `email`, `password`, `rol`, `created_at`) VALUES
(1, 'Enrique Felix', 'enriquefelix876', 'enriquefelix876@gmail.com', 'admin', 'Administrador', '2018-03-15 17:14:51'),
(2, 'Sebas Creisi', 'sebasloco', 'sebasmasmas@hotmail.com', 'sebas', 'Miembro', '2018-03-19 15:00:47'),
(3, 'Rosca Vela', 'roscavela', 'roscavela@gmail.com', '1234', 'Miembro', '2018-04-11 09:36:13'),
(4, 'Enrique  Felix', 'felixfelix', 'enrique_felix123@hotmail.com', 'patopatopato', 'Miembro', '2018-04-23 19:11:17'),
(5, 'Ignacio Libre', 'nacholibre', 'nacho_wwe@gmail.com', 'nachonacho', 'Miembro', '2018-04-23 21:03:53'),
(6, 'Alonso Gomez', 'Alongshoot', 'alngsht@hotmail.com', 'lngsht', 'Miembro', '2018-04-23 21:07:59'),
(7, 'Riko Chet', 'rikochet', 'riko.chet@rikochet.com', 'muchalucha', 'Miembro', '2018-04-23 22:05:52'),
(8, 'Tobey Maguire', 'tobias', 'tobey@gmail.com', 'spider', 'Miembro', '2018-04-23 23:35:31'),
(9, 'rosca puto', 'roscaputo', 'rosca.pp@hotmail.com', 'rosca', 'Miembro', '2018-04-24 09:11:42'),
(10, 'Carlos Carballo', 'carballo', 'carballo@gmail.com', '$2y$10$2q6KBdjmmgKIP6ib6EHOpOm69HUlNf7tFRiDPBv4KhyVHmfidxbgK', 'Miembro', '2018-04-24 09:20:43'),
(11, 'sebas loco', 'sebas', 'sebas@hotmail.com', '$2y$10$di.41JoPPmLrCevhs3.sy.cQmkHwgxXc4R40KuAxMOvsiHC6l0ZW.', 'Miembro', '2018-04-24 09:21:53'),
(12, 'pato', 'pato', 'pato@pato.com', '$2y$10$hWoSbZ.HnY0sQ68K4hBoF.tfp3BktmEqP4C1prTzLZwBoCSMpHyW.', 'Miembro', '2018-04-24 09:28:02'),
(13, 'Chino Vela', 'chino', 'chino@gmail.com', '$2y$10$ejBGPhLdOMnjvKqc8YVGle9KVjVpMrpPN5hYMKHUA9OIonW755/eG', 'Miembro', '2018-04-24 10:17:30'),
(14, 'edwin rios', 'Edwub', 'edwin@gmail.com', '$2y$10$sKjNHzHWt1JuUPthj0vQZuj2wvwJ8NE3ZcBIimwgMduC0bDTnJj.y', 'Miembro', '2018-04-24 10:47:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
