delimiter $$

CREATE TABLE `insideedge_form_cfg` (
  `id` int(11) NOT NULL,
  `city` varchar(45) NOT NULL,
  `cityCode` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  `location` varchar(45) NOT NULL,
  `society_name` varchar(45) NOT NULL,
  `program_title` varchar(45) NOT NULL,
  `speaker` varchar(45) NOT NULL,
  `speakerTitle` varchar(45) DEFAULT NULL,
  `moderator` varchar(45) NOT NULL,
  `moderator_title` varchar(45) DEFAULT NULL,
  `event_name` varchar(45) NOT NULL,
  `intro` varchar(45) DEFAULT NULL,
  `outtro` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1$$


CREATE TABLE `insideedge_form_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regCity` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `lic` varchar(45) NOT NULL,
  `business` varchar(45) NOT NULL,
  `specialty` varchar(45) NOT NULL,
  `meal` varchar(45) NOT NULL,
  `patientPercent` varchar(45) NOT NULL,
  `patientAge` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1$$

















