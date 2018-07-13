/*
Navicat MySQL Data Transfer

Source Server         : LORRU
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : muestras_salud_publica_chile

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-07-08 22:17:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for datos_usuario_cliente
-- ----------------------------
DROP TABLE IF EXISTS `datos_usuario_cliente`;
CREATE TABLE `datos_usuario_cliente` (
  `id_datos_usuario_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_cliente` int(11) NOT NULL,
  `rut_datos_usuario_cliente` varchar(20) NOT NULL,
  `primer_nombre_datos_usuario_cliente` varchar(50) NOT NULL,
  `segundo_nombre_datos_usuario_cliente` varchar(50) NOT NULL,
  `primer_apellido_datos_usuario_cliente` varchar(50) NOT NULL,
  `segundo_apellido_datos_usuario_cliente` varchar(50) NOT NULL,
  `correo_datos_usuario_cliente` varchar(50) NOT NULL,
  `telefono_datos_usuario_cliente` int(11) NOT NULL,
  `direccion_datos_usuario_cliente` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_datos_usuario_cliente`),
  KEY `id_tipo_cliente` (`id_tipo_cliente`),
  CONSTRAINT `datos_usuario_cliente_ibfk_1` FOREIGN KEY (`id_tipo_cliente`) REFERENCES `tipo_cliente` (`id_tipo_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of datos_usuario_cliente
-- ----------------------------

-- ----------------------------
-- Table structure for empleado
-- ----------------------------
DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `rut_empleado` varchar(20) NOT NULL,
  `primer_nombre_empleado` varchar(50) NOT NULL,
  `segundo_nombre_empleado` varchar(50) NOT NULL,
  `primer_apellido_empleado` varchar(50) NOT NULL,
  `segundo_apellido_empleado` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of empleado
-- ----------------------------
INSERT INTO `empleado` VALUES ('1', '1-9', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', '2018-07-08 17:08:22', '2018-07-08 17:08:22');
INSERT INTO `empleado` VALUES ('2', '1-9', 'RECEPCION', 'RECEPCION', 'RECEPCION', 'RECEPCION', '2018-07-08 19:56:37', '2018-07-08 19:56:37');
INSERT INTO `empleado` VALUES ('3', '1-9', 'TECNICO', 'TECNICO', 'TECNICO', 'TECNICO', '2018-07-08 17:07:39', '2018-07-08 17:07:39');

-- ----------------------------
-- Table structure for empresa
-- ----------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `id_datos_usuario_cliente` int(11) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `rut_empresa` varchar(20) NOT NULL,
  `direccion_empresa` varchar(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of empresa
-- ----------------------------

-- ----------------------------
-- Table structure for estado_muestra
-- ----------------------------
DROP TABLE IF EXISTS `estado_muestra`;
CREATE TABLE `estado_muestra` (
  `id_estado_muestra` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado_muestra` varchar(30) NOT NULL,
  PRIMARY KEY (`id_estado_muestra`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of estado_muestra
-- ----------------------------
INSERT INTO `estado_muestra` VALUES ('1', 'Pendiente');
INSERT INTO `estado_muestra` VALUES ('2', 'En Proceso');
INSERT INTO `estado_muestra` VALUES ('3', 'Terminado');

-- ----------------------------
-- Table structure for estado_usuario
-- ----------------------------
DROP TABLE IF EXISTS `estado_usuario`;
CREATE TABLE `estado_usuario` (
  `id_estado_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado_usuario` varchar(20) NOT NULL,
  PRIMARY KEY (`id_estado_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of estado_usuario
-- ----------------------------
INSERT INTO `estado_usuario` VALUES ('1', 'Habilitado');
INSERT INTO `estado_usuario` VALUES ('2', 'Deshabilitado');

-- ----------------------------
-- Table structure for muestra
-- ----------------------------
DROP TABLE IF EXISTS `muestra`;
CREATE TABLE `muestra` (
  `id_muestra` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado_recepcion` int(11) DEFAULT NULL,
  `id_empleado_resolucion` int(11) DEFAULT NULL,
  `id_tipo_analisi` int(11) NOT NULL,
  `id_estado_muestra` int(11) NOT NULL,
  `id_datos_usuario_cliente` int(11) NOT NULL,
  `fecha_muestra` date NOT NULL,
  `fecha_recepcion_muestra` date DEFAULT NULL,
  `temperatura_muestra` int(11) DEFAULT NULL,
  `cantidad_muestra` int(11) DEFAULT NULL,
  `fecha_resultado_muestra` date DEFAULT NULL,
  `descripcion_resultado_muestra` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_muestra`),
  KEY `id_tipo_analisi` (`id_tipo_analisi`),
  KEY `id_estado_muestra` (`id_estado_muestra`),
  KEY `id_datos_usuario_cliente` (`id_datos_usuario_cliente`),
  CONSTRAINT `muestra_ibfk_2` FOREIGN KEY (`id_tipo_analisi`) REFERENCES `tipo_analisi` (`id_tipo_analisi`),
  CONSTRAINT `muestra_ibfk_3` FOREIGN KEY (`id_estado_muestra`) REFERENCES `estado_muestra` (`id_estado_muestra`),
  CONSTRAINT `muestra_ibfk_4` FOREIGN KEY (`id_datos_usuario_cliente`) REFERENCES `datos_usuario_cliente` (`id_datos_usuario_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of muestra
-- ----------------------------

-- ----------------------------
-- Table structure for perfil
-- ----------------------------
DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_perfil` varchar(20) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of perfil
-- ----------------------------
INSERT INTO `perfil` VALUES ('1', 'Administrador');
INSERT INTO `perfil` VALUES ('2', 'Recepción');
INSERT INTO `perfil` VALUES ('3', 'Técnico');
INSERT INTO `perfil` VALUES ('4', 'Cliente');

-- ----------------------------
-- Table structure for tipo_analisi
-- ----------------------------
DROP TABLE IF EXISTS `tipo_analisi`;
CREATE TABLE `tipo_analisi` (
  `id_tipo_analisi` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_analisi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_analisi`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_analisi
-- ----------------------------
INSERT INTO `tipo_analisi` VALUES ('1', 'Detección de micotoxinas');
INSERT INTO `tipo_analisi` VALUES ('2', 'Detección de metales pesados');
INSERT INTO `tipo_analisi` VALUES ('3', 'Detección de plaguicidas prohibidos');
INSERT INTO `tipo_analisi` VALUES ('4', 'Detección de marea roja');
INSERT INTO `tipo_analisi` VALUES ('5', 'Detección de bacterias nocivas');

-- ----------------------------
-- Table structure for tipo_cliente
-- ----------------------------
DROP TABLE IF EXISTS `tipo_cliente`;
CREATE TABLE `tipo_cliente` (
  `id_tipo_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_cliente` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_cliente
-- ----------------------------
INSERT INTO `tipo_cliente` VALUES ('1', 'Empresa');
INSERT INTO `tipo_cliente` VALUES ('2', 'Particular');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_datos_usuario_cliente` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_estado_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `correo_usuario` varchar(50) NOT NULL,
  `clave_usuario` varchar(100) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  KEY `id_datos_usuario_cliente` (`id_datos_usuario_cliente`),
  KEY `id_empleado` (`id_empleado`),
  KEY `id_perfil` (`id_perfil`),
  KEY `id_estado_usuario` (`id_estado_usuario`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_datos_usuario_cliente`) REFERENCES `datos_usuario_cliente` (`id_datos_usuario_cliente`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`),
  CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`),
  CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`id_estado_usuario`) REFERENCES `estado_usuario` (`id_estado_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', null, '1', '1', '1', 'ADMIN ADMIN ADMIN ADMIN', 'admin@chilesaludpublica.cl', '$2y$10$kVk5aJMNA3rtyOXXcm4LaePPZR/SSZfDtja3dFB.lFcw.VfwL5c1G', '2018-07-08 17:08:22', '2018-07-08 17:08:22');
INSERT INTO `usuario` VALUES ('2', null, '2', '2', '1', 'RECEPCION RECEPCION RECEPCION RECEPCION', 'recepcion@chilesaludpublica.cl', '$2y$10$qNLrvpyvZy1q4X7QVtugzOdeAAFlY88jyBWiLOyuFexWize7NX3zG', '2018-07-08 19:56:37', '2018-07-08 19:56:37');
INSERT INTO `usuario` VALUES ('3', null, '3', '3', '1', 'TECNICO TECNICO TECNICO TECNICO', 'tecnico@chilesaludpublica.cl', '$2y$10$sLcJXPJPtyU6B14IapXbu.KLodav8alfFIgO7dM6JmnnM2o9Bk/m6', '2018-07-08 17:07:39', '2018-07-08 17:07:39');
