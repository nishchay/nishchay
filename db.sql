CREATE DATABASE `NishchayDB`;

USE `NishchayDB`;

CREATE TABLE `User` (
    `userId` BIGINT(20) NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(250) NOT NULL,
    `firstName` VARCHAR(250) NOT NULL,
    `lastName` VARCHAR(250) NOT NULL,
    `password` VARCHAR(250) NOT NULL,
    `isActive` TINYINT(1) DEFAULT 0,
    `isVerified` TINYINT(1) DEFAULT 0,
    `verifiedAt` DATETIME DEFAULT NULL,
    PRIMARY KEY (`userId`)
);