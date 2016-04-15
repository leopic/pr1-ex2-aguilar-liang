DROP TABLE IF EXISTS `videojuego`;

CREATE TABLE videojuego(
  id INT NOT NULL AUTO_INCREMENT,
  titulo VARCHAR(255) NOT NULL,
  name VARCHAR(255) NOT NULL,
  description VARCHAR(255),
  console VARCHAR(255),
  num INT (10),
  sDate VARCHAR(45) DEFAULT NULL,
  image VARCHAR(70)DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

LOCK TABLES `videojuego` WRITE;
/*!40000 ALTER TABLE `videojuego` DISABLE KEYS */;
INSERT INTO `videojuego` VALUES (1,'Grand Theft Auto: San Andreas','Rockstar North','cars','PS2',3,'Sun Apr 02 2016 12:07:06 GMT-0600 (CST)',NULL),(2,'Crash Team Racing','Naughty Dog','Is a video game og Crash Brandicoot','PS1',4,'Mon Apr 04 2016 12:07:06 GMT-0600 (CST)',NULL),(3,'fifa_world_cup','Fifa World Cup','Fifa 2016','PS4',2,'Sat Apr 09 2016 12:07:06 GMT-0600 (CST)',NULL);
/*!40000 ALTER TABLE `videojuego` ENABLE KEYS */;
UNLOCK TABLES;