create table `contact_types` (
  `ContactTypeID` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) NOT NULL,
  primary key PK_CONTACT_TYPES(`ContactTypeID`),
  constraint UQ1_CONTACT_TYPES unique (`caption`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into contact_types(ContactTypeID, caption) values(1, 'phone');
insert into contact_types(ContactTypeID, caption) values(2, 'mobile');
insert into contact_types(ContactTypeID, caption) values(3, 'email');

create table `persons`(
  `PersonID` int(15) unsigned not null auto_increment,
  `UserID` int(15) unsigned null,
  `FirstName` varchar(255) not null,
  `LastName` varchar(255) not null,
  `MiddleName` varchar(255) null,
  `Gender` enum('M','F', 'U') not null default 'U',
  `BirthDate` date null,
  `BirthPlace` int(15) unsigned null,
  primary key PK_PERSONS(`PersonID`),
  constraint UQ1_PERSONS unique (`UserID`),
  constraint FK1_PERSONS foreign key (`UserID`) references `users`(`UserID`),
  constraint FK2_PERSONS foreign key (`BirthPlace`) references `cities`(`CityID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `person_contacts` (
  `PersonContactID` int(15) unsigned not null auto_increment,
  `PersonID` int(15) unsigned not null,
  `ContactTypeID` int(15) unsigned not null,
  `Value` text not null,
  primary key PK_PERSON_CONTACTS(`PersonContactID`),
  constraint FK1_PERSON_CONTACTS foreign key (`PersonID`) references `persons`(`PersonID`),
  constraint FK2_PERSON_CONTACTS foreign key (`ContactTypeID`) references `contact_types`(`ContactTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `person_addresses` (
  `PersonAddressID` int(15) unsigned not null auto_increment,
  `PersonID` int(15) unsigned not null,
  `AddressID` int(15) unsigned not null,
  primary key PK_PERSON_ADDRESSES(`PersonAddressID`),
  constraint FK1_PERSON_ADDRESSES foreign key (`PersonID`) references `persons`(`PersonID`),
  constraint FK2_PERSON_ADDRESSES foreign key (`AddressID`) references `addresses`(`AddressID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `schools`(
  `SchoolID` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `SchoolName` varchar(255) not null,
  `PrimaryAddressID` int(15) unsigned null,
  `Active` smallint(1) not null default 1,
  `SchoolLogo` text,
  `PrincipalID` int(15) unsigned,
  primary key PK_SCHOOLS(`SchoolID`),
  constraint FK1_SCHOOLS foreign key (`PrimaryAddressID`) references `addresses`(`AddressID`),
  constraint FK2_SCHOOLS foreign key (`PrincipalID`) references `persons`(`PersonID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* each person can work in several schools */
create table `staffs` (
  `StaffID` int(15) unsigned not null auto_increment,
  `SchoolID` int(15) unsigned NOT NULL,
  `PersonID` int(15) unsigned NOT NULL,
  `role` varchar(255),
  primary key PK_STAFFS(`StaffID`),
  constraint UQ1_STAFFS unique (`SchoolID`, `PersonID`),
  constraint FK1_STAFFS foreign key (`SchoolID`) references `schools`(`SchoolID`),
  constraint FK2_STAFFS foreign key (`PersonID`) references `persons`(`PersonID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* each student can teach in single school */
create table `students` (
  `StudentID` int(15) unsigned not null auto_increment,
  `SchoolID` int(15) unsigned NOT NULL,
  `PersonID` int(15) unsigned NOT NULL,
  `Grade` smallint(1),
  primary key PK_STUDENTS(`StudentID`),
  constraint UQ1_STUDENTS unique (`PersonID`),
  constraint FK1_STUDENTS foreign key (`SchoolID`) references `schools`(`SchoolID`),
  constraint FK2_STUDENTS foreign key (`PersonID`) references `persons`(`PersonID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `team_types` (
  `TeamTypeID` int(15) unsigned not null auto_increment,
  `TeamTypeName` varchar(255) not null,
  primary key PK_TEAM_TYPES(`TeamTypeID`),
  constraint UQ1_TEAM_TYPES unique (`TeamTypeName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `teams` (
  `TeamID` int(15) unsigned not null auto_increment,
  `TeamTypeID` int(15) unsigned not null,
  `TeamName` varchar(255) not null,
  `CoachID` int(15) unsigned not null,
  primary key PK_TEAMS(`TeamID`),
  constraint FK1_TEAMS foreign key (`CoachID`) references `persons`(`PersonID`),
  constraint FK2_TEAMS foreign key (`TeamTypeID`) references `team_types`(`TeamTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `team_members` (
  `TeamMemberID` int(15) unsigned not null auto_increment,
  `TeamID` int(15) unsigned not null,
  `StudentID` int(15) unsigned not null,
  primary key PK_TEAM_MEMBERS(`TeamMemberID`),
  constraint UQ1_TEAM_MEMBERS unique (`TeamID`, `StudentID`),
  constraint FK1_TEAM_MEMBERS foreign key (`TeamID`) references `teams`(`TeamID`),
  constraint FK2_TEAM_MEMBERS foreign key (`StudentID`) references `students`(`StudentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `seasons` (
  `SeasonID` int(15) unsigned not null auto_increment,
  `SeasonName` varchar(200) null,
  `DateBegin` date not null,
  `DateEnd` date not null,
  `NumberOfRuns` int(15) not null default 0,
  `SeedOrderClass` varchar(100),
  primary key PK_SEASONS(`SeasonID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `events` (
  `EventID` int(15) unsigned not null auto_increment,
  `SeasonID` int(15) unsigned not null,
  `EventName` varchar(200) null,
  `DateBegin` date not null,
  `DateEnd` date not null,
  `AddressID` int(15) unsigned null,
  primary key PK_EVENTS(`EventID`),
  constraint FK1_EVENTS foreign key (`SeasonID`) references `seasons`(`SeasonID`),
  constraint FK2_EVENTS foreign key (`AddressID`) references `addresses`(`AddressID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `themes` (
  `ThemeID` int(15) unsigned not null auto_increment,
  `ThemeName` varchar(200) not null,
  `ThemePath` text not null,
  primary key PK_THEMES(`ThemeID`),
  constraint UQ1_THEMES unique (`ThemeName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `leagues` (
  `LeagueID` int(15) unsigned not null auto_increment,
  `LeagueName` varchar(200) null,
  `PersonContactID` int(15) unsigned null,
  `ThemeID` int(15) unsigned null,
  `subdomain` varchar(255),
  primary key PK_LEAGUES(`LeagueID`),
  constraint FK1_LEAGUES foreign key (`PersonContactID`) references `person_contacts`(`PersonContactID`),
  constraint FK2_LEAGUES foreign key (`ThemeID`) references `themes`(`ThemeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table `league_members` (
  `LeagueID` int(15) unsigned not null,
  `TeamID` int(15) unsigned not null,
  primary key PK_LEAGUE_MEMBERS(`LeagueID`),
  constraint FK1_LEAGUE_MEMBERS foreign key (`LeagueID`) references `leagues`(`LeagueID`),
  constraint FK2_LEAGUE_MEMBERS foreign key (`TeamID`) references `teams`(`TeamID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
