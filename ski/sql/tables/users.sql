create table `roles` (
  `RoleID` int(15) unsigned not null auto_increment,
  `RoleName` varchar(30) not null,
  `RoleDesc` text,
  primary key PK_ROLES(`RoleID`),
  constraint UQ1_ROLES unique (`RoleName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into `roles`(`RoleID`,`RoleName`) values(0, 'SuperAdmin');
insert into `roles`(`RoleID`,`RoleName`) values(1, 'Admin');
insert into `roles`(`RoleID`,`RoleName`) values(2, 'Student');
insert into `ref`(`Code`, `Desc`, `Value`) values(100, 'Reference for students role', 2);
insert into `roles`(`RoleID`,`RoleName`) values(3, 'Coach');
insert into `ref`(`Code`, `Desc`, `Value`) values(101, 'Reference for coach role', 3);

CREATE TABLE `users` (
  `UserID` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `super` smallint(1) NOT NULL DEFAULT '0',
  `enabled` smallint(1) DEFAULT '1',
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UQ1_USERS` (`name`),
  KEY `IX1_USERS` (`enabled`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
insert into `users`(UserID, name, pass, super) values(0, 'admin', password('admin'), 1);

create table `user_roles` (
  `UserID` int(15) unsigned not null,
  `RoleID` int(15) unsigned not null,
  primary key PK_USER_ROLES(`UserID`, `RoleID`),
  constraint FK1_USER_ROLES foreign key (`UserID`) references `users`(`UserID`),
  constraint FK2_USER_ROLES foreign key (`RoleID`) references `roles`(`RoleID`)
);