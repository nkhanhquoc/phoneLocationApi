/*
Navicat MySQL Data Transfer

Source Server         : api_nkhanhquoc
Source Server Version : 50505
Source Host           : 45.252.248.18:3306
Source Database       : nkhanhqu_api

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-05-25 16:27:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for agent
-- ----------------------------
DROP TABLE IF EXISTS `agent`;
CREATE TABLE `agent` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of agent
-- ----------------------------
INSERT INTO `agent` VALUES ('1', 'nkhanhquoc@gmail.com', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', null, null);

-- ----------------------------
-- Table structure for location
-- ----------------------------
DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `agent_token` varchar(255) DEFAULT NULL,
  `latitude` float(20,7) DEFAULT NULL,
  `longitude` float(20,7) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of location
-- ----------------------------
INSERT INTO `location` VALUES ('1', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '1.0000000', '1.0000000', '1527066246', '');
INSERT INTO `location` VALUES ('2', 'abc', '1.0000000', '1.0000000', '1527176079', '');
INSERT INTO `location` VALUES ('3', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '1.0000000', '1.0000000', '1527176942', '');
INSERT INTO `location` VALUES ('4', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '1.0000000', '1.0000000', '1527177120', '');
INSERT INTO `location` VALUES ('5', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '1.0000000', '1.0000000', '1527177632', '');
INSERT INTO `location` VALUES ('6', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '1.0000000', '1.0000000', '1527177979', '');
INSERT INTO `location` VALUES ('7', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '1.0000000', '1.0000000', '1527179207', '');
INSERT INTO `location` VALUES ('8', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '1.0000000', '1.0000000', '1527205252', '');
INSERT INTO `location` VALUES ('9', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '1.0000000', '1.0000000', '1527220324', '');
INSERT INTO `location` VALUES ('10', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '1.0000000', '1.0000000', '1527220421', '');
INSERT INTO `location` VALUES ('11', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '21.5454540', '106.5454483', '1527220633', '');
INSERT INTO `location` VALUES ('12', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '21.1234570', '106.1234589', '1527220640', '');
INSERT INTO `location` VALUES ('13', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '1.0000000', '1.0000000', '1527220716', '');
INSERT INTO `location` VALUES ('14', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '1.0000000', '1.0000000', '1527220852', '');
INSERT INTO `location` VALUES ('15', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '1.0000000', '1.0000000', '1527220874', '');
INSERT INTO `location` VALUES ('16', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '1.0000000', '1.0000000', '1527239490', 'samsung');
INSERT INTO `location` VALUES ('17', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '21.0177765', '105.7837753', '1527240005', 'samsung');
INSERT INTO `location` VALUES ('18', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '21.0177879', '105.7837372', '1527240078', 'samsung');
INSERT INTO `location` VALUES ('19', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '21.0177670', '105.7836914', '1527240098', 'samsung');
INSERT INTO `location` VALUES ('20', '62d8e1613c6db3154b36dcc7f1013fdf6ef5dbc1', '21.0177689', '105.7837601', '1527240252', 'samsung');
