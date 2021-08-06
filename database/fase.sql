-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2021 a las 18:25:59
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `ID` int(255) NOT NULL,
  `CODRUB` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `DESCRIP RUBRO` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `CODART` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `DESCRIP ART` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `VTA30D` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `STOFIJ` int(255) NOT NULL,
  `STODIS` int(255) NOT NULL,
  `PRELIS1` double NOT NULL,
  `PRELIS2` double NOT NULL,
  `PRELIS3` double NOT NULL,
  `PRELIS4` double NOT NULL,
  `PRELIS5` double NOT NULL,
  `PRELIS6` double NOT NULL,
  `PORCIVA` double NOT NULL,
  `PREDOL` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `IMPINT` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `EXENTO` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ENLACE` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `UNIDAD` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `KILOS` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ESTADO` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `TIMING` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(255) NOT NULL,
  `CODCTA` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `NOMBRE` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `DIRECC` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `CALLE` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `NRO` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `LOCALIDAD` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `CODPOSTAL` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `NROTEL1` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `NROTEL2` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `MAIL` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `CODIVA` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `NROIVA` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `CODVEN` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `CODCOB` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `LISPRE` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `LIMCRE` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `DIAVEN` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `DEUSAL` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ESTADO` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `TIMING` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `CODCTA`, `NOMBRE`, `DIRECC`, `CALLE`, `NRO`, `LOCALIDAD`, `CODPOSTAL`, `NROTEL1`, `NROTEL2`, `MAIL`, `CODIVA`, `NROIVA`, `CODVEN`, `CODCOB`, `LISPRE`, `LIMCRE`, `DIAVEN`, `DEUSAL`, `ESTADO`, `TIMING`) VALUES
(20, '3', 'PEREZ JORGE', 'ALEM Y 9 DE JULIO', 'ALEM Y 9 DE JULIO', '0', '', '', '47865214', '2622663704', '', 'MON', '1111111111111', 'ADM', 'ADM', '1', '25000', '0', '0', 'A\r\n', '2021-08-06 13:17:49'),
(21, '4', 'PEREYRA JAVIER', 'SAN MARTIN 255', 'SAN MARTIN', '255', '', '', '4598745', '2642589631', '', 'EXPO', '', 'ADM', 'ADM', '1', '0', '30', '0', 'A\r\n', '2021-08-06 13:17:49'),
(22, '5', 'CORREA JAVIER', 'SAN LORENZO 22', 'SAN LORENZO', '22', '', '', '424508', '2613658478', 'correajavier-02@hotmail.com', 'CF', '20-26136544-9', '1', 'ADM', '1', '22000', '45', '0', 'A\r\n', '2021-08-06 15:11:37'),
(23, '2', 'RODRIGREZ EDUARDO', 'SAN MARTIN 123 456', 'SAN MARTIN 123', '456', '', '', '470258', '261789654', 'e.rodriguez@gmail.com', 'RI', '20-26136544-9', 'ADM', 'ADM', '1', '10000', '0', '0', 'A\r\n', '2021-08-06 13:26:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `ID` int(255) NOT NULL,
  `TIPASI` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `TIPCOM` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `SERCOM` int(255) NOT NULL,
  `NROCOM` int(255) NOT NULL,
  `FECCOM` int(255) NOT NULL,
  `CODCTA` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `TOTDEB` double NOT NULL,
  `TOTCRE` double NOT NULL,
  `SALLIB` double NOT NULL,
  `OBSERV` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `TIMING` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
