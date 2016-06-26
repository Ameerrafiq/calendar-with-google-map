CREATE TABLE IF NOT EXISTS `login` (
  `id` int(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user` varchar(25) NOT NULL,
  `pwd` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `desc` varchar(50) NOT NULL,
  `address` varchar(400) DEFAULT NULL,
  `zip` int(8) NOT NULL,
  `mailid` varchar(100) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `startdate` varchar(15) NOT NULL,
  `enddate` varchar(15) NOT NULL,
  `category` varchar(10) NOT NULL,
  `lat` varchar(25) DEFAULT NULL,
  `longd` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `event_tracker` (
  `user_id` int(4) NOT NULL,
  `attend` int(4) NOT NULL,
  `event_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
