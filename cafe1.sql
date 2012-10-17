/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : cafe1

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2012-09-24 00:31:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `estado`
-- ----------------------------
DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(255) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of estado
-- ----------------------------
INSERT INTO `estado` VALUES ('1', 'recibida');
INSERT INTO `estado` VALUES ('2', 'proceso');
INSERT INTO `estado` VALUES ('3', 'finalizada');

-- ----------------------------
-- Table structure for `habitacion`
-- ----------------------------
DROP TABLE IF EXISTS `habitacion`;
CREATE TABLE `habitacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `habitacion` varchar(255) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `piso` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of habitacion
-- ----------------------------
INSERT INTO `habitacion` VALUES ('0', '101', 'Torre Principal', '1');
INSERT INTO `habitacion` VALUES ('1', '102', 'Torre Principal', '1');

-- ----------------------------
-- Table structure for `hotel`
-- ----------------------------
DROP TABLE IF EXISTS `hotel`;
CREATE TABLE `hotel` (
  `nit` int(20) NOT NULL AUTO_INCREMENT COMMENT 'Nit Hotel ',
  `nit_verificacion` int(10) DEFAULT NULL COMMENT 'Digito de Verificacion.',
  `razon_social` text COMMENT 'Razon Social del Hotel',
  `contacto` text COMMENT 'Funcionario de Contacto del Establecimiento',
  `direccion_hotel` text COMMENT 'Direccion Hotel',
  `nombre_hotel` text COMMENT 'Nombre Comercial Hotel',
  `telefono_hotel` text COMMENT 'telefono de Contacto',
  `no_habitaciones` text COMMENT 'No de Habitaciones del Establecimiento',
  PRIMARY KEY (`nit`)
) ENGINE=MyISAM AUTO_INCREMENT=1064990715 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hotel
-- ----------------------------
INSERT INTO `hotel` VALUES ('1064990714', '0', 'Sociedad de Hoteles de Prueba', 'Pepito Perez', 'Calle 7 # 73 - 28', 'Hotel de Pruebas', '497598623', '111');

-- ----------------------------
-- Table structure for `item`
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_contable` varchar(255) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL DEFAULT '0',
  `valor` int(11) DEFAULT NULL,
  `activ` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id_item`,`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of item
-- ----------------------------
INSERT INTO `item` VALUES ('1', null, 'Taxi Seguro', '3', '0', null);
INSERT INTO `item` VALUES ('2', null, 'Botella de Vino Tinto ', '2', '50000', null);
INSERT INTO `item` VALUES ('5', null, 'Botella de Vino Blanco', '2', '40000', null);
INSERT INTO `item` VALUES ('7', null, 'Jugos de Fruta Fresca', '2', '5500', null);
INSERT INTO `item` VALUES ('8', null, 'Porción de Frutas Frescas', '2', '9000', null);
INSERT INTO `item` VALUES ('9', null, 'Cereales', '2', '9500', null);
INSERT INTO `item` VALUES ('10', null, 'Desayuno Continental', '2', '18000', null);
INSERT INTO `item` VALUES ('11', null, 'Desayuno Americano', '2', '22000', null);
INSERT INTO `item` VALUES ('12', null, 'Desayuno Típico', '2', '24000', null);
INSERT INTO `item` VALUES ('13', null, 'Ceviche Mixto con leche de coco', '2', '15000', null);
INSERT INTO `item` VALUES ('14', null, 'Rollos de Jamón Serrano con Espárragos', '2', '18000', null);
INSERT INTO `item` VALUES ('15', null, 'Camarones al Curry', '2', '19000', null);
INSERT INTO `item` VALUES ('16', null, 'Fileta de Salmón con salsa Holandesa', '2', '32000', null);
INSERT INTO `item` VALUES ('17', null, 'Langostinos con Salsa de Mango', '2', '45000', null);
INSERT INTO `item` VALUES ('18', null, 'Filete de Pollo Crocante con ajonjolí', '2', '28000', null);
INSERT INTO `item` VALUES ('19', null, 'Pollo con Jamón Serrano', '2', '24000', null);
INSERT INTO `item` VALUES ('20', null, 'Golf Club Sandwich', '2', '22000', null);
INSERT INTO `item` VALUES ('21', null, 'Hamburguesa Ranchera', '2', '23500', null);
INSERT INTO `item` VALUES ('22', '123', 'Prueba de Item', '0', '1000', '1');
INSERT INTO `item` VALUES ('23', '123123', 'Prueba 2', '0', '2000', '1');
INSERT INTO `item` VALUES ('24', '123', '123', '0', '123', '1');
INSERT INTO `item` VALUES ('25', '123', 'sfgf', '3', '3212', '1');
INSERT INTO `item` VALUES ('26', '4BC5', 'Pastas a la bolognesa y papitas rechoncolas', '0', '10000', '1');
INSERT INTO `item` VALUES ('27', 'er', 'ert', '2', '0', '1');
INSERT INTO `item` VALUES ('28', '34C', 'Pastas a la Bolognesa', '2', '25000', '1');

-- ----------------------------
-- Table structure for `servicio`
-- ----------------------------
DROP TABLE IF EXISTS `servicio`;
CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `id_habitacion` int(11) DEFAULT NULL,
  `fechahora_solicitud` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `leido` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id_servicio`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of servicio
-- ----------------------------
INSERT INTO `servicio` VALUES ('24', '1', '2012-09-18 08:37:32', '1');
INSERT INTO `servicio` VALUES ('25', '0', '2012-09-18 08:41:10', '1');
INSERT INTO `servicio` VALUES ('26', '0', '2012-09-18 09:10:35', '1');
INSERT INTO `servicio` VALUES ('27', '0', '2012-09-18 09:14:54', '1');
INSERT INTO `servicio` VALUES ('28', '0', '2012-09-18 09:24:12', '1');
INSERT INTO `servicio` VALUES ('29', '0', '2012-09-18 10:39:16', '1');
INSERT INTO `servicio` VALUES ('30', '0', '2012-09-18 16:28:26', '1');
INSERT INTO `servicio` VALUES ('31', '0', '2012-09-18 16:28:57', '1');
INSERT INTO `servicio` VALUES ('32', '0', '2012-09-21 14:23:24', '0');
INSERT INTO `servicio` VALUES ('33', '0', '2012-09-21 14:30:00', '0');
INSERT INTO `servicio` VALUES ('34', '0', '2012-09-21 14:31:00', '0');
INSERT INTO `servicio` VALUES ('35', '0', '2012-09-21 14:31:16', '0');
INSERT INTO `servicio` VALUES ('36', '0', '2012-09-21 14:31:37', '0');
INSERT INTO `servicio` VALUES ('37', '0', '2012-09-21 14:31:42', '0');
INSERT INTO `servicio` VALUES ('38', '0', '2012-09-21 14:31:46', '0');
INSERT INTO `servicio` VALUES ('39', '0', '2012-09-21 14:35:24', '0');
INSERT INTO `servicio` VALUES ('40', '0', '2012-09-21 14:35:39', '0');
INSERT INTO `servicio` VALUES ('41', '0', '2012-09-21 14:35:42', '0');
INSERT INTO `servicio` VALUES ('42', '0', '2012-09-21 14:35:56', '0');
INSERT INTO `servicio` VALUES ('43', '0', '2012-09-21 14:38:12', '0');
INSERT INTO `servicio` VALUES ('44', '0', '2012-09-21 14:38:21', '0');
INSERT INTO `servicio` VALUES ('45', '0', '2012-09-21 14:38:59', '0');
INSERT INTO `servicio` VALUES ('46', '0', '2012-09-21 14:39:11', '0');
INSERT INTO `servicio` VALUES ('47', '0', '2012-09-21 14:40:43', '0');
INSERT INTO `servicio` VALUES ('48', '0', '2012-09-21 14:41:37', '0');
INSERT INTO `servicio` VALUES ('49', '0', '2012-09-21 14:43:03', '0');
INSERT INTO `servicio` VALUES ('50', '0', '2012-09-21 14:43:39', '0');
INSERT INTO `servicio` VALUES ('51', '0', '2012-09-21 14:44:02', '0');
INSERT INTO `servicio` VALUES ('52', '0', '2012-09-21 14:47:33', '0');

-- ----------------------------
-- Table structure for `servicio_detalle`
-- ----------------------------
DROP TABLE IF EXISTS `servicio_detalle`;
CREATE TABLE `servicio_detalle` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_servicio` int(11) DEFAULT '0',
  `id_item` int(11) DEFAULT '0',
  `estado_servicio` int(11) DEFAULT '1',
  `fechahora_inicio` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechahora_proceso` timestamp NULL DEFAULT NULL,
  `fechahora_final` timestamp NULL DEFAULT NULL,
  `observaciones` text,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detalle`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of servicio_detalle
-- ----------------------------
INSERT INTO `servicio_detalle` VALUES ('33', '24', '21', '3', '2012-09-18 08:37:32', '2012-09-18 09:16:29', '2012-09-18 09:28:15', '', '1');
INSERT INTO `servicio_detalle` VALUES ('34', '25', '8', '3', '2012-09-18 08:41:10', '2012-09-18 09:46:17', null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('35', '25', '14', '3', '2012-09-18 08:41:10', '2012-09-18 09:28:09', null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('36', '25', '1', '3', '2012-09-18 08:41:10', '2012-09-18 09:28:05', null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('37', '26', '11', '3', '2012-09-18 09:10:35', '2012-09-18 09:28:07', '2012-09-18 09:28:13', '', '2');
INSERT INTO `servicio_detalle` VALUES ('38', '27', '19', '1', '2012-09-19 09:14:54', null, null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('39', '27', '13', '1', '2012-09-18 09:14:54', null, null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('40', '27', '2', '1', '2012-09-18 09:14:54', null, null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('41', '28', '8', '1', '2012-09-18 09:24:12', null, null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('42', '29', '28', '1', '2012-09-18 10:39:17', null, null, '', '3');
INSERT INTO `servicio_detalle` VALUES ('43', '30', '27', '1', '2012-09-18 16:28:26', null, null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('44', '31', '18', '1', '2012-09-18 16:28:57', null, null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('45', '31', '14', '1', '2012-09-18 16:28:57', null, null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('46', '31', '8', '1', '2012-09-18 16:28:57', null, null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('47', '31', '12', '1', '2012-09-18 16:28:57', null, null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('48', '31', '2', '1', '2012-09-18 16:28:57', null, null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('49', '31', '25', '1', '2012-09-18 16:28:57', null, null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('50', '31', '10', '1', '2012-09-18 16:28:57', null, null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('51', '31', '1', '1', '2012-09-18 16:28:57', null, null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('52', '31', '28', '1', '2012-09-18 16:28:57', null, null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('53', '31', '16', '1', '2012-09-18 16:28:57', null, null, '', '1');
INSERT INTO `servicio_detalle` VALUES ('54', '31', '14', '1', '2012-09-18 16:28:57', null, null, '', '1');

-- ----------------------------
-- Table structure for `tipo_servicios`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_servicios`;
CREATE TABLE `tipo_servicios` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tipo_servicio` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_servicios
-- ----------------------------
INSERT INTO `tipo_servicios` VALUES ('2', 'Room Service ');
INSERT INTO `tipo_servicios` VALUES ('3', 'Servicio de Transporte');

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `cedula` int(20) NOT NULL COMMENT 'Cedula Del Usuario',
  `nombre` text COMMENT 'Nombre Del Usuario',
  `apellido` text COMMENT 'Apellido Del Usuario',
  `activo` tinyint(4) DEFAULT NULL,
  `usuario_d_sistema` text COMMENT 'Usuario Identifiacion',
  `pass_d_sistema` text COMMENT 'Contraseña para el Sistema',
  `correo_electronico` text COMMENT 'Correo Electronico del Usuario',
  `celular` text,
  `servicios` tinyint(4) DEFAULT '0',
  `estadisticas` tinyint(4) DEFAULT '0',
  `preferencias` tinyint(4) DEFAULT '0',
  `activaciones` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`cedula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('0', 'asd', 'ad', null, 'asd', '123', 'asd', 'ad', '1', '1', '1', '1');
INSERT INTO `usuario` VALUES ('1064990714', 'Juan Pablo', 'Paternina Soto', null, 'juan.paternina', 'amaterasu', 'juan.paternina@gmail.com', '3015958535', '1', null, '1', null);
INSERT INTO `usuario` VALUES ('123', 'df', 'sfd', null, 'sf', '123', 'df', 'sdf', '1', '0', '1', '0');
INSERT INTO `usuario` VALUES ('1107057103', 'Javier Eduardo', 'Paternina Soto', null, 'javier.paternina', '12345678', 'javier.paternina@lattedevelopers.com', '3174615091', '1', '0', '0', '0');

-- ----------------------------
-- Table structure for `usuario_sguest`
-- ----------------------------
DROP TABLE IF EXISTS `usuario_sguest`;
CREATE TABLE `usuario_sguest` (
  `id_usuario_sguest` int(11) NOT NULL AUTO_INCREMENT,
  `no_documento` varchar(255) DEFAULT NULL,
  `usuarioGenerador` int(11) NOT NULL DEFAULT '0' COMMENT 'Usuario que autoriza el ingreso',
  `nombre_huesped` varchar(255) DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaVencimiento` timestamp NULL DEFAULT NULL,
  `habitacion` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_usuario_sguest`,`usuarioGenerador`,`habitacion`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario_sguest
-- ----------------------------
INSERT INTO `usuario_sguest` VALUES ('1', '0', '1064990714', '0', '2012-09-12 09:30:23', '0000-00-00 00:00:00', '0');
INSERT INTO `usuario_sguest` VALUES ('2', '0', '1064990714', 'kjlkj', '2012-09-12 10:22:19', '2012-09-11 22:00:00', '1');
INSERT INTO `usuario_sguest` VALUES ('3', '14583508', '1064990714', 'Pepito Perez', '2012-09-12 10:25:46', '2012-09-13 22:00:00', '1');
INSERT INTO `usuario_sguest` VALUES ('4', '25845942', '1064990714', 'Alba Soto Mendoza', '2012-09-18 10:05:20', '2012-09-22 23:59:59', '1');
INSERT INTO `usuario_sguest` VALUES ('5', '25845942', '1064990714', 'Alba Soto Mendoza', '2012-09-21 16:32:16', '2012-09-19 00:00:00', '1');

-- ----------------------------
-- View structure for `items_completo`
-- ----------------------------
DROP VIEW IF EXISTS `items_completo`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `items_completo` AS select `item`.`id_item` AS `id_item`,`item`.`item` AS `item`,`item`.`id_categoria` AS `id_categoria`,`item`.`valor` AS `valor`,`tipo_servicios`.`nom_tipo_servicio` AS `nom_tipo_servicio` from (`item` join `tipo_servicios` on((`item`.`id_categoria` = `tipo_servicios`.`id_tipo`)));

-- ----------------------------
-- View structure for `servicio_detalle_completo`
-- ----------------------------
DROP VIEW IF EXISTS `servicio_detalle_completo`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `servicio_detalle_completo` AS select `servicio_detalle`.`id_detalle` AS `id_detalle`,`servicio_detalle`.`id_servicio` AS `id_servicio`,`servicio_detalle`.`id_item` AS `id_item`,`servicio_detalle`.`estado_servicio` AS `estado_servicio`,`servicio_detalle`.`fechahora_inicio` AS `fechahora_inicio`,`servicio_detalle`.`fechahora_final` AS `fechahora_final`,`servicio_detalle`.`observaciones` AS `observaciones`,`servicio_detalle`.`cantidad` AS `cantidad`,`items_completo`.`item` AS `item`,`items_completo`.`id_categoria` AS `id_categoria`,`items_completo`.`valor` AS `valor`,`items_completo`.`nom_tipo_servicio` AS `nom_tipo_servicio` from (`servicio_detalle` join `items_completo` on((`servicio_detalle`.`id_item` = `items_completo`.`id_item`)));
