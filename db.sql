SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
	`id` int(10) UNSIGNED NOT NULL auto_increment,
	`prefix` varchar(10) NULL,
	`first_name` varchar(30) NOT NULL,
	`last_name` varchar(30) NOT NULL,
	`suffix` varchar(10) NULL,
	PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------
-- Table structure for `properties`
-- --------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `test`.`properties` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `address1` VARCHAR(30) NULL,
  `berth` TINYINT(1) UNSIGNED NULL,
  `city` VARCHAR(30) NULL,
  `smoking` TINYINT(1) UNSIGNED NULL,
  `pets` TINYINT(1) UNSIGNED NULL,
  PRIMARY KEY (`id`));

INSERT INTO properties VALUES (2105, 'Richard House', 5, 'Chester', 1, 1);
INSERT INTO properties VALUES (7439, 'Craster Reach', 1, 'Craster', 0, 1);
