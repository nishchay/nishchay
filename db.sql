CREATE DATABASE NishchayDB;

CREATE TABLE `User` (
    `userId` BIGINT(20) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL,
    `firstName` VARCHAR(250) NOT NULL ,
    `lastName` VARCHAR(250) NOT NULL ,
    `password` VARCHAR(250) NOT NULL ,
    `createdAt` DATETIME DEFAULT NULL ,
    `updatedAt` DATETIME DEFAULT NULL ,
    `isDeleted` TINYINT (1) DEFAULT NULL ,
    `deletedAt` DATETIME DEFAULT NULL ,
    PRIMARY KEY (`userId`)
);