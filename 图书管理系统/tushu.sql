/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50519
Source Host           : localhost:3306
Source Database       : tushu

Target Server Type    : MYSQL
Target Server Version : 50519
File Encoding         : 65001

Date: 2022-03-01 00:05:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `book`
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publish` varchar(255) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '状态 1上架0下架',
  `remark` varchar(255) DEFAULT NULL,
  `floor` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `book` VALUES ('4', '西游记', '3', '吴承恩', '机械工业出版社', '23.00', '213', '1', '四大名著之一', '图书馆二楼');
INSERT INTO `book` VALUES ('6', 'SpringCloud微服务架构开发', '1', '黑马程序员', '人民邮电出版社', '28.00', '20', '1', '微服务实战开发', '图书馆三楼');
INSERT INTO `book` VALUES ('7', '水浒传', '3', '施耐庵 ', '人民文学出版社', '29.00', '30', '1', '四大名著之一', '图书馆三楼');
INSERT INTO `book` VALUES ('8', 'Java基础入门（第2版）', '1', '黑马程序员', '清华大学出版社', '30.20', '22', '1', '提高Java编程功底必备', '图书馆三楼');
INSERT INTO `book` VALUES ('9', '中国文学编年史', '2', '陈文新', '湖南人民出版社', '35.30', '36', '1', '中国文学编年史', '图书馆三楼');
INSERT INTO `book` VALUES ('10', 'JavaWeb程序设计任务教程', '1', '黑马程序员', '人民邮电出版社', '25.50', '16', '1', '学好java web的好帮手', '图书馆一楼');
INSERT INTO `book` VALUES ('11', 'SSH框架整合实战教程', '1', '传智播客高教产品研发部', '清华大学出版社', '59.00', '12', '1', 'SSH项目开发实战', '图书馆三楼');
INSERT INTO `book` VALUES ('12', '朝花夕拾', '3', '鲁迅', '辽海出版社', '44.60', '30', '1', '鲁迅小说全集', '图书馆四楼');
INSERT INTO `book` VALUES ('13', '彷徨', '3', '鲁迅', '辽海出版社', '44.60', '16', '1', '鲁迅小说全集系列', '图书馆三楼');
INSERT INTO `book` VALUES ('14', '呐喊', '3', '鲁迅', '辽海出版社', '44.50', '16', '1', '鲁迅小说全集系列', '图书馆三楼');
INSERT INTO `book` VALUES ('15', '阿Q正传', '3', '鲁迅', '辽海出版社', '29.00', '33', '1', '鲁迅小说全集系列', '图书馆三楼');
INSERT INTO `book` VALUES ('20', '热热热', '1', '三木', '新华', '5.00', '20', '1', '阿萨斯', '图书馆二楼');

-- ----------------------------
-- Table structure for `book_type`
-- ----------------------------
DROP TABLE IF EXISTS `book_type`;
CREATE TABLE `book_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of book_type
-- ----------------------------
INSERT INTO `book_type` VALUES ('1', '技术', '技术类');
INSERT INTO `book_type` VALUES ('2', '人文', '人文关怀');
INSERT INTO `book_type` VALUES ('3', '小说', '人生情感小说');

-- ----------------------------
-- Table structure for `borrowdetail`
-- ----------------------------
DROP TABLE IF EXISTS `borrowdetail`;
CREATE TABLE `borrowdetail` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '状态  1在借2已还',
  `borrow_time` bigint(20) DEFAULT NULL,
  `return_time` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`tid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of borrowdetail
-- ----------------------------
INSERT INTO `borrowdetail` VALUES ('33', '1', '4', '2', '1644940969', '1645631515');
INSERT INTO `borrowdetail` VALUES ('34', '1', '6', '2', '1644940971', '1644940989');
INSERT INTO `borrowdetail` VALUES ('35', '1', '7', '2', '1644940973', '1644940989');
INSERT INTO `borrowdetail` VALUES ('36', '1', '8', '2', '1644940979', '1644940989');
INSERT INTO `borrowdetail` VALUES ('37', '1', '9', '2', '1644941085', '1644941094');
INSERT INTO `borrowdetail` VALUES ('38', '1', '12', '2', '1644941090', '1644941340');
INSERT INTO `borrowdetail` VALUES ('39', '1', '14', '2', '1644941107', '1644941116');
INSERT INTO `borrowdetail` VALUES ('40', '1', '4', '2', '1644941295', '1645631515');
INSERT INTO `borrowdetail` VALUES ('41', '1', '4', '2', '1644941318', '1645631515');
INSERT INTO `borrowdetail` VALUES ('42', '3', '4', '2', '1645631467', '1645632178');
INSERT INTO `borrowdetail` VALUES ('43', '3', '14', '1', '1645632212', null);

-- ----------------------------
-- Table structure for `seat`
-- ----------------------------
DROP TABLE IF EXISTS `seat`;
CREATE TABLE `seat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(255) DEFAULT NULL,
  `static` int(11) DEFAULT NULL,
  `isnull` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of seat
-- ----------------------------
INSERT INTO `seat` VALUES ('1', '图书馆一楼', '0', null);
INSERT INTO `seat` VALUES ('2', '图书馆三楼', '0', null);
INSERT INTO `seat` VALUES ('3', '图书馆四楼', '0', '');
INSERT INTO `seat` VALUES ('4', '图书馆二楼', '1', 'javaniu');
INSERT INTO `seat` VALUES ('5', '图书馆一楼', '0', null);
INSERT INTO `seat` VALUES ('7', '图书馆三楼', '0', null);
INSERT INTO `seat` VALUES ('8', '图书馆二楼', '0', null);

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(255) DEFAULT NULL COMMENT '角色  1学生 2管理员',
  `sex` varchar(1) DEFAULT NULL,
  `phone` char(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'xkj', '123456', '1', '男', '13009876534');
INSERT INTO `user` VALUES ('2', 'admin', '111111', '2', '男', '13198645975');
INSERT INTO `user` VALUES ('3', '徐某人', 'xkj123', '1', '女', '13195648529');
INSERT INTO `user` VALUES ('4', '肖淼', 'sdf78978', '1', '女', '13195698458');
INSERT INTO `user` VALUES ('5', '张军伟', 'zjw520', '1', '男', '18332456784');
INSERT INTO `user` VALUES ('6', '杨帆', 'dfd757', '1', '女', '15246598568');
INSERT INTO `user` VALUES ('7', '九头蛇', 'kkk111', '1', '男', '13194959879');
INSERT INTO `user` VALUES ('8', '蔡佳铭', 'cjm7418', '1', '女', '13164649855');
INSERT INTO `user` VALUES ('9', '杨飞龙', 'kj12345', '1', '男', '13195864589');

-- ----------------------------
-- View structure for `jieshu`
-- ----------------------------
DROP VIEW IF EXISTS `jieshu`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jieshu` AS select `v1`.`tid` AS `tid`,`v1`.`book_name` AS `book_name`,`v2`.`username` AS `username`,`v1`.`status` AS `status`,`v1`.`borrow_time` AS `borrow_time`,`v2`.`return_time` AS `return_time` from (`v1` join `v2`) where (`v1`.`tid` = `v2`.`tid`) ;

-- ----------------------------
-- View structure for `v1`
-- ----------------------------
DROP VIEW IF EXISTS `v1`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v1` AS select `br`.`tid` AS `tid`,`br`.`status` AS `status`,`br`.`borrow_time` AS `borrow_time`,`br`.`return_time` AS `return_time`,`book`.`book_name` AS `book_name` from (`borrowdetail` `br` join `book` on((`br`.`book_id` = `book`.`id`))) ;

-- ----------------------------
-- View structure for `v2`
-- ----------------------------
DROP VIEW IF EXISTS `v2`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v2` AS select `br`.`tid` AS `tid`,`br`.`user_id` AS `user_id`,`br`.`book_id` AS `book_id`,`br`.`status` AS `status`,`br`.`borrow_time` AS `borrow_time`,`br`.`return_time` AS `return_time`,`user`.`id` AS `id`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`role` AS `role`,`user`.`sex` AS `sex`,`user`.`phone` AS `phone` from (`borrowdetail` `br` join `user` on((`br`.`user_id` = `user`.`id`))) ;
