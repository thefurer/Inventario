/*
 Navicat Premium Data Transfer

 Source Server         : conexion_servidor_local
 Source Server Type    : MariaDB
 Source Server Version : 100432
 Source Host           : localhost:3306
 Source Schema         : anegado

 Target Server Type    : MariaDB
 Target Server Version : 100432
 File Encoding         : 65001

 Date: 12/02/2024 21:16:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for monitoreo
-- ----------------------------
DROP TABLE IF EXISTS `monitoreo`;
CREATE TABLE `monitoreo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `especie` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `condiciones` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `notas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comportamiento` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `observacion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha` date NOT NULL,
  `ubicacion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of monitoreo
-- ----------------------------
INSERT INTO `monitoreo` VALUES (3, 'lagartija', 'flora', 'sdsadsdsdsd', 'danilo', 'dd', 'dsaddsd', 'ddd', '2024-01-15', 'sadasdsd');
INSERT INTO `monitoreo` VALUES (8, 'iguana', 'fauna', 'dad', 'fff', 'ada', 'dad', 'd3', '2024-01-31', 'd3');

SET FOREIGN_KEY_CHECKS = 1;
