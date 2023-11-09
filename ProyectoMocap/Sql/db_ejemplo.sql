-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2023 a las 17:57:06
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_ejemplo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_carrito`
--

CREATE TABLE `tb_carrito` (
  `carrito_id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tb_carrito`
--

INSERT INTO `tb_carrito` (`carrito_id`, `id_usuario`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_compra`
--

CREATE TABLE `tb_compra` (
  `id_compra` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `carrito_id` int(11) NOT NULL,
  `estado_compra` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tb_compra`
--

INSERT INTO `tb_compra` (`id_compra`, `producto_id`, `id_usuario`, `carrito_id`, `estado_compra`) VALUES
(1, 1, 2, 2, 'co'),
(2, 1, 2, 2, 'co'),
(3, 3, 1, 1, 'co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_factura`
--

CREATE TABLE `tb_factura` (
  `factura_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_compra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tb_factura`
--

INSERT INTO `tb_factura` (`factura_id`, `cantidad`, `id_compra`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_productos`
--

CREATE TABLE `tb_productos` (
  `producto_id` int(11) NOT NULL,
  `producto_nombre` varchar(50) DEFAULT NULL,
  `producto_color` varchar(20) DEFAULT NULL,
  `producto_precio` varchar(50) NOT NULL,
  `producto_caracteristicas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tb_productos`
--

INSERT INTO `tb_productos` (`producto_id`, `producto_nombre`, `producto_color`, `producto_precio`, `producto_caracteristicas`) VALUES
(1, 'computadora', 'gris', '1000000', 'con procesador core6'),
(2, 'zapatos', 'gris', '80000', 'hermosas zapatillas deportivas'),
(3, 'cama', 'verde', '250000', 'base cama todo en uno oferta ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario_nombre` varchar(60) NOT NULL,
  `usuario_correo` varchar(60) NOT NULL,
  `usuario_contrasena` varchar(60) NOT NULL,
  `categoria_nombre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `usuario_nombre`, `usuario_correo`, `usuario_contrasena`, `categoria_nombre`) VALUES
(1, 'juan', 'juanito', '123', NULL),
(2, 'mike', 'mike@gmail.com', 'mike2346', NULL),
(3, 'diana', 'dina@gmail.com', 'diana123', NULL),
(4, 'pepito panntoja', 'pp@gmail.com', 'p123', NULL),
(5, 'maria mendez', 'mm@gmail.com', 'm123', NULL),
(6, 'nicolas', 'nicolas@gmail.com', '0205', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  ADD PRIMARY KEY (`carrito_id`);

--
-- Indices de la tabla `tb_compra`
--
ALTER TABLE `tb_compra`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `tb_factura`
--
ALTER TABLE `tb_factura`
  ADD PRIMARY KEY (`factura_id`);

--
-- Indices de la tabla `tb_productos`
--
ALTER TABLE `tb_productos`
  ADD PRIMARY KEY (`producto_id`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  MODIFY `carrito_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_compra`
--
ALTER TABLE `tb_compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_factura`
--
ALTER TABLE `tb_factura`
  MODIFY `factura_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
