-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-07-2014 a las 22:50:16
-- Versión del servidor: 5.5.37-35.1
-- Versión de PHP: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `artsenal_root`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_cart`
--

CREATE TABLE IF NOT EXISTS `art_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` double NOT NULL,
  `descricion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_cart_item`
--

CREATE TABLE IF NOT EXISTS `art_cart_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `precio` double NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_473970F1AD5CDBF` (`cart_id`),
  KEY `IDX_473970F7645698E` (`producto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_categoria`
--

CREATE TABLE IF NOT EXISTS `art_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `borrado` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `art_categoria`
--

INSERT INTO `art_categoria` (`id`, `nombre`, `borrado`, `fecha_creacion`, `descripcion`) VALUES
(1, 'Ocasion', NULL, NULL, NULL),
(2, 'Hogar', NULL, NULL, NULL),
(3, 'Bisuteria', NULL, NULL, NULL),
(4, 'Varios', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_mensaje`
--

CREATE TABLE IF NOT EXISTS `art_mensaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_carpeta` int(11) DEFAULT NULL,
  `destinatario` int(11) DEFAULT NULL,
  `remitente` int(11) DEFAULT NULL,
  `contenido` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `leido` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_leido` datetime DEFAULT NULL,
  `borrado` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2F271C7DEDD00B4D` (`id_carpeta`),
  KEY `IDX_2F271C7DA7399187` (`destinatario`),
  KEY `IDX_2F271C7D51A5ACA4` (`remitente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_mensaje_carpeta`
--

CREATE TABLE IF NOT EXISTS `art_mensaje_carpeta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `borrado` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `art_mensaje_carpetacol` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_perfil`
--

CREATE TABLE IF NOT EXISTS `art_perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagen_perfil` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `nacimiento` datetime DEFAULT NULL,
  `borrado` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `art_perfil`
--

INSERT INTO `art_perfil` (`id`, `nombre`, `imagen_perfil`, `ciudad`, `about`, `fecha_creacion`, `nacimiento`, `borrado`, `sexo`, `id_usuario`) VALUES
(1, 'Hector', '977782_532891926746727_1628587983_o.jpg', 'Ciudad de la furia', 'La vida es un codigo compilandose', '2013-06-29 21:03:07', '1988-01-24 00:00:00', 'N', 'h', 1),
(2, 'usuario nuevo', 'images.jpg', 'mi ciuadad', 'programar es un arte', '2013-07-01 08:35:46', '2013-01-01 00:00:00', 'N', 'h', 2),
(3, 'Hector Alvarado Basantes', 'IMG-Noticias.jpg', 'Guayaquil', 'Caminando lento pero sin detenerse', '2013-11-13 18:52:04', '1988-01-24 00:00:00', 'N', 'h', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_producto`
--

CREATE TABLE IF NOT EXISTS `art_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tienda` int(11) DEFAULT NULL,
  `id_subcategoria` int(11) DEFAULT NULL,
  `titulo` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `tipo_elaboracion` datetime DEFAULT NULL,
  `pais_origen` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `estado` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `visitas` int(11) NOT NULL,
  `favorito` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FEBC7F03E6F150D3` (`id_tienda`),
  KEY `IDX_FEBC7F03F9BECC66` (`id_subcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `art_producto`
--

INSERT INTO `art_producto` (`id`, `id_tienda`, `id_subcategoria`, `titulo`, `descripcion`, `cantidad`, `precio`, `tipo_elaboracion`, `pais_origen`, `created`, `updated`, `estado`, `visitas`, `favorito`) VALUES
(4, 2, 1, 'asdasd', 'asdasda', 12, 12, NULL, NULL, '0000-00-00 00:00:00', '2014-01-06 22:28:12', 'P', 25, 0),
(5, 2, 1, 'titulo producto', 'asdasda', 12, 12, NULL, NULL, '2013-06-30 07:13:35', '2014-01-06 22:28:46', 'P', 5, 0),
(6, 2, 1, 'producto 2', 'descripciond del producto indico algunas cosas aca', 10, 123, NULL, NULL, '2013-06-30 07:20:20', '2014-01-06 22:25:14', 'P', 5, 0),
(7, 2, 1, 'titulo', 'descripocino', 34, 21, NULL, NULL, '2013-06-30 07:23:46', '2014-01-06 21:42:32', 'P', 1, 0),
(8, 2, 1, 'producto', 'descripcion', 12, 43, NULL, NULL, '2013-06-30 07:30:04', '2014-01-06 21:42:39', 'P', 1, 0),
(9, 2, 1, 'sombreros', 'descripcion', 32, 124, NULL, NULL, '2013-06-30 07:36:15', '2014-01-04 04:33:47', 'P', 1, 0),
(10, 2, 1, 'collares', 'descripcion', 233, 12, NULL, NULL, '2013-06-30 07:36:39', '2014-01-04 04:34:01', 'P', 1, 0),
(11, 3, 1, 'ipod', 'descripcion de mi producto', 29, 323, NULL, NULL, '2013-07-01 08:26:34', '2013-07-01 08:32:46', 'P', 0, 0),
(12, 3, 1, 'teleeofono', 'descpoeion', 290, 40, NULL, NULL, '2013-07-01 08:42:49', '2013-07-01 08:42:49', 'P', 0, 0),
(13, 3, 1, 'prodcuto2', 'desciropcin', 28, 394, NULL, NULL, '2013-07-01 08:48:35', '2013-07-01 08:48:35', 'P', 0, 0),
(14, 5, 1, 'mi producto vender', 'descripcion del rpoduc', 30, 30, NULL, NULL, '2013-11-13 19:09:29', '2013-11-13 20:28:57', 'P', 0, 0),
(15, 5, 1, 'asdasd', 'asdad', 12, 12, NULL, NULL, '2013-11-13 23:28:34', '2013-11-13 23:39:09', 'P', 0, 0),
(16, 5, 1, 'asda', 'sdad', 12, 12, NULL, NULL, '2013-11-13 23:32:40', '2013-11-13 23:39:09', 'P', 0, 0),
(17, 5, 1, 'asdasd', 'asdad', 12, 12, NULL, NULL, '2013-11-18 17:01:38', '2013-11-18 17:02:07', 'P', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_producto_foto`
--

CREATE TABLE IF NOT EXISTS `art_producto_foto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) DEFAULT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `borrado` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_857E4AA3F760EA80` (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=63 ;

--
-- Volcado de datos para la tabla `art_producto_foto`
--

INSERT INTO `art_producto_foto` (`id`, `id_producto`, `url`, `descripcion`, `borrado`) VALUES
(16, 4, 'DSC05237.JPG', NULL, NULL),
(17, 4, '737083_532893140079939_1870015127_o.jpg', NULL, NULL),
(18, 4, '474968_532892330080020_1816644920_o.jpg', NULL, NULL),
(20, 4, 'DSC05237.JPG', NULL, NULL),
(21, 4, '468623_532892196746700_154266138_o.jpg', NULL, NULL),
(22, 5, '737083_532893140079939_1870015127_o.jpg', NULL, NULL),
(23, 6, '468623_532892196746700_154266138_o.jpg', NULL, NULL),
(24, 7, '474968_532892330080020_1816644920_o.jpg', NULL, NULL),
(25, 8, 'product-red-ipod-mock2.gif', NULL, NULL),
(26, 9, 'sombreros.jpg', NULL, NULL),
(27, 10, 'collares.jpg', NULL, NULL),
(28, 11, 'product-red-ipod-mock2.gif', NULL, NULL),
(29, 11, 'sombreros.jpg', NULL, NULL),
(30, 11, 'foto_producto.jpg', NULL, NULL),
(31, 11, 'foto_producto.jpg', NULL, NULL),
(32, 11, 'foto_producto.jpg', NULL, NULL),
(33, 12, 'Samsung_Galaxy_Ace_2_analisis_20.jpg', NULL, NULL),
(34, 12, 'foto_producto.jpg', NULL, NULL),
(35, 12, 'foto_producto.jpg', NULL, NULL),
(36, 12, 'foto_producto.jpg', NULL, NULL),
(37, 12, 'foto_producto.jpg', NULL, NULL),
(38, 13, 'GalaxyAce2_04_Press-580-100.jpg', NULL, NULL),
(39, 13, 'foto_producto.jpg', NULL, NULL),
(40, 13, 'foto_producto.jpg', NULL, NULL),
(41, 13, 'foto_producto.jpg', NULL, NULL),
(42, 13, 'foto_producto.jpg', NULL, NULL),
(43, 14, 'mimi.jpg', NULL, NULL),
(44, 14, '545980_623203854387905_766145558_n.jpg', NULL, NULL),
(45, 14, 'foto_producto.jpg', NULL, NULL),
(46, 14, 'foto_producto.jpg', NULL, NULL),
(47, 14, 'foto_producto.jpg', NULL, NULL),
(48, 15, '543415_658272824185372_2008044437_n.jpg', NULL, NULL),
(49, 15, 'foto_producto.jpg', NULL, NULL),
(50, 15, 'foto_producto.jpg', NULL, NULL),
(51, 15, 'foto_producto.jpg', NULL, NULL),
(52, 15, 'foto_producto.jpg', NULL, NULL),
(53, 16, '36532_646019755432901_1622118349_n.jpg', NULL, NULL),
(54, 16, '25cffdb77162344_1440x900.jpg', NULL, NULL),
(55, 16, '1005471_566575056735830_406840952_n.jpg', NULL, NULL),
(56, 16, 'foto_producto.jpg', NULL, NULL),
(57, 16, '556557_577319242328025_1456749565_n.jpg', NULL, NULL),
(58, 17, 'foto_producto.jpg', NULL, NULL),
(59, 17, '1236208_588209084553520_205048065_n.jpg', NULL, NULL),
(60, 17, 'foto_producto.jpg', NULL, NULL),
(61, 17, 'foto_producto.jpg', NULL, NULL),
(62, 17, 'foto_producto.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_producto_like`
--

CREATE TABLE IF NOT EXISTS `art_producto_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C3C131F5F760EA80` (`id_producto`),
  KEY `IDX_C3C131F5FCF8192D` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_producto_tag`
--

CREATE TABLE IF NOT EXISTS `art_producto_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) DEFAULT NULL,
  `id_tag` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_118F1055F760EA80` (`id_producto`),
  KEY `IDX_118F10559D2D5FD9` (`id_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_rol`
--

CREATE TABLE IF NOT EXISTS `art_rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_subcategoria`
--

CREATE TABLE IF NOT EXISTS `art_subcategoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `borrado` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A9DB9D1FCE25AE0A` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `art_subcategoria`
--

INSERT INTO `art_subcategoria` (`id`, `id_categoria`, `nombre`, `fecha_creacion`, `borrado`) VALUES
(1, 1, 'subcategoria', NULL, NULL),
(2, 2, 'subcategoria 2', NULL, NULL),
(3, 1, 'prueba', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_suscripciones`
--

CREATE TABLE IF NOT EXISTS `art_suscripciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidadProductos` int(11) NOT NULL,
  `descuentoFeria` int(11) NOT NULL,
  `destacarEnPgina` int(11) NOT NULL,
  `beneficioPartners` int(11) NOT NULL,
  `postBlogs` int(11) NOT NULL,
  `codigoHtml` longtext COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `costo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `art_suscripciones`
--

INSERT INTO `art_suscripciones` (`id`, `nombre`, `cantidadProductos`, `descuentoFeria`, `destacarEnPgina`, `beneficioPartners`, `postBlogs`, `codigoHtml`, `estado`, `costo`, `descripcion`) VALUES
(1, 'Bronce', 3, 0, 0, 0, 0, '', 1, '0', ''),
(2, 'Plata', 5, 1, 1, 0, 0, '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">\n<input type="hidden" name="cmd" value="_s-xclick">\n<input type="hidden" name="hosted_button_id" value="SYSBTDANSH4F8">\n<input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">\n<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">\n</form>\n', 1, '25', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_tags`
--

CREATE TABLE IF NOT EXISTS `art_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_tienda`
--

CREATE TABLE IF NOT EXISTS `art_tienda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `imagen_cabecera` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje_cliente` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `anuncio` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `art_tienda`
--

INSERT INTO `art_tienda` (`id`, `nombre`, `imagen_cabecera`, `titulo`, `mensaje_cliente`, `anuncio`, `id_usuario`, `estado`, `created`, `updated`) VALUES
(2, 'mi tienda', 'DSC05237.JPG', 'dadadasd', 'adasd', 'Este es un anuncio de prueba , lo ingrese desde el administrador', 1, 'P', '2013-06-29 00:00:00', '2013-10-11 00:52:00'),
(3, 'nombre mi tienda', 'ace2jb.jpg', 'titulo de la toiend a', 'mensjae al cliente', 'anuunciona', 2, 'P', '2013-07-01 08:04:42', '2013-07-01 08:41:26'),
(4, 'mi tienda', 'default.png', '', '', '', 3, 'P', '2013-11-06 16:38:42', '2013-11-06 16:53:58'),
(5, 'mi tienda nueva', 'tumblr_mvxh5gdl4Z1r8hg1ho1_500.jpg', 'novedades', 'mensaje de cliente', 'anuncio mostrar', 11, 'P', '2013-11-13 19:07:15', '2013-11-13 20:30:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_tienda_dir_facturacion`
--

CREATE TABLE IF NOT EXISTS `art_tienda_dir_facturacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `calle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion_info` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_tienda` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_tienda_like`
--

CREATE TABLE IF NOT EXISTS `art_tienda_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tienda` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_281C327EE6F150D3` (`id_tienda`),
  KEY `IDX_281C327EFCF8192D` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_tienda_politica`
--

CREATE TABLE IF NOT EXISTS `art_tienda_politica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tienda` int(11) DEFAULT NULL,
  `mensaje_bienvenidad` longtext COLLATE utf8_unicode_ci,
  `pagos` longtext COLLATE utf8_unicode_ci,
  `envio` longtext COLLATE utf8_unicode_ci,
  `reembolso` longtext COLLATE utf8_unicode_ci,
  `informacion_adicional` longtext COLLATE utf8_unicode_ci NOT NULL,
  `vendedor` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_1986AEC3E6F150D3` (`id_tienda`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `art_tienda_politica`
--

INSERT INTO `art_tienda_politica` (`id`, `id_tienda`, `mensaje_bienvenidad`, `pagos`, `envio`, `reembolso`, `informacion_adicional`, `vendedor`) VALUES
(1, 2, 'mensaje de bienvenida', 'la formas de pagos', 'se envia de esta forma', '100% garantizado', 'informacion adicional', 'vendedores aceptados'),
(2, 5, 'lorem ipsum', 'lorem ipsum', 'lorem ipsum', 'lorem ipsum', 'lorem ipsum', 'lorem ipsum');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_tienda_tarjeta_credito`
--

CREATE TABLE IF NOT EXISTS `art_tienda_tarjeta_credito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tarjeta` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `numero_tarjeta` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mes_expira` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `anio_expira` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ccv` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `titular` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_tienda` int(11) NOT NULL,
  `pais` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `calle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion_info` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `art_tienda_tarjeta_credito`
--

INSERT INTO `art_tienda_tarjeta_credito` (`id`, `tarjeta`, `numero_tarjeta`, `mes_expira`, `anio_expira`, `ccv`, `titular`, `telefono`, `id_tienda`, `pais`, `calle`, `direccion_info`, `ciudad`, `estado`, `zip`) VALUES
(1, 'master', '98765', '0', '0', '123123', 'Hector', '45645', 2, 'EC', 'calle 13', 'Direccion', 'ciudad e la furia', 'EC', '1231'),
(2, 'visa', '456789', '0', '0', '45678', 'hector', '908234', 3, 'Ecuadpr', 'calle 17', 'infrom de mi direccion', 'gye', 'Ec', '09334');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_usuario`
--

CREATE TABLE IF NOT EXISTS `art_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `borrado` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  `tienda_id` int(11) DEFAULT NULL,
  `configuracionCompleta` int(11) DEFAULT NULL,
  `suscripcion_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9621B12192FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_9621B121A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_9621B12119BA6D46` (`tienda_id`),
  KEY `IDX_9621B121189E045D` (`suscripcion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `art_usuario`
--

INSERT INTO `art_usuario` (`id`, `email`, `password`, `fecha_creacion`, `borrado`, `ultimo_login`, `tienda_id`, `configuracionCompleta`, `suscripcion_id`, `username`, `username_canonical`, `email_canonical`, `enabled`, `salt`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(11, 'misticalelf9@gmail.com', 'xDq8YAcwg0wTJGQgCrO1shILxH/U2LlrL+mdt3weRW9+rinrsVB098jWyHvys7e5K2Cm1p0komBy7GBN5tonuw==', NULL, NULL, NULL, NULL, NULL, NULL, 'hectoritoh', 'hectoritoh', 'misticalelf9@gmail.com', 1, 'lzm28yncm8g8s4gkkokg8gos40ks4k4', '2013-12-06 11:16:57', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_usuario_rol`
--

CREATE TABLE IF NOT EXISTS `art_usuario_rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_ADF592390F1D76D` (`id_rol`),
  KEY `IDX_ADF5923FCF8192D` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_usuario_seguir`
--

CREATE TABLE IF NOT EXISTS `art_usuario_seguir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tienda` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B6BC2EB9E6F150D3` (`id_tienda`),
  KEY `IDX_B6BC2EB9FCF8192D` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `art_usuario_tienda`
--

CREATE TABLE IF NOT EXISTS `art_usuario_tienda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tienda` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E5234889E6F150D3` (`id_tienda`),
  KEY `IDX_E5234889FCF8192D` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` longtext COLLATE utf8_unicode_ci,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `nombre`, `url`, `descripcion`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 'nombre', '394219_10201267069748724_742841953_n.jpg', 'descr', 0, '2014-02-13 00:00:00', '2014-02-14 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 'Categoria 1', 'Esta categoria es de prueba', 0, '2014-02-07 18:33:14', '2014-02-07 18:33:14'),
(2, 'Categoria2', 'esta categoria tambien es de rpueba', 0, '2014-02-07 18:33:32', '2014-02-07 18:33:32'),
(3, 'categoria 3', 'la utlma de prueba tambien :)', 0, '2014-02-07 20:26:20', '2014-02-07 20:26:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_slider`
--

CREATE TABLE IF NOT EXISTS `cms_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen_url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cms_slider`
--

INSERT INTO `cms_slider` (`id`, `imagen_url`, `link`, `descripcion`, `estado`, `fecha_creacion`) VALUES
(1, 'banner2.jpg', 'wwww.google.com', 'descripcion', 'P', '2013-06-26 07:28:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE IF NOT EXISTS `contenido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen_url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` longtext COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `estado` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id`, `imagen_url`, `contenido`, `titulo`, `orden`, `estado`, `created`, `updated`) VALUES
(1, 'about', 'mision de artsenal\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Mision', 1, 'S', '2013-06-27 00:00:00', '2013-06-28 02:45:25'),
(2, 'about', 'vision de artsenal\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Vision', 2, 'S', '2013-06-28 00:00:00', '2013-06-28 02:45:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) DEFAULT NULL,
  `venta_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  `borrado` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5191A4017645698E` (`producto_id`),
  KEY `IDX_5191A401F2A5805D` (`venta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `producto_id`, `venta_id`, `cantidad`, `precio`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 17, 2, 1, 12, 0, '2014-02-13 22:22:12', '2014-02-13 22:22:12'),
(2, 17, 3, 1, 12, 0, '2014-02-13 22:23:24', '2014-02-13 22:23:24'),
(3, 17, 4, 1, 12, 0, '2014-02-13 22:29:02', '2014-02-13 22:29:02'),
(4, 17, 5, 1, 12, 0, '2014-02-13 22:29:21', '2014-02-13 22:29:21'),
(5, 17, 6, 1, 12, 0, '2014-02-13 22:31:11', '2014-02-13 22:31:11'),
(6, 17, 7, 1, 12, 0, '2014-02-13 22:34:58', '2014-02-13 22:34:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `nombres`, `apellidos`, `sexo`) VALUES
(1, 'hectoritoh', 'hectoritoh', 'misticalelf9@gmail.com', 'misticalelf9@gmail.com', 1, 'cp17tn176ps0ocwkwwgkw8k4084o4o0', 'Npd7lf0tyF8cBMUY37pdfngjIuaHkgb1uZblsBK8/iP7PkTn9LQRyQ1u8/LhRvaD/Joxzj5O1Z8tP+n2XljwNQ==', '2014-02-13 20:05:17', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '', '', 0),
(4, 'usuario', 'usuario', 'correo@gmail.com', 'correo@gmail.com', 1, 'qxik47pu9fkwgsococ4c4okswcggo0c', 'rmOruN40LfmGP+6BeHfVnZHN6NUcFJu1vtbwMp1W9U0mU2qE0OcqWcG1F5mn8onT/txT5tDGojxBd55MUGBLig==', '2014-02-13 18:11:53', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'Hector Manuel', 'Alvarado Basantes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ocasion_id` int(11) DEFAULT NULL,
  `destinatario_id` int(11) DEFAULT NULL,
  `subcategoria_id` int(11) DEFAULT NULL,
  `tienda_id` int(11) DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci,
  `borrado` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A7BB06151129C265` (`ocasion_id`),
  KEY `IDX_A7BB0615B564FBC1` (`destinatario_id`),
  KEY `IDX_A7BB061588D3B71A` (`subcategoria_id`),
  KEY `IDX_A7BB061519BA6D46` (`tienda_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `ocasion_id`, `destinatario_id`, `subcategoria_id`, `tienda_id`, `nombre`, `descripcion`, `borrado`, `created_at`, `updated_at`, `cantidad`, `precio`) VALUES
(15, 1, 1, 1, 1, 'asdasd', 'asdasd', 0, '2014-02-11 22:14:39', '2014-02-11 22:14:39', 12, 12),
(16, 1, 1, 1, 1, 'nuevo 1', 'descripcion', 0, '2014-02-11 22:14:56', '2014-02-11 22:14:56', 12, 12),
(17, 1, 1, 1, 1, 'qweqweqeq', 'eqweqweqweq', 0, '2014-02-12 17:24:40', '2014-02-12 17:24:40', 12, 12),
(18, 1, 1, 1, 1, 'asdadada', 'asdasdasdad', 0, '2014-02-12 17:24:55', '2014-02-12 17:24:55', 12, 12),
(19, 1, 1, 1, 1, 'qweqweq', 'qweqweq', 0, '2014-02-12 17:25:31', '2014-02-12 17:25:31', 12, 12),
(20, 1, 1, 2, 1, 'nuevo prueba', 'descipcion', 0, '2014-02-12 18:41:05', '2014-02-12 18:41:05', 54, 123),
(21, 1, 1, 2, 1, 'prodcuto prueba', 'descripcion de mi producto', 0, '2014-02-12 22:34:58', '2014-02-12 22:34:58', 12, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_destinatario`
--

CREATE TABLE IF NOT EXISTS `producto_destinatario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `producto_destinatario`
--

INSERT INTO `producto_destinatario` (`id`, `nombre`, `descripcion`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 'mujeres', 'damas ', 0, '2014-02-11 00:00:00', '2014-02-11 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_imagen`
--

CREATE TABLE IF NOT EXISTS `producto_imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) DEFAULT NULL,
  `url` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `borrado` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2E3E7DFD7645698E` (`producto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `producto_imagen`
--

INSERT INTO `producto_imagen` (`id`, `producto_id`, `url`, `borrado`, `created_at`, `updated_at`) VALUES
(14, 15, 'tumblr_n0iwvypQbO1qzxzwwo1_500.jpg', 0, '2014-02-11 22:14:39', '2014-02-11 22:14:39'),
(15, 16, '1620376_691178627584180_1428599882_n.jpg', 0, '2014-02-11 22:14:56', '2014-02-11 22:14:56'),
(16, 17, 'tumblr_n0iqj6EOaM1qduclao1_500.jpg', 0, '2014-02-12 17:24:40', '2014-02-12 17:24:40'),
(17, 18, '1620376_691178627584180_1428599882_n.jpg', 0, '2014-02-12 17:24:55', '2014-02-12 17:24:55'),
(18, 19, '1620376_691178627584180_1428599882_n.jpg', 0, '2014-02-12 17:25:31', '2014-02-12 17:25:31'),
(19, 20, '1014063_10202998056692896_108371050_n.jpg', 0, '2014-02-12 18:41:05', '2014-02-12 18:41:05'),
(20, 21, 'tumblr_n0iwvypQbO1qzxzwwo1_500.jpg', 0, '2014-02-12 22:34:58', '2014-02-12 22:34:58'),
(21, 21, '1653982_10152280131303013_691290477_n.png', 0, '2014-02-12 22:34:58', '2014-02-12 22:34:58'),
(22, 21, '575445_685977951446816_20933616_n.png', 0, '2014-02-12 22:34:58', '2014-02-12 22:34:58'),
(23, 21, 'tumblr_n0ri2hGs5K1r8weq9o1_500.jpg', 0, '2014-02-12 22:34:58', '2014-02-12 22:34:58'),
(24, 21, '1653823_554465031317123_777434044_n.jpg', 0, '2014-02-12 22:34:58', '2014-02-12 22:34:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_ocasion`
--

CREATE TABLE IF NOT EXISTS `producto_ocasion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `producto_ocasion`
--

INSERT INTO `producto_ocasion` (`id`, `nombre`, `descripcion`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 'party hard', 'fiesta salvajes', 0, '2014-02-11 00:00:00', '2014-02-11 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DA7FB9143397707A` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `categoria_id`, `nombre`, `descripcion`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 1, 'Subcategoria', 'texto de la subcatoigra', 0, '2014-02-07 20:43:34', '2014-02-07 20:43:34'),
(2, 1, 'subcategorias 2', 'subcategoria ingresadad desde el admin', 0, '2014-02-07 20:43:57', '2014-02-07 20:43:57'),
(3, 2, 'subcategoria 2.1', 'descripcion de mi subcategoria', 0, '2014-02-13 03:31:41', '2014-02-13 03:31:41'),
(4, 3, 'subcat', 'descripcion mostrar', 0, '2014-02-13 03:32:13', '2014-02-13 03:32:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE IF NOT EXISTS `tienda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mensaje` longtext COLLATE utf8_unicode_ci,
  `anuncio` longtext COLLATE utf8_unicode_ci,
  `imagenCabecera` longtext COLLATE utf8_unicode_ci,
  `mensajeBienvenida` longtext COLLATE utf8_unicode_ci,
  `politicaPagos` longtext COLLATE utf8_unicode_ci,
  `politicaReembolso` longtext COLLATE utf8_unicode_ci,
  `informacionAdicional` longtext COLLATE utf8_unicode_ci,
  `informacionVendedor` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C0C6E53EDB38439E` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`id`, `usuario_id`, `nombre`, `descripcion`, `borrado`, `created_at`, `updated_at`, `estado`, `titulo`, `mensaje`, `anuncio`, `imagenCabecera`, `mensajeBienvenida`, `politicaPagos`, `politicaReembolso`, `informacionAdicional`, `informacionVendedor`) VALUES
(1, 1, 'Nombre tienda2', '', 0, '2014-02-10 23:34:38', '2014-02-12 15:53:03', 'creacion', 'adas', 'dasdasda', 'asdasda', '75632_687198694656439_1108554381_n.jpg', 'mensaje de bienvenida', 'politicas de pago', 'politicas de reembolso', 'informacion adicional', 'informacion de vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `tienda_id` int(11) DEFAULT NULL,
  `total` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `verificada` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8FE7EE55DB38439E` (`usuario_id`),
  KEY `IDX_8FE7EE5519BA6D46` (`tienda_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `usuario_id`, `tienda_id`, `total`, `verificada`, `estado`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, '12', 0, 1, '2014-02-13 22:22:12', '2014-02-13 22:22:12'),
(3, 1, NULL, '12', 0, 1, '2014-02-13 22:23:24', '2014-02-13 22:23:24'),
(4, 1, NULL, '12', 0, 1, '2014-02-13 22:29:02', '2014-02-13 22:29:02'),
(5, 1, NULL, '12', 0, 1, '2014-02-13 22:29:21', '2014-02-13 22:29:21'),
(6, 1, NULL, '12', 0, 1, '2014-02-13 22:31:11', '2014-02-13 22:31:11'),
(7, 1, NULL, '12', 0, 1, '2014-02-13 22:34:58', '2014-02-13 22:34:58');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `art_cart_item`
--
ALTER TABLE `art_cart_item`
  ADD CONSTRAINT `FK_473970F1AD5CDBF` FOREIGN KEY (`cart_id`) REFERENCES `art_cart` (`id`),
  ADD CONSTRAINT `FK_473970F7645698E` FOREIGN KEY (`producto_id`) REFERENCES `art_producto` (`id`);

--
-- Filtros para la tabla `art_mensaje`
--
ALTER TABLE `art_mensaje`
  ADD CONSTRAINT `FK_2F271C7D51A5ACA4` FOREIGN KEY (`remitente`) REFERENCES `art_usuario` (`id`),
  ADD CONSTRAINT `FK_2F271C7DA7399187` FOREIGN KEY (`destinatario`) REFERENCES `art_usuario` (`id`),
  ADD CONSTRAINT `FK_2F271C7DEDD00B4D` FOREIGN KEY (`id_carpeta`) REFERENCES `art_mensaje_carpeta` (`id`);

--
-- Filtros para la tabla `art_producto`
--
ALTER TABLE `art_producto`
  ADD CONSTRAINT `FK_FEBC7F03E6F150D3` FOREIGN KEY (`id_tienda`) REFERENCES `art_tienda` (`id`),
  ADD CONSTRAINT `FK_FEBC7F03F9BECC66` FOREIGN KEY (`id_subcategoria`) REFERENCES `art_subcategoria` (`id`);

--
-- Filtros para la tabla `art_producto_foto`
--
ALTER TABLE `art_producto_foto`
  ADD CONSTRAINT `FK_857E4AA3F760EA80` FOREIGN KEY (`id_producto`) REFERENCES `art_producto` (`id`);

--
-- Filtros para la tabla `art_producto_like`
--
ALTER TABLE `art_producto_like`
  ADD CONSTRAINT `FK_C3C131F5F760EA80` FOREIGN KEY (`id_producto`) REFERENCES `art_producto` (`id`),
  ADD CONSTRAINT `FK_C3C131F5FCF8192D` FOREIGN KEY (`id_usuario`) REFERENCES `art_usuario` (`id`);

--
-- Filtros para la tabla `art_producto_tag`
--
ALTER TABLE `art_producto_tag`
  ADD CONSTRAINT `FK_118F10559D2D5FD9` FOREIGN KEY (`id_tag`) REFERENCES `art_tags` (`id`),
  ADD CONSTRAINT `FK_118F1055F760EA80` FOREIGN KEY (`id_producto`) REFERENCES `art_producto` (`id`);

--
-- Filtros para la tabla `art_subcategoria`
--
ALTER TABLE `art_subcategoria`
  ADD CONSTRAINT `FK_A9DB9D1FCE25AE0A` FOREIGN KEY (`id_categoria`) REFERENCES `art_categoria` (`id`);

--
-- Filtros para la tabla `art_tienda_like`
--
ALTER TABLE `art_tienda_like`
  ADD CONSTRAINT `FK_281C327EE6F150D3` FOREIGN KEY (`id_tienda`) REFERENCES `art_tienda` (`id`),
  ADD CONSTRAINT `FK_281C327EFCF8192D` FOREIGN KEY (`id_usuario`) REFERENCES `art_perfil` (`id`);

--
-- Filtros para la tabla `art_tienda_politica`
--
ALTER TABLE `art_tienda_politica`
  ADD CONSTRAINT `FK_1986AEC3E6F150D3` FOREIGN KEY (`id_tienda`) REFERENCES `art_tienda` (`id`);

--
-- Filtros para la tabla `art_usuario`
--
ALTER TABLE `art_usuario`
  ADD CONSTRAINT `FK_9621B121189E045D` FOREIGN KEY (`suscripcion_id`) REFERENCES `art_suscripciones` (`id`),
  ADD CONSTRAINT `FK_9621B12119BA6D46` FOREIGN KEY (`tienda_id`) REFERENCES `art_tienda` (`id`);

--
-- Filtros para la tabla `art_usuario_rol`
--
ALTER TABLE `art_usuario_rol`
  ADD CONSTRAINT `FK_ADF592390F1D76D` FOREIGN KEY (`id_rol`) REFERENCES `art_rol` (`id`),
  ADD CONSTRAINT `FK_ADF5923FCF8192D` FOREIGN KEY (`id_usuario`) REFERENCES `art_usuario` (`id`);

--
-- Filtros para la tabla `art_usuario_seguir`
--
ALTER TABLE `art_usuario_seguir`
  ADD CONSTRAINT `FK_B6BC2EB9E6F150D3` FOREIGN KEY (`id_tienda`) REFERENCES `art_tienda` (`id`),
  ADD CONSTRAINT `FK_B6BC2EB9FCF8192D` FOREIGN KEY (`id_usuario`) REFERENCES `art_perfil` (`id`);

--
-- Filtros para la tabla `art_usuario_tienda`
--
ALTER TABLE `art_usuario_tienda`
  ADD CONSTRAINT `FK_E5234889E6F150D3` FOREIGN KEY (`id_tienda`) REFERENCES `art_tienda` (`id`),
  ADD CONSTRAINT `FK_E5234889FCF8192D` FOREIGN KEY (`id_usuario`) REFERENCES `art_perfil` (`id`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `FK_5191A4017645698E` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `FK_5191A401F2A5805D` FOREIGN KEY (`venta_id`) REFERENCES `venta` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_A7BB06151129C265` FOREIGN KEY (`ocasion_id`) REFERENCES `producto_ocasion` (`id`),
  ADD CONSTRAINT `FK_A7BB061519BA6D46` FOREIGN KEY (`tienda_id`) REFERENCES `tienda` (`id`),
  ADD CONSTRAINT `FK_A7BB061588D3B71A` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategoria` (`id`),
  ADD CONSTRAINT `FK_A7BB0615B564FBC1` FOREIGN KEY (`destinatario_id`) REFERENCES `producto_destinatario` (`id`);

--
-- Filtros para la tabla `producto_imagen`
--
ALTER TABLE `producto_imagen`
  ADD CONSTRAINT `FK_2E3E7DFD7645698E` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `FK_DA7FB9143397707A` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD CONSTRAINT `FK_C0C6E53EDB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `fos_user` (`id`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `FK_8FE7EE5519BA6D46` FOREIGN KEY (`tienda_id`) REFERENCES `tienda` (`id`),
  ADD CONSTRAINT `FK_8FE7EE55DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `fos_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
