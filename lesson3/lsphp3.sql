/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50550
Source Host           : localhost:3306
Source Database       : lsphp3

Target Server Type    : MYSQL
Target Server Version : 50550
File Encoding         : 65001

Date: 2017-03-11 19:41:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for Sessions
-- ----------------------------
DROP TABLE IF EXISTS `Sessions`;
CREATE TABLE `Sessions` (
  `id` int(4) NOT NULL,
  `sessid` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Sessions
-- ----------------------------

-- ----------------------------
-- Table structure for Users
-- ----------------------------
DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `password` binary(60) NOT NULL,
  `salt` varchar(60) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `age` tinyint(3) DEFAULT NULL,
  `about` text,
  `photo` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Users
-- ----------------------------
INSERT INTO `Users` VALUES ('1', 'tiger', 0x243279243130246D625A347A73347455644563434B4E744A755331422E48787938784C4E593732566E6E33544177782E6F2E4C4C7A624A552F466771, '$2y$10$mbZ4zs4tUdEcCKNtJuS1B.1c.Lc3iNa4.xM4VArZdHe.t39Y.X6mW', 'Тигр', '12', 'Я кот', '48px-BabyTiger.png');
INSERT INTO `Users` VALUES ('2', 'lama', 0x2432792431302474683258476C4A562E317941306F477472526D536E6535312E334B63672E424A4F31433648736D6A317A6D51776558647833436D61, '$2y$10$th2XGlJV.1yA0oGtrRmSneHYwe6BcufYHEhgch3uADEJR1RNLKM2S', 'Лама', '4', 'Верю – в куче хлама,\r\nВ тёмной кладовой\r\nЗатаилась лама\r\nИ хрустит травой!', '48px-Llama.png');
INSERT INTO `Users` VALUES ('3', 'alpaca', 0x24327924313024766B584846415A6D50494D4A6C54694C37344237674F78667975724B336A4449585578396B547744635A5836504C3247636A774F47, '$2y$10$vkXHFAZmPIMJlTiL74B7gOKsOdZrexKsbmfeGLdG5PwaQdSZitRwG', 'Джон', '6', 'Привет, меня зовут Джон. Мне 6 лет и я альпака...', '48px-Alpaca.png');
INSERT INTO `Users` VALUES ('4', 'chicken', 0x243279243130247A7354587948413831496878566744374A346676572E3631354A6E4647314D41506159655630666454444666395A384E7230764F71, '$2y$10$zsTXyHA81IhxVgD7J4fvW.LoWyckgYPy1iFZq8UlTzXVI15wcni3e', 'Курочка', '2', 'Самый многочисленный и распространённый вид домашней птицы. Летаю плохо, недалеко.', '48px-Chicken.png');
INSERT INTO `Users` VALUES ('5', 'goose', 0x24327924313024467739714B422F6374382F6D546A4E576A376F52586574726668672E674749625946717830354550616C69367456522E4C45416D36, '$2y$10$Fw9qKB/ct8/mTjNWj7oRXeWu4ryuueGs4eMDSl83xRWZJOYzRIDwO', 'Гусь', '5', 'Я - Гусь..', '48px-FarmGoose.png');
SET FOREIGN_KEY_CHECKS=1;
