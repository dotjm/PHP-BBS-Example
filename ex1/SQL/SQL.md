CREATE TABLE `board` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(45) DEFAULT NULL,
  `subject` varchar(245) DEFAULT NULL,
  `content` text ,
  `regdate` datetime DEFAULT CURRENT_TIMESTAMP,
  `modifydate` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `members` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(145) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `username` varchar(145) DEFAULT NULL, 

  `passwd` varchar(200) DEFAULT NULL,
  `regdate` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;