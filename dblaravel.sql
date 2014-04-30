-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2014 a las 22:54:23
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dblaravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidoP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidoM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ci` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acitvo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellidoP`, `apellidoM`, `telefono`, `direccion`, `email`, `ci`, `acitvo`, `created_at`, `updated_at`) VALUES
(2, 'laura L.', 'morato', 'rocha', '67804773', 'villa verde', 'aracely@hotmail.com', '342343', '1', '2014-04-30 21:31:11', '2014-04-30 21:31:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE IF NOT EXISTS `habitacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nro` int(11) NOT NULL,
  `estado` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `acitvo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_habitacion` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `habitacion_id_tipo_habitacion_foreign` (`id_tipo_habitacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id`, `nro`, `estado`, `acitvo`, `id_tipo_habitacion`, `created_at`, `updated_at`) VALUES
(2, 1, 'LIBRE', '1', 2, '2014-04-30 00:52:00', '2014-04-30 01:09:10'),
(3, 2, 'LIBRE', '1', 3, '2014-04-30 00:53:43', '2014-04-30 01:06:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_04_17_174842_crear_cliente', 1),
('2014_04_17_174956_crear_trabajador', 1),
('2014_04_17_175002_crear_tipo_habitacion', 1),
('2014_04_17_175008_crear_tipo_usuario', 1),
('2014_04_17_175027_crear_usuario', 1),
('2014_04_17_175202_crear_reserva', 1),
('2014_04_17_175234_crear_habitacion', 1),
('2014_04_17_175340_crear_pago', 1),
('2014_04_17_175500_crear_reserva_habitacion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `monto` float(8,2) NOT NULL,
  `concepto` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `acitvo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `id_reserva` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `pago_id_reserva_foreign` (`id_reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_reserva` date NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `acitvo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `id_trabajador` int(10) unsigned NOT NULL,
  `id_cliente` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `reserva_id_trabajador_foreign` (`id_trabajador`),
  KEY `reserva_id_cliente_foreign` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_habitacion`
--

CREATE TABLE IF NOT EXISTS `reserva_habitacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_reserva` int(10) unsigned NOT NULL,
  `id_habitacion` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `reserva_habitacion_id_reserva_foreign` (`id_reserva`),
  KEY `reserva_habitacion_id_habitacion_foreign` (`id_habitacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_habitacion`
--

CREATE TABLE IF NOT EXISTS `tipo_habitacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `monto` float(8,2) NOT NULL,
  `acitvo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipo_habitacion`
--

INSERT INTO `tipo_habitacion` (`id`, `nombre`, `descripcion`, `monto`, `acitvo`, `created_at`, `updated_at`) VALUES
(2, 'Matrimonial', 'Habitacion para casados', 200.00, '1', '2014-04-30 00:35:29', '2014-04-30 00:35:29'),
(3, 'Simple', 'solpara una persona', 100.50, '1', '2014-04-30 00:36:29', '2014-04-30 00:36:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(2, 'Recepcionista', 'Encargado de la recepcion de clientes ....', '2014-04-30 20:21:30', '2014-04-30 20:22:19'),
(3, 'Administrador', 'Encargado de administrar todo el sistema', '2014-04-30 20:23:25', '2014-04-30 20:23:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE IF NOT EXISTS `trabajador` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidoP` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidoM` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ci` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acitvo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id`, `nombre`, `apellidoP`, `apellidoM`, `telefono`, `direccion`, `email`, `ci`, `acitvo`, `created_at`, `updated_at`) VALUES
(1, 'jorge', 'Quispe', 'Orihuela', '75619084', 'villa verde', 'jorgeluiz.q@hotmail.com', '342343', '1', '2014-04-26 02:09:45', '2014-04-29 22:43:50'),
(3, 'leidy', 'morato', 'rocha', '67804773', 'villa verde', 'aracely@hotmail.com', '221122', '1', '2014-04-29 22:51:51', '2014-04-29 22:51:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `acitvo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_trabajador` int(10) unsigned NOT NULL,
  `id_tipo_usuario` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `usuario_id_trabajador_foreign` (`id_trabajador`),
  KEY `usuario_id_tipo_usuario_foreign` (`id_tipo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `fecha_creacion`, `acitvo`, `remember_token`, `id_trabajador`, `id_tipo_usuario`, `created_at`, `updated_at`) VALUES
(3, 'jorgeluiz.q@hotmail.com', '$2y$10$G//uy4/Q5vzXHQuHjRygAu3nZ9B4EF6YwKhlL4ftyExPn.aw9j7le', '2014-04-30', '1', '', 1, 3, '2014-04-30 22:43:51', '2014-04-30 22:43:51');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `habitacion_id_tipo_habitacion_foreign` FOREIGN KEY (`id_tipo_habitacion`) REFERENCES `tipo_habitacion` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_id_reserva_foreign` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserva_id_trabajador_foreign` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reserva_habitacion`
--
ALTER TABLE `reserva_habitacion`
  ADD CONSTRAINT `reserva_habitacion_id_habitacion_foreign` FOREIGN KEY (`id_habitacion`) REFERENCES `habitacion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserva_habitacion_id_reserva_foreign` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_id_tipo_usuario_foreign` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuario_id_trabajador_foreign` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
