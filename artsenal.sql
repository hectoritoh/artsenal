-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-02-2015 a las 22:48:13
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `artsenal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `image` longtext COLLATE utf8_unicode_ci NOT NULL,
  `link` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `nombre`, `descripcion`, `borrado`, `created_at`, `updated_at`, `image`, `link`) VALUES
(4, 'Nombre de banner', 'descripcion de banner', 0, '2014-09-24 20:04:43', '2014-11-10 16:22:19', '1538740_757949354264488_7263411672096802959_n.jpg', 'https://www.google.com.ec'),
(5, 'nombre de banner', 'descripcion de otro', 0, '2014-09-25 17:21:40', '2014-09-25 17:21:40', 'artesanias-banner.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `basket__basket`
--

CREATE TABLE IF NOT EXISTS `basket__basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `positions` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `delivery_address_id` int(11) DEFAULT NULL,
  `billing_address_id` int(11) DEFAULT NULL,
  `payment_method_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpt_element` int(11) DEFAULT NULL,
  `delivery_method_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `options` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `locale` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1FD2A7E19395C3F3` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `basket__basket_element`
--

CREATE TABLE IF NOT EXISTS `basket__basket_element` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `basket_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `vat_rate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `options` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4538CA2C1BE1FB52` (`basket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `search_idx` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`, `borrado`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Ocacion', 'Esta categoria es de prueba', 0, '2014-02-07 18:33:14', '2014-08-30 03:45:40', 'ocacion'),
(2, 'Hogar', 'esta categoria tambien es de prueba', 0, '2014-02-07 18:33:32', '2014-08-30 03:45:40', 'hogar'),
(3, 'Hombre', 'la utlma de prueba tambien :)', 0, '2014-02-07 20:26:20', '2014-08-30 03:45:40', 'hombre'),
(4, 'Mujer', 'descriocon de item de mujer', 0, '2014-08-01 02:44:20', '2014-08-30 03:45:40', 'mujer'),
(5, 'Bisuteria', 'descrioicion de bisuteria', 0, '2014-08-01 02:44:34', '2014-08-30 03:45:40', 'bisuteria'),
(6, 'Varios', 'descripcion de categoria de varios', 0, '2014-08-01 02:44:52', '2014-08-30 03:45:40', 'varios'),
(8, 'cat prueba', 'descripcion', 0, '2014-08-30 03:31:13', '2014-08-30 03:45:40', 'cat_prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `classification__category`
--

CREATE TABLE IF NOT EXISTS `classification__category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_43629B36727ACA70` (`parent_id`),
  KEY `IDX_43629B36EA9FDD75` (`media_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `classification__category`
--

INSERT INTO `classification__category` (`id`, `parent_id`, `media_id`, `name`, `enabled`, `slug`, `description`, `position`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Categoria 1', 1, 'categoria-1', 'categoria de ropa', 0, '2014-07-26 22:05:17', '2014-07-26 22:05:17'),
(2, NULL, NULL, 'Artsenias', 1, 'artsenias', 'productos hechos a mano', 0, '2014-07-26 22:05:45', '2014-07-26 22:05:45'),
(3, NULL, NULL, 'Ropa', 1, 'ropa', 'todo tipo de ropa de vestir', 0, '2014-07-30 19:35:43', '2014-07-30 19:35:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `classification__collection`
--

CREATE TABLE IF NOT EXISTS `classification__collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A406B56AEA9FDD75` (`media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `classification__tag`
--

CREATE TABLE IF NOT EXISTS `classification__tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
-- Estructura de tabla para la tabla `contenido_artsenal`
--

CREATE TABLE IF NOT EXISTS `contenido_artsenal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contenido` longtext COLLATE utf8_unicode_ci,
  `publicado` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `rawContent` longtext COLLATE utf8_unicode_ci NOT NULL,
  `contentFormatter` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `contenido_artsenal`
--

INSERT INTO `contenido_artsenal` (`id`, `categoria`, `titulo`, `contenido`, `publicado`, `created_at`, `updated_at`, `rawContent`, `contentFormatter`) VALUES
(1, 1, 'titulo del contenido de mi pagina', NULL, 1, '2014-08-24 18:37:37', '2014-08-24 18:37:37', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>', 'richhtml'),
(2, 2, 'titulo de vender', NULL, 1, '2014-08-24 21:01:58', '2014-08-24 21:01:58', '<p>El pasaje est&aacute;ndar Lorem Ipsum, usado desde el a&ntilde;o 1500.</p>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<p>Secci&oacute;n 1.10.32 de &quot;de Finibus Bonorum et Malorum&quot;, escrito por Cicero en el 45 antes de Cristo</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>Traducci&oacute;n hecha por H. Rackham en 1914</p>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<p>Secci&oacute;n 1.10.33 de &quot;de Finibus Bonorum et Malorum&quot;, escrito por Cicero en el 45 antes de Cristo</p>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<p>Traducci&oacute;n hecha por H. Rackham en 1914</p>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>\r\n\r\n<p>&nbsp;</p>', 'richhtml'),
(3, 3, 'pregunta  numero 1?', NULL, 1, '2014-08-24 21:02:23', '2014-08-25 03:35:11', '<p>El pasaje est&aacute;ndar Lorem Ipsum, usado desde el a&ntilde;o 1500.</p>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<p>&nbsp;</p>', 'richhtml'),
(4, 5, 'Politicas', NULL, 1, '2014-08-24 21:03:11', '2014-09-02 21:42:33', '<p><strong>El pasaje est&aacute;ndar Lorem Ipsum, usado desde el a&ntilde;o 1500.</strong></p>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Secci&oacute;n 1.10.32 de &quot;de Finibus Bonorum et Malorum&quot;, escrito por Cicero en el 45 antes de Cristo</strong></p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>Traducci&oacute;n hecha por H. Rackham en 1914</p>\r\n\r\n<p>&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<p>Secci&oacute;n 1.10.33 de &quot;de Finibus Bonorum et Malorum&quot;, escrito por Cicero en el 45 antes de Cristo</p>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<p>Traducci&oacute;n hecha por H. Rackham en 1914</p>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>\r\n\r\n<p>&nbsp;</p>', 'richhtml'),
(5, 4, 'Quiénes somos?', NULL, 1, '2014-08-25 02:16:30', '2014-09-02 21:43:32', '<p>3. USAGE<a class="headerlink" href="http://sonata-project.org/bundles/formatter/master/doc/reference/usage.html#usage" style="box-sizing: border-box; color: inherit; text-decoration: none; visibility: visible; background: transparent;" title="Permalink to this headline">&para;</a></p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>By default, the&nbsp;Twig&nbsp;filter&nbsp;format_text&nbsp;is not marked as&nbsp;safe. So, if you want to ouput the correct result, just add the&nbsp;|&nbsp;raw&nbsp;filter.</p>\r\n\r\n<p>3.1. FORM</p>\r\n\r\n<p>The bundle provide a widget to format a text when the form is bound. Just declare 2 fields:</p>\r\n\r\n<ul>\r\n	<li>source content&nbsp;field;</li>\r\n	<li>formatter&nbsp;field.</li>\r\n</ul>\r\n\r\n<p>And initialize a form type:</p>\r\n\r\n<p>&lt;?php $formBuilder -&gt;add(&#39;rawContent&#39;) <em>// source content</em> -&gt;add(&#39;contentFormatter&#39;, &#39;sonata_formatter_type&#39;, <strong>array</strong>( &#39;source_field&#39; =&gt; &#39;rawContent&#39;, &#39;target_field&#39; =&gt; &#39;content&#39; ))</p>\r\n\r\n<p>When data is populated, the&nbsp;content&nbsp;property will be populated with the text transformed from the selected transformer name and the&nbsp;rawContent&nbsp;property.</p>\r\n\r\n<p>For instance, this can be used to pregenerate the content of a markdown blog post.</p>\r\n\r\n<p>3.2. TWIG FORMATTER</p>\r\n\r\n<p>Twig formatter&nbsp;uses the project&rsquo;s&nbsp;Twig Environment&nbsp;(registered within service container as&nbsp;twig). All settings that affect the project&rsquo;s&nbsp;Twig Environment&nbsp;(like used template loader, enabled extensions etc.) will also affect the&nbsp;Twig Formatter.</p>\r\n\r\n<p>Also&nbsp;Twig formatter&nbsp;cannot have extensions enabled.</p>\r\n\r\n<p>3.2.1. SECURITY WARNING</p>\r\n\r\n<p>Since in most cases&nbsp;Twig Formatter&nbsp;will be used as the formatter in the administrative interface (like the one shown above with the form), be careful of allowing users to edit the templates, as this could potentially affect the safety of the system. You have to take care of the safety of your templates. In exceptional cases, you can create a separate instance of&nbsp;Twig Environment, register it within service container and override&nbsp;Twig Formatter&nbsp;definition passing own secure Twig Environment as a parameter instead of project one.</p>', 'richhtml'),
(6, 3, 'pregunta 2?', NULL, 1, '2014-08-25 05:13:14', '2014-08-25 05:13:14', '<p>4.2. SERIALIZATION</p>\r\n\r\n<p>We&rsquo;re using JMSSerializationBundle&rsquo;s serializations groups to customize the inputs &amp; outputs.</p>\r\n\r\n<p>The taxonomy is as follows:</p>\r\n\r\n<ul>\r\n	<li>sonata_api_read&nbsp;is the group used to display entities</li>\r\n	<li>sonata_api_write&nbsp;is the group used for input entities (when used instead of forms)</li>\r\n</ul>\r\n\r\n<p>If you wish to customize the outputted data, feel free to setup your own serialization options by configuring JMSSerializer with those groups.</p>', 'richhtml');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer__address`
--

CREATE TABLE IF NOT EXISTS `customer__address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `is_current` tinyint(1) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_55C3CDD39395C3F3` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer__customer`
--

CREATE TABLE IF NOT EXISTS `customer__customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` int(11) DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_date` datetime DEFAULT NULL,
  `birth_place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `is_fake` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4043373A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `producto_id`, `venta_id`, `cantidad`, `precio`, `borrado`, `created_at`, `updated_at`) VALUES
(13, 27, 17, 1, 12, 0, '2014-09-04 21:32:33', '2014-09-04 21:32:33'),
(14, 28, 18, 1, 12, 0, '2014-09-04 21:38:27', '2014-09-04 21:38:27'),
(15, 29, 18, 1, 223, 0, '2014-09-04 21:38:27', '2014-09-04 21:38:27'),
(16, 26, 19, 1, 123, 0, '2014-09-24 21:41:16', '2014-09-24 21:41:16'),
(17, 26, 20, 1, 123, 0, '2014-09-25 19:40:03', '2014-09-25 19:40:03'),
(18, 29, 21, 2, 223, 0, '2014-09-25 19:45:03', '2014-09-25 19:45:03'),
(19, 27, 22, 1, 12, 0, '2014-10-29 18:25:50', '2014-10-29 18:25:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `fos_user`
--

INSERT INTO `fos_user` (`id`, `nombres`, `apellidos`, `sexo`) VALUES
(1, '', '', 0),
(4, 'Hector Manuel', 'Alvarado Basantes', 1),
(5, 'Hectot', 'Aladads', 1),
(6, 'Hectot', 'asdadas', 1),
(7, 'Hectot', 'Aladads', 1),
(8, 'usuario_n', 'usuario_n', 1),
(9, 'usuario_n', 'usuario_n', 1),
(10, 'usuario_n', 'usuario_n', 1),
(11, 'usuario_n', 'usuario_n', 1),
(12, 'usuario_n', 'usuario_n', 1),
(13, 'test', 'test', 1),
(14, 'gabriel', 'gomez', 1),
(15, 'nombre de usuario', 'apellido', 1),
(16, 'Hector', 'Alvarado', 1),
(17, 'Hector', 'Alvarado', 1),
(18, 'demo', 'demo', 1),
(19, 'demo', 'demo', 1),
(20, 'app', 'app', 1),
(21, 'nombre', 'apellido', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fos_user_group`
--

CREATE TABLE IF NOT EXISTS `fos_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_583D1F3E5E237E06` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fos_user_user`
--

CREATE TABLE IF NOT EXISTS `fos_user_user` (
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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `firstname` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `biography` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `twitter_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `gplus_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gplus_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gplus_data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `two_step_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C560D76192FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_C560D761A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `fos_user_user`
--

INSERT INTO `fos_user_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `created_at`, `updated_at`, `date_of_birth`, `firstname`, `lastname`, `website`, `biography`, `gender`, `locale`, `timezone`, `phone`, `facebook_uid`, `facebook_name`, `facebook_data`, `twitter_uid`, `twitter_name`, `twitter_data`, `gplus_uid`, `gplus_name`, `gplus_data`, `token`, `two_step_code`) VALUES
(1, 'administrador', 'administrador', 'admin@gmail.com', 'admin@gmail.com', 1, 'n4cniu17wq8sk0o08g08k40o8ko80s', 'hCKqQCD5inuzETs94guCdOxeFYIQxX4hAXIe5rPEcQLdQSJLg+alOoVzJlLtrDrHecrbBJmOj+SSXoFUmOC3rw==', '2014-11-11 19:19:45', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:16:"ROLE_SUPER_ADMIN";}', 0, NULL, '2014-07-25 11:04:43', '2014-11-11 19:19:45', '1988-01-24 00:00:00', 'Hector Alvarado', 'Guayaquil', NULL, 'wingardium leviosa', 'm', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
(2, 'prueba', 'prueba', 'prueba@gamilc.om', 'prueba@gamilc.om', 1, 'lxn513dgr7kw4s0wg844k80c88c04k0', 'VDq5y81xtNLpAaucFo8AwlWs6lko6pM0Nc2QrJREanfGnpZKa03DoN5wiDDX6gUxe5NanWxQwFRY2xy5SMCgzA==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2014-07-26 07:44:17', '2014-07-26 08:38:56', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
(3, '1005973391', '1005973391', '1005973391', '1005973391', 1, 'tgnmnsqjoc0swwg8ccgcokwwg4gwwg4', '1005973391', '2015-02-06 21:38:26', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2014-07-26 20:47:47', '2015-02-06 21:38:26', '1988-01-24 00:00:00', 'Hector Alvarado Basantes', 'Guayaquil', NULL, 'me gusta programar mucho', 'm', NULL, NULL, NULL, '1005973391', NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', 'CAADxU8g2tUIBAKKf5WpUaZAbhSG26Xmr4zI4XJZBV2eJjR4NYA08vfkZC6k2I0EFj1ivPWTaUpEwKxENaT5IIFVgrBtjKYQERGsIyVSrTWHCiwlMx0ZBuJzbB8j4eIIAnNwIW6HZBZCEQ9GqE1do1CxX15XlOLzddXFL8XWPmFH9cnNOgWqtCZCkaxPokuQZBWFMKr4z8TDZB0bWIAZCJxr0kx', NULL),
(6, 'gabriel', 'gabriel', 'gigc85@gmail.com', 'gigc85@gmail.com', 1, 'kki6kkwulmo084w0swc8008o8080og0', 'KkboHRcvr/Ijg83814Iua7xhWx0nVEhpNyo998GG+F1GZKxvGdT3HJDNxqjtz/OJP3W6z7BHzadBDhJwy3Ng8w==', '2014-09-12 00:40:16', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2014-09-12 00:38:58', '2014-09-12 00:40:16', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
(7, 'hectoritoh', 'hectoritoh', 'halvarado@celmedia.com', 'halvarado@celmedia.com', 1, 'odfqmwa017484ccc84g4s88ss4k8s4c', 'i+gqyyfv8St9YOPq5paCtuKtzYa6uLfX7y2z7JRGvxmt6Qt5lcG2QLNIHv85ixJ16vvC1FLLGJABdWPZ1EMVNg==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2014-09-20 00:00:09', '2014-09-20 00:00:09', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
(8, 'demo', 'demo', 'demo@demo.com', 'demo@demo.com', 1, '6s6b90k4ozggcs8ogocc80k0wckg4co', '4cYVmYcaysOfK6uXwFY5jLKDHsgodqu0NLgTEhfHFGPfh5z7yBqQh7Oo33fHaPTfHzHxYwsYxpZa3Y/07Cd69w==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2014-09-20 01:23:47', '2014-09-20 01:23:47', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
(10, 'app', 'app', 'app@demo.com', 'app@demo.com', 1, 'ibxyqfbe3bscgwkw008gko8wso084ck', 'Mr/RoN8PuDZCHRjNv96ApTwpYu9Mh4Nx4CMaiwTVimkvTT2YpBV14KoK4uevihTZB5ty8N+8OKWr5EWn3IkHdA==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2014-09-20 01:24:57', '2014-09-20 01:24:57', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
(14, 'admin2', 'admin2', 'halvarado2@celmedia.com', 'halvarado2@celmedia.com', 1, 'sf8ze3h7e4gwkccooos044cgw0cggso', 'ixrUgJWmAQa+bgej8o0BJHm/92Eaaq1/uc+Ter9Ict2I5H+1nEQZ2bNea2tOUx7nwAmpK8SNovccWFT7TvYvUg==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2014-09-24 21:15:56', '2014-09-24 21:36:13', '1894-01-01 00:00:00', 'Hector Alvarado', 'Guayaquil', NULL, 'los santos', 'm', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
(15, 'prueba1', 'prueba1', 'correo@admin.com', 'correo@admin.com', 1, 'hpg2d36kvhssg0c0wcskk0kwgc0sgsc', '2fNtqvR8IWXarzR3B7uSM0TMlazc5fjGw7YuNQMQYB3HrAq/xbuHBMMPAT0yt5yDGM+CztDJc/Hf7m+q8wRlKA==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2014-09-26 01:33:06', '2014-09-26 01:33:06', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
(16, 'developer', 'developer', 'developer@gmail.com', 'developer@gmail.com', 1, 'bpqrw74h0nwwckow8www040cckw8cgc', '3oPeihlJrrq3BJ9CIqtaCStG1MgjC4dLIp4TYxHtYECsQ87F2CHiUZWKK+7c5W6nOikG+1ZYohB/fxUvGuEz6A==', '2014-10-29 22:28:10', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2014-10-27 17:26:37', '2014-10-29 22:28:10', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
(17, 'uprueba', 'uprueba', 'uprueba@admin.com', 'uprueba@admin.com', 1, '1jl3z2nzekf4kcckkc8004cgc4s4gw4', 'fpahqIxxFe6BYNJ7Z3AjL0rw3Ad8mN7YAJNB7arLIsl8TKMo/l5m03+zypqES0+7fftZPNvaijDDy9OFQpQIHA==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2014-11-21 22:52:03', '2014-11-21 22:52:03', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
(18, 'halvarado123321', 'halvarado123321', 'halvarado123@celmedia.com', 'halvarado123@celmedia.com', 1, 'a25k7a956348wk0sss8s4o8wsko40ok', 'o9hlfDV9y6Fq/aiua9PF4gwilwb7J1PKY13Rh/J4WHuYTL/W83WwD/dWck8A1YS6NnByMvZRxTPzuHQXqingIg==', '2015-02-06 23:03:46', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2015-02-06 22:47:58', '2015-02-06 23:03:46', '1895-01-24 00:00:00', 'hector', 'gye', NULL, 'this', 'm', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL),
(19, 'usuario_desarrollo', 'usuario_desarrollo', 'usuario_desarrollo@gmail.com', 'usuario_desarrollo@gmail.com', 1, 'ixjpo1n3prswgssc00os00g4o00cgg0', '+CD3WL5ctmoXYuXYhT8SpWlyBOKI17LlVnUxl0QvfDNfLf1xV2jbiWdQKB/MJJbiQlrPtMsU3FBpsagoTy4z6g==', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2015-02-13 22:17:59', '2015-02-13 22:17:59', NULL, NULL, NULL, NULL, NULL, 'u', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL, 'null', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fos_user_user_group`
--

CREATE TABLE IF NOT EXISTS `fos_user_user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `IDX_B3C77447A76ED395` (`user_id`),
  KEY `IDX_B3C77447FE54D947` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice__invoice`
--

CREATE TABLE IF NOT EXISTS `invoice__invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `total_inc` decimal(10,4) NOT NULL,
  `total_excl` decimal(10,4) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FB05AC619395C3F3` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice__invoice_element`
--

CREATE TABLE IF NOT EXISTS `invoice__invoice_element` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) DEFAULT NULL,
  `order_element_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price_excl` decimal(10,4) NOT NULL,
  `unit_price_inc` decimal(10,4) NOT NULL,
  `price` decimal(10,4) NOT NULL,
  `vat_rate` decimal(10,4) NOT NULL,
  `total` decimal(10,4) NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C66B56842989F1FD` (`invoice_id`),
  KEY `IDX_C66B5684ACC5D771` (`order_element_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media__gallery`
--

CREATE TABLE IF NOT EXISTS `media__gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `context` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `default_format` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `media__gallery`
--

INSERT INTO `media__gallery` (`id`, `name`, `context`, `default_format`, `enabled`, `updated_at`, `created_at`) VALUES
(1, 'banner', 'default', 'default_small', 0, '2014-08-01 16:28:38', '2014-08-01 16:28:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media__gallery_media`
--

CREATE TABLE IF NOT EXISTS `media__gallery_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_80D4C5414E7AF8F` (`gallery_id`),
  KEY `IDX_80D4C541EA9FDD75` (`media_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `media__gallery_media`
--

INSERT INTO `media__gallery_media` (`id`, `gallery_id`, `media_id`, `position`, `enabled`, `updated_at`, `created_at`) VALUES
(1, 1, 2, 1, 0, '2014-08-01 16:28:38', '2014-08-01 16:28:38'),
(2, 1, 3, 2, 0, '2014-08-01 16:28:38', '2014-08-01 16:28:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media__media`
--

CREATE TABLE IF NOT EXISTS `media__media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `enabled` tinyint(1) NOT NULL,
  `provider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_status` int(11) NOT NULL,
  `provider_reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_metadata` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `length` decimal(10,0) DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_size` int(11) DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cdn_is_flushable` tinyint(1) DEFAULT NULL,
  `cdn_flush_at` datetime DEFAULT NULL,
  `cdn_status` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `media__media`
--

INSERT INTO `media__media` (`id`, `name`, `description`, `enabled`, `provider_name`, `provider_status`, `provider_reference`, `provider_metadata`, `width`, `height`, `length`, `content_type`, `content_size`, `copyright`, `author_name`, `context`, `cdn_is_flushable`, `cdn_flush_at`, `cdn_status`, `updated_at`, `created_at`) VALUES
(1, '494509-20130305095123.jpg', NULL, 0, 'sonata.media.provider.image', 1, '9c41ea8e42ef4597ebae55c9850e6be6693d28d4.png', '{"filename":"494509-20130305095123.jpg"}', 1280, 800, NULL, 'image/png', 990248, NULL, NULL, 'default', NULL, NULL, NULL, '2014-08-01 16:28:01', '2014-08-01 16:28:01'),
(2, '387914-20131001213201.png', NULL, 0, 'sonata.media.provider.image', 1, '87e8101a82d58b40754fe86cdd01945ce9ede6e5.png', '{"filename":"387914-20131001213201.png"}', 1280, 800, NULL, 'image/png', 1898647, NULL, NULL, 'default', NULL, NULL, NULL, '2014-08-01 16:28:14', '2014-08-01 16:28:14'),
(3, '494509-20130305095123.jpg', NULL, 0, 'sonata.media.provider.image', 1, '9d17c91430dcacd5285f06eb2a5bb0c2ecd53b2f.png', '{"filename":"494509-20130305095123.jpg"}', 1280, 800, NULL, 'image/png', 990248, NULL, NULL, 'default', NULL, NULL, NULL, '2014-08-01 16:28:27', '2014-08-01 16:28:27'),
(4, '10173736_735313356520494_628958744220585632_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, 'fa91896700b2166dc09f6f956697f0682a281243.jpeg', '{"filename":"10173736_735313356520494_628958744220585632_n.jpg"}', 500, 504, NULL, 'image/jpeg', 38351, NULL, NULL, 'banner', NULL, NULL, NULL, '2014-08-01 16:53:09', '2014-08-01 16:53:09'),
(6, '494509-20130305095123.jpg', NULL, 0, 'sonata.media.provider.image', 1, '804007eb4d3b44d5d81cedcdf7b98ab86b0461ef.png', '{"filename":"494509-20130305095123.jpg"}', 1280, 800, NULL, 'image/png', 990248, NULL, NULL, 'banner', NULL, NULL, NULL, '2014-08-01 17:02:46', '2014-08-01 17:02:46'),
(7, '1908412_738672909525990_1496377162728680784_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, 'de36b6db0ec3dfb98b96ca13286616cd7d3ceff0.jpeg', '{"filename":"993287547bannerLeft.jpg"}', 240, 990, NULL, 'image/jpeg', 56509, NULL, NULL, 'banner', NULL, NULL, NULL, '2014-09-01 23:32:12', '2014-09-01 22:48:52'),
(8, 'tumblr_n9y1f7diom1t7b5qro1_500.jpg', NULL, 0, 'sonata.media.provider.image', 1, '666af65fd56ea5c7f3dbc9fb4ddfb1c0500bdc57.jpeg', '{"filename":"tumblr_n9y1f7diom1t7b5qro1_500.jpg"}', 434, 750, NULL, 'image/jpeg', 78428, NULL, NULL, 'publicidad', NULL, NULL, NULL, '2014-09-01 23:14:14', '2014-09-01 23:14:14'),
(9, '993287547bannerLeft.jpg', NULL, 0, 'sonata.media.provider.image', 1, '4695a41c4835b8f9e93cac6271a7d8d0b1ba571d.jpeg', '{"filename":"Angry Birds iphone wallpapers 960x640 (12) (1).jpg"}', 640, 960, NULL, 'image/jpeg', 84097, NULL, NULL, 'banner', NULL, NULL, NULL, '2014-09-01 23:40:44', '2014-09-01 23:32:12'),
(10, 'Angry Birds iphone wallpapers 960x640 (12) (1).jpg', NULL, 0, 'sonata.media.provider.image', 1, '89186a82f584f5ecd78fb14b3aff7b070ef5e988.jpeg', '{"filename":"993287547bannerLeft.jpg"}', 240, 990, NULL, 'image/jpeg', 56509, NULL, NULL, 'banner', NULL, NULL, NULL, '2014-09-01 23:40:59', '2014-09-01 23:40:44'),
(11, '993287547bannerLeft.jpg', NULL, 0, 'sonata.media.provider.image', 1, '9de90c554ba2426d850810383467c62accf76ec1.jpeg', '{"filename":"993287547bannerLeft.jpg"}', 240, 990, NULL, 'image/jpeg', 56509, NULL, NULL, 'banner', NULL, NULL, NULL, '2014-09-01 23:40:59', '2014-09-01 23:40:59'),
(12, '10625042_10152601049331840_303438841770852862_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, '18a66b60cf616ac44252c4455f577f05ec8d3df8.jpeg', '{"filename":"10625042_10152601049331840_303438841770852862_n.jpg"}', 600, 400, NULL, 'image/jpeg', 17324, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-02 19:26:03', '2014-09-02 19:25:50'),
(13, '10625042_10152601049331840_303438841770852862_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, 'b7df7f732c1fa9262aad21af64dea099d9992281.jpeg', '{"filename":"10625042_10152601049331840_303438841770852862_n.jpg"}', 600, 400, NULL, 'image/jpeg', 17324, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-02 19:26:48', '2014-09-02 19:26:03'),
(14, '10625042_10152601049331840_303438841770852862_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, '4a9dcd1f58b0fb896320e5659d3876bcc01b0a99.jpeg', '{"filename":"10625042_10152601049331840_303438841770852862_n.jpg"}', 600, 400, NULL, 'image/jpeg', 17324, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-02 19:27:18', '2014-09-02 19:26:48'),
(15, '10625042_10152601049331840_303438841770852862_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, 'aa9557a9b7d09a2929c2381ff6ee61942077e857.jpeg', '{"filename":"10625042_10152601049331840_303438841770852862_n.jpg"}', 600, 400, NULL, 'image/jpeg', 17324, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-02 19:27:34', '2014-09-02 19:27:18'),
(16, '10625042_10152601049331840_303438841770852862_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, 'dbf767411f9e4a296b2bf6ff5106ee159505e99f.jpeg', '{"filename":"10625042_10152601049331840_303438841770852862_n.jpg"}', 600, 400, NULL, 'image/jpeg', 17324, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-02 19:28:22', '2014-09-02 19:27:34'),
(17, '10625042_10152601049331840_303438841770852862_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, '8103ba838b4e638ef9bf259532e058b2a5e61011.jpeg', '{"filename":"10625042_10152601049331840_303438841770852862_n.jpg"}', 600, 400, NULL, 'image/jpeg', 17324, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-02 19:28:43', '2014-09-02 19:28:22'),
(18, '10625042_10152601049331840_303438841770852862_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, '9f33035feeb5c66b8eeffe7db055865791c37caf.jpeg', '{"filename":"10625042_10152601049331840_303438841770852862_n.jpg"}', 600, 400, NULL, 'image/jpeg', 17324, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-02 19:30:46', '2014-09-02 19:28:43'),
(19, '10625042_10152601049331840_303438841770852862_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, 'b360aec40a41c47a851fb8ac87ccc95a7ae3a7b9.jpeg', '{"filename":"10625042_10152601049331840_303438841770852862_n.jpg"}', 600, 400, NULL, 'image/jpeg', 17324, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-02 19:31:09', '2014-09-02 19:30:46'),
(20, '10625042_10152601049331840_303438841770852862_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, '0eb740970dbba5e8d6a1b6c846ef956b0683f1ab.jpeg', '{"filename":"10625042_10152601049331840_303438841770852862_n.jpg"}', 600, 400, NULL, 'image/jpeg', 17324, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-02 19:35:32', '2014-09-02 19:31:09'),
(21, '10625042_10152601049331840_303438841770852862_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, 'eb82100a4ef52addf712beacc00dbe5eb02247b5.jpeg', '{"filename":"10625042_10152601049331840_303438841770852862_n.jpg"}', 600, 400, NULL, 'image/jpeg', 17324, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-02 19:37:17', '2014-09-02 19:35:31'),
(22, '10625042_10152601049331840_303438841770852862_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, '356a922ca1133c0793b3a1393d9e0c08a2667b4c.jpeg', '{"filename":"10625042_10152601049331840_303438841770852862_n.jpg"}', 600, 400, NULL, 'image/jpeg', 17324, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-02 19:41:09', '2014-09-02 19:37:16'),
(23, '10625042_10152601049331840_303438841770852862_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, 'f78161b1d4e6c66ebd4be78fc37435a01bc5049d.jpeg', '{"filename":"10625042_10152601049331840_303438841770852862_n.jpg"}', 600, 400, NULL, 'image/jpeg', 17324, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-02 19:41:41', '2014-09-02 19:41:09'),
(24, '10625042_10152601049331840_303438841770852862_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, '5d1101c7cce7c763ef7f9fc31c8bd6fe34b7c60b.jpeg', '{"filename":"10625042_10152601049331840_303438841770852862_n.jpg"}', 600, 400, NULL, 'image/jpeg', 17324, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-02 19:41:54', '2014-09-02 19:41:41'),
(25, '10625042_10152601049331840_303438841770852862_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, 'd0e448a575192739c38a4a35d6aaad86b84d9f11.jpeg', '{"filename":"10625042_10152601049331840_303438841770852862_n.jpg"}', 600, 400, NULL, 'image/jpeg', 17324, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-02 19:42:05', '2014-09-02 19:41:54'),
(26, '10625042_10152601049331840_303438841770852862_n.jpg', NULL, 0, 'sonata.media.provider.image', 1, 'ae50965c44ca30a75ee18f25bc15aa68984fdbc0.jpeg', '{"filename":"10625042_10152601049331840_303438841770852862_n.jpg"}', 600, 400, NULL, 'image/jpeg', 17324, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-02 19:42:05', '2014-09-02 19:42:05'),
(27, 'little-sunrise.jpg', NULL, 0, 'sonata.media.provider.image', 1, 'c5e17e9a2e9317b947af30aa9c8683f705af68ca.jpeg', '{"filename":"little-sunrise.jpg"}', 2048, 2048, NULL, 'image/jpeg', 2512357, NULL, NULL, 'publicidad', NULL, NULL, NULL, '2014-09-03 08:28:06', '2014-09-03 08:28:06'),
(28, 'tumblr_n8bwt2Oe1i1qmgqcho1_500.gif', NULL, 0, 'sonata.media.provider.image', 1, '21146c5a66c6e09476e94c0e821fe127c9a9173f.gif', '{"filename":"tumblr_n8bwt2Oe1i1qmgqcho1_500.gif"}', 500, 278, NULL, 'image/gif', 501253, NULL, NULL, 'publicidad', NULL, NULL, NULL, '2014-09-03 08:43:11', '2014-09-03 08:43:11'),
(29, '12508968534_02d715abf9_k.jpg', NULL, 0, 'sonata.media.provider.image', 1, '446cdeb0439cfd8c1826d6337cedd2083416b89b.jpeg', '{"filename":"12508968534_02d715abf9_k.jpg"}', 2048, 1365, NULL, 'image/jpeg', 1144898, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-04 23:13:15', '2014-09-04 23:13:15'),
(31, '494509-20130305095123.jpg', NULL, 0, 'sonata.media.provider.image', 1, '54a3e52718c8531e9a582f1ed7baaa4145f5c0d3.png', '{"filename":"494509-20130305095123.jpg"}', 1280, 800, NULL, 'image/png', 990248, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-09-24 21:39:18', '2014-09-24 21:39:18'),
(32, '027333c32caac0f4d8f40cf744ba1ad7092946ed.jpg', NULL, 0, 'sonata.media.provider.image', 1, '198ef33abbb2fb549fd1c8a4986600219cf39c39.jpeg', '{"filename":"82c33e6be7cc9ce0d3a12544ccdbfa595113762e.jpg"}', 1500, 1104, NULL, 'image/jpeg', 376030, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-10-29 15:39:46', '2014-10-29 15:38:11'),
(33, '82c33e6be7cc9ce0d3a12544ccdbfa595113762e.jpg', NULL, 0, 'sonata.media.provider.image', 1, 'a4c71043eba2a020efc52fd131a02f2fbd912bee.jpeg', '{"filename":"687b7db6b5cf9bad5125e92e22597c21ef129f7a.jpg"}', 1100, 600, NULL, 'image/jpeg', 224424, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-10-29 16:05:19', '2014-10-29 15:39:45'),
(34, '687b7db6b5cf9bad5125e92e22597c21ef129f7a.jpg', NULL, 0, 'sonata.media.provider.image', 1, '944b7e6dcc837aa913d62870d52d8546b2a89674.jpeg', '{"filename":"687b7db6b5cf9bad5125e92e22597c21ef129f7a.jpg"}', 1100, 600, NULL, 'image/jpeg', 224424, NULL, NULL, 'tienda_cabecera', NULL, NULL, NULL, '2014-10-29 16:05:19', '2014-10-29 16:05:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE IF NOT EXISTS `mensaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `tipo_notificacion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_recibe` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_envia` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id`, `contenido`, `created_at`, `updated_at`, `tipo_notificacion`, `titulo`, `usuario_recibe`, `usuario_envia`, `estado`) VALUES
(1, 'hola', '2014-10-29 21:29:37', '2014-10-29 21:29:37', '1', 'asunto', 'admin', 'developer', 0),
(2, 'hola', '2014-10-29 21:31:33', '2014-10-29 21:31:33', '1', 'asunto', 'developer', 'admin', 0),
(3, 'undefined', '2014-10-29 22:17:40', '2014-10-29 22:17:40', '1', 'asdad', 'developer', '1005973391', 0),
(4, 'undefined', '2014-10-29 22:18:38', '2014-10-29 22:18:38', '1', 'asunto', 'developer', '1005973391', 0),
(5, 'undefined', '2014-10-29 22:21:04', '2014-10-29 22:21:04', '1', 'asunto', 'developer', '1005973391', 0),
(6, 'undefined', '2014-10-29 23:15:47', '2014-10-29 23:15:47', '1', 'quiero comrpar', '1005973391', 'developer', 0),
(7, 'undefined', '2014-11-14 17:32:08', '2014-11-14 17:32:08', '1', 'titulo ', '1005973391', '1005973391', 0),
(8, 'undefined', '2014-11-14 19:06:15', '2014-11-14 19:06:15', '1', 'Compra de (3) otro producto nuevo', '1005973391', '1005973391', 0),
(9, 'undefined', '2014-11-14 19:08:00', '2014-11-14 19:08:00', '1', 'Compra de (3) otro producto nuevo', '1005973391', '1005973391', 0),
(10, 'undefined', '2014-11-14 19:14:24', '2014-11-14 19:14:24', '1', 'Compra de (3) otro producto nuevo', '1005973391', '1005973391', 0),
(11, 'undefined', '2014-11-14 19:14:52', '2014-11-14 19:14:52', '1', 'Compra de (3) otro producto nuevo', '1005973391', '1005973391', 0),
(12, 'undefined', '2014-11-14 19:17:04', '2014-11-14 19:17:04', '1', 'Compra de (1) otro producto nuevo', '1005973391', '1005973391', 0),
(13, 'undefined', '2014-11-14 19:17:58', '2014-11-14 19:17:58', '1', 'Compra de (1) Nombre de producto nuevo', '1005973391', '1005973391', 0),
(14, 'undefined', '2014-11-14 19:19:58', '2014-11-14 19:19:58', '1', 'Compra de (1) otro producto nuevo', '1005973391', '1005973391', 0),
(15, 'undefined', '2014-11-14 19:21:29', '2014-11-14 19:21:29', '1', 'Compra de (2) otro prodcuto', '1005973391', '1005973391', 0),
(16, 'undefined', '2014-11-14 19:23:13', '2014-11-14 19:23:13', '1', 'Compra de (2) otro prodcuto', '1005973391', '1005973391', 0),
(17, 'undefined', '2014-11-14 19:24:22', '2014-11-14 19:24:22', '1', 'Compra de (2) otro prodcuto', '1005973391', '1005973391', 0),
(18, 'undefined', '2014-11-14 19:27:26', '2014-11-14 19:27:26', '1', 'Compra de (2) otro prodcuto', '1005973391', '1005973391', 0),
(19, 'undefined', '2014-11-14 19:29:41', '2014-11-14 19:29:41', '1', 'Compra de (2) otro prodcuto', '1005973391', '1005973391', 0),
(20, 'undefined', '2014-11-14 19:30:52', '2014-11-14 19:30:52', '1', 'Compra de (2) otro prodcuto', '1005973391', '1005973391', 0),
(21, 'undefined', '2014-11-14 21:06:44', '2014-11-14 21:06:44', '1', 'Compra de (2) otro prodcuto', '1005973391', '1005973391', 0),
(22, 'undefined', '2014-11-14 21:43:40', '2014-11-14 21:43:40', '1', 'Compra de (2) otro prodcuto', '1005973391', '1005973391', 0),
(23, 'undefined', '2014-11-14 21:44:05', '2014-11-14 21:44:05', '1', 'Compra de (2) otro prodcuto', '1005973391', '1005973391', 0),
(24, 'undefined', '2014-11-14 21:44:27', '2014-11-14 21:44:27', '1', 'Compra de (2) otro prodcuto', '1005973391', '1005973391', 0),
(25, 'undefined', '2014-11-14 21:45:02', '2014-11-14 21:45:02', '1', 'Compra de (2) otro prodcuto', '1005973391', '1005973391', 0),
(26, 'undefined', '2014-11-14 21:45:48', '2014-11-14 21:45:48', '1', 'Compra de (2) otro prodcuto', '1005973391', '1005973391', 0),
(27, 'undefined', '2014-11-14 21:46:32', '2014-11-14 21:46:32', '1', 'Compra de (2) otro prodcuto', '1005973391', '1005973391', 0),
(28, 'undefined', '2014-11-14 21:54:28', '2014-11-14 21:54:28', '1', 'Compra de (1) descriopcin de otro proucto', '1005973391', '1005973391', 0),
(29, 'undefined', '2014-11-15 00:25:28', '2014-11-15 00:25:28', '1', 'Compra de (1) descriopcin de otro proucto', '1005973391', '1005973391', 0),
(30, 'undefined', '2014-11-15 00:25:30', '2014-11-15 00:25:30', '1', 'Compra de (1) descriopcin de otro proucto', '1005973391', '1005973391', 0),
(31, 'undefined', '2014-11-19 17:36:15', '2014-11-19 17:36:15', '1', 'Compra de (1) otro prodcuto', '1005973391', '1005973391', 0),
(32, 'undefined', '2014-11-19 17:45:55', '2014-11-19 17:45:55', '1', 'Compra de (1) otro prodcuto', '1005973391', '1005973391', 0),
(33, 'undefined', '2014-11-19 17:50:02', '2014-11-19 17:50:02', '1', 'Compra de (1) otro prodcuto', '1005973391', '1005973391', 0),
(34, 'undefined', '2014-11-19 17:52:10', '2014-11-19 17:52:10', '1', 'Compra de (1) descriopcin de otro proucto', '1005973391', '1005973391', 0),
(35, 'undefined', '2014-11-19 17:53:07', '2014-11-19 17:53:07', '1', 'Compra de (1) descriopcin de otro proucto', '1005973391', '1005973391', 0),
(36, 'undefined', '2014-11-19 17:54:00', '2014-11-19 17:54:00', '1', 'Compra de (1) descriopcin de otro proucto', '1005973391', '1005973391', 0),
(37, 'undefined', '2014-11-19 17:54:27', '2014-11-19 17:54:27', '1', 'Compra de (1) descriopcin de otro proucto', '1005973391', '1005973391', 0),
(38, 'undefined', '2014-11-19 17:55:24', '2014-11-19 17:55:24', '1', 'Compra de (1) descriopcin de otro proucto', '1005973391', '1005973391', 0),
(39, 'undefined', '2014-11-19 17:55:53', '2014-11-19 17:55:53', '1', 'Compra de (1) descriopcin de otro proucto', '1005973391', '1005973391', 0),
(40, 'undefined', '2014-11-19 17:56:13', '2014-11-19 17:56:13', '1', 'Compra de (1) descriopcin de otro proucto', '1005973391', '1005973391', 0),
(41, 'undefined', '2014-11-19 17:56:41', '2014-11-19 17:56:41', '1', 'Compra de (1) descriopcin de otro proucto', '1005973391', '1005973391', 0),
(42, 'undefined', '2014-11-19 17:57:07', '2014-11-19 17:57:07', '1', 'Compra de (1) descriopcin de otro proucto', '1005973391', '1005973391', 0),
(43, 'undefined', '2014-11-19 17:57:23', '2014-11-19 17:57:23', '1', 'Compra de (1) descriopcin de otro proucto', '1005973391', '1005973391', 0),
(44, 'undefined', '2014-11-19 17:58:05', '2014-11-19 17:58:05', '1', 'Compra de (1) descriopcin de otro proucto', '1005973391', '1005973391', 0),
(45, 'undefined', '2014-11-20 17:59:30', '2014-11-20 17:59:30', '1', 'Compra de (1) Nombre de producto nuevo', '1005973391', '1005973391', 0),
(46, 'undefined', '2014-11-20 17:59:41', '2014-11-20 17:59:41', '1', 'Compra de (1) Nombre de producto nuevo', '1005973391', '1005973391', 0),
(47, 'undefined', '2014-11-20 18:01:52', '2014-11-20 18:01:52', '1', 'Compra de (1) Nombre de producto nuevo', '1005973391', '1005973391', 0),
(48, 'undefined', '2014-11-20 18:06:31', '2014-11-20 18:06:31', '1', 'Compra de (1) Nombre de producto nuevo', '1005973391', '1005973391', 0),
(49, 'undefined', '2014-11-20 18:06:53', '2014-11-20 18:06:53', '1', 'Compra de (1) Nombre de producto nuevo', '1005973391', '1005973391', 0),
(50, 'undefined', '2014-11-20 18:07:28', '2014-11-20 18:07:28', '1', 'Compra de (1) Nombre de producto nuevo', '1005973391', '1005973391', 0),
(51, 'undefined', '2014-11-20 19:06:22', '2014-11-20 19:06:22', '1', 'Compra de (1) descriopcin de otro proucto', '1005973391', '1005973391', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news__comment`
--

CREATE TABLE IF NOT EXISTS `news__comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A90210404B89032C` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news__post`
--

CREATE TABLE IF NOT EXISTS `news__post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abstract` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `raw_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content_formatter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publication_date_start` datetime DEFAULT NULL,
  `comments_enabled` tinyint(1) NOT NULL,
  `comments_close_at` datetime DEFAULT NULL,
  `comments_default_status` int(11) NOT NULL,
  `comments_count` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `collection_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_7D109BC83DA5256D` (`image_id`),
  KEY `IDX_7D109BC8F675F31B` (`author_id`),
  KEY `IDX_7D109BC8514956FD` (`collection_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `news__post`
--

INSERT INTO `news__post` (`id`, `title`, `abstract`, `content`, `raw_content`, `content_formatter`, `enabled`, `slug`, `publication_date_start`, `comments_enabled`, `comments_close_at`, `comments_default_status`, `comments_count`, `created_at`, `updated_at`, `image_id`, `author_id`, `collection_id`) VALUES
(1, 'asdas', 'adasd', '<h1>Piratas del Caribe 5 ya tiene fecha de estreno</h1>\n\n<div>\n<div>\n<div>\n<div>\n<div>\n<div>&nbsp;</div>\n</div>\n\n<div>\n<div>\n<div>\n<div>\n<div>Viernes 25 de Julio de 2014 - 12:11</div>\n\n<div>\n<div>\n<div>\n<div><a class="colorbox init-colorbox-processed cboxElement" href="http://www.ecuavisa.com/sites/ecuavisa.com/files/fotos/2014/07/piratas.jpg" rel="gallery-node-73049" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; color: rgb(32, 33, 36); text-decoration: none;" title=""><img alt="" src="http://www.ecuavisa.com/sites/ecuavisa.com/files/styles/ampliada/public/fotos/2014/07/piratas.jpg" style="border:0px; font-family:inherit; font-size:inherit; font-style:inherit; font-variant:inherit; font-weight:inherit; height:314px; line-height:inherit; margin:0px; outline:0px; padding:0px; vertical-align:bottom; width:660px" title="" /></a></div>\n</div>\n</div>\n</div>\n\n<div>&nbsp;</div>\n\n<div>\n<ul>\n	<li><a class="print-page" href="http://www.ecuavisa.com/print/articulo/entretenimiento/espectaculo/73049-piratas-del-caribe-5-ya-tiene-fecha-estreno" rel="nofollow" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; color: rgb(0, 98, 160); text-decoration: underline;" title="Display a printer-friendly version of this page."><img alt="Versión para impresión" class="print-icon" src="http://www.ecuavisa.com/sites/all/modules/contrib/print/icons/print_icon.png" style="border:0px; font-family:inherit; font-size:inherit; font-style:inherit; font-variant:inherit; font-weight:inherit; height:16px; line-height:inherit; margin:0px; outline:0px; padding:0px; vertical-align:middle; width:16px" title="Versión para impresión" /></a></li>\n	<li><a class="print-mail" href="http://www.ecuavisa.com/printmail/73049" rel="nofollow" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; color: rgb(0, 98, 160); text-decoration: underline;" title="Send this page by email."><img alt="Send by email" class="print-icon" src="http://www.ecuavisa.com/sites/all/modules/contrib/print/print_mail/icons/mail_icon.png" style="border:0px; font-family:inherit; font-size:inherit; font-style:inherit; font-variant:inherit; font-weight:inherit; height:16px; line-height:inherit; margin:0px; outline:0px; padding:0px; vertical-align:middle; width:16px" title="Send by email" /></a></li>\n	<li><a class="print-pdf" href="http://www.ecuavisa.com/printpdf/73049" rel="nofollow" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; color: rgb(0, 98, 160); text-decoration: underline;" title="Display a PDF version of this page."><img alt="PDF version" class="print-icon" src="http://www.ecuavisa.com/sites/all/modules/contrib/print/print_pdf/icons/pdf_icon.png" style="border:0px; font-family:inherit; font-size:inherit; font-style:inherit; font-variant:inherit; font-weight:inherit; height:16px; line-height:inherit; margin:0px; outline:0px; padding:0px; vertical-align:middle; width:16px" title="PDF version" /></a></li>\n</ul>\n\n<div>\n<div>\n<div>\n<div><a class="facebook-button" href="http://www.ecuavisa.com/articulo/entretenimiento/espectaculo/73049-piratas-del-caribe-5-ya-tiene-fecha-estreno#" style="margin: 0px 2em !important; padding: 2px 6px 2px 20px; border: 1px solid rgb(202, 212, 231); outline: 0px; vertical-align: baseline; font-family: inherit; font-size: 0.8em; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; color: rgb(59, 89, 152); text-decoration: none; border-top-left-radius: 3px; border-top-right-radius: 3px; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px; cursor: pointer; white-space: nowrap; display: inline-block; background: url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/y-/r/tbhIfdAHjXE.png)  no-repeat rgb(236, 238, 245);">Compartir</a>\n\n<div style="background:transparent; border:0px none; padding:0px">&nbsp;</div>\n</div>\n</div>\n</div>\n</div>\n\n<div>\n<h2 style="font-style:inherit">Noticias Relacionadas</h2>\n\n<div>\n<div>\n<div>&nbsp;</div>\n\n<div>\n<div>\n<div>16 Jul 2014</div>\n\n<div><a href="http://www.ecuavisa.com/articulo/entretenimiento/espectaculo/71896-10-imagenes-escenas-peliculas-famosas" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: ''Open Sans Condensed'', sans-serif; font-size: 1.063em; font-style: normal; font-variant: inherit; font-weight: inherit; line-height: inherit; text-decoration: none; color: rgb(51, 51, 51) !important;">10 im&aacute;genes de escenas de pel&iacute;culas famosas</a></div>\n</div>\n\n<div>\n<div>29 Mayo 2014</div>\n\n<div><a href="http://www.ecuavisa.com/articulo/entretenimiento/espectaculo/65046-barco-piratas-del-caribe-se-hunde-aguas-caribenas" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: ''Open Sans Condensed'', sans-serif; font-size: 1.063em; font-style: normal; font-variant: inherit; font-weight: inherit; line-height: inherit; text-decoration: none; color: rgb(51, 51, 51) !important;">El barco de &quot;Piratas del Caribe&quot; se hunde en aguas caribe&ntilde;as</a></div>\n</div>\n</div>\n</div>\n</div>\n</div>\n\n<div>\n<div>\n<div>\n<div>La famosa saga de Piratas del Caribe regresar&aacute; con su quinta entrega exactamente el 7 de julio de 2017. La pel&iacute;cula fue originalmente programada para ser lanzada en el verano 2016, pero la producci&oacute;n se retras&oacute; por cuestiones de gui&oacute;n, siendo esta la segunda oportunidad en que alargan su estreno por el mismo motivo.</div>\n\n<div>&nbsp;</div>\n\n<div>Se espera que Johnny Depp repita en su papel del elocuente capit&aacute;n.</div>\n\n<div>&nbsp;</div>\n\n<div>Jeff Nathanson fue contratado para escribir el guion. &ldquo;Al igual que el p&uacute;blico de todo el mundo, tenemos grandes expectativas para la pr&oacute;xima aventura de Jack Sparrow y queremos tener todos los elementos correctos en el lugar&rdquo;, indic&oacute; en octubre del a&ntilde;o pasado el presidente de producci&oacute;n de Disney, Sean Bailey. &ldquo;A&uacute;n no estamos all&iacute; y queremos asegurarnos de que este proyecto es todo lo que estos personajes maravillosos y, por supuesto, los fans se merecen&rdquo;, agreg&oacute;.</div>\n\n<div>&nbsp;</div>\n\n<div>\n<div>En cuanto a los detalles de la trama, se mantienen con total hermetismo.</div>\n\n<div>&nbsp;</div>\n\n<div>Las primeras cuatro pel&iacute;culas de cuatro piratas han recaudado 3,7 mil millones de d&oacute;lares, y la cuarta entrega, En Mareas Misteriosas, cruz&oacute; la marca de mil millones. La quinta pel&iacute;cula se enfrentar&aacute; a la dura competencia de los Cuatro Fant&aacute;sticos 2 y Mi Villano Favorito 3.</div>\n\n<div>&nbsp;</div>\n\n<div>Informaci&oacute;n tomada de eonline</div>\n\n<div>&nbsp;</div>\n\n<div>&nbsp;</div>\n</div>\n\n<div>&nbsp;</div>\n\n<div>&nbsp;</div>\n</div>\n</div>\n</div>\n\n<div style="background:url(http://www.ecuavisa.com/sites/all/themes/ecuavisa/images/nota-amp/tag.png) 2px 6px no-repeat rgb(248, 248, 248); border:0px; padding:0px 0px 0px 20px">\n<div>\n<div>&nbsp;</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>\n</div>', '<h1>Piratas del Caribe 5 ya tiene fecha de estreno</h1>\r\n\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>&nbsp;</div>\r\n</div>\r\n\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>Viernes 25 de Julio de 2014 - 12:11</div>\r\n\r\n<div>\r\n<div>\r\n<div>\r\n<div><a class="colorbox init-colorbox-processed cboxElement" href="http://www.ecuavisa.com/sites/ecuavisa.com/files/fotos/2014/07/piratas.jpg" rel="gallery-node-73049" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; color: rgb(32, 33, 36); text-decoration: none;" title=""><img alt="" src="http://www.ecuavisa.com/sites/ecuavisa.com/files/styles/ampliada/public/fotos/2014/07/piratas.jpg" style="border:0px; font-family:inherit; font-size:inherit; font-style:inherit; font-variant:inherit; font-weight:inherit; height:314px; line-height:inherit; margin:0px; outline:0px; padding:0px; vertical-align:bottom; width:660px" title="" /></a></div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>\r\n<ul>\r\n	<li><a class="print-page" href="http://www.ecuavisa.com/print/articulo/entretenimiento/espectaculo/73049-piratas-del-caribe-5-ya-tiene-fecha-estreno" rel="nofollow" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; color: rgb(0, 98, 160); text-decoration: underline;" title="Display a printer-friendly version of this page."><img alt="Versión para impresión" class="print-icon" src="http://www.ecuavisa.com/sites/all/modules/contrib/print/icons/print_icon.png" style="border:0px; font-family:inherit; font-size:inherit; font-style:inherit; font-variant:inherit; font-weight:inherit; height:16px; line-height:inherit; margin:0px; outline:0px; padding:0px; vertical-align:middle; width:16px" title="Versión para impresión" /></a></li>\r\n	<li><a class="print-mail" href="http://www.ecuavisa.com/printmail/73049" rel="nofollow" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; color: rgb(0, 98, 160); text-decoration: underline;" title="Send this page by email."><img alt="Send by email" class="print-icon" src="http://www.ecuavisa.com/sites/all/modules/contrib/print/print_mail/icons/mail_icon.png" style="border:0px; font-family:inherit; font-size:inherit; font-style:inherit; font-variant:inherit; font-weight:inherit; height:16px; line-height:inherit; margin:0px; outline:0px; padding:0px; vertical-align:middle; width:16px" title="Send by email" /></a></li>\r\n	<li><a class="print-pdf" href="http://www.ecuavisa.com/printpdf/73049" rel="nofollow" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: inherit; font-size: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; color: rgb(0, 98, 160); text-decoration: underline;" title="Display a PDF version of this page."><img alt="PDF version" class="print-icon" src="http://www.ecuavisa.com/sites/all/modules/contrib/print/print_pdf/icons/pdf_icon.png" style="border:0px; font-family:inherit; font-size:inherit; font-style:inherit; font-variant:inherit; font-weight:inherit; height:16px; line-height:inherit; margin:0px; outline:0px; padding:0px; vertical-align:middle; width:16px" title="PDF version" /></a></li>\r\n</ul>\r\n\r\n<div>\r\n<div>\r\n<div>\r\n<div><a class="facebook-button" href="http://www.ecuavisa.com/articulo/entretenimiento/espectaculo/73049-piratas-del-caribe-5-ya-tiene-fecha-estreno#" style="margin: 0px 2em !important; padding: 2px 6px 2px 20px; border: 1px solid rgb(202, 212, 231); outline: 0px; vertical-align: baseline; font-family: inherit; font-size: 0.8em; font-style: inherit; font-variant: inherit; font-weight: inherit; line-height: inherit; color: rgb(59, 89, 152); text-decoration: none; border-top-left-radius: 3px; border-top-right-radius: 3px; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px; cursor: pointer; white-space: nowrap; display: inline-block; background: url(https://fbstatic-a.akamaihd.net/rsrc.php/v2/y-/r/tbhIfdAHjXE.png)  no-repeat rgb(236, 238, 245);">Compartir</a>\r\n\r\n<div style="background:transparent; border:0px none; padding:0px">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>\r\n<h2 style="font-style:inherit">Noticias Relacionadas</h2>\r\n\r\n<div>\r\n<div>\r\n<div>&nbsp;</div>\r\n\r\n<div>\r\n<div>\r\n<div>16 Jul 2014</div>\r\n\r\n<div><a href="http://www.ecuavisa.com/articulo/entretenimiento/espectaculo/71896-10-imagenes-escenas-peliculas-famosas" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: ''Open Sans Condensed'', sans-serif; font-size: 1.063em; font-style: normal; font-variant: inherit; font-weight: inherit; line-height: inherit; text-decoration: none; color: rgb(51, 51, 51) !important;">10 im&aacute;genes de escenas de pel&iacute;culas famosas</a></div>\r\n</div>\r\n\r\n<div>\r\n<div>29 Mayo 2014</div>\r\n\r\n<div><a href="http://www.ecuavisa.com/articulo/entretenimiento/espectaculo/65046-barco-piratas-del-caribe-se-hunde-aguas-caribenas" style="margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; font-family: ''Open Sans Condensed'', sans-serif; font-size: 1.063em; font-style: normal; font-variant: inherit; font-weight: inherit; line-height: inherit; text-decoration: none; color: rgb(51, 51, 51) !important;">El barco de &quot;Piratas del Caribe&quot; se hunde en aguas caribe&ntilde;as</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div>\r\n<div>\r\n<div>\r\n<div>La famosa saga de Piratas del Caribe regresar&aacute; con su quinta entrega exactamente el 7 de julio de 2017. La pel&iacute;cula fue originalmente programada para ser lanzada en el verano 2016, pero la producci&oacute;n se retras&oacute; por cuestiones de gui&oacute;n, siendo esta la segunda oportunidad en que alargan su estreno por el mismo motivo.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Se espera que Johnny Depp repita en su papel del elocuente capit&aacute;n.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Jeff Nathanson fue contratado para escribir el guion. &ldquo;Al igual que el p&uacute;blico de todo el mundo, tenemos grandes expectativas para la pr&oacute;xima aventura de Jack Sparrow y queremos tener todos los elementos correctos en el lugar&rdquo;, indic&oacute; en octubre del a&ntilde;o pasado el presidente de producci&oacute;n de Disney, Sean Bailey. &ldquo;A&uacute;n no estamos all&iacute; y queremos asegurarnos de que este proyecto es todo lo que estos personajes maravillosos y, por supuesto, los fans se merecen&rdquo;, agreg&oacute;.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>\r\n<div>En cuanto a los detalles de la trama, se mantienen con total hermetismo.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Las primeras cuatro pel&iacute;culas de cuatro piratas han recaudado 3,7 mil millones de d&oacute;lares, y la cuarta entrega, En Mareas Misteriosas, cruz&oacute; la marca de mil millones. La quinta pel&iacute;cula se enfrentar&aacute; a la dura competencia de los Cuatro Fant&aacute;sticos 2 y Mi Villano Favorito 3.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Informaci&oacute;n tomada de eonline</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div style="background:url(http://www.ecuavisa.com/sites/all/themes/ecuavisa/images/nota-amp/tag.png) 2px 6px no-repeat rgb(248, 248, 248); border:0px; padding:0px 0px 0px 20px">\r\n<div>\r\n<div>&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'richhtml', 1, 'asdas', '2014-07-26 09:42:02', 1, '2014-07-26 09:42:02', 2, 0, '2014-07-26 09:42:48', '2014-07-26 22:09:58', NULL, 2, NULL),
(2, 'Titulo de articulo', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\n\n<p>&nbsp;</p>\n\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>', 'richhtml', 1, 'titulo-de-articulo', '2014-08-24 18:11:43', 0, '2014-08-24 18:11:43', 2, 0, '2014-08-24 18:13:34', '2014-08-24 18:13:34', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news__post_tag`
--

CREATE TABLE IF NOT EXISTS `news__post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`tag_id`),
  KEY `IDX_682B20514B89032C` (`post_id`),
  KEY `IDX_682B2051BAD26311` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order__order`
--

CREATE TABLE IF NOT EXISTS `order__order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `delivery_status` int(11) DEFAULT NULL,
  `validated_at` datetime DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_inc` decimal(10,4) DEFAULT NULL,
  `total_excl` decimal(10,4) DEFAULT NULL,
  `delivery_cost` decimal(10,4) DEFAULT NULL,
  `delivery_vat` decimal(10,4) DEFAULT NULL,
  `locale` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_country_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_address1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_address3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_country_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BC9E6FD19395C3F3` (`customer_id`),
  KEY `order_status` (`status`),
  KEY `payment_status` (`payment_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order__order_element`
--

CREATE TABLE IF NOT EXISTS `order__order_element` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price_excl` decimal(10,4) NOT NULL,
  `unit_price_inc` decimal(10,4) NOT NULL,
  `price` decimal(10,4) NOT NULL,
  `vat_rate` decimal(10,4) NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `options` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `raw_product` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json)',
  `status` int(11) NOT NULL,
  `delivery_status` int(11) NOT NULL,
  `validated_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_701A67EC8D9F6D38` (`order_id`),
  KEY `product_type` (`product_type`),
  KEY `order_element_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment__transaction`
--

CREATE TABLE IF NOT EXISTS `payment__transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `parameters` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `status_code` int(11) NOT NULL,
  `payment_code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `information` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4A7A00358D9F6D38` (`order_id`),
  KEY `status_code` (`status_code`),
  KEY `state` (`state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `visitas` int(11) DEFAULT NULL,
  `favoritos` int(11) DEFAULT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A7BB06151129C265` (`ocasion_id`),
  KEY `IDX_A7BB0615B564FBC1` (`destinatario_id`),
  KEY `IDX_A7BB061588D3B71A` (`subcategoria_id`),
  KEY `IDX_A7BB061519BA6D46` (`tienda_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=48 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `ocasion_id`, `destinatario_id`, `subcategoria_id`, `tienda_id`, `nombre`, `descripcion`, `borrado`, `created_at`, `updated_at`, `cantidad`, `precio`, `visitas`, `favoritos`, `slug`) VALUES
(26, 1, 1, 1, 3, 'Nombre de producto nuevo', 'este produncto es bueno para todo tipo de ocasiones', 0, '2014-07-31 02:37:50', '2014-11-10 17:43:00', 12, 123, NULL, NULL, '26_nombre_de_producto_nuevo'),
(27, 1, 1, 2, 3, 'otro producto nuevo', 'para toda ociaciones es este rprocuto', 0, '2014-07-31 02:38:33', '2014-11-10 17:43:00', 12, 12, NULL, NULL, '27_otro_producto_nuevo'),
(28, 1, 1, 1, 3, 'otro prodcuto', 'esta es la descripcion neuva de tu producto', 0, '2014-08-01 02:36:37', '2014-11-10 17:43:00', 2, 12, NULL, NULL, '28_otro_prodcuto'),
(29, 1, 1, 1, 3, 'descriopcin de otro proucto', '231231asdasndaoidn asdoasndoasnda', 0, '2014-08-01 02:37:03', '2014-11-10 17:43:00', 1, 223, NULL, NULL, '29_descriopcin_de_otro_proucto'),
(30, 1, 1, 1, 3, 'otro prodcuto', 'esta es la descripcion neuva de tu producto', 0, '2014-08-01 02:37:35', '2014-11-10 17:43:00', 2, 12, NULL, NULL, '30_otro_prodcuto'),
(31, 1, 1, 1, 3, 'producto nuevo', 'descripcion general', 0, '2014-08-01 02:37:59', '2014-11-10 17:43:00', 12, 12, NULL, NULL, '31_producto_nuevo'),
(32, 1, 1, 4, 4, 'prueba producti', 'descrupcion de mi producto que se mostrara', 0, '2014-09-01 05:02:33', '2014-11-10 17:43:00', 12, 12, NULL, NULL, '32_prueba_producti'),
(33, 1, 1, 1, 4, 'produ test', 'desc', 0, '2014-09-02 00:44:45', '2014-11-10 17:43:00', 1, 12, NULL, NULL, '33_produ_test'),
(34, 1, 1, 1, 4, 'producto nuevo', 'descricpion', 0, '2014-09-02 04:13:16', '2014-11-10 17:43:00', 1, 12, NULL, NULL, '34_producto_nuevo'),
(35, 1, 1, 1, 4, 'nomrbe de producto', 'descripcion de prodcuto', 0, '2014-09-02 04:15:09', '2014-11-10 17:43:00', 12, 12, NULL, NULL, '35_nomrbe_de_producto'),
(36, 1, 1, 1, 4, 'nombre nuevo', 'descripcion del producto', 0, '2014-09-02 04:24:09', '2014-11-10 17:43:00', 1, 34, NULL, NULL, '36_nombre_nuevo'),
(37, 1, 1, 3, 4, 'prod', 'asdasdasd', 0, '2014-09-02 04:24:56', '2014-11-10 17:43:00', 1, 12, NULL, NULL, '37_prod'),
(38, 1, 1, 1, 5, 'ropa de casa', 'esta es la descripcion neuva de tu producto', 0, '2014-09-20 02:52:42', '2014-11-10 17:43:00', 12, 12, NULL, NULL, '38_ropa_de_casa'),
(39, 1, 1, 1, 6, 'producto y', 'descrito aqui', 0, '2014-09-24 21:37:54', '2014-11-10 17:43:00', 12, 12, NULL, NULL, '39_producto_y'),
(40, 1, 1, 1, 7, 'mi producto', 'descripcion corta de mi producto', 0, '2014-10-27 20:33:28', '2014-11-10 17:43:00', 12, 122, NULL, NULL, '40_mi_producto'),
(41, 2, 2, 3, 7, 'nombre12', 'asdasd', 0, '2014-10-27 22:53:07', '2014-11-10 17:43:00', 2, 223, NULL, NULL, '41_nombre12'),
(42, 1, 1, 2, 7, 'producto', 'descripcion', 0, '2014-10-28 22:48:17', '2014-11-10 17:43:00', 12, 12, NULL, NULL, '42_producto'),
(43, 1, 1, 1, 7, 'nombre', 'descripcion', 0, '2014-10-28 22:49:03', '2014-11-10 17:43:00', 12, 12, NULL, NULL, '43_nombre'),
(44, 1, 1, 4, 9, 'nombre prueba', 'desripcion', 0, '2015-02-06 22:53:20', '2015-02-06 22:53:20', 12, 12, NULL, NULL, 'nombre_prueba'),
(45, 1, 1, 1, 9, 'asdsad', 'asdasdada', 0, '2015-02-06 22:55:09', '2015-02-06 22:55:09', 21, 12, NULL, NULL, 'asdsad'),
(46, 1, 1, 4, 9, 'asdasda', 'dqwdqwd', 0, '2015-02-06 23:08:55', '2015-02-06 23:08:55', 12, 12, NULL, NULL, 'asdasda'),
(47, 1, 1, 1, 9, 'asdsad', 'asdasda', 0, '2015-02-06 23:09:33', '2015-02-06 23:09:33', 21, 21, NULL, NULL, 'asdsad_1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `producto_destinatario`
--

INSERT INTO `producto_destinatario` (`id`, `nombre`, `descripcion`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 'mujeres', 'damas ', 0, '2014-02-11 00:00:00', '2014-02-11 00:00:00'),
(2, 'hombres', 'para genero masculino', 0, '2014-09-02 04:37:30', '2014-09-02 04:37:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_imagen`
--

CREATE TABLE IF NOT EXISTS `producto_imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `borrado` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2E3E7DFD7645698E` (`producto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=68 ;

--
-- Volcado de datos para la tabla `producto_imagen`
--

INSERT INTO `producto_imagen` (`id`, `producto_id`, `url`, `borrado`, `created_at`, `updated_at`) VALUES
(33, 26, '10264130_10152310176031840_6800835259043635212_o.jpg', 0, '2014-07-31 02:37:50', '2014-07-31 02:37:50'),
(34, 27, '10418252_10152254750883412_8288781940366120883_n.png', 0, '2014-07-31 02:38:33', '2014-07-31 02:38:33'),
(35, 27, '1965020_774980762546259_6883022383641343947_n.jpg', 0, '2014-07-31 02:38:33', '2014-07-31 02:38:33'),
(36, 28, '10334252_682918585126793_1792728817335393195_n.jpg', 0, '2014-08-01 02:36:37', '2014-08-01 02:36:37'),
(37, 28, '10173736_735313356520494_628958744220585632_n.jpg', 0, '2014-08-01 02:36:37', '2014-08-01 02:36:37'),
(38, 29, '10452459_10152501692002095_1615437913055402763_n.jpg', 0, '2014-08-01 02:37:03', '2014-08-01 02:37:03'),
(39, 29, 'Basilisk-Lizard-ipad-4-wallpaper-ilikewallpaper_com.jpg', 0, '2014-08-01 02:37:03', '2014-08-01 02:37:03'),
(40, 30, '10426904_634735529955158_2099457036700647384_n.jpg', 0, '2014-08-01 02:37:35', '2014-08-01 02:37:35'),
(41, 30, 'elsa_disney_frozen_hd_wallpaper.jpg', 0, '2014-08-01 02:37:35', '2014-08-01 02:37:35'),
(42, 31, '10557233_10152260681192901_2122220342379882382_n.jpg', 0, '2014-08-01 02:37:59', '2014-08-01 02:37:59'),
(43, 31, 'Basilisk-Lizard-ipad-4-wallpaper-ilikewallpaper_com.jpg', 0, '2014-08-01 02:37:59', '2014-08-01 02:37:59'),
(44, 32, 'tumblr_n0cr4iJB1d1svt5w5o1_500.png', 0, '2014-09-01 05:02:33', '2014-09-01 05:02:33'),
(45, 33, '10625042_10152601049331840_303438841770852862_n.jpg', 0, '2014-09-02 00:44:45', '2014-09-02 00:44:45'),
(46, 33, '12editsmall1-960x640.jpg', 0, '2014-09-02 00:44:45', '2014-09-02 00:44:45'),
(47, 34, '12editsmall1-960x640.jpg', 0, '2014-09-02 04:13:16', '2014-09-02 04:13:16'),
(48, 35, '12editsmall1-960x640.jpg', 0, '2014-09-02 04:15:09', '2014-09-02 04:15:09'),
(49, 35, '10612785_892459274114891_3817666835810897345_n.jpg', 0, '2014-09-02 04:15:09', '2014-09-02 04:15:09'),
(50, 36, 'Angry Birds iphone wallpapers 960x640 (12).jpg', 0, '2014-09-02 04:24:09', '2014-09-02 04:24:09'),
(51, 36, 'Ferrari_wallpaper_1024x1024.jpg', 0, '2014-09-02 04:24:09', '2014-09-02 04:24:09'),
(52, 37, 'forest-path-hd-widescreen-wallpapers-1136x640-jpeg-foto-wallpaper-01_60408fbe727f10b3bbac1be5bd7087f8_raw.jpg', 0, '2014-09-02 04:24:56', '2014-09-02 04:24:56'),
(53, 38, 'tumblr_naff221dFv1s2lswpo1_500.jpg', 0, '2014-09-20 02:52:42', '2014-09-20 02:52:42'),
(54, 39, '494509-20130305095123.jpg', 0, '2014-09-24 21:37:54', '2014-09-24 21:37:54'),
(55, 40, '157dbf7e7b187dfa17911cc7f971ef9b0c9facd8.jpg', 0, '2014-10-27 20:33:28', '2014-10-27 20:33:28'),
(56, 40, '13929_856960304313994_5029590617103918372_n.png', 0, '2014-10-27 20:33:28', '2014-10-27 20:33:28'),
(57, 41, '687b7db6b5cf9bad5125e92e22597c21ef129f7a.jpg', 0, '2014-10-27 22:53:07', '2014-10-27 22:53:07'),
(58, 41, '82c33e6be7cc9ce0d3a12544ccdbfa595113762e.jpg', 0, '2014-10-27 22:53:07', '2014-10-27 22:53:07'),
(59, 42, '1e40ad617990c661efca3ed4dfcad9a6ab0159cb.jpg', 0, '2014-10-28 22:48:17', '2014-10-28 22:48:17'),
(60, 43, 'tumblr_n93rxaiKly1r88u00o1_500.jpg', 0, '2014-10-28 22:49:03', '2014-10-28 22:49:03'),
(61, 44, '10603556_845146032210175_6607477486125432706_n.jpg', 0, '2015-02-06 22:53:20', '2015-02-06 22:53:20'),
(62, 44, 'tumblr_m961zk3CMg1qfrm2u.jpg', 0, '2015-02-06 22:53:20', '2015-02-06 22:53:20'),
(63, 45, '10675644_10152983288991840_6391907165983409359_n.jpg', 0, '2015-02-06 22:55:09', '2015-02-06 22:55:09'),
(64, 45, '10649828_707919569281179_1427030049399254441_n.jpg', 0, '2015-02-06 22:55:09', '2015-02-06 22:55:09'),
(65, 45, 'bart.jpg', 0, '2015-02-06 22:55:09', '2015-02-06 22:55:09'),
(66, 46, 'godcloth_seiya2.jpg', 0, '2015-02-06 23:08:55', '2015-02-06 23:08:55'),
(67, 47, 'large.jpg', 0, '2015-02-06 23:09:33', '2015-02-06 23:09:33');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `producto_ocasion`
--

INSERT INTO `producto_ocasion` (`id`, `nombre`, `descripcion`, `borrado`, `created_at`, `updated_at`) VALUES
(1, 'party hard', 'fiesta salvajes', 0, '2014-02-11 00:00:00', '2014-02-11 00:00:00'),
(2, 'casual', 'cualquier ocasion', 0, '2014-09-02 04:39:04', '2014-09-02 04:39:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product__delivery`
--

CREATE TABLE IF NOT EXISTS `product__delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `per_item` tinyint(1) DEFAULT NULL,
  `country_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `zone` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_77E11FFD4584665A` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product__package`
--

CREATE TABLE IF NOT EXISTS `product__package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `width` decimal(10,4) NOT NULL,
  `height` decimal(10,4) NOT NULL,
  `length` decimal(10,4) NOT NULL,
  `weight` decimal(10,4) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6190EC7F4584665A` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product__product`
--

CREATE TABLE IF NOT EXISTS `product__product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) DEFAULT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_inc_vat` tinyint(1) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `raw_description` longtext COLLATE utf8_unicode_ci,
  `description_formatter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8_unicode_ci,
  `raw_short_description` longtext COLLATE utf8_unicode_ci,
  `short_description_formatter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `vat_rate` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `product_type` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6CB28F473DA5256D` (`image_id`),
  KEY `IDX_6CB28F474E7AF8F` (`gallery_id`),
  KEY `IDX_6CB28F47727ACA70` (`parent_id`),
  KEY `enabled` (`enabled`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `product__product`
--

INSERT INTO `product__product` (`id`, `image_id`, `gallery_id`, `parent_id`, `sku`, `slug`, `name`, `price_inc_vat`, `description`, `raw_description`, `description_formatter`, `short_description`, `raw_short_description`, `short_description_formatter`, `price`, `vat_rate`, `stock`, `enabled`, `updated_at`, `created_at`, `product_type`) VALUES
(1, NULL, NULL, NULL, '12312312', 'nombre-de-productos', 'Nombre de productos', 1, '<p>este es el texto de mi producto</p>\n', 'este es el texto de mi producto', 'markdown', '<p>este es el texto de mi producto</p>\n', 'este es el texto de mi producto', 'markdown', '12.00', '12.00', 23, 1, '2014-07-27 05:08:40', '2014-07-27 05:08:40', 'artesania.producto.service');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product__product_category`
--

CREATE TABLE IF NOT EXISTS `product__product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `main` tinyint(1) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D0B834B14584665A` (`product_id`),
  KEY `IDX_D0B834B112469DE2` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `product__product_category`
--

INSERT INTO `product__product_category` (`id`, `product_id`, `category_id`, `enabled`, `main`, `updated_at`, `created_at`) VALUES
(1, 1, 2, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product__product_collection`
--

CREATE TABLE IF NOT EXISTS `product__product_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `collection_id` int(11) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_96AD96454584665A` (`product_id`),
  KEY `IDX_96AD9645514956FD` (`collection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE IF NOT EXISTS `publicidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `descripcion` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_BF8F9DFE3DA5256D` (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `publicidad`
--

INSERT INTO `publicidad` (`id`, `image_id`, `nombre`, `url`, `borrado`, `tipo`, `created_at`, `updated_at`, `descripcion`) VALUES
(2, 27, 'playas everywhere', 'www.google.com', 0, 1, '2014-09-03 08:28:06', '2014-09-03 08:28:06', 'contenido del aviso que va a salir'),
(3, 28, 'titulo de publicidad', 'www.google.com', 0, 1, '2014-09-03 08:43:11', '2014-09-03 08:43:11', 'descripcion nueva de la publicidad que se va a mostrar');

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
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DA7FB9143397707A` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `categoria_id`, `nombre`, `descripcion`, `borrado`, `created_at`, `updated_at`, `slug`) VALUES
(1, 1, 'Subcategoria', 'texto de la subcatoigra', 0, '2014-02-07 20:43:34', '2014-08-30 04:27:26', 'subcategoria'),
(2, 1, 'subcategorias 2', 'subcategoria ingresadad desde el admin', 0, '2014-02-07 20:43:57', '2014-08-30 04:27:26', 'subcategorias_2'),
(3, 2, 'subcategoria 2.1', 'descripcion de mi subcategoria', 0, '2014-02-13 03:31:41', '2014-08-30 04:27:26', 'subcategoria_2_1'),
(4, 3, 'subcat', 'descripcion mostrar', 0, '2014-02-13 03:32:13', '2014-08-30 04:27:26', 'subcat');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE IF NOT EXISTS `tienda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `borrado` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mensaje` longtext COLLATE utf8_unicode_ci,
  `anuncio` longtext COLLATE utf8_unicode_ci,
  `mensajeBienvenida` longtext COLLATE utf8_unicode_ci,
  `politicaPagos` longtext COLLATE utf8_unicode_ci,
  `politicaReembolso` longtext COLLATE utf8_unicode_ci,
  `informacionAdicional` longtext COLLATE utf8_unicode_ci,
  `informacionVendedor` longtext COLLATE utf8_unicode_ci,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verificado` int(11) DEFAULT NULL,
  `tipoCuenta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fechaSuscripcion` datetime NOT NULL,
  `fechaActSuscripcion` datetime NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `imagenCabecera` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`id`, `nombre`, `descripcion`, `borrado`, `created_at`, `updated_at`, `estado`, `titulo`, `mensaje`, `anuncio`, `mensajeBienvenida`, `politicaPagos`, `politicaReembolso`, `informacionAdicional`, `informacionVendedor`, `usuario`, `verificado`, `tipoCuenta`, `fechaSuscripcion`, `fechaActSuscripcion`, `slug`, `imagenCabecera`) VALUES
(3, 'Tienda H', '', 0, '2014-07-31 00:54:53', '2014-11-15 00:24:49', 'creacion', 'Nombre de mi tienda', 'mensaje para el publcio', 'anuncion de mi tiend a', 'Mensaje de bienvenida', 'Politica de pago', 'Politica de reembolso', 'Informacion adocional', 'Informacion de vendedor', '1005973391', NULL, 'bronce', '2014-10-28 22:49:03', '2014-10-28 22:49:03', '3_tienda_h', '54668f417540c.png'),
(4, 'mi tienda', '', 0, '2014-09-01 02:00:09', '2014-11-13 23:38:27', 'creacion', 'titulo de tienda', 'mensaje para los clientes', 'este es el anuncio que se va a mostrar', 'asdada', 'asdas', 'dasdas', 'dasdas', 'asdadasd', 'administrador', 0, 'bronce', '1899-11-30 00:00:00', '2014-10-28 22:49:03', '4_mi_tienda', '546532e3a1158.png'),
(5, 'mi tienda desarrollo', '', 0, '2014-09-20 02:11:05', '2014-11-10 17:45:42', 'creacion', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'app', 0, 'bronce', '2014-10-28 22:49:03', '2014-10-28 22:49:03', '5_mi_tienda_desarrollo', ''),
(6, 'mi tienda another', '', 0, '2014-09-24 21:36:39', '2014-11-10 17:45:42', 'creacion', 'mi tienda nueva', 'mensaje de mi tienda', 'anuncio para mi tienda', NULL, NULL, NULL, NULL, NULL, 'admin2', 0, 'bronce', '2014-10-28 22:49:03', '2014-10-28 22:49:03', '6_mi_tienda_another', ''),
(7, '', NULL, NULL, '2014-10-27 20:16:34', '2014-11-10 17:45:42', 'i', 'Titulo de mi tienda', 'mensaje', 'anunciando', 'mensaje de bienvenida', 'politicas de pago', 'politicas de reembolso', 'mi infromacion adicional', 'informacion del vendedor', 'developer', 0, 'bronce', '2014-10-28 22:49:03', '2014-10-28 22:49:03', '7', ''),
(8, '', NULL, NULL, '2014-11-21 22:53:47', '2014-11-21 22:54:02', 'inactivo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'uprueba', NULL, 'bronce', '2014-11-21 22:53:47', '2014-11-21 22:53:47', '_1', '546fb47aab71c.png'),
(9, '', NULL, NULL, '2015-02-06 22:48:17', '2015-02-06 22:51:29', 'inactivo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'halvarado123321', NULL, 'bronce', '2015-02-06 22:48:17', '2015-02-06 22:48:17', '_2', '54d53761c37d0.png'),
(10, '', NULL, NULL, '2015-02-13 22:18:17', '2015-02-13 22:46:56', 'inactivo', NULL, NULL, NULL, 'asdasd', 'asdasd', 'asdas', 'asdas', 'dasdads', 'usuario_desarrollo', NULL, 'bronce', '2015-02-13 22:18:17', '2015-02-13 22:18:17', '_3', '54de6a38c6e68.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_envio`
--

CREATE TABLE IF NOT EXISTS `usuario_envio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `calle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `departamento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codigoPostal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `usuario_envio`
--

INSERT INTO `usuario_envio` (`id`, `nombre`, `calle`, `departamento`, `ciudad`, `estado`, `region`, `codigoPostal`, `usuario`, `created_at`, `updated_at`) VALUES
(1, 'Nombre', 'la calle', 'despartamenteo', 'ciudad', 'estado', 'rgion', '123123', 'administrador', '2014-09-03 10:00:11', '2014-09-03 10:00:11'),
(2, 'Hector Alvarado', 'suroeste de la ciudad', '523', 'Guayaquil', 'Guayas', 'Costa', '123123', 'administrador', '2014-09-03 10:17:02', '2014-09-03 10:17:02'),
(3, 'Hector Alvarado Basantes', '38 y Portete', '454', 'Guayaquil', 'Guayas', 'Costa', '123133', 'administrador', '2014-09-03 10:21:19', '2014-09-03 10:21:19'),
(4, 'Usuaruio', 'calle 13', 'departaente', 'ciudad', 'estado', 'sur', '00922', 'admin2', '2014-09-24 21:41:03', '2014-09-24 21:41:03'),
(5, 'nombre', 'calle', 'departament', 'ciudad', 'estado', 'region', '093344', '1005973391', '2014-09-25 19:39:26', '2014-09-25 19:39:26'),
(6, 'otra', 'calle', 'departament', 'cudad', 'estado', 'regin', '099344', '1005973391', '2014-09-25 19:39:46', '2014-09-25 19:39:46'),
(7, 'asdasd', 'adasd', 'asdad', 'asdas', 'asd', 'asdasd', '1231', '1005973391', '2014-09-25 19:44:15', '2014-09-25 19:44:15'),
(8, 'nombre', 'calle', 'departament', 'asdas', 'estado', 'asdasd', '093344', 'prueba1', '2014-09-26 01:34:33', '2014-09-26 01:34:33'),
(9, 'adsda', 'calle', 'departament', 'asdas', 'asd', 'asdasd', '093344', 'prueba1', '2014-09-26 01:36:44', '2014-09-26 01:36:44'),
(10, 'Nomb', 'calle', 'dep', 'gye', 'estado', 'suer', '123123123', 'developer', '2014-10-29 18:25:40', '2014-10-29 18:25:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_pago`
--

CREATE TABLE IF NOT EXISTS `usuario_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ccv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mesVencimiento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anioVencimiento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombreTarjeta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuario_pago`
--

INSERT INTO `usuario_pago` (`id`, `nombre`, `ccv`, `mesVencimiento`, `anioVencimiento`, `nombreTarjeta`, `usuario`, `created_at`, `updated_at`) VALUES
(1, 'Hector Alvarado', '123123123', '01', '2014', 'Hector Alvarado', 'administrador', '2014-09-03 22:05:04', '2014-09-04 21:38:26'),
(2, 'hector', '123', '01', '2014', '12313', 'admin2', '2014-09-24 21:41:15', '2014-09-24 21:41:15'),
(3, 'adsda', '12313', '01', '2014', '1231331', '1005973391', '2014-09-25 19:40:03', '2014-09-25 19:45:02'),
(4, 'qweq', '123123', '01', '2014', 'asdadd', 'developer', '2014-10-29 18:25:49', '2014-10-29 18:25:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `verificada` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `envio` int(11) NOT NULL,
  `pago` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `total`, `verificada`, `estado`, `created_at`, `updated_at`, `usuario`, `envio`, `pago`) VALUES
(17, '12', 0, 0, '2014-09-04 21:32:33', '2014-09-04 21:32:33', 'administrador', 2, 1),
(18, '235', 0, 0, '2014-09-04 21:38:27', '2014-09-04 21:38:27', 'administrador', 2, 1),
(19, '123', 0, 0, '2014-09-24 21:41:16', '2014-09-24 21:41:16', 'admin2', 4, 2),
(20, '123', 0, 0, '2014-09-25 19:40:03', '2014-09-25 19:40:03', '1005973391', 5, 3),
(21, '446', 0, 0, '2014-09-25 19:45:03', '2014-09-25 19:45:03', '1005973391', 5, 3),
(22, '12', 0, 0, '2014-10-29 18:25:50', '2014-10-29 18:25:50', 'developer', 10, 4);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `basket__basket`
--
ALTER TABLE `basket__basket`
  ADD CONSTRAINT `FK_1FD2A7E19395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer__customer` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `basket__basket_element`
--
ALTER TABLE `basket__basket_element`
  ADD CONSTRAINT `FK_4538CA2C1BE1FB52` FOREIGN KEY (`basket_id`) REFERENCES `basket__basket` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `classification__category`
--
ALTER TABLE `classification__category`
  ADD CONSTRAINT `FK_43629B36727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `classification__category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_43629B36EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media__media` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `classification__collection`
--
ALTER TABLE `classification__collection`
  ADD CONSTRAINT `FK_A406B56AEA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media__media` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `customer__address`
--
ALTER TABLE `customer__address`
  ADD CONSTRAINT `FK_55C3CDD39395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer__customer` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `customer__customer`
--
ALTER TABLE `customer__customer`
  ADD CONSTRAINT `FK_4043373A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `FK_5191A4017645698E` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `FK_5191A401F2A5805D` FOREIGN KEY (`venta_id`) REFERENCES `venta` (`id`);

--
-- Filtros para la tabla `fos_user_user_group`
--
ALTER TABLE `fos_user_user_group`
  ADD CONSTRAINT `FK_B3C77447A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B3C77447FE54D947` FOREIGN KEY (`group_id`) REFERENCES `fos_user_group` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `invoice__invoice`
--
ALTER TABLE `invoice__invoice`
  ADD CONSTRAINT `FK_FB05AC619395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer__customer` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `invoice__invoice_element`
--
ALTER TABLE `invoice__invoice_element`
  ADD CONSTRAINT `FK_C66B56842989F1FD` FOREIGN KEY (`invoice_id`) REFERENCES `invoice__invoice` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C66B5684ACC5D771` FOREIGN KEY (`order_element_id`) REFERENCES `order__order_element` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `media__gallery_media`
--
ALTER TABLE `media__gallery_media`
  ADD CONSTRAINT `FK_80D4C5414E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `media__gallery` (`id`),
  ADD CONSTRAINT `FK_80D4C541EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media__media` (`id`);

--
-- Filtros para la tabla `news__comment`
--
ALTER TABLE `news__comment`
  ADD CONSTRAINT `FK_A90210404B89032C` FOREIGN KEY (`post_id`) REFERENCES `news__post` (`id`);

--
-- Filtros para la tabla `news__post`
--
ALTER TABLE `news__post`
  ADD CONSTRAINT `FK_7D109BC83DA5256D` FOREIGN KEY (`image_id`) REFERENCES `media__media` (`id`),
  ADD CONSTRAINT `FK_7D109BC8514956FD` FOREIGN KEY (`collection_id`) REFERENCES `classification__collection` (`id`),
  ADD CONSTRAINT `FK_7D109BC8F675F31B` FOREIGN KEY (`author_id`) REFERENCES `fos_user_user` (`id`);

--
-- Filtros para la tabla `news__post_tag`
--
ALTER TABLE `news__post_tag`
  ADD CONSTRAINT `FK_682B20514B89032C` FOREIGN KEY (`post_id`) REFERENCES `news__post` (`id`),
  ADD CONSTRAINT `FK_682B2051BAD26311` FOREIGN KEY (`tag_id`) REFERENCES `classification__tag` (`id`);

--
-- Filtros para la tabla `order__order`
--
ALTER TABLE `order__order`
  ADD CONSTRAINT `FK_BC9E6FD19395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer__customer` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `order__order_element`
--
ALTER TABLE `order__order_element`
  ADD CONSTRAINT `FK_701A67EC8D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `order__order` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `payment__transaction`
--
ALTER TABLE `payment__transaction`
  ADD CONSTRAINT `FK_4A7A00358D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `order__order` (`id`) ON DELETE SET NULL;

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
-- Filtros para la tabla `product__delivery`
--
ALTER TABLE `product__delivery`
  ADD CONSTRAINT `FK_77E11FFD4584665A` FOREIGN KEY (`product_id`) REFERENCES `product__product` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product__package`
--
ALTER TABLE `product__package`
  ADD CONSTRAINT `FK_6190EC7F4584665A` FOREIGN KEY (`product_id`) REFERENCES `product__product` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product__product`
--
ALTER TABLE `product__product`
  ADD CONSTRAINT `FK_6CB28F473DA5256D` FOREIGN KEY (`image_id`) REFERENCES `media__media` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_6CB28F474E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `media__gallery` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_6CB28F47727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `product__product` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product__product_category`
--
ALTER TABLE `product__product_category`
  ADD CONSTRAINT `FK_D0B834B112469DE2` FOREIGN KEY (`category_id`) REFERENCES `classification__category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D0B834B14584665A` FOREIGN KEY (`product_id`) REFERENCES `product__product` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product__product_collection`
--
ALTER TABLE `product__product_collection`
  ADD CONSTRAINT `FK_96AD96454584665A` FOREIGN KEY (`product_id`) REFERENCES `product__product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_96AD9645514956FD` FOREIGN KEY (`collection_id`) REFERENCES `classification__collection` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD CONSTRAINT `FK_BF8F9DFE3DA5256D` FOREIGN KEY (`image_id`) REFERENCES `media__media` (`id`);

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `FK_DA7FB9143397707A` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
