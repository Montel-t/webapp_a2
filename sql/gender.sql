USE `redbt`;

DROP TABLE IF EXISTS `genders`;
CREATE TABLE IF NOT EXISTS `genders` (
  `genderId` tinyint(1) NOT NULL AUTO_INCREMENT,
  `gender` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`genderId`),
  UNIQUE KEY `gender` (`gender`)
);

INSERT INTO `genders` (`gender`) VALUES ('Female');
INSERT INTO `genders` (`gender`) VALUES ('Male');
INSERT INTO `genders` (`gender`) VALUES ('Rather Not Say');
INSERT INTO `genders` (`gender`) VALUES ('Information reserved');
