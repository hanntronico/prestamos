-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-11-2018 a las 17:34:56
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdprestacix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `cate_descrip` varchar(50) NOT NULL,
  `categ_observ` varchar(30) NOT NULL,
  `categ_periodo` int(11) NOT NULL,
  `categ_plazo` int(3) NOT NULL,
  `categ_interes` decimal(10,2) NOT NULL,
  `categ_estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `cate_descrip`, `categ_observ`, `categ_periodo`, `categ_plazo`, `categ_interes`, `categ_estado`) VALUES
(1, 'General', 'categoria para todos', 30, 1, '12.00', 1),
(2, 'Clientes antiguos', 'solo los clientes antiguos', 30, 2, '10.00', 1),
(3, 'jimmy', 'esta categoría es nueva', 30, 1, '10.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `codCliente` int(11) NOT NULL,
  `nomClie` varchar(50) NOT NULL,
  `apepatClie` varchar(50) NOT NULL,
  `apematClie` varchar(50) NOT NULL,
  `nroDNI` varchar(10) NOT NULL,
  `fecNac` date NOT NULL,
  `nroSec` varchar(20) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `direccion` varchar(150) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nomInbox` varchar(50) DEFAULT NULL,
  `estClie` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`codCliente`, `nomClie`, `apepatClie`, `apematClie`, `nroDNI`, `fecNac`, `nroSec`, `telefono`, `direccion`, `facebook`, `email`, `nomInbox`, `estClie`) VALUES
(1, 'HUMBERTO', 'CUEVAS', 'PRESLEY', '15634896', '1990-05-26', NULL, '979640010', '', '', 'bcuevas@gmail.com', '', 1),
(2, 'JOE', 'COCKER', 'GARCíA', '45132153', '1984-07-25', NULL, '979656622', '', '', 'jcocker@hotmail.com', '', 1),
(4, 'JHON', 'DOE', 'DUS', '7994564564', '1970-11-10', NULL, '979797987', '', '', 'poadfsdfsd', '', 1),
(6, 'CONSUELO', 'BERNAL', 'PITTA', '0021461', '1973-10-24', NULL, '9989431265', '', '', 'adfad@fsfsdf', '', 1),
(7, 'RAUL', 'ESPINOZA', 'MEDRANO', '46654613', '1956-01-01', NULL, '987984656', '', '', '', '', 1),
(14, 'ROSA', 'CASTRO', 'RIVERA', '84654654', '1990-07-11', NULL, '979878888', 'Av. general nro 979', 'https://web.facebook.com/Rosa.Castro6', 'rcastror@hotmail.com', '', 1),
(9, 'JOSE', 'IGNACIO', 'PéREZ', '5454646465', '0000-00-00', NULL, '494656456', '', '', '894616', '', 1),
(10, 'HECTOR ', 'HURTADO', 'PAZ', '24234234', '0000-00-00', NULL, '21312312', '', '', 'afsdfa@dadñaksd', '', 1),
(11, 'JIMMY', 'GONZALES', 'FERNANDEZ', '454613213', '1980-02-14', NULL, '787884651', '', '', 'fjoasj@falm', '', 1),
(12, 'CANCER', 'LEO', 'VIRGO', '23423434', '1900-12-08', NULL, '789898454', '', '', '', '', 1),
(13, 'KIMBERLY', 'MORI', 'PAISIG', '53453453', '2018-05-24', NULL, '345345345', 'Av. Teniente Pinglo S/N', '', '', '', 1),
(15, 'CéSAR', 'MARTINEZ', 'INOñAN', '46546546', '1999-02-24', NULL, '998546546', 'Ca. Manuel Arteaga Nro 588', 'https://es-la.facebook.com/people/Cesar-Martinez/100002668288563', 'cmartinez@yahoo.es', '', 1),
(16, 'CARLOS', 'PEREZ', 'DIAZ', '65658989', '1990-06-25', NULL, '997898998', 'av. los diamantes nro 888', 'https://web.facebook.com/cperezli', 'carlosp@hotmail.com', '', 1),
(17, 'RAUL', 'ESPINOZA', 'MURO', '45856565', '1979-08-20', NULL, '949848554', 'Ca. los alamos nro 163', '', 'respinoza@outlook.es', '', 1),
(18, 'CARMEN', 'HERAS', 'CHUNQUE', '40089479', '1979-02-08', NULL, '976626565', 'Av. Antenor Orrega 1573', '', '', '', 1),
(19, 'JOAQUIN', 'SABINA', 'CRUZADO', '40089479', '1975-09-07', NULL, '999666333', 'jr. Diamantes nro 489', '', 'pedro.bernal.84@gmail.com', '', 1),
(20, 'JHON', 'STUART', 'JIX', '40089471', '1980-07-31', NULL, '987321321', 'Jr. De los callados', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `idConcepto` int(11) NOT NULL,
  `nom_concepto` varchar(100) NOT NULL,
  `desc_concepto` varchar(120) NOT NULL,
  `estado_concepto` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`idConcepto`, `nom_concepto`, `desc_concepto`, `estado_concepto`) VALUES
(1, 'Préstamos', 'Préstamos', 1),
(2, 'Compras', 'Compras', 1),
(3, 'Ventas canceladas', 'Ventas canceladas', 1),
(4, 'Retiros', 'Retiros', 1),
(5, 'Gastos', 'Gastos', 1),
(6, 'Pago de interés extemporáneo', 'Pago de interés extemporáneo', 1),
(7, 'Pago de intereses', 'Pago de intereses', 1),
(8, 'Abonos a capital', 'Abonos a capital', 1),
(9, 'Pago de recargos', 'Pago de recargos', 1),
(10, 'Ventas', 'Ventas', 1),
(11, 'Apartados', 'Apartados', 1),
(12, 'Préstamos cancelados', 'Préstamos cancelados', 1),
(13, 'Compras canceladas', 'Compras canceladas', 1),
(14, 'Depósitos', 'Depósitos', 1),
(15, 'Reposición de boletas', 'Reposición de boletas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `idContrato` int(11) NOT NULL,
  `desc_contrato` varchar(30) NOT NULL,
  `file_contrato` varchar(30) NOT NULL,
  `estado_contrato` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`idContrato`, `desc_contrato`, `file_contrato`, `estado_contrato`) VALUES
(1, 'contrato1', 'contrato1.txt', 1),
(2, 'hola3', 'hola3.txt', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_prestamo`
--

CREATE TABLE `detalle_prestamo` (
  `codPrestamo` int(11) NOT NULL,
  `idPrenda` int(11) NOT NULL,
  `avaluo` decimal(10,2) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `interes` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_prestamo`
--

INSERT INTO `detalle_prestamo` (`codPrestamo`, `idPrenda`, `avaluo`, `monto`, `interes`) VALUES
(7, 10, '100.00', '50.00', '6.00'),
(7, 11, '200.00', '100.00', '12.00'),
(7, 12, '300.00', '150.00', '18.00'),
(8, 13, '200.00', '100.00', '12.00'),
(15, 23, '800.00', '100.00', '12.00'),
(15, 22, '2000.00', '400.00', '48.00'),
(11, 21, '600.00', '300.00', '36.00'),
(10, 20, '800.00', '300.00', '36.00'),
(10, 19, '500.00', '300.00', '36.00'),
(15, 24, '600.00', '100.00', '12.00'),
(16, 25, '400.00', '50.00', '6.00'),
(17, 26, '300.00', '50.00', '6.00'),
(17, 27, '800.00', '50.00', '6.00'),
(18, 28, '400.00', '40.00', '4.80'),
(18, 29, '1500.00', '300.00', '36.00'),
(19, 30, '800.00', '80.00', '8.00'),
(19, 31, '1000.00', '120.00', '12.00'),
(20, 32, '900.00', '100.00', '10.00'),
(20, 33, '1300.00', '150.00', '15.00'),
(21, 34, '400.00', '80.00', '8.00'),
(21, 35, '300.00', '70.00', '7.00'),
(22, 36, '1500.00', '350.00', '42.00'),
(23, 37, '500.00', '200.00', '20.00'),
(24, 38, '500.00', '150.00', '15.30'),
(25, 39, '500.00', '100.00', '10.00'),
(26, 40, '500.00', '100.00', '10.00'),
(28, 41, '1500.00', '300.00', '30.00'),
(29, 42, '1000.00', '200.00', '20.00'),
(30, 43, '1000.00', '300.00', '30.00'),
(31, 44, '800.00', '200.00', '20.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujos_caja`
--

CREATE TABLE `flujos_caja` (
  `idCajaflujo` int(11) NOT NULL,
  `caja_concepto` int(11) NOT NULL,
  `caja_fecha_mov` datetime NOT NULL,
  `caja_monto` decimal(10,2) NOT NULL,
  `caja_descrip_mov` varchar(120) NOT NULL,
  `caja_tipo` int(2) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `caja_estado` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `flujos_caja`
--

INSERT INTO `flujos_caja` (`idCajaflujo`, `caja_concepto`, `caja_fecha_mov`, `caja_monto`, `caja_descrip_mov`, `caja_tipo`, `cod_usuario`, `caja_estado`) VALUES
(1, 14, '2018-10-24 08:59:50', '150.00', 'sdfsdfsd', 1, 1, 1),
(2, 14, '2018-10-24 09:01:16', '250.00', 'deposito de hann', 1, 1, 1),
(3, 4, '2018-10-24 09:42:13', '45.00', 'dhssdghdsg', -1, 1, 1),
(4, 14, '2018-10-24 09:44:04', '200.00', 'a mi favor', 1, 1, 1),
(5, 4, '2018-10-24 09:44:18', '80.00', 'en mi contra', -1, 1, 1),
(6, 5, '2018-10-24 16:06:52', '220.00', 'mi gasto', -1, 1, 1),
(7, 14, '2018-10-29 04:10:00', '127.80', 'otro depo', 1, 1, 1),
(8, 14, '2018-10-29 17:07:22', '200.00', 'deposito varios 29/10', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mnu_permisos`
--

CREATE TABLE `mnu_permisos` (
  `codMnuPrestamo` int(11) NOT NULL,
  `cod_nivel` int(11) NOT NULL,
  `desc_menu` varchar(50) NOT NULL,
  `est_menu` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mnu_permisos`
--

INSERT INTO `mnu_permisos` (`codMnuPrestamo`, `cod_nivel`, `desc_menu`, `est_menu`) VALUES
(1, 2, 'Panel de control', 1),
(2, 2, 'Clientes', 1),
(3, 2, 'Préstamos', 1),
(4, 2, 'Prendas', 1),
(5, 2, 'Historial', 1),
(6, 2, 'Reportes', 1),
(7, 2, 'Ayuda', 1),
(8, 1, 'Panel de control', 1),
(9, 1, 'Clientes', 1),
(10, 1, 'Préstamos', 1),
(11, 1, 'Prendas', 1),
(12, 1, 'Historial', 1),
(13, 1, 'Reportes', 1),
(14, 1, 'Ayuda', 1),
(15, 3, 'Panel de control', 1),
(16, 3, 'Clientes', 1),
(17, 3, 'Préstamos', 1),
(18, 3, 'Prendas', 1),
(19, 3, 'Historial', 1),
(20, 3, 'Reportes', 1),
(21, 3, 'Ayuda', 1),
(22, 6, 'Panel de control', 1),
(23, 6, 'Clientes', 1),
(24, 6, 'Préstamos', 1),
(25, 6, 'Prendas', 0),
(26, 6, 'Historial', 0),
(27, 6, 'Reportes', 0),
(28, 6, 'Ayuda', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `cod_nivel` tinyint(11) NOT NULL,
  `nivel_descrip` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`cod_nivel`, `nivel_descrip`) VALUES
(1, 'Administrador'),
(2, 'Asistente'),
(3, 'Cliente'),
(6, 'hann');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `codPago` int(11) NOT NULL,
  `pago_descrip` varchar(100) NOT NULL,
  `codPrestamo` int(11) NOT NULL,
  `fec_pago` date NOT NULL,
  `pago_cargo` decimal(10,2) NOT NULL,
  `pago_abono` decimal(10,2) NOT NULL,
  `pago_saldo` decimal(10,2) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `pago_estado` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`codPago`, `pago_descrip`, `codPrestamo`, `fec_pago`, `pago_cargo`, `pago_abono`, `pago_saldo`, `cod_usuario`, `pago_estado`) VALUES
(1, 'Préstamo', 18, '2018-06-16', '340.00', '0.00', '340.00', 1, 1),
(2, 'Intereses generados', 18, '2018-06-16', '40.80', '0.00', '380.80', 1, 1),
(3, 'Préstamo', 19, '2018-06-15', '200.00', '0.00', '200.00', 1, 1),
(4, 'Intereses generados', 19, '2018-06-15', '20.00', '0.00', '220.00', 1, 1),
(5, 'Préstamo', 20, '2018-06-16', '250.00', '0.00', '250.00', 1, 1),
(6, 'Intereses generados', 20, '2018-06-16', '25.00', '0.00', '275.00', 1, 1),
(7, 'Pago de intereses', 19, '2018-06-16', '0.00', '20.00', '200.00', 1, 1),
(8, 'Pago de intereses', 20, '2018-06-16', '0.00', '25.00', '250.00', 1, 1),
(9, 'Pago de intereses', 18, '2018-06-16', '0.00', '40.80', '340.00', 1, 1),
(10, 'Préstamo', 21, '2018-06-16', '150.00', '0.00', '150.00', 1, 1),
(11, 'Intereses generados', 21, '2018-06-16', '15.00', '0.00', '165.00', 1, 1),
(12, 'Pago de intereses', 21, '2018-06-16', '0.00', '15.00', '150.00', 1, 1),
(13, 'Pago de intereses', 21, '2018-06-17', '0.00', '150.00', '0.00', 1, 1),
(16, 'Pago de intereses', 20, '2018-06-17', '0.00', '250.00', '0.00', 1, 1),
(17, 'Pago de liquidación', 19, '2018-06-17', '0.00', '200.00', '0.00', 1, 1),
(18, 'Pago de intereses', 18, '2018-06-22', '0.00', '340.00', '0.00', 1, 1),
(19, 'Préstamo', 7, '2018-05-25', '300.00', '0.00', '300.00', 1, 1),
(20, 'Intereses generados', 7, '2018-05-25', '30.00', '0.00', '330.00', 1, 1),
(21, 'Préstamo', 8, '2018-05-28', '100.00', '0.00', '100.00', 1, 1),
(22, 'Intereses generados', 8, '2018-05-28', '10.00', '0.00', '110.00', 1, 1),
(23, 'Préstamo', 10, '2018-06-06', '600.00', '0.00', '600.00', 1, 1),
(24, 'Intereses generados', 10, '2018-06-06', '60.00', '0.00', '660.00', 1, 1),
(25, 'Préstamo', 11, '2018-06-06', '300.00', '0.00', '300.00', 1, 1),
(26, 'Intereses generados', 11, '2018-06-06', '30.00', '0.00', '330.00', 1, 1),
(27, 'Préstamo', 15, '2018-06-11', '600.00', '0.00', '600.00', 1, 1),
(28, 'Intereses generados', 15, '2018-06-11', '60.00', '0.00', '660.00', 1, 1),
(29, 'Préstamo', 16, '2018-06-07', '50.00', '0.00', '50.00', 1, 1),
(30, 'Intereses generados', 16, '2018-06-07', '5.00', '0.00', '55.00', 1, 1),
(31, 'Préstamo', 17, '2018-06-10', '100.00', '0.00', '100.00', 1, 1),
(32, 'Intereses generados', 17, '2018-06-10', '12.00', '0.00', '112.00', 1, 1),
(33, 'Descuento', 15, '2018-06-24', '0.00', '70.00', '590.00', 1, 1),
(34, 'Descuento', 15, '2018-06-24', '0.00', '20.00', '570.00', 1, 1),
(35, 'Pago de liquidación', 15, '2018-06-30', '0.00', '570.00', '0.00', 1, 1),
(36, 'Préstamo', 22, '2018-06-30', '350.00', '0.00', '350.00', 1, 1),
(37, 'Intereses generados', 22, '2018-06-30', '42.00', '0.00', '392.00', 1, 1),
(38, 'Descuento', 22, '2018-06-30', '0.00', '50.00', '342.00', 1, 1),
(39, 'Préstamo', 23, '2018-07-02', '200.00', '0.00', '200.00', 1, 1),
(40, 'Intereses generados', 23, '2018-07-02', '20.00', '0.00', '220.00', 1, 1),
(41, 'Pago de intereses', 23, '2018-07-02', '0.00', '10.00', '210.00', 1, 1),
(42, 'Préstamo', 24, '2018-07-10', '150.00', '0.00', '150.00', 1, 1),
(43, 'Intereses generados', 24, '2018-07-10', '15.30', '0.00', '165.30', 1, 1),
(44, 'Préstamo', 25, '2018-09-02', '100.00', '0.00', '100.00', 1, 1),
(45, 'Intereses generados', 25, '2018-09-02', '10.00', '0.00', '110.00', 1, 1),
(46, 'Pago de intereses', 25, '2018-09-02', '0.00', '10.00', '100.00', 1, 1),
(47, 'Pago de intereses', 25, '2018-09-02', '0.00', '10.00', '90.00', 1, 1),
(48, 'Descuento', 25, '2018-09-02', '0.00', '10.00', '80.00', 1, 1),
(49, 'Préstamo', 26, '2018-01-05', '100.00', '0.00', '100.00', 1, 1),
(50, 'Intereses generados', 26, '2018-01-05', '10.00', '0.00', '110.00', 1, 1),
(55, 'Intereses generados', 28, '2018-08-05', '30.00', '0.00', '330.00', 1, 1),
(54, 'Préstamo', 28, '2018-08-05', '300.00', '0.00', '300.00', 1, 1),
(56, 'Intereses extemporáneo', 28, '2018-09-04', '0.00', '0.00', '330.00', 1, 1),
(62, 'Préstamo', 31, '2018-08-05', '200.00', '0.00', '200.00', 1, 1),
(61, 'Intereses generados', 30, '2018-11-06', '30.00', '0.00', '330.00', 1, 1),
(60, 'Préstamo', 30, '2018-11-06', '300.00', '0.00', '300.00', 1, 1),
(63, 'Intereses generados', 31, '2018-08-05', '20.00', '0.00', '220.00', 1, 1),
(64, 'Intereses extemporáneo', 31, '2018-09-04', '0.00', '0.00', '220.00', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prendas`
--

CREATE TABLE `prendas` (
  `idPrenda` int(11) NOT NULL,
  `prenda_descrip` varchar(100) NOT NULL,
  `prenda_marca` varchar(50) NOT NULL,
  `prenda_modelo` varchar(30) NOT NULL,
  `prenda_serie` varchar(30) NOT NULL,
  `prenda_observ` varchar(50) NOT NULL,
  `prenda_avaluo` decimal(10,2) NOT NULL,
  `prenda_prest` decimal(10,2) NOT NULL,
  `prenda_img` varchar(120) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `prenda_estado` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prendas`
--

INSERT INTO `prendas` (`idPrenda`, `prenda_descrip`, `prenda_marca`, `prenda_modelo`, `prenda_serie`, `prenda_observ`, `prenda_avaluo`, `prenda_prest`, `prenda_img`, `idTipo`, `prenda_estado`) VALUES
(1, 'prod1', 'marca1', 'mod1', 'ser1', 'adasdaa', '10.00', '5.00', 'no_image.jpg', 1, 1),
(2, 'prod2', 'mar2', 'mod2', 'serie2', 'asasd', '5.00', '2.00', 'no_image.jpg', 1, 1),
(3, 'o', 'o', 'o', 'o', 'o', '8.00', '8.00', 'no_image.jpg', 1, 1),
(4, 'prenda4', 'marca4', 'modelo4', 'serie4', 'observ1', '20.00', '10.00', 'no_image.jpg', 1, 1),
(5, 'prenda4', 'marca4', 'modelo4', 'serie4', 'observ1', '20.00', '10.00', 'no_image.jpg', 1, 1),
(6, 'prenda5', 'marca5', 'modelo5', 'serie5', 'observ2', '30.00', '15.00', 'no_image.jpg', 1, 1),
(7, 'prenda5', 'marca5', 'modelo5', 'serie5', 'observ2', '30.00', '15.00', 'no_image.jpg', 1, 1),
(8, 'prenda6', 'marca6', 'modelo6', 'serie6', 'observ3', '40.00', '20.00', 'no_image.jpg', 1, 1),
(9, 'prenda6', 'marca6', 'modelo6', 'serie6', 'observ3', '40.00', '20.00', 'no_image.jpg', 1, 1),
(10, 'p10', 'm10', 'mod10', 'serie10', 'lfja', '100.00', '50.00', 'no_image.jpg', 1, 1),
(11, 'p11', 'm11', 'mod11', 'serie11', 'ajdlaksjdl', '200.00', '100.00', 'no_image.jpg', 1, 1),
(12, 'p12', 'm12', 'mod12', 'serie12', 'afasdfasd', '300.00', '150.00', 'no_image.jpg', 1, 1),
(13, 'tv 32\'', 'samsung', 'smart tv', 'SM1513213', 'esta semi nuevo, viene con control', '200.00', '100.00', 'no_image.jpg', 1, 1),
(14, 'sds', 'ds', 'asd', 'ad', 'asd', '400.00', '200.00', 'no_image.jpg', 1, 1),
(15, 'dssds', 'adzxczxcz', 'zxczxc', 'xcasd', 'asd', '40.00', '5.00', 'no_image.jpg', 1, 1),
(16, 'da', 'asd', 'ad', 'as', 'asd', '50.00', '20.00', 'no_image.jpg', 1, 1),
(17, 'asd', 'asd', 'ad', 'asd', 'asd', '60.00', '30.00', 'no_image.jpg', 1, 1),
(18, 'fd', 'df|fd|', 'mod', 'serr', 'obeser', '70.00', '60.00', 'no_image.jpg', 1, 1),
(19, 'TV', 'PLASMA', 'HG3324', 'sldjflkj', 'fdalfjsdlfkj', '500.00', '300.00', 'no_image.jpg', 1, 1),
(20, 'notebook', 'ACER', 'H999', 'S78', 'jasdlfj', '800.00', '300.00', 'no_image.jpg', 1, 1),
(21, 'Calculadora', 'HP', 'mjiuii', 'dalfl3242', 'fsdjflkj', '600.00', '300.00', 'no_image.jpg', 1, 1),
(22, 'impresora', 'HP', 'Ecocolor', 'HPE433', 'sistema de tinta continuo', '2000.00', '400.00', '22191822065819.jpg', 1, 1),
(23, 'Laptop', 'Acer', 'ai', 'a3234', 'color plateada', '800.00', '100.00', 'no_image.jpg', 1, 1),
(24, 'LAVADORA', 'MABE', 'M34ERTB', 'S3000', 'lavadora domestica', '600.00', '100.00', '24191814063319.jpeg', 1, 1),
(25, 'Celular', 'Samsung', 'J7 Prime', '8444', 'en perfecto estado', '400.00', '50.00', 'no_image.jpg', 1, 1),
(26, 'licuadora', 'Oster', 'OTIU', 'O432342', 'licuadora seminueva', '300.00', '50.00', 'no_image.jpg', 1, 1),
(27, 'cafetera', 'Oster', 'Profesional', 'OP434343', 'cafetera profesional para restaurante', '800.00', '50.00', 'no_image.jpg', 1, 1),
(28, 'k', 'k', 'k', 'k', 'k', '400.00', '40.00', 'no_image.jpg', 1, 1),
(29, 'h', 'h', 'hh', 'h', 'h', '1500.00', '300.00', 'no_image.jpg', 1, 1),
(30, 'lavadora', 'DAEWO', 'Wash', 'DW54545', 'en perfecto estado', '800.00', '80.00', 'no_image.jpg', 1, 1),
(31, 'laptop', 'SONY', 'VAIO', 'SH554', 'laptop con Windows 7, 2GB RAM, 500GB HD', '1000.00', '120.00', 'no_image.jpg', 1, 1),
(32, 'k', 'k', 'k', 'k', 'k', '900.00', '100.00', 'no_image.jpg', 1, 1),
(33, 'm', 'm', 'm', 'm', 'm', '1300.00', '150.00', 'no_image.jpg', 1, 1),
(34, 'Smartphone', 'Samsung', 'J7 Prime', 'SHG2344', 'color dorado, carcasa, mica gorila glas', '400.00', '80.00', 'no_image.jpg', 1, 1),
(35, 'Cámara fotográfica', 'NIKON', 'COOLPIX', 'L120', 'cámara color negro, zoom 21x, en buen estado', '300.00', '70.00', 'no_image.jpg', 1, 1),
(36, 'Proyector', 'ViewSonic', 'L55454', 'J5HY56', 'color negro, cable power, estuche negro', '1500.00', '350.00', 'no_image.jpg', 1, 1),
(37, 'Celular', 'LG', 'Y4', 'IJDS33', 'color blanco, MOVISTAR, cargador', '500.00', '200.00', 'no_image.jpg', 1, 1),
(38, 'table', 'Samsung', 'Galaxy', 'JUIK344', 'buen estado', '500.00', '150.00', 'no_image.jpg', 1, 1),
(39, 'cámara fotografico', 'Canon', 'KO4545', 'KF4354', 'color negro, con funda', '500.00', '100.00', 'no_image.jpg', 1, 1),
(40, 'TV PLASMA 50´´', 'SAMSUNG', 'MGJ1564', 'HKK546', 'color negro en perfecto estado de conservación', '500.00', '100.00', 'no_image.jpg', 1, 1),
(41, 'PLAY STATION', 'SONY', 'SNY8966', 'U556DE789', 'en buen estado, control DUAL SHOCK', '1500.00', '300.00', 'no_image.jpg', 1, 1),
(42, 'Producto01', 'ProdMarca01', 'ProdMod01', 'ProdSerie01', 'prodObservaciones 01', '1000.00', '200.00', 'no_image.jpg', 1, 1),
(43, 'Producto01', 'prodMarca01', 'prodMod01', 'prodSer01', 'producto Observaciones 01', '1000.00', '300.00', 'no_image.jpg', 1, 1),
(44, 'Productito', 'Marquita', 'Modelito', 'Seriesita', 'observaacionsitas', '800.00', '200.00', 'no_image.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `codPrestamo` int(11) NOT NULL,
  `codCliente` int(11) NOT NULL,
  `codCategoria` int(11) NOT NULL,
  `fec_prestamo` date NOT NULL,
  `fec_vencim` date NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `prestamo_estado` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`codPrestamo`, `codCliente`, `codCategoria`, `fec_prestamo`, `fec_vencim`, `cod_usuario`, `prestamo_estado`) VALUES
(1, 10, 2, '2018-05-19', '2018-07-18', 1, 1),
(2, 14, 1, '2018-05-20', '2018-06-19', 1, 1),
(3, 12, 2, '2018-05-21', '2018-07-20', 1, 1),
(4, 12, 2, '2018-05-21', '2018-07-20', 1, 1),
(5, 14, 2, '2018-05-21', '2018-07-20', 1, 1),
(6, 14, 2, '2018-05-21', '2018-07-20', 1, 1),
(7, 14, 2, '2018-05-25', '2018-07-24', 1, 1),
(8, 9, 2, '2018-05-28', '2018-07-27', 1, 1),
(10, 16, 2, '2018-06-06', '2018-08-05', 1, 1),
(11, 16, 2, '2018-06-06', '2018-08-05', 1, 1),
(13, 17, 1, '0000-00-00', '1970-01-30', 1, 1),
(14, 17, 1, '2018-06-29', '2018-07-29', 1, 1),
(15, 17, 2, '2018-06-11', '2018-08-10', 1, 3),
(16, 17, 2, '2018-06-07', '2018-08-06', 1, 0),
(17, 17, 1, '2018-06-10', '2018-07-10', 1, 2),
(18, 17, 1, '2018-06-16', '2018-07-16', 1, 3),
(19, 17, 2, '2018-06-15', '2018-08-14', 1, 3),
(20, 17, 2, '2018-06-16', '2018-08-15', 1, 3),
(21, 16, 2, '2018-06-16', '2018-08-15', 1, 3),
(22, 17, 1, '2018-06-30', '2018-07-30', 1, 1),
(23, 18, 2, '2018-07-02', '2018-08-31', 1, 1),
(24, 18, 3, '2018-07-10', '2018-08-09', 1, 1),
(25, 19, 3, '2018-09-02', '2018-10-02', 1, 1),
(26, 20, 3, '2018-01-05', '2018-02-04', 1, 1),
(28, 20, 3, '2018-08-05', '2018-09-04', 1, 1),
(30, 20, 3, '2018-11-06', '2018-12-06', 1, 1),
(31, 20, 3, '2018-08-05', '2018-09-04', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `idTipo` int(11) NOT NULL,
  `tipo_descrip` varchar(50) NOT NULL,
  `tipo_observ` varchar(30) NOT NULL,
  `tipo_estado` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`idTipo`, `tipo_descrip`, `tipo_observ`, `tipo_estado`) VALUES
(1, 'Artículo', 'tipo de artículo en general', 1),
(2, 'Auto', 'las prendas tipo auto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL,
  `login` varchar(32) CHARACTER SET utf8 NOT NULL,
  `clave` varchar(32) CHARACTER SET utf8 NOT NULL,
  `nombre` text CHARACTER SET utf8 NOT NULL,
  `apellidos` text CHARACTER SET utf8 NOT NULL,
  `dni` char(8) CHARACTER SET utf8 NOT NULL,
  `direccion` text CHARACTER SET utf8,
  `telefono` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `correo` text CHARACTER SET utf8,
  `cod_nivel` tinyint(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `login`, `clave`, `nombre`, `apellidos`, `dni`, `direccion`, `telefono`, `correo`, `cod_nivel`, `estado`) VALUES
(1, 'Administ', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', 'Administrador', '12345678', '', '', 'admin@hotmail.com', 1, 1),
(18, 'rmalca', 'e10adc3949ba59abbe56e057f20f883e', 'Robert', 'Malca Lara', '48596978', 'calle Los Tulipanes Nº 456 - urb Los parques', '98749825125', 'robertm_l@gmail.com', 3, 1),
(12, 'lulu', '81dc9bdb52d04dc20036dbd8313ed055', 'Lourdes Sofía', 'Torres Gonzales', '48592631', 'Calle Los Tumbos Nº 156 - Urb. Sta. Victoria', '619260', 'lourdes@hotmail.com', 3, 1),
(13, 'carlos', 'e10adc3949ba59abbe56e057f20f883e', 'Carlos', 'Gil', '47817894', 'avenida Mexico Nro 122 - urb Chiclayo', '228020', 'carlitos@hotmail.com', 3, 1),
(19, 'meneque', '827ccb0eea8a706c4c34a16891f84e7b', 'Marles', 'Eneque', '44556611', 'mi segunda direccion', '979124565', 'm_eneque@gmail.com', 3, 1),
(20, 'hsoft', '', 'Hann', 'Soft', '15874889', '---', '997894454', 'hannsoft@hotmail.com', 2, 1),
(21, 'Repartidor', 'e10adc3949ba59abbe56e057f20f883e', 'Piter', 'Bernal', '45681234', 'Av. José Leonardo Ortiz Nº 166', '987456135465', 'likiluis@hotmail.com', 2, 1),
(22, 'Vendedor', 'ae2bac2e4b4da805d01b2952d7e35ba4', 'Nestor', 'Quinteros', '41526789', 'Av. Mexico #3658', '9874267890', 'elcafre@gmail.com', 2, 1),
(23, '', 'd41d8cd98f00b204e9800998ecf8427e', 'sadfadf', 'sadfas', '234234', 'fasvsa 345', '345345', 'pyron84@hotmail.com', 1, 0),
(24, 'rflores', 'd41d8cd98f00b204e9800998ecf8427e', 'Rosa', 'Flores de Oliva', '41487966', 'ASDFSD', '962626656', 'pyron84@hotmail.com', 1, 1),
(27, 'jperez', 'e10adc3949ba59abbe56e057f20f883e', 'Juan', 'Pérez Acosta', '78987987', 'Ca. Las diamelas nro 789 - Carlos Stein', '966326656', 'jpa_network@gmail.com', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codCliente`);

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`idConcepto`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`idContrato`);

--
-- Indices de la tabla `flujos_caja`
--
ALTER TABLE `flujos_caja`
  ADD PRIMARY KEY (`idCajaflujo`);

--
-- Indices de la tabla `mnu_permisos`
--
ALTER TABLE `mnu_permisos`
  ADD PRIMARY KEY (`codMnuPrestamo`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`cod_nivel`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`codPago`);

--
-- Indices de la tabla `prendas`
--
ALTER TABLE `prendas`
  ADD PRIMARY KEY (`idPrenda`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`codPrestamo`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `codCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `idConcepto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `idContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `flujos_caja`
--
ALTER TABLE `flujos_caja`
  MODIFY `idCajaflujo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `mnu_permisos`
--
ALTER TABLE `mnu_permisos`
  MODIFY `codMnuPrestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `cod_nivel` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `codPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT de la tabla `prendas`
--
ALTER TABLE `prendas`
  MODIFY `idPrenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `codPrestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
