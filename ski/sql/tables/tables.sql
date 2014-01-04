create table `ref` (
  `Code` int(15) not null,
  `Desc` text,
  `Value` text,
  primary key PK_REF(`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

source zip_codes.sql
source locations.sql

source users.sql
source permissions.sql

source schools.sql