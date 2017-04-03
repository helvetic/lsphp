/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50550
Source Host           : localhost:3306
Source Database       : lsphp3

Target Server Type    : MYSQL
Target Server Version : 50550
File Encoding         : 65001

Date: 2017-04-03 19:49:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for Pages
-- ----------------------------
DROP TABLE IF EXISTS `Pages`;
CREATE TABLE `Pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `uri` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `h1` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Pages
-- ----------------------------
INSERT INTO `Pages` VALUES ('1', '0', 'index', 'Welcome', 'Welcome', '<p>Welcome to the lesson3 start page</p>');
INSERT INTO `Pages` VALUES ('2', '0', 'login', 'Login', 'Sign in here', null);
INSERT INTO `Pages` VALUES ('3', '0', 'register', 'Register', 'Sign up here', null);
INSERT INTO `Pages` VALUES ('4', '1', 'profile', 'Profile', 'Profile of', null);
INSERT INTO `Pages` VALUES ('5', '1', 'users', 'Users', 'List of users', null);
INSERT INTO `Pages` VALUES ('6', '1', 'files', 'Files', 'List of users with photos', null);

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
INSERT INTO `Sessions` VALUES ('22', 'qa44v8f0fhjovobd5g4qvit9r4');

-- ----------------------------
-- Table structure for Users
-- ----------------------------
DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `password` binary(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `salt` varchar(60) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `age` tinyint(3) DEFAULT NULL,
  `about` text,
  `photo` tinytext,
  `ip` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of Users
-- ----------------------------
INSERT INTO `Users` VALUES ('1', 'tiger', 0x243279243130246D625A347A73347455644563434B4E744A755331422E48787938784C4E593732566E6E33544177782E6F2E4C4C7A624A552F466771, 'tiger@maggit.ru', '$2y$10$mbZ4zs4tUdEcCKNtJuS1B.1c.Lc3iNa4.xM4VArZdHe.t39Y.X6mW', 'Тигр', '12', 'Я кот', '48px-BabyTiger.png', null);
INSERT INTO `Users` VALUES ('2', 'lama', 0x2432792431302474683258476C4A562E317941306F477472526D536E6535312E334B63672E424A4F31433648736D6A317A6D51776558647833436D61, '', '$2y$10$th2XGlJV.1yA0oGtrRmSneHYwe6BcufYHEhgch3uADEJR1RNLKM2S', 'Лама', '4', 'Верю – в куче хлама,\r\nВ тёмной кладовой\r\nЗатаилась лама\r\nИ хрустит травой!', '48px-Llama.png', null);
INSERT INTO `Users` VALUES ('3', 'alpaca', 0x24327924313024766B584846415A6D50494D4A6C54694C37344237674F78667975724B336A4449585578396B547744635A5836504C3247636A774F47, '', '$2y$10$vkXHFAZmPIMJlTiL74B7gOKsOdZrexKsbmfeGLdG5PwaQdSZitRwG', 'Джон', '6', 'Привет, меня зовут Джон. Мне 6 лет и я альпака...', '48px-Alpaca.png', null);
INSERT INTO `Users` VALUES ('4', 'chicken', 0x243279243130247A7354587948413831496878566744374A346676572E3631354A6E4647314D41506159655630666454444666395A384E7230764F71, '', '$2y$10$zsTXyHA81IhxVgD7J4fvW.LoWyckgYPy1iFZq8UlTzXVI15wcni3e', 'Курочка', '2', 'Самый многочисленный и распространённый вид домашней птицы. Летаю плохо, недалеко.', '48px-Chicken.png', null);
INSERT INTO `Users` VALUES ('5', 'goose', 0x24327924313024467739714B422F6374382F6D546A4E576A376F52586574726668672E674749625946717830354550616C69367456522E4C45416D36, 'goose@maggit.ru', '$2y$10$Fw9qKB/ct8/mTjNWj7oRXeWu4ryuueGs4eMDSl83xRWZJOYzRIDwO', 'Гусь!!!', '2', 'Я - Гусь..', '48px-FarmGoose.png', null);
INSERT INTO `Users` VALUES ('19', 'rabbit', 0x24327924313024736F52644C6D773747674361526B584D55317652767541513661664E4D6E394A6E457A6548586D6A734D747A755351436E486B7557, 'my@maggit.ru', '$2y$10$soRdLmw7GgCaRkXMU1vRvu5pJcLL/g4rwJ8s5JAtpNEq6y1JQ/pvC', 'Кролик', '2', '', '48px-AngoraRabbit.png', null);
INSERT INTO `Users` VALUES ('21', 'cat', 0x243279243130246D73646E4245506A586C763239705478366C484254754B6F57717A73695138697A6A394D684C345849586C7A6D6E41736A44446143, 'cat@maggit.ru', '$2y$10$msdnBEPjXlv29pTx6lHBTuVxUwcWw7G8dEFcdNhNOwLXhUfODNSf.', 'Васька', '20', 'Мур', '48px-WhiteKitty.png', null);
INSERT INTO `Users` VALUES ('22', 'cat2', 0x24327924313024626E6B614A4159796B6D306B44387A444839527A594F675953796B2F6E4775502F50324177334F5169556A457454415A4C756C444B, 'pink@maggit.ru', '$2y$10$bnkaJAYykm0kD8zDH9RzYOGhiYljf8RhR.xqRpOJUQXxNvfsNSkBK', 'Мурзик', '13', 'The domestic cat[1][5] (Latin: Felis catus) is a small, typically furry, carnivorous mammal. They are often called house cats when kept as indoor pets or simply cats when there is no need to distinguish them from other felids and felines.[6] Cats are often valued by humans for companionship and for their ability to hunt vermin. There are more than 70 cat breeds, though different associations proclaim different numbers according to their standards.', '48px-Sphynx.png', '127.0.0.1');
SET FOREIGN_KEY_CHECKS=1;
