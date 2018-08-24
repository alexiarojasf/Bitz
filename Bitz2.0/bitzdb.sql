-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2018 a las 17:01:19
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bitzdb`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `listado_de_productos` ()  SELECT nombre_prod FROM producto$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `comentario` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle`, `id_factura`, `id_producto`, `cantidad_producto`) VALUES
(3, 66, 5, 2),
(5, 66, 2, 1),
(6, 66, 4, 1),
(11, 66, 11, 2),
(14, 68, 11, 2),
(15, 69, 2, 1),
(16, 69, 11, 2),
(17, 70, 12, 2),
(18, 71, 5, 2),
(19, 71, 5, 1),
(20, 72, 11, 2),
(21, 73, 4, 1),
(22, 74, 11, 1),
(23, 74, 12, 2),
(25, 75, 11, 1),
(26, 76, 2, 3);

--
-- Disparadores `detalle_venta`
--
DELIMITER $$
CREATE TRIGGER `actualizarProductos` AFTER INSERT ON `detalle_venta` FOR EACH ROW UPDATE producto SET cantidad_prod = cantidad_prod - (SELECT cantidad_producto from detalle_venta where id_detalle = (SELECT MAX(id_detalle) FROM detalle_venta)) WHERE id_producto = (SELECT id_producto from detalle_venta WHERE id_detalle = (SELECT MAX(id_detalle) FROM detalle_venta))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_envio`
--

CREATE TABLE `estado_envio` (
  `id_estado_envio` int(11) NOT NULL,
  `nombre_estado_envio` varchar(11) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado_envio`
--

INSERT INTO `estado_envio` (`id_estado_envio`, `nombre_estado_envio`) VALUES
(1, 'Enviado'),
(2, 'Entregado'),
(3, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_prod`
--

CREATE TABLE `estado_prod` (
  `id_estado_prod` int(11) NOT NULL,
  `estado` varchar(11) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado_prod`
--

INSERT INTO `estado_prod` (`id_estado_prod`, `estado`) VALUES
(1, 'Disponible'),
(2, 'Agotado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_usuario`, `fecha`, `id_estado`) VALUES
(66, 41, '2018-05-15 00:00:00', 1),
(68, 38, '0000-00-00 00:00:00', 1),
(69, 38, '0000-00-00 00:00:00', 1),
(70, 38, '0000-00-00 00:00:00', 1),
(71, 38, '0000-00-00 00:00:00', 1),
(72, 38, '0000-00-00 00:00:00', 1),
(73, 38, '0000-00-00 00:00:00', 1),
(74, 38, '2018-07-03 00:00:00', 1),
(75, 43, '2018-08-10 00:00:00', 1),
(76, 38, '2018-08-10 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_prod` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_prod` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_prod` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `precio_prod` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_prod` int(11) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `modelo_prod` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `foto_prod` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `id_estado_prod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_prod`, `descripcion_prod`, `cantidad_prod`, `precio_prod`, `tipo_prod`, `proveedor`, `modelo_prod`, `foto_prod`, `id_estado_prod`) VALUES
(2, 'Nvidia', 'La nueva estrella de la gama NVIDIA la GeForce GTX 1080', '74', '735.00', 7, 4, 'GTX 1080', 'gpu3.jpg', 1),
(3, 'Mouse Optico', 'Mouse comodo y adaptable a cualquier mano', '84', '25.00', 14, 5, 'XRT-800', 'mouse.jpg', 1),
(4, 'Mouse Gamer', 'Uno de los top 10 del año 2018 para experiencia gamer.', '85', '29.99', 14, 4, 'XTR-80', 'mouse1.jpg', 1),
(5, 'Monitor Asus', 'El mejor monitor HD 4K del siglo, es el futuro.', '92', '299.99', 10, 7, 'Y-5080', 'monitor.jpg', 1),
(11, 'Cargador LENOVO', 'Cargador de carga rapida LENOVO', '35', '29.99', 20, 4, 'G5080', 'gpu1.jpg', 1),
(12, 'Monitor 4K ASUS', 'Monitor de ultima generación con la mejor resolución del mercado', '90', '299', 11, 7, 'A5500', 'monitor3.jpg', 1),
(13, 'ASUS2020', 'LALALALALALaLALA', '80', '150.50', 10, 7, 'XDRT', 'cooler.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_prov` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_prov` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_prov` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `correo_prov` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre_prov`, `direccion_prov`, `telefono_prov`, `correo_prov`) VALUES
(4, 'DELL', 'Guadalajara, Mexico (Las Fuentes) (GLF)', '22788999', 'hpcompanySV@gmail.com'),
(5, 'HP', 'Round Rock, TX, Estados Unidos\r\nOne Dell Way', '2252336', 'dellcompanySV@gmail.com'),
(6, 'Nvidia', 'Santa Clara, California, Estados Unidos', '22199999', 'nvidiasvcompany@gmail.com'),
(7, 'ASUS', 'USA', '22568587', 'asuscompany@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saldo_usuario`
--

CREATE TABLE `saldo_usuario` (
  `id_saldo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `saldo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `saldo_usuario`
--

INSERT INTO `saldo_usuario` (`id_saldo`, `id_usuario`, `saldo`) VALUES
(1, 3, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tipo_producto` int(11) NOT NULL,
  `nombre_tipo_prod` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tipo_producto`, `nombre_tipo_prod`) VALUES
(7, 'GPU'),
(8, 'Case'),
(9, 'Disco Duro HDD'),
(10, 'Monitor 24'),
(11, 'Monitor 32'),
(12, 'Procesadores'),
(13, 'Teclados'),
(14, 'Raton'),
(15, 'Mother Board'),
(16, 'Cables'),
(18, 'Switchs'),
(20, 'Accesorios'),
(22, 'Estuches'),
(23, 'Componente Electronico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usu` int(11) NOT NULL,
  `nombre_tipo_usu` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tipos de los usuarios';

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usu`, `nombre_tipo_usu`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Cliente'),
(4, 'Default');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_usu` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_usu` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_usu` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo_usu` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_usu` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `foto_usu` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usu` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `sesion` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `nombre_usu`, `apellido_usu`, `telefono_usu`, `contrasena`, `correo_usu`, `direccion_usu`, `foto_usu`, `tipo_usu`, `fecha_creacion`, `sesion`) VALUES
(3, 'LuisMatamoros', 'Luis Michelle', 'Ruiz Lopez', '77854412', '123456', 'estefruiz@gmail.com', 'Mi casita', 'blaco.jpg', 3, '0000-00-00', 0),
(38, 'AlexiaRojas20', 'Alexia', 'Rojas', '75754843', '$2y$10$kcXeNEvH5jg83KbDnJ4gCOPHMNLFFsTRtx3BQeOk5jhkMZaS8/N82', 'alereana.rojas@gmail.com', 'Mi casita', '500.jpg', 3, '2018-08-24', 0),
(39, 'Andru', 'Javier André', 'Morán Marroquín', '70885223', '$2y$10$P7XbbN7T2pWuJqp18aXaaexxj4rH6I4S8XF/sdJrK141lyKmcCN9C', 'Alexia@gmail.com', 'Mi casita', 'network.png', 1, '0000-00-00', 0),
(40, 'luisa', 'Luisa', 'Campos', '12345678', '123123', 'luisa@gmail.com', 'San Salvador', '500.jpg', 3, '0000-00-00', 0),
(41, 'Alexander', 'Alexander', 'Guerra', '12345678', '$2y$10$vPM3uZvqjOrpDdRlc8iuWOvyQaudIs3gG0QcJZMJi5/Mj6aGxzo7e', 'alereana@gmail.com', 'San Salvador', '500.jpg', 3, '0000-00-00', 0),
(42, 'Peter', 'Peter', 'Aleman', '12345677', '$2y$10$PPjnqiNcx9YfykJRIiO83ux2JDAhXuTXh0i5e55mzPLWWoveTGCz.', 'peter@gmail.com', 'su casa', '500.jpg', 2, '0000-00-00', 0),
(43, 'rodrigo', 'Rodrigo', 'Palacios', '22446688', '$2y$10$kfenGyu8MFlE383U4E37k.jAnNNoRZHb9iSsmXVCRdEIhPZKM0kd6', 'rodrigo@gmail.com', 'Mejicanos', '500.jpg', 3, '0000-00-00', 0),
(44, 'Alexander', '', '', '', '$2y$10$cbhSNKeSqHV4Coor37iFnuQNzW7SR0Y/.wteJOaCMY/200coa2Kym', 'alexander@gmail.com', '', '', 3, '0000-00-00', 0),
(45, 'DanielaRodriguez', 'Daniela', 'Rodriguez', '', '$2y$10$UdZLpb8qu1sG4dc2pt/dzuYFprb/ud3XjzqkznTpcp6EVL5gTC.hG', 'theonlyalexia@gmail.com', '', '', 3, '0000-00-00', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_factura` (`id_factura`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `estado_envio`
--
ALTER TABLE `estado_envio`
  ADD PRIMARY KEY (`id_estado_envio`);

--
-- Indices de la tabla `estado_prod`
--
ALTER TABLE `estado_prod`
  ADD PRIMARY KEY (`id_estado_prod`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `tipo_prod` (`tipo_prod`),
  ADD KEY `proveedor` (`proveedor`),
  ADD KEY `id_estado_prod` (`id_estado_prod`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `saldo_usuario`
--
ALTER TABLE `saldo_usuario`
  ADD PRIMARY KEY (`id_saldo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id_tipo_producto`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usu`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `tipo_usu` (`tipo_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `estado_envio`
--
ALTER TABLE `estado_envio`
  MODIFY `id_estado_envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `estado_prod`
--
ALTER TABLE `estado_prod`
  MODIFY `id_estado_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `saldo_usuario`
--
ALTER TABLE `saldo_usuario`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id_tipo_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado_envio` (`id_estado_envio`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`proveedor`) REFERENCES `proveedor` (`id_proveedor`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`tipo_prod`) REFERENCES `tipo_producto` (`id_tipo_producto`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`id_estado_prod`) REFERENCES `estado_prod` (`id_estado_prod`);

--
-- Filtros para la tabla `saldo_usuario`
--
ALTER TABLE `saldo_usuario`
  ADD CONSTRAINT `saldo_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo_usu`) REFERENCES `tipo_usuario` (`id_tipo_usu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
