/*
Navicat MySQL Data Transfer

Source Server         : coba01
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mvp_php

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-05-08 16:04:40
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `pasien`
-- ----------------------------
DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tl` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- ----------------------------
-- Records of pasien
-- ----------------------------
INSERT INTO `pasien` VALUES ('1', '1234561001', 'Dinda', 'Bandung', '2020-12-11', 'Perempuan', 'dindawahyu@upi.edu', '088970803025');
INSERT INTO `pasien` VALUES ('2', '6754327002', 'Wahyu', 'Cimahi', '2020-12-14', 'Laki-laki', 'wah@upi.edu', '089678898545');
INSERT INTO `pasien` VALUES ('4', '7890654001', 'Ayang', 'Bandung', '2020-11-29', 'Perempuan', 'ay@gmail.com', '081321778980');
INSERT INTO `pasien` VALUES ('5', '9876576008', 'Zulfan', 'bandung', '2021-01-04', 'Laki-laki', 'jull@gmai.com', '088970803025');
INSERT INTO `pasien` VALUES ('6', '1234567009', 'Prilla', 'Seoul', '2001-05-05', 'Perempuan', 'prillarosaria@upi.edu', '081234876235');
INSERT INTO `pasien` VALUES ('7', '7135712004', 'Son', 'Canada', '1994-02-21', 'Perempuan', 'chrstjsmn@gmail.com', '081573038425');
INSERT INTO `pasien` VALUES ('8', '8478347011', 'Jeno', 'Incheon', '2000-12-23', 'Laki-laki', 'jeno@gmail.com', '08138746239');
INSERT INTO `pasien` VALUES ('9', '8795642002', 'Mark', 'Canada', '1999-08-20', 'Laki-laki', 'mark@upi.edu', '08237218473');
INSERT INTO `pasien` VALUES ('10', '22224567', 'hugo', 'bali', '2024-05-04', 'Laki-laki', 'hugo@gmail.com', '0836485912');
INSERT INTO `pasien` VALUES ('11', '765434567', 'kiv', 'sumatera', '2024-05-01', 'Laki-laki', 'kiv@gmail.com', '0836485912');
INSERT INTO `pasien` VALUES ('12', '87654324564', 'diablo', 'hell', '2024-04-29', 'Perempuan', 'bob@gmail.com', '085673837464');
INSERT INTO `pasien` VALUES ('16', '999999999', 'rafaela felis', 'heavens', '2024-01-17', 'Perempuan', 'rafaela@gmail.com', '086485434343');
