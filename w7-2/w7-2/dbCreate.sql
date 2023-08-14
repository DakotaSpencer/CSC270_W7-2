--use  MyTestDb;

---- drop table movies;
--create table if not exists MyUsers(
-- id int not null AUTO_INCREMENT PRIMARY KEY,
-- First_Name varchar(25) Not null,
-- Last_Name varchar(25) Not null,
-- UserId varchar(25),
-- Pswd varchar(25),
-- isAdmin int,
-- isActive int
--);


--create table if not exists MyWebDocs(
-- id int not null AUTO_INCREMENT PRIMARY KEY,
-- Title varchar(25) Not null,
---- Category varchar(25),
-- Header1 varchar(25),
-- Text1 varchar(225),
-- ParentPage int DEFAULT 0,
-- SortOrder int DEFAULT 2,
-- isActive int
--);

--create table if not exists Movies(
-- id int not null AUTO_INCREMENT PRIMARY KEY,
-- Title varchar(100) Not null,
-- MovieDescription varchar(1000),
-- Genre varchar(225),
-- Rating varchar(225),
-- ReleaseYear int,
-- isActive int
--);