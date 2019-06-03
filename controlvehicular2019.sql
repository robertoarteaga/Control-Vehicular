-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2019 a las 19:30:24
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controlvehicular2019`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--

CREATE TABLE `conductores` (
  `RFC` char(13) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Firma` text NOT NULL,
  `Domicilio` varchar(100) NOT NULL,
  `Antiguedad` smallint(2) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `TipoSangre` varchar(3) NOT NULL,
  `Restriccion` varchar(100) DEFAULT NULL,
  `TelEmergencia` char(15) NOT NULL,
  `Estatus` smallint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias`
--

CREATE TABLE `licencias` (
  `Folio` int(8) NOT NULL,
  `Conductor` char(13) NOT NULL,
  `TipoLicencia` char(1) NOT NULL,
  `FechaExpedicion` date NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `Estado` varchar(21) NOT NULL,
  `Donador` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multas`
--

CREATE TABLE `multas` (
  `Folio` int(8) NOT NULL,
  `idVehiculo` int(8) NOT NULL,
  `Licencia` int(10) NOT NULL,
  `Motivo` varchar(50) NOT NULL,
  `Emisor` varchar(6) NOT NULL,
  `Fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `Monto` mediumint(6) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Garantia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `RFC` char(13) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefono` char(15) NOT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Estatus` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `robos`
--

CREATE TABLE `robos` (
  `idReporte` int(8) NOT NULL,
  `Vehiculo` int(8) NOT NULL,
  `Lugar` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  `Status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tenencias`
--

CREATE TABLE `tenencias` (
  `Folio` int(8) NOT NULL,
  `Vehiculo` int(8) NOT NULL,
  `Periodo` char(6) NOT NULL,
  `FechaPago` date NOT NULL,
  `Monto` mediumint(6) NOT NULL,
  `Antiguedad` smallint(2) DEFAULT NULL,
  `Descuento` smallint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `intentos` smallint(6) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `idVehiculo` int(8) NOT NULL,
  `Propietario` char(13) NOT NULL,
  `NIV` char(17) NOT NULL,
  `Placa` varchar(10) NOT NULL,
  `Tipo` varchar(20) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Uso` varchar(10) NOT NULL,
  `numPuerta` smallint(2) DEFAULT NULL,
  `Marca` varchar(20) DEFAULT NULL,
  `numMotor` varchar(20) DEFAULT NULL,
  `numSerie` varchar(20) DEFAULT NULL,
  `Modelo` varchar(20) DEFAULT NULL,
  `Combustible` varchar(15) DEFAULT NULL,
  `Year` smallint(2) DEFAULT NULL,
  `Cilindraje` smallint(2) DEFAULT NULL,
  `Transmision` varchar(10) DEFAULT NULL,
  `Linea` varchar(20) DEFAULT NULL,
  `Origen` varchar(10) DEFAULT NULL,
  `Estatus` smallint(6) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verificaciones`
--

CREATE TABLE `verificaciones` (
  `idVerificacion` int(8) NOT NULL,
  `Vehiculo` int(8) NOT NULL,
  `Periodo` char(6) NOT NULL,
  `CentroVerificacion` varchar(100) NOT NULL,
  `Tipo` char(20) NOT NULL,
  `Dictamen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`RFC`);

--
-- Indices de la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `Conductor` (`Conductor`);

--
-- Indices de la tabla `multas`
--
ALTER TABLE `multas`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `idVehiculo` (`idVehiculo`),
  ADD KEY `Licencia` (`Licencia`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`RFC`);

--
-- Indices de la tabla `robos`
--
ALTER TABLE `robos`
  ADD PRIMARY KEY (`idReporte`),
  ADD KEY `Vehiculo` (`Vehiculo`);

--
-- Indices de la tabla `tenencias`
--
ALTER TABLE `tenencias`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `Vehiculo` (`Vehiculo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`idVehiculo`),
  ADD UNIQUE KEY `NIV` (`NIV`),
  ADD UNIQUE KEY `Placa` (`Placa`),
  ADD KEY `Propietario` (`Propietario`);

--
-- Indices de la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  ADD PRIMARY KEY (`idVerificacion`),
  ADD KEY `Vehiculo` (`Vehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `licencias`
--
ALTER TABLE `licencias`
  MODIFY `Folio` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `multas`
--
ALTER TABLE `multas`
  MODIFY `Folio` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `robos`
--
ALTER TABLE `robos`
  MODIFY `idReporte` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tenencias`
--
ALTER TABLE `tenencias`
  MODIFY `Folio` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `idVehiculo` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  MODIFY `idVerificacion` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD CONSTRAINT `licencias_ibfk_1` FOREIGN KEY (`Conductor`) REFERENCES `conductores` (`RFC`);

--
-- Filtros para la tabla `multas`
--
ALTER TABLE `multas`
  ADD CONSTRAINT `multas_ibfk_1` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculos` (`idVehiculo`),
  ADD CONSTRAINT `multas_ibfk_3` FOREIGN KEY (`Licencia`) REFERENCES `licencias` (`Folio`);

--
-- Filtros para la tabla `robos`
--
ALTER TABLE `robos`
  ADD CONSTRAINT `robos_ibfk_1` FOREIGN KEY (`Vehiculo`) REFERENCES `vehiculos` (`idVehiculo`);

--
-- Filtros para la tabla `tenencias`
--
ALTER TABLE `tenencias`
  ADD CONSTRAINT `tenencias_ibfk_1` FOREIGN KEY (`Vehiculo`) REFERENCES `vehiculos` (`idVehiculo`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`Propietario`) REFERENCES `propietarios` (`RFC`);

--
-- Filtros para la tabla `verificaciones`
--
ALTER TABLE `verificaciones`
  ADD CONSTRAINT `verificaciones_ibfk_1` FOREIGN KEY (`Vehiculo`) REFERENCES `vehiculos` (`idVehiculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
