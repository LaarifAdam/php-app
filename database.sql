create database test;

use test;

CREATE TABLE `students` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `UE` varchar(5) NOT NULL,
  `grade` int(2) NOT NULL,
  PRIMARY KEY  (`id`)
);

INSERT INTO students VALUES ('0', 'laarif', 'STAT', 18);
INSERT INTO students VALUES ('1', 'jlassi', 'PROBA', 19);
INSERT INTO students VALUES ('2', 'schnell', 'ALGO', 18);
