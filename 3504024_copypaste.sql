/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : 3504024_copypaste

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2020-09-07 23:01:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articulos
-- ----------------------------
DROP TABLE IF EXISTS `articulos`;
CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `clasificacion_id` int(11) DEFAULT NULL,
  `articulo_nombre` varchar(100) DEFAULT NULL,
  `categoria_nombre` varchar(100) DEFAULT NULL,
  `precio` double(10,2) DEFAULT NULL,
  `imagen_url` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of articulos
-- ----------------------------
INSERT INTO `articulos` VALUES ('1', '1', 'Arroz chaufa', 'Oriental', '13.00', null);
INSERT INTO `articulos` VALUES ('2', '1', 'Arroz con pollo', 'Criollo', '15.00', null);
INSERT INTO `articulos` VALUES ('3', '1', 'Mondonguito a la italiana', 'Criollo', '10.00', null);
INSERT INTO `articulos` VALUES ('4', '2', 'Chicha', 'Bebida', '3.00', null);
INSERT INTO `articulos` VALUES ('5', '3', 'Ensalada', 'Comida fresca', '0.00', null);
INSERT INTO `articulos` VALUES ('6', '4', 'Pollo a la brasa', 'Criollo', '20.00', null);
INSERT INTO `articulos` VALUES ('7', '4', 'Tacos', 'Mexicana', '15.00', null);
INSERT INTO `articulos` VALUES ('8', '4', 'Lomo saltado', 'Criollo', '15.00', null);

-- ----------------------------
-- Table structure for clasificaciones
-- ----------------------------
DROP TABLE IF EXISTS `clasificaciones`;
CREATE TABLE `clasificaciones` (
  `id` int(11) NOT NULL,
  `nombre_clasificacion` varchar(50) NOT NULL,
  `es_bebida` int(11) NOT NULL,
  `es_entrada` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clasificaciones
-- ----------------------------
INSERT INTO `clasificaciones` VALUES ('1', 'menu', '0', '0');
INSERT INTO `clasificaciones` VALUES ('2', 'bebida', '1', '0');
INSERT INTO `clasificaciones` VALUES ('3', 'entrada', '0', '1');
INSERT INTO `clasificaciones` VALUES ('4', 'plato carta', '0', '0');

-- ----------------------------
-- Table structure for clientedirecciones
-- ----------------------------
DROP TABLE IF EXISTS `clientedirecciones`;
CREATE TABLE `clientedirecciones` (
  `id` int(11) NOT NULL,
  `nombre_direccion` varchar(100) NOT NULL,
  `latitud` double(15,6) NOT NULL,
  `longitud` double(15,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientedirecciones
-- ----------------------------

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `celular` int(20) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `id_tipousuario` int(11) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES ('1', 'delivery', 'delivery@copypaste.pe', '999888777', '2020-09-08', '2', '123456');

-- ----------------------------
-- Table structure for pedido
-- ----------------------------
DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) DEFAULT NULL,
  `cliente_direccion_id` int(11) DEFAULT NULL,
  `precio_total` double(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pedido
-- ----------------------------

-- ----------------------------
-- Table structure for pedido_cancelados
-- ----------------------------
DROP TABLE IF EXISTS `pedido_cancelados`;
CREATE TABLE `pedido_cancelados` (
  `pedido_id` int(11) NOT NULL,
  `motivo` varchar(50) DEFAULT NULL,
  `imagen_url` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pedido_cancelados
-- ----------------------------

-- ----------------------------
-- Table structure for pedido_detalles
-- ----------------------------
DROP TABLE IF EXISTS `pedido_detalles`;
CREATE TABLE `pedido_detalles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) DEFAULT NULL,
  `articulo_id` int(11) DEFAULT NULL,
  `cantidad` double(10,2) DEFAULT NULL,
  `precio` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pedido_detalles
-- ----------------------------

-- ----------------------------
-- Table structure for tipousuarios
-- ----------------------------
DROP TABLE IF EXISTS `tipousuarios`;
CREATE TABLE `tipousuarios` (
  `id` int(11) NOT NULL,
  `nombre_tipousuario` varchar(50) NOT NULL,
  `es_interno` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipousuarios
-- ----------------------------
INSERT INTO `tipousuarios` VALUES ('1', 'publico', '0');
INSERT INTO `tipousuarios` VALUES ('2', 'delivery', '1');
