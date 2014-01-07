/* security domains */
create table `domains`(
  `DomainID` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `DomainName` varchar(255) NOT NULL,
  `DomainDesc` text NULL,
  `enabled` smallint(1) not null default 0,
  primary key PK_DOMAINS(`DomainID`),
  constraint UQ1_DOMAINS unique (`DomainName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into `domains`(`DomainID`, `DomainName`, `DomainDesc`, `enabled`) values(1, '*', 'All domains', 1);
insert into `domains`(`DomainID`, `DomainName`, `DomainDesc`, `enabled`) values(2, 'backend.*', 'All domains of backend side', 1);
insert into `domains`(`DomainID`, `DomainName`, `DomainDesc`, `enabled`) values(3, 'frontend.*', 'All domains of frontend side', 1);

create table `permissions`(
  `PermissionID` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `DomainID` int(15) unsigned NOT NULL,
  `PermissionName` varchar(255) NOT NULL,
  `PermissionDesc` text NULL,
  `enabled` smallint(1) not null default 0,
  primary key PK_PERMISSIONS(`PermissionID`),
  constraint UQ1_PERMISSIONS unique (`DomainID`, `PermissionName`),
  constraint FK1_PERMISSIONS foreign key (`DomainID`) references `domains`(`DomainID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into `permissions`(`PermissionID`, `DomainID`, `PermissionName`, `PermissionDesc`, `enabled`) values(1, 1, 'leagues', 'Permissions for leagues', 1);
insert into `permissions`(`PermissionID`, `DomainID`, `PermissionName`, `PermissionDesc`, `enabled`) values(2, 1, 'seasons', 'Permissions for seasons', 1);
insert into `permissions`(`PermissionID`, `DomainID`, `PermissionName`, `PermissionDesc`, `enabled`) values(3, 1, 'teams', 'Permissions for teams', 1);
insert into `permissions`(`PermissionID`, `DomainID`, `PermissionName`, `PermissionDesc`, `enabled`) values(4, 1, 'schools', 'Permissions for schools', 1);
insert into `permissions`(`PermissionID`, `DomainID`, `PermissionName`, `PermissionDesc`, `enabled`) values(5, 1, 'coaches', 'Permissions for coaches', 1);
insert into `permissions`(`PermissionID`, `DomainID`, `PermissionName`, `PermissionDesc`, `enabled`) values(6, 1, 'students', 'Permissions for students', 1);

CREATE TABLE `role_permissions` (
  `RolePermissionID` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `PermissionID` int(15) unsigned NOT NULL,
  `RoleID` int(15) unsigned NOT NULL,
  `Action` varchar(255) NOT NULL,
  `enabled` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`RolePermissionID`),
  UNIQUE KEY `UQ1_ROLE_PERMISSIONS` (`PermissionID`,`RoleID`,`Action`),
  KEY `FK2_ROLE_PERMISSIONS_idx` (`RoleID`),
  CONSTRAINT `FK1_ROLE_PERMISSIONS` FOREIGN KEY (`PermissionID`) REFERENCES `permissions` (`PermissionID`),
  CONSTRAINT `FK2_ROLE_PERMISSIONS` FOREIGN KEY (`RoleID`) REFERENCES `roles` (`RoleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user_permissions` (
  `UserPermissionID` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `PermissionID` int(15) unsigned NOT NULL,
  `UserID` int(15) unsigned NOT NULL,
  `Action` varchar(255) NOT NULL,
  `enabled` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`UserPermissionID`),
  UNIQUE KEY `UQ1_USER_PERMISSIONS` (`PermissionID`,`UserID`,`Action`),
  KEY `FK2_USER_PERMISSIONS_idx` (`UserID`),
  CONSTRAINT `FK1_USER_PERMISSIONS` FOREIGN KEY (`PermissionID`) REFERENCES `permissions` (`PermissionID`),
  CONSTRAINT `FK2_USER_PERMISSIONS` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;