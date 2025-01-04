DROP DATABASE IF EXISTS `GroceryManagement`;

CREATE DATABASE `GroceryManagement`;

CREATE TABLE
    `register` (
        `Id` INT PRIMARY KEY AUTO_INCREMENT,
        `name` VARCHAR(200) NOT NULL,
        `mobileno` VARCHAR(200) NOT NULL,
        `email` VARCHAR(200) NOT NULL,
        `address` VARCHAR(200) NOT NULL,
        `username` VARCHAR(200) NOT NULL,
        `password` VARCHAR(200) NOT NULL
    );