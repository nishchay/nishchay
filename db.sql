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
    `extraProperty` TEXT DEFAULT NULL,
    PRIMARY KEY (`userId`)
);

CREATE TABLE `RefreshToken` (
    `refreshTokenId` BIGINT(20) NOT NULL AUTO_INCREMENT,
    `token` TEXT DEFAULT NULL ,
    `userId` BIGINT(20) DEFAULT NULL ,
    `scopes` TEXT DEFAULT NULL ,
    `createdAt` DATETIME DEFAULT NULL ,
    `expireAt` DATETIME DEFAULT NULL,
    `extraProperty` TEXT DEFAULT NULL,
    PRIMARY KEY(`refreshTokenId`)
);