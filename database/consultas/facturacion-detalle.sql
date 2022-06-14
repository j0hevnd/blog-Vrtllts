-- phpMyAdmin SQL Dump
-- version 4.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2020 a las 15:42:13
-- Versión del servidor: 10.5.5-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `fotos_vll`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE DATABASE fotos_vll;

USE fotos_vll;

CREATE TABLE IF NOT EXISTS `facturacion` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `fact_prefijo` varchar(10) NOT NULL,
  `fact_consecutivo` int(11) NOT NULL,
  `referencia_1` varchar(100) DEFAULT NULL,
  `referencia_2` varchar(100) DEFAULT NULL,
  `contacto_venta` varchar(100) DEFAULT NULL COMMENT 'Indica la forma de contacto de la venta. Marketing.',
  `id_tercero` int(11) NOT NULL,
  `fecha_realizacion` date NOT NULL,
  `hora_realizacion` time DEFAULT NULL,
  `observacion` mediumtext DEFAULT NULL,
  `vencimiento` date DEFAULT NULL,
  `id_usuario_elimina` int(11) DEFAULT NULL,
  `fecha_cancelacion` datetime DEFAULT NULL,
  `observacion_cancelacion` longtext DEFAULT NULL,
  `tipo_pago` varchar(10) DEFAULT '0' COMMENT 'Credito | Pago de contado',
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_factura`),
  KEY `fk_facturacion_cliente_idx` (`id_tercero`),
  KEY `comp_fact` (`fact_consecutivo`,`fact_prefijo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`id_factura`, `fact_prefijo`, `fact_consecutivo`, `referencia_1`, `referencia_2`, `contacto_venta`, `id_tercero`, `fecha_realizacion`, `hora_realizacion`, `observacion`, `vencimiento`, `id_usuario_elimina`, `fecha_cancelacion`, `observacion_cancelacion`, `tipo_pago`, `estado`) VALUES
(1, 'FACT', 1, 'BTOB', '', NULL, 1, '2020-05-25', '19:59:08', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(2, 'BTOB', 65, 'GENERA', '', NULL, 1, '2020-05-25', '20:00:13', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(3, 'FACT', 2, 'GENERAL', '', NULL, 1, '2020-05-25', '20:03:50', '', '2020-05-31', NULL, NULL, NULL, 'Crédito', 1),
(4, 'FACT', 3, 'sdffsdf', '', NULL, 1, '2020-05-25', '20:23:50', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(5, 'FACT', 4, 'd', '', NULL, 1, '2020-05-25', '20:45:32', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(6, 'BTOB', 66, 'dad', '', NULL, 1, '2020-05-25', '20:53:01', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(7, 'FACT', 5, '', '', NULL, 3, '2020-05-26', '18:18:25', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(8, 'FACT', 6, '', '', NULL, 1, '2020-06-19', '22:47:11', 'Servicio Sistema de Facturación Mercury Express Web. Desde 2020-06-18 hasta 2021-06-18 - Referencia Pedido: 204', NULL, NULL, NULL, NULL, 'Contado', 1),
(9, 'FACT', 7, 'Pedido: 204', '', NULL, 15, '2020-06-22', '17:41:39', 'Servicio Sistema de Facturación Mercury Express Web. Desde 2020-06-18 hasta 2021-06-18 - Referencia Pedido: 204', NULL, NULL, NULL, NULL, 'Contado', 1),
(10, 'FACT', 8, 'Pedido: 204', '', NULL, 15, '2020-06-22', '17:46:34', 'Servicio Sistema de Facturación Mercury Express Web. Desde 2020-06-18 hasta 2021-06-18 - Referencia Pedido: 204', NULL, NULL, NULL, NULL, 'Contado', 1),
(11, 'FACT', 9, 'Pedido: 204', 'MEW Compra Online', NULL, 16, '2020-06-22', '17:52:03', 'Servicio Sistema de Facturación Mercury Express Web. Desde 2020-06-18 hasta 2021-06-18 - Referencia Pedido: 204', NULL, NULL, NULL, NULL, 'Contado', 1),
(12, 'FACT', 10, 'Pedido: 204', 'MEW Compra Online', NULL, 17, '2020-06-22', '17:54:20', 'Servicio Sistema de Facturación Mercury Express Web. Desde 2020-06-18 hasta 2021-06-18 - Referencia Pedido: 204', NULL, NULL, NULL, NULL, 'Contado', 1),
(13, 'FACT', 11, 'Pedido: 204', 'MEW Compra Online', NULL, 18, '2020-06-22', '17:56:54', 'Servicio Sistema de Facturación Mercury Express Web. Desde 2020-06-18 hasta 2021-06-18 - Referencia Pedido: 204', NULL, NULL, NULL, NULL, 'Contado', 1),
(14, 'FACT', 12, 'Pedido: 204', 'MEW Compra Online', NULL, 19, '2020-06-22', '17:58:53', 'Servicio Sistema de Facturación Mercury Express Web. Desde 2020-06-18 hasta 2021-06-18 - Referencia Pedido: 204', NULL, NULL, NULL, NULL, 'Contado', 1),
(15, 'FACT', 13, 'Pedido: 204', 'MEW Compra Online', NULL, 22, '2020-06-22', '18:09:36', 'Servicio Sistema de Facturación Mercury Express Web. Desde 2020-06-18 hasta 2021-06-18 - Referencia Pedido: 204', NULL, NULL, NULL, NULL, 'Contado', 1),
(16, 'FACT', 14, '', '', NULL, 1, '2020-06-28', '12:21:38', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(17, 'FACT', 15, '', '', NULL, 1, '2020-06-28', '12:23:01', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(18, 'FACT', 16, '', '', NULL, 1, '2020-06-28', '12:23:12', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(19, 'FACT', 17, '', '', NULL, 1, '2020-06-28', '12:23:23', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(20, 'FACT', 18, '', '', NULL, 1, '2020-06-28', '15:03:55', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(21, 'FACT', 19, '', '', NULL, 1, '2020-06-28', '15:05:46', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(22, 'FACT', 20, '', '', NULL, 1, '2020-06-28', '15:10:33', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(23, 'FACT', 21, 'TEST', '', NULL, 1, '2020-08-15', '21:06:41', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(24, 'FACT', 22, 'TEST', '', NULL, 1, '2020-08-15', '21:30:55', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(25, 'FACT', 23, 'TEST', '', NULL, 1, '2020-08-15', '21:56:07', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(26, 'FACT', 24, 'ML', '', NULL, 1, '2020-08-16', '14:34:05', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(27, 'FACT', 25, 'ML', '', NULL, 1, '2020-08-16', '14:53:13', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(28, 'FACT', 26, 'ML', '', NULL, 1, '2020-08-16', '14:54:35', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(29, 'FACT', 27, 'ML', '', NULL, 1, '2020-08-16', '15:31:49', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(31, 'FACT', 29, 'ML', '', NULL, 1, '2020-08-16', '15:32:45', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(33, 'FACT', 31, 'ML', '', NULL, 1, '2020-08-16', '17:01:44', '', NULL, NULL, NULL, NULL, 'Contado', 1),
(34, 'FACT', 32, 'TEST', '', NULL, 1, '2020-08-16', '17:02:17', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(39, 'FACT', 37, 'TEST', '', NULL, 1, '2020-08-16', '17:09:14', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(45, 'FACT', 43, 'TEST', '', NULL, 1, '2020-08-16', '17:51:17', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(47, 'FACT', 45, 'TEST', '', NULL, 1, '2020-08-16', '18:03:25', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(52, 'FACT', 50, 'TEST', '', NULL, 1, '2020-08-16', '18:19:25', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(53, 'FACT', 51, 'TEST', '', NULL, 1, '2020-08-16', '18:20:16', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(54, 'FACT', 52, 'TEST', '', NULL, 1, '2020-08-16', '18:21:42', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(55, 'FACT', 53, 'TEST', '', NULL, 1, '2020-08-16', '18:22:30', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(56, 'FACT', 54, 'TEST', '', NULL, 1, '2020-08-22', '21:25:48', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(57, 'FACT', 55, 'TEST', '', NULL, 1, '2020-08-23', '23:57:49', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(64, 'FACT', 62, 'TEST', '', NULL, 1, '2020-08-24', '00:04:53', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(69, 'FACT', 67, 'TEST', '', NULL, 1, '2020-08-24', '00:08:20', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(71, 'FACT', 69, 'TEST', '', NULL, 1, '2020-08-24', '00:10:21', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(74, 'FACT', 72, 'TEST', '', NULL, 1, '2020-08-24', '00:14:42', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(75, 'FACT', 73, 'TEST', '', NULL, 1, '2020-08-24', '00:15:14', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(77, 'FACT', 75, 'TEST', '', NULL, 1, '2020-08-26', '20:49:02', 'test', NULL, NULL, NULL, NULL, 'Contado', 1),
(78, 'FACT', 76, '', '', NULL, 3, '2020-09-01', '20:34:00', '', NULL, NULL, NULL, NULL, 'Contado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion_detalle`
--

CREATE TABLE IF NOT EXISTS `facturacion_detalle` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_factura` int(11) NOT NULL,
  `sku` varchar(45) NOT NULL,
  `observacion` varchar(100) DEFAULT NULL,
  `nombre_item` varchar(100) NOT NULL,
  `precio_unitario` double(12,2) unsigned NOT NULL,
  `costo_unitario` double(12,2) unsigned NOT NULL,
  `cantidad` double(12,2) unsigned NOT NULL,
  `descuento` double(12,2) unsigned NOT NULL DEFAULT 0.00,
  `iva` double(12,2) unsigned NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `fk_facturacion_detalle_facturacion1_idx` (`id_factura`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

--
-- Volcado de datos para la tabla `facturacion_detalle`
--

INSERT INTO `facturacion_detalle` (`id_detalle`, `id_factura`, `sku`, `observacion`, `nombre_item`, `precio_unitario`, `costo_unitario`, `cantidad`, `descuento`, `iva`) VALUES
(1, 1, '1002', NULL, 'XBOX', 1606853.78, 1285483.00, 2.00, 160685.38, 274772.00),
(2, 2, '1002', NULL, 'XBOX', 1606853.78, 1285483.00, 1.00, 0.00, 305302.22),
(3, 3, '1004', NULL, 'DREAMCAST', 100000.00, 349648.06, 1.00, 0.00, 19000.00),
(4, 3, '1002', NULL, 'XBOX', 1606853.78, 1285483.00, 1.00, 0.00, 305302.22),
(5, 4, '1004', NULL, 'DREAMCAST', 160684.87, 349648.06, 10.00, 0.00, 30530.13),
(6, 5, '1004', NULL, 'DREAMCAST', 160684.87, 349648.06, 2.00, 0.00, 30530.13),
(7, 6, '1004', NULL, 'DREAMCAST', 1606853.78, 349648.06, 1.00, 0.00, 305302.22),
(8, 7, '1002', NULL, 'XBOX', 1606853.78, 1285483.00, 1.00, 0.00, 305302.22),
(9, 8, '1003', NULL, 'XBOX', 1606853.78, 1285483.00, 1.00, 0.00, 305302.22),
(10, 8, 'P151-19', NULL, 'BATERIA PORTATIL L11L6Y01 (G405) 1 11S121', 15536.97, 1000.00, 1.00, 0.00, 2952.03),
(11, 8, '1004', NULL, 'DREAMCAST', 100000.00, 20100.35, 1.00, 10000.00, 17100.00),
(12, 9, 'MEW-MESES-12', NULL, 'SERVICIOS MERCURY EXPRESS WEB ANUAL', 50000.00, 0.00, 1.00, 0.00, 0.00),
(13, 10, 'MEW-MESES-12', NULL, 'SERVICIOS MERCURY EXPRESS WEB ANUAL', 50000.00, 0.00, 1.00, 0.00, 0.00),
(14, 11, 'MEW-MESES-12', NULL, 'SERVICIOS MERCURY EXPRESS WEB ANUAL', 50000.00, 0.00, 1.00, 0.00, 0.00),
(15, 12, 'MEW-MESES-12', NULL, 'SERVICIOS MERCURY EXPRESS WEB ANUAL', 50000.00, 0.00, 1.00, 0.00, 0.00),
(16, 13, 'MEW-MESES-12', NULL, 'SERVICIOS MERCURY EXPRESS WEB ANUAL', 50000.00, 0.00, 1.00, 0.00, 0.00),
(17, 14, 'MEW-MESES-12', NULL, 'SERVICIOS MERCURY EXPRESS WEB ANUAL', 50000.00, 0.00, 1.00, 0.00, 0.00),
(18, 15, 'MEW-MESES-12', NULL, 'SERVICIOS MERCURY EXPRESS WEB ANUAL', 50000.00, 0.00, 1.00, 0.00, 0.00),
(19, 16, '1002', NULL, 'XBOX', 1606853.78, 1285483.00, 1.00, 0.00, 305302.22),
(20, 17, '1003', NULL, 'XBOX', 1606853.78, 1285483.00, 1.00, 0.00, 305302.22),
(21, 18, '1003', NULL, 'XBOX', 1606853.78, 1285483.00, 1.00, 0.00, 305302.22),
(22, 19, '1003', NULL, 'XBOX', 1606853.78, 1285483.00, 1.00, 0.00, 305302.22),
(23, 20, '1002', NULL, 'XBOX', 1606853.78, 1285483.00, 2.00, 0.00, 305302.22),
(24, 21, '1003', NULL, 'XBOX', 1606853.78, 1285483.00, 1.00, 0.00, 305302.22),
(25, 22, '1003', NULL, 'XBOX', 1606853.78, 1285276.95, 2.00, 0.00, 305302.22),
(26, 23, '7703166002613', NULL, 'ACEITE DE ALMENDRAS NATURAL  FCO 450 mL', 12352.94, 7977.76, 1.00, 0.00, 2347.06),
(27, 23, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 547.00, 1.00, 0.00, 127.73),
(28, 24, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 861.00, 1.00, 123.53, 2323.59),
(29, 24, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 547.00, 1.00, 0.00, 127.73),
(30, 25, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 861.00, 1.00, 123.53, 2323.59),
(31, 25, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 547.00, 18.00, 0.00, 127.73),
(32, 26, 'MEW-MESES-12', NULL, 'SERVICIOS MERCURY EXPRESS WEB ANUAL', 79900.00, 0.00, 1.00, 0.00, 0.00),
(33, 27, 'MEW-MESES-12', NULL, 'SERVICIOS MERCURY EXPRESS WEB ANUAL', 79900.00, 0.00, 1.00, 0.00, 0.00),
(34, 28, 'MEW-MESES-12', NULL, 'SERVICIOS MERCURY EXPRESS WEB ANUAL', 79900.00, 0.00, 1.00, 799.00, 0.00),
(35, 29, 'MEW-MESES-12', NULL, 'SERVICIOS MERCURY EXPRESS WEB ANUAL', 79900.00, 0.00, 1.00, 799.00, 0.00),
(36, 31, 'MEW-MESES-12', NULL, 'SERVICIOS MERCURY EXPRESS WEB ANUAL', 79900.00, 0.00, 1.00, 799.00, 0.00),
(37, 33, 'MEW-MESES-12', NULL, 'SERVICIOS MERCURY EXPRESS WEB ANUAL', 79900.00, 0.00, 1.00, 799.00, 0.00),
(38, 34, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 861.00, 1.00, 123.53, 2323.59),
(39, 34, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 592.58, 1.00, 0.00, 127.73),
(40, 35, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 861.00, 1.00, 123.53, 2323.59),
(41, 36, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 861.00, 1.00, 123.53, 2323.59),
(42, 37, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 861.00, 1.00, 123.53, 2323.59),
(43, 39, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 1000.00, 1.00, 123.53, 2323.59),
(44, 39, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 14984.17, 1.00, 0.00, 127.73),
(45, 41, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 1000.00, 1.00, 123.53, 2323.59),
(46, 41, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 14984.17, 1.00, 0.00, 127.73),
(47, 45, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 1000.00, 1.00, 123.53, 2323.59),
(48, 45, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 14984.17, 1.00, 0.00, 127.73),
(49, 47, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 1000.00, 1.00, 123.53, 2323.59),
(50, 47, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 14984.17, 1.00, 0.00, 127.73),
(51, 52, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 1000.00, 1.00, 123.53, 2323.59),
(52, 52, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 14984.17, 1.00, 0.00, 127.73),
(53, 56, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 1000.00, 1.00, 123.53, 2323.59),
(54, 56, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 14984.17, 1.00, 0.00, 127.73),
(55, 57, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 1000.00, 1.00, 123.53, 2323.59),
(56, 57, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 14984.17, 1.00, 0.00, 127.73),
(57, 61, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 1000.00, 1.00, 123.53, 2323.59),
(58, 62, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 1000.00, 1.00, 123.53, 2323.59),
(60, 64, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 1000.00, 1.00, 123.53, 2323.59),
(61, 64, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 14984.17, 1.00, 0.00, 127.73),
(66, 69, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 1000.00, 1.00, 123.53, 2323.59),
(67, 69, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 14984.17, 1.00, 0.00, 127.73),
(69, 71, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 1000.00, 1.00, 123.53, 2323.59),
(70, 71, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 14984.17, 1.00, 0.00, 127.73),
(73, 74, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 1000.00, 1.00, 123.53, 2323.59),
(74, 74, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 14984.17, 1.00, 0.00, 127.73),
(75, 75, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 1000.00, 1.00, 123.53, 2323.59),
(76, 75, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 14984.17, 1.00, 0.00, 127.73),
(78, 77, '7702354946524', NULL, 'TRATAMIENTO NUTRIBELA10 CAUTERIZACION  BOLSA 27ml', 12352.94, 1000.00, 1.00, 123.53, 2323.59),
(79, 77, '7702006205542', NULL, 'DESOD REXONA CLINICAL HOMBRE  BOLSA 8,5gr', 672.27, 14984.17, 1.00, 0.00, 127.73),
(80, 78, 'P151-1909', NULL, 'BATERIA PORTATIL L11L6Y01 (G405) 1 11S121500042ZA003535YR', 15537.00, 15236.36, 1.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tercero`
--

CREATE TABLE IF NOT EXISTS `tercero` (
  `id_tercero` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_obligacion` varchar(50) DEFAULT NULL,
  `zona_postal` varchar(10) DEFAULT NULL,
  `id_grupo` int(11) NOT NULL,
  `tipo_pago_predeterminado` varchar(5) NOT NULL,
  `tipo_documento` varchar(5) NOT NULL COMMENT 'CC - CE - TI - NUIP - NIT',
  `documento` varchar(18) NOT NULL,
  `genero` varchar(1) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `tel_celular` varchar(30) DEFAULT NULL,
  `tel_fijo` varchar(30) DEFAULT NULL,
  `pais` varchar(40) DEFAULT NULL,
  `pais_estado` varchar(30) NOT NULL,
  `pais_ciudad` varchar(30) NOT NULL,
  `barrio` varchar(40) DEFAULT NULL,
  `direccion` varchar(60) NOT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  `es_cliente` tinyint(1) NOT NULL,
  `es_proveedor` tinyint(1) NOT NULL DEFAULT 0,
  `es_vendedor` tinyint(1) NOT NULL DEFAULT 0,
  `es_cobrador` tinyint(1) NOT NULL DEFAULT 0,
  `es_empleado` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_registro` datetime NOT NULL,
  `usuario_registra` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `usuario_nombre_elimina` varchar(50) DEFAULT NULL,
  `fecha_elimina` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tercero`),
  UNIQUE KEY `documento_UNIQUE` (`documento`,`tipo_documento`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `tercero`
--

INSERT INTO `tercero` (`id_tercero`, `tipo_obligacion`, `zona_postal`, `id_grupo`, `tipo_pago_predeterminado`, `tipo_documento`, `documento`, `genero`, `nombre`, `apellido`, `email`, `tel_celular`, `tel_fijo`, `pais`, `pais_estado`, `pais_ciudad`, `barrio`, `direccion`, `observacion`, `es_cliente`, `es_proveedor`, `es_vendedor`, `es_cobrador`, `es_empleado`, `fecha_registro`, `usuario_registra`, `estado`, `usuario_nombre_elimina`, `fecha_elimina`) VALUES
(1, 'NO RESPONSABLE DE IVA', NULL, 0, '', 'CC', '1038107049', 'M', 'Harold', 'Castañeda', 'har.alex89@gmail.com', '', '3117036986', 'COLOMBIA', 'ANTIOQUIA', 'MEDELLIN', '', 'CR 48C # 16 SUR - 30', '', 1, 1, 0, 0, 0, '2020-08-16 19:48:30', 'Pruebas Mercury ERP', 1, NULL, NULL),
(2, 'NO RESPONSABLE DE IVA', NULL, 0, '', 'CC', '1038098557', '', 'Patricia', 'Guerra', 'patriguerre01@gmail.com', '3053249405', '4884118', 'COLOMBIA', 'ANTIOQUIA', 'MEDELLIN', '', 'Cra 6 # 11-40', '', 0, 0, 1, 0, 0, '2020-05-25 11:43:23', 'Pruebas Mercury ERP', 1, NULL, NULL),
(3, 'NO RESPONSABLE DE IVA', NULL, 0, '', 'CC', '1', 'M', 'Ventas', 'Genera', 'har.alex89@gmail.com', '3117036986', '4884118', 'COLOMBIA', 'ANTIOQUIA', 'CAUCASIA', '', 'Cra 6 # 11-40', '', 1, 0, 1, 0, 0, '2020-06-22 17:34:22', 'Pruebas Mercury ERP', 1, NULL, NULL),
(4, 'IMPUESTO SOBRE LAS VENTAS - IVA', NULL, 0, '', 'CC', '2', 'M', 'VENTAS', 'BTB', 'har.alex89@gmail.com', '12345', '123', 'COLOMBIA', 'ANTIOQUIA', 'CAUCASIA', '', 'ca', '', 0, 1, 0, 0, 0, '2020-05-25 19:43:54', 'Pruebas Mercury ERP', 1, NULL, NULL),
(5, 'NO RESPONSABLE DE IVA', NULL, 0, '', 'CC', '3', '', 'ventas', 'mostrador', 'har.alex89@gmail.com', '1321', '3117036986', 'COLOMBIA', 'ANTIOQUIA', 'CAUCASIA', '', 'ca', '', 0, 1, 0, 0, 0, '2020-05-25 19:45:29', 'Pruebas Mercury ERP', 1, NULL, NULL),
(6, 'IMPUESTO SOBRE LAS VENTAS - IVA', NULL, 0, '', 'TI', '5728874', '', 'RAFAEL', 'AS', 'RAFAEL.GIRALDO.VALEJO@gmail.com', '3161642414', '5845619', 'COLOMBIA', 'CALDAS', 'AGUADAS', '', 'FAFAS', '', 1, 0, 0, 0, 0, '2020-05-27 22:24:04', 'Pruebas Mercury ERP', 1, NULL, NULL),
(7, '', NULL, 0, '', 'CC', '23131231', '', 'DEASD', 'aa', '', '', '33', 'COLOMBIA', '', '', '', '', '', 1, 0, 0, 0, 0, '2020-06-16 16:40:24', 'Pruebas Mercury ERP', 1, NULL, NULL),
(8, '', NULL, 0, '', '', '2313123', '', 'DEASD', '', '', '', '', 'COLOMBIA', '', '', '', '', '', 1, 0, 0, 0, 0, '2020-06-16 16:40:41', 'Junior', 1, NULL, NULL),
(9, '', NULL, 0, '', '', '3123', '', 'fads', '', '', '', '', 'COLOMBIA', '', '', '', '', '', 1, 0, 0, 0, 0, '2020-06-16 16:43:19', 'Junior', 1, NULL, NULL),
(10, '', NULL, 0, '', '', '112', '', 'sad', '', '', '', '', 'COLOMBIA', '', '', '', '', '', 1, 0, 0, 0, 0, '2020-06-16 16:44:31', 'Junior', 1, NULL, NULL),
(11, 'NO RESPONSABLE DE IVA', NULL, 0, '', 'CC', '1222', '', 'a', 'b', 'f', 'd', 'c', 'COLOMBIA', 'ARAUCA', 'CRAVO NORTE', '', 'asf', 'fa', 1, 0, 0, 0, 0, '2020-06-16 17:16:57', 'Junior', 1, NULL, NULL),
(12, 'NO RESPONSABLE DE IVA', NULL, 0, '', 'CC', '100', '', 'fa', 'fa', 'fa', 'fa', 'fa', 'COLOMBIA', 'ANTIOQUIA', 'AMALFI', '', 'af', 'fa', 1, 0, 0, 0, 0, '2020-06-22 14:48:35', 'Junior', 1, NULL, NULL),
(13, '', NULL, 0, '', 'NIT', '10381236542', '-', 'Harold', 'Castañeda', '', '3117036986', '', 'COLOMBIA', '', '', '', '', 'Cuenta Asociada: 27', 1, 0, 0, 0, 0, '2020-06-22 17:24:17', 'integracion', 1, NULL, NULL),
(14, '', NULL, 0, '', 'CC', '101', '-', 'Harold', 'Castañeda', 'har.alex05@gmail.com', '3117036986', '', 'COLOMBIA', '', '', '', '', 'Cuenta Asociada: 30', 1, 0, 0, 0, 0, '2020-06-22 17:39:23', 'integracion', 1, NULL, NULL),
(15, '', NULL, 0, '', 'CC', '102', '-', 'Harold', 'Castañeda', 'har.alex06@gmail.com', '3117036986', '', 'COLOMBIA', '', '', '', '', 'Cuenta Asociada: 31', 1, 0, 0, 0, 0, '2020-06-22 17:41:39', 'integracion', 1, NULL, NULL),
(16, '', NULL, 0, '', 'CC', '103', '-', 'Harold', 'Castañeda', 'har.alex07@gmail.com', '3117036986', '', 'COLOMBIA', '', '', '', '', 'Cuenta Asociada: 32', 1, 0, 0, 0, 0, '2020-06-22 17:52:03', 'integracion', 1, NULL, NULL),
(17, '', NULL, 0, '', 'CC', '104', '-', 'Harold', 'Castañeda', 'har.alex08@gmail.com', '3117036986', '', 'COLOMBIA', '', '', '', '', 'Cuenta Asociada: 33', 1, 0, 0, 0, 0, '2020-06-22 17:54:20', 'integracion', 1, NULL, NULL),
(18, '', NULL, 0, '', 'CC', '105', '-', 'Harold', 'Castañeda', 'har.alex09@gmail.com', '3117036986', '', 'COLOMBIA', '', '', '', '', 'Cuenta Asociada: 34', 1, 0, 0, 0, 0, '2020-06-22 17:56:54', 'integracion', 1, NULL, NULL),
(19, '', NULL, 0, '', 'CC', '107', '-', 'Harold', 'Castañeda', 'har.alex20@gmail.com', '3117036986', '', 'COLOMBIA', '', '', '', '', 'Cuenta Asociada: 35', 1, 0, 0, 0, 0, '2020-06-22 17:58:52', 'integracion', 1, NULL, NULL),
(20, '', NULL, 0, '', 'CC', '108', '-', 'Harold', 'Castañeda', 'har.alex20@gmail.com', '3117036986', '', 'COLOMBIA', '', '', '', '', 'Cuenta Asociada: 35', 1, 0, 0, 0, 0, '2020-06-22 18:08:21', 'integracion', 1, NULL, NULL),
(21, '', NULL, 0, '', 'CC', '109', '-', 'Harold', 'Castañeda', 'har.alex20@gmail.com', '3117036986', '', 'COLOMBIA', '', '', '', '', 'Cuenta Asociada: 35', 1, 0, 0, 0, 0, '2020-06-22 18:08:59', 'integracion', 1, NULL, NULL),
(22, '', NULL, 0, '', 'CC', '110', '-', 'Harold', 'Castañeda', 'har.alex01@gmail.com', '3117036986', '', 'COLOMBIA', '', '', '', '', 'Cuenta Asociada: 36', 1, 0, 0, 0, 0, '2020-06-22 18:09:36', 'integracion', 1, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
