--use  MyTestDb;

---- drop table movies;
---- drop table users;
--create table if not exists users(
-- id int not null AUTO_INCREMENT PRIMARY KEY,
-- First_Name varchar(25) Not null,
-- Last_Name varchar(25) Not null,
-- UserId varchar(25),
-- Username varchar(25),
-- Pswd varchar(25),
-- isAdmin int,
-- isActive int
--);


--create table if not exists menu(
-- id int not null AUTO_INCREMENT PRIMARY KEY,
-- Title varchar(25) Not null,
-- isActive int
--);

--use for "cart" or a wishlist
--create table if not exists basicProductInfo(
-- id int not null AUTO_INCREMENT PRIMARY KEY,
-- ProductName varchar(1000),
-- ProductDescription varchar(1000),
-- Price int,
-- isActive int
--);

--create table if not exists bids(
--id int not null AUTO_INCREMENT PRIMARY KEY,
--ProductId int,
--UserId int,
--Amount int
--);

--create table if not exists categories (
--categoryId int,
--Title varchar (255),
---Header varchar (255),
---SortOrder varchar (255),
----isActive int
--);

create table if not exists categoryProds(
id int,
title varchar (25),
description varchar (1000),
category varchar (25),
image varchar (1000)
rating float
rateCount int
);