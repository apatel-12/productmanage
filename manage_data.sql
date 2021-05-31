/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost
 Source Database       : manage_data

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : utf-8

 Date: 05/31/2021 14:49:52 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `product_master`
-- ----------------------------
DROP TABLE IF EXISTS `product_master`;
CREATE TABLE `product_master` (
  `tab_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `product_brand` varchar(255) DEFAULT NULL,
  `accomodation_number` int(11) DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `active_status` int(1) DEFAULT NULL,
  PRIMARY KEY (`tab_id`),
  UNIQUE KEY `productname` (`product_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `product_master`
-- ----------------------------
BEGIN;
INSERT INTO `product_master` VALUES ('1', 'New Coleman2', 'Coleman', '3', '25000', '2021-05-31 13:29:09', '1'), ('2', 'Coleman', 'Caravan', '4', '27000', '2021-05-31 13:29:09', '1'), ('3', 'New Forest River ', 'Acadia', '5', '0', '2021-05-31 13:29:09', '1'), ('4', 'Forest River2 ', 'Alpha Wolf', '4', '26000', '2021-05-31 13:29:09', '1'), ('5', 'New Airstream', 'Atlas', '6', '15000', '2021-05-31 13:29:09', '1'), ('6', 'Dodge ', 'Journey', '8', '12000', '2021-05-31 13:29:09', '1'), ('7', 'Dutchmen', 'Winner\'s Circle', '10', '50000', '2021-05-31 13:29:09', '1'), ('8', 'Winnebago2', 'Access', '7', '100000', '2021-05-31 13:29:09', '1'), ('9', 'Winnebago', 'Adventurer', '6', '50000', '2021-05-31 13:29:09', '1'), ('10', 'Jayco', 'Elite', '5', '25000', '2021-05-31 13:29:09', '1'), ('11', 'Winnebago6', 'Adventurer', '10', '50000', '2021-05-31 13:29:09', '1'), ('12', 'Airstream New', 'Atlas', '4', '23000', '2021-05-31 13:29:09', '1'), ('13', 'Airstream another', 'Adventurer', '3', '90000', '2021-05-31 13:29:09', '1'), ('14', 'Coleman-4', 'Caravan', '4', '27000', '2021-05-31 13:29:09', '1'), ('15', 'Forest River ', 'Acadia', '5', '0', '2021-05-31 13:29:09', '1'), ('32', 'New Coleman', 'Coleman', '6', '44000', '2021-05-31 13:29:41', '1'), ('35', 'Winnebago New', 'Access', '6', '120000', '2021-05-31 13:40:50', '1'), ('36', 'Forest River 4', 'Alpha Wolf', '8', '48000', '2021-05-31 13:40:50', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
