-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.18-log - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных basephpviard
CREATE DATABASE IF NOT EXISTS `basephpviard` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `basephpviard`;

-- Дамп структуры для таблица basephpviard.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'идентификатор',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'дата события',
  `events` varchar(300) NOT NULL COMMENT 'событие',
  `description` varchar(500) NOT NULL COMMENT 'описание события',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Таблица для логирования\r\n';

-- Дамп данных таблицы basephpviard.logs: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
REPLACE INTO `logs` (`id`, `date`, `events`, `description`) VALUES
	(3, '2017-12-22 12:55:28', 'first', 'description first event'),
	(4, '2017-12-22 13:20:16', 'd', 'd');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Дамп структуры для таблица basephpviard.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'идентификатор',
  `Login` varchar(50) NOT NULL COMMENT 'логин',
  `Password` varchar(100) NOT NULL COMMENT 'пароль sha1(md5(pass))',
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `vkid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Индекс 2` (`vkid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='Таблица пользователей';

-- Дамп данных таблицы basephpviard.users: ~13 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `Login`, `Password`, `FirstName`, `LastName`, `CreateDate`, `UpdateDate`, `Email`, `Phone`, `vkid`) VALUES
	(4, 'xoiox', 'e2a0d2e867f4082f6201dac4c4b4cc91', 'Sergey', 'Usachev', '2017-12-22 13:28:00', '2017-12-23 20:31:48', NULL, NULL, NULL),
	(5, '1', '1', '11', '1', '2017-12-23 20:32:00', '2017-12-23 20:32:03', NULL, NULL, NULL),
	(6, '12345', 'b714337aa8007c433329ef43c7b8252c', '12345', '12345', '2017-12-24 17:57:23', '2017-12-24 17:57:23', NULL, NULL, NULL),
	(8, '1', '2', '3', '41', '2017-12-25 13:43:50', '2017-12-25 13:43:50', NULL, NULL, NULL),
	(9, 'AA1112345', '7055eced15538bfb7c07f8a5b28fc5d0', NULL, NULL, '2017-12-25 13:59:32', '2017-12-25 13:59:32', '123@dd', '11111111', NULL),
	(10, 'AA12345', '7055eced15538bfb7c07f8a5b28fc5d0', NULL, NULL, '2017-12-25 14:00:41', '2017-12-25 14:00:41', '123@dd', '1111111111', NULL),
	(11, 'dewdwef', '7055eced15538bfb7c07f8a5b28fc5d0', NULL, NULL, '2017-12-25 17:30:38', '2017-12-25 17:30:38', 'dewfd@fdewf.rt', '12836475126', NULL),
	(12, 'xoiox11', '7055eced15538bfb7c07f8a5b28fc5d0', NULL, NULL, '2017-12-26 09:14:04', '2017-12-26 09:14:04', 'xswe@mail.ru', '11111111111', NULL),
	(13, 'xxwddsd', '7055eced15538bfb7c07f8a5b28fc5d0', NULL, NULL, '2017-12-26 09:31:29', '2017-12-26 09:31:29', 'dewdew@mail.ru', '11111111111', NULL),
	(14, 'drgfw', '7055eced15538bfb7c07f8a5b28fc5d0', NULL, NULL, '2017-12-26 09:34:01', '2017-12-26 09:34:01', 'dew@dd.rr', '11111111111', NULL),
	(15, 'x1234', '7055eced15538bfb7c07f8a5b28fc5d0', NULL, NULL, '2017-12-26 11:36:38', '2017-12-26 11:36:38', 'x1234@mail.ru', '12345678901', NULL),
	(16, 'zzzzzz1', '7055eced15538bfb7c07f8a5b28fc5d0', NULL, NULL, '2017-12-26 14:15:28', '2017-12-26 14:15:28', 'zzz@zz.ee', '11111111111', NULL),
	(18, 'uid_51980094', '1acf438cc1c6d810691fc6be1523215a', NULL, NULL, '2017-12-28 15:59:12', '2017-12-28 15:59:12', 'uid_51980094@thisuser.russian', '911', 51980094);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Дамп структуры для триггер basephpviard.users_before_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `users_before_update` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
SET NEW.UpdateDate = NOW();
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Дамп структуры для триггер basephpviard.user_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `user_before_insert` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
SET NEW.CreateDate =NOW();
SET NEW.UpdateDate = NOW();
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
