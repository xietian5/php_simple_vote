CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `vote` int(11) DEFAULT NULL,
  `text` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;