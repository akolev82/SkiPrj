create table `countries`(
  `CountryID` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `CountryName` varchar(255) NOT NULL,
  primary key PK_COUNTRIES(`CountryID`),
  constraint UQ1_COUNTRIES unique (`CountryName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into `countries`(`CountryID`, `CountryName`) values(1, 'USA');

create table `states`(
  `StateID` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(15) unsigned NOT NULL,
  `StateCode` varchar(30) NOT NULL,
  `StateName` varchar(255) NOT NULL,
  primary key PK_STATES(`StateID`),
  constraint UQ1_STATES unique (`CountryID`, `StateName`),
  constraint FK1_STATES foreign key (`CountryID`) references `countries`(`CountryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into `states`(`CountryID`, `StateCode`, `StateName`) select distinct 1 as CountryID, z.state as StateCode, z.full_state as StateName from zip_codes z order by z.full_state;

create table `cities`(
  `CityID` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(15) unsigned NOT NULL,
  `StateID` int(15) unsigned NULL,
  `CityName` varchar(255) NOT NULL,
  primary key PK_CITIES(`CityID`),
  constraint UQ1_CITIES unique (`CountryID`, `StateID`, `CityName`),
  constraint FK1_CITIES foreign key (`CountryID`) references `countries`(`CountryID`),
  constraint FK2_CITIES foreign key (`StateID`) references `states`(`StateID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into `cities`(`CountryID`, `StateID`, `CityName`) 
select distinct 1 as CountryID, s.StateID, z.city as CityName 
from zip_codes z 
left outer join states s on s.StateName=z.full_state and 
order by z.full_state, z.city;

create table `zips`(
  `ZipID` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `CountryID` int(15) unsigned NOT NULL,
  `CityID` int(15) unsigned NULL,
  `StateID` int(15) unsigned NULL,
  `ZipCode` varchar(5) NOT NULL default '',
  `latitude` varchar(10) NOT NULL default '',
  `longitude` varchar(10) NOT NULL default '',
  primary key PK_ZIPS(`ZipID`),
  constraint UQ1_ZIPS unique (`CountryID`, `StateID`, `CityID`, `ZipCode`),
  constraint FK1_ZIPS foreign key (`CountryID`) references `countries`(`CountryID`),
  constraint FK2_ZIPS foreign key (`StateID`) references `states`(`StateID`),
  constraint FK3_ZIPS foreign key (`CityID`) references `cities`(`CityID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into `zips`(`CountryID`, `StateID`, `CityID`, `ZipCode`, `latitude`, `longitude`) 
select distinct 1 as CountryID, s.StateID, c.CityID, z.zip as ZipCode, z.latitude, z.longitude
from zip_codes z 
inner join states s on s.StateName=z.full_state
left outer join cities c on c.StateID=s.StateID and c.CityName=z.city
order by z.full_state, z.city;

create table `addresses`(
  `AddressID` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `AddressName` varchar(80) NOT NULL,
  `StreetAddress` varchar(255) NULL,
  `ZipID` int(15) unsigned null,
  `CityID` int(15) unsigned NULL,
  `StateID` int(15) unsigned NULL,
  `CountryID` int(15) unsigned NOT NULL,
  primary key PK_ADRESSES(`AddressID`),
  constraint FK1_ADRESSES foreign key (`CountryID`) references `countries`(`CountryID`),
  constraint FK2_ADRESSES foreign key (`StateID`) references `states`(`StateID`),
  constraint FK3_ADRESSES foreign key (`CityID`) references `cities`(`CityID`),
  constraint FK4_ADRESSES foreign key (`ZipID`) references `zips`(`ZipID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
