CREATE TABLE `master_contacts` (
  `contactId` int(11) NOT NULL AUTO_INCREMENT,
  `contactName` varchar(200) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`contactId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

select * from master_contacts