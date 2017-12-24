-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.23 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.5.0.5196
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
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Таблица пользователей';

-- Дамп данных таблицы basephpviard.users: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `Login`, `Password`, `FirstName`, `LastName`, `CreateDate`, `UpdateDate`) VALUES
	(4, 'xoiox', 'e2a0d2e867f4082f6201dac4c4b4cc91', 'Sergey', 'Usachev', '2017-12-22 13:28:00', '2017-12-23 20:31:48'),
	(5, '1', '1', '11', '1', '2017-12-23 20:32:00', '2017-12-23 20:32:03'),
	(6, '12345', 'b714337aa8007c433329ef43c7b8252c', '12345', '12345', '2017-12-24 17:57:23', '2017-12-24 17:57:23');
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
