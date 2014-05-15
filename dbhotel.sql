-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2014 a las 16:11:02
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dbhotel`
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
  `activo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellidoP`, `apellidoM`, `telefono`, `direccion`, `email`, `ci`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'leidy laura', 'morato', 'rocha', '67804773', 'villa verde', 'aracely@hotmail.com', '848545454', '1', '2014-05-12 19:44:54', '2014-05-12 19:44:54'),
(2, 'Diego A.', 'Valdivia', 'Vasquez', '87485596', 'villa verde', 'dieguito@hotmail.com', '55544466', '1', '2014-05-12 19:45:56', '2014-05-12 19:45:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE IF NOT EXISTS `habitacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nro` int(11) NOT NULL,
  `estado` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `activo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_habitacion` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `habitacion_id_tipo_habitacion_foreign` (`id_tipo_habitacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`id`, `nro`, `estado`, `activo`, `id_tipo_habitacion`, `created_at`, `updated_at`) VALUES
(1, 1, 'LIBRE', '1', 4, '2014-05-12 20:23:59', '2014-05-14 01:31:26'),
(2, 2, 'LIBRE', '1', 6, '2014-05-12 23:31:24', '2014-05-12 23:31:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion_reserva`
--

CREATE TABLE IF NOT EXISTS `habitacion_reserva` (
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
('2014_04_17_175002_crear_moneda', 1),
('2014_04_17_175002_crear_tipo_habitacion', 1),
('2014_04_17_175008_crear_tipo_usuario', 1),
('2014_04_17_175027_crear_usuario', 1),
('2014_04_17_175202_crear_reserva', 1),
('2014_04_17_175234_crear_habitacion', 1),
('2014_04_17_175340_crear_pago', 1),
('2014_04_17_175340_crear_precio', 1),
('2014_04_17_175500_crear_reserva_habitacion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda`
--

CREATE TABLE IF NOT EXISTS `moneda` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `simbolo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `moneda`
--

INSERT INTO `moneda` (`id`, `nombre`, `pais`, `simbolo`, `created_at`, `updated_at`) VALUES
(5, 'Bolivianos', 'Bolivia', 'Bs.-', '2014-05-08 02:16:45', '2014-05-08 02:16:45'),
(6, 'Reales', 'Brasil', '$R.-', '2014-05-12 23:46:17', '2014-05-12 23:46:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `monto` float(8,2) NOT NULL,
  `concepto` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `activo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `id_reserva` int(10) unsigned NOT NULL,
  `id_moneda` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `pago_id_reserva_foreign` (`id_reserva`),
  KEY `pago_id_moneda_foreign` (`id_moneda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE IF NOT EXISTS `precio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `monto` float(8,2) NOT NULL,
  `id_moneda` int(10) unsigned NOT NULL,
  `id_tipo_habitacion` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `precio_id_moneda_foreign` (`id_moneda`),
  KEY `precio_id_tipo_habitacion_foreign` (`id_tipo_habitacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `precio`
--

INSERT INTO `precio` (`id`, `monto`, `id_moneda`, `id_tipo_habitacion`, `created_at`, `updated_at`) VALUES
(1, 200.00, 5, 4, '2014-05-12 20:24:39', '2014-05-13 19:07:09'),
(2, 250.00, 6, 4, '2014-05-13 19:07:09', '2014-05-13 19:07:09'),
(3, 150.00, 5, 6, '2014-05-13 19:15:40', '2014-05-13 19:15:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_entrada` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `estado_pago` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dias` int(10) NOT NULL,
  `total` float(8,2) NOT NULL,
  `activo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
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
-- Estructura de tabla para la tabla `tipo_habitacion`
--

CREATE TABLE IF NOT EXISTS `tipo_habitacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tipo_habitacion`
--

INSERT INTO `tipo_habitacion` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(4, 'Matrimonial', 'Habitacion para 2 personas....', '2014-05-07 19:59:06', '2014-05-07 19:59:06'),
(6, 'Singular', 'Habitacion para una persona...', '2014-05-08 01:31:15', '2014-05-08 01:31:15');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrador', 'Encargado de gestiona las funcionalidades del sitema en actual.', '2014-05-02 19:38:23', '2014-05-02 19:38:23');

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
  `activo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id`, `nombre`, `apellidoP`, `apellidoM`, `telefono`, `direccion`, `email`, `ci`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Jorge Luis ', 'Quispe', 'Oriehula', '75619084', 'villa verde', 'jorgeluiz.q@hotmail.com', '5392888 sz', '1', '2014-05-02 19:33:16', '2014-05-02 19:33:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `id_trabajador` int(10) unsigned NOT NULL,
  `id_tipo_usuario` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_email_unique` (`email`),
  KEY `usuario_id_trabajador_foreign` (`id_trabajador`),
  KEY `usuario_id_tipo_usuario_foreign` (`id_tipo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `fecha_creacion`, `remember_token`, `activo`, `id_trabajador`, `id_tipo_usuario`, `created_at`, `updated_at`) VALUES
(1, 'jorgeluiz.q@hotmail.com', '$2y$10$wHrTVQGN07n03n/CGZKJx.19k32JIu8xH6tooY5vKAKQrCCvFfTby', '2014-05-02', '3drkDwCcn7zeGUmjJlEcqa3Dw1FEpiz48PwP7ZbZWDjg1ubSHCGrYpZctJfU', '1', 1, 1, '2014-05-02 19:43:08', '2014-05-14 02:25:06');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `habitacion_id_tipo_habitacion_foreign` FOREIGN KEY (`id_tipo_habitacion`) REFERENCES `tipo_habitacion` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `habitacion_reserva`
--
ALTER TABLE `habitacion_reserva`
  ADD CONSTRAINT `reserva_habitacion_id_habitacion_foreign` FOREIGN KEY (`id_habitacion`) REFERENCES `habitacion` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserva_habitacion_id_reserva_foreign` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_id_moneda_foreign` FOREIGN KEY (`id_moneda`) REFERENCES `moneda` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pago_id_reserva_foreign` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `precio`
--
ALTER TABLE `precio`
  ADD CONSTRAINT `precio_id_moneda_foreign` FOREIGN KEY (`id_moneda`) REFERENCES `moneda` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `precio_id_tipo_habitacion_foreign` FOREIGN KEY (`id_tipo_habitacion`) REFERENCES `tipo_habitacion` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reserva_id_trabajador_foreign` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_id_tipo_usuario_foreign` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuario_id_trabajador_foreign` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
