-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2019 a las 22:33:46
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
  `Firma` blob NOT NULL,
  `Domicilio` varchar(100) NOT NULL,
  `Antiguedad` smallint(2) NOT NULL,
  `TelEmergencia` char(15) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `TipoSangre` varchar(3) NOT NULL,
  `Restriccion` varchar(100) DEFAULT NULL,
  `Estatus` smallint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `conductores`
--

INSERT INTO `conductores` (`RFC`, `Nombre`, `FechaNacimiento`, `Firma`, `Domicilio`, `Antiguedad`, `TelEmergencia`, `Sexo`, `TipoSangre`, `Restriccion`, `Estatus`) VALUES
('1', 'Roberto Arteaga Solís', '2019-03-04', '', 'Jesuitas 17 Misión de San Carlos', 6, '2161542', 'M', 'B+', 'Ninguna', 0),
('ACFSTEPDN2989', 'Aristides Camacho Sánchez', '1998-11-22', '', 'Av Siempre Viva #521', 1, '4212491', 'M', 'ROH', NULL, 0),
('ACLOPSHEY4872', 'Andrea Cecilia López González', '1998-11-22', '', '', 2, '76253910', '', '', NULL, 0),
('AESR980609HQT', 'Roberto Arteaga Solís', '1998-06-09', 0x647367, 'Jesuitas 17', 6, '1345672', '', 'B-', 'na', 0),
('EDURYV2371BJ', 'Edwin Ramirez Martínez', '1998-05-19', '', 'Av. San Pablo', 3, '2101616', '', 'k', 'Otaku', 0),
('HAKAOQBAO', 'Juan Pablo Olvera Sánchez', '1997-12-09', '', 'Av. Siempre Viva S/N', 3, '6954321', '', 'O+', 'na', 0),
('HQIRKNFNI294', 'Hector Hazael HernÃ¡ndez Cabrera', '1996-04-22', '', 'jbgdgjldsgbsjkgakjb', 1, '14124', '', 'c', 'wgg', 0),
('kbjbbkj', 'Eladio Rocha Vizcaino', '1998-12-12', '', 'Av. de las Ciencias S/N', 3, '9236532', 'M', 'A+', 'na', 0),
('URIFDIRI23OI2', 'Uriel Cordoba Cruz', '1997-11-23', '', 'Av. Reforma #1314', 4, '', 'F', 'A', 'NINGUNA', 0),
('ZAMFJSFIEIW93', 'Diana Laura Zamora Zepeda', '2000-05-13', '', 'Cerro de las campanas #23', 2, '5243691', 'F', 'O-', NULL, 1);

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

--
-- Volcado de datos para la tabla `licencias`
--

INSERT INTO `licencias` (`Folio`, `Conductor`, `TipoLicencia`, `FechaExpedicion`, `FechaVencimiento`, `Estado`, `Donador`) VALUES
(1, '1', 'B', '2019-03-04', '2019-12-01', '1', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multas`
--

CREATE TABLE `multas` (
  `Folio` int(8) NOT NULL,
  `idVerificacion` int(8) NOT NULL,
  `idVehiculo` int(8) NOT NULL,
  `Licencia` int(10) NOT NULL,
  `Motivo` varchar(50) NOT NULL,
  `Emisor` varchar(6) NOT NULL,
  `Fecha` date NOT NULL,
  `Monto` mediumint(6) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Garantia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `multas`
--

INSERT INTO `multas` (`Folio`, `idVerificacion`, `idVehiculo`, `Licencia`, `Motivo`, `Emisor`, `Fecha`, `Monto`, `Descripcion`, `Garantia`) VALUES
(1, 10, 4, 1, 'Exceso de humo', 'Juan O', '2019-03-04', 1, 'Ninguna', 'Licencia');

-- --------------------------------------------------------

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

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`RFC`, `Nombre`, `Direccion`, `Telefono`, `Correo`, `Estatus`) VALUES
('1', 'hola perra', '1', '1', 'prra@gmail.com', 0),
('AESR980609HQT', 'Roberto', 'Jesuitas 17', '4423718241', 'robert-art1@hotmail.com', 1),
('dfakadfknkn', 'lnk', 'Av de la Luz #1145', 'idk', 'pinpik@hotmail.com', 0),
('LOGA981123HQT', 'Andrea Lopez Gonzalez', 'Negreta', '4423592139', 'correo@gmail.com', 1),
('SFJEPWNIEFEF', 'Liz Montoya Silva', 'Av. Felicidad #535', '2489324', 'liz@gmail.com', 0);

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

--
-- Volcado de datos para la tabla `robos`
--

INSERT INTO `robos` (`idReporte`, `Vehiculo`, `Lugar`, `Fecha`, `Status`) VALUES
(1, 4, 'Obrera', '2019-02-19', '1'),
(2, 4, 'Obrera', '2019-02-19', '1'),
(3, 4, 'Obrera', '2019-02-19', '1'),
(4, 4, 'Obrera', '2019-02-19', '1');

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

--
-- Volcado de datos para la tabla `tenencias`
--

INSERT INTO `tenencias` (`Folio`, `Vehiculo`, `Periodo`, `FechaPago`, `Monto`, `Antiguedad`, `Descuento`) VALUES
(1, 4, '2019-1', '2019-02-18', 1000, 1, 10);

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

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`, `tipo`, `estado`, `intentos`) VALUES
('Andrea', '1234', 'USU', 1, 0),
('Anonimo', 'anonimo123', 'USU', 0, 0),
('Beto', '4321', 'ADM', 0, 0),
('Daniel', 'Daniel123', 'OTR', 1, 0),
('Jovan', '1234', 'otr', 0, 0),
('Marco', '12345678', 'ADM', 1, 0);

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

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`idVehiculo`, `Propietario`, `NIV`, `Placa`, `Tipo`, `Color`, `Uso`, `numPuerta`, `Marca`, `numMotor`, `numSerie`, `Modelo`, `Combustible`, `Year`, `Cilindraje`, `Transmision`, `Linea`, `Origen`, `Estatus`) VALUES
(4, 'AESR980609HQT', 'HGY567', 'KBHJV547', '1', 'Azul', 'Particular', 2, 'BMW', 'Prueba', 'Europea', '2017', 'Premium', 2018, 4, 'AutomÃ¡tic', 'Americana', 'Nacional', 1),
(9, 'SFJEPWNIEFEF', '2', '2', '2', '1', '1', 1, '1', '1', '1', '1', '1', 1, 1, '1', '1', '1', 1),
(11, 'SFJEPWNIEFEF', '3', '3', '3', '1', '1', 1, '1', '1', '1', '1', '1', 1, 1, '1', '1', '1', 1),
(12, 'SFJEPWNIEFEF', '4', '4', '4', '1', '1', 1, '1', '1', '1', '1', '1', 1, 1, '1', '1', '1', 1),
(13, 'SFJEPWNIEFEF', '1', '1', '1', '1', '1', 1, '1', '1', '1', '1', '1', 1, 1, '1', '1', '1', 1);

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
-- Volcado de datos para la tabla `verificaciones`
--

INSERT INTO `verificaciones` (`idVerificacion`, `Vehiculo`, `Periodo`, `CentroVerificacion`, `Tipo`, `Dictamen`) VALUES
(1, 4, '2019-1', 'Juriquilla', '2019-02-18', 'Aprovado'),
(2, 4, '2019-1', 'Juriquilla', '2019-02-18', 'Aprovado'),
(3, 4, '', '', '', ''),
(6, 4, '2018-1', '1', '2019-02-20', 'Rechazado'),
(7, 4, '2018-1', '1', '2019-02-20', 'Rechazado'),
(8, 4, '2018-1', '1', '2019-02-20', 'Rechazado'),
(9, 4, '2018-1', '1', '2019-02-20', 'Rechazado'),
(10, 4, '2018-1', '1', '2019-02-20', 'Rechazado');

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
  ADD KEY `idVerificacion` (`idVerificacion`),
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
  MODIFY `idVehiculo` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  ADD CONSTRAINT `multas_ibfk_2` FOREIGN KEY (`idVerificacion`) REFERENCES `verificaciones` (`idVerificacion`),
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
