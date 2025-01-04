DROP DATABASE IF EXISTS `Picknmix`;

CREATE DATABASE `Picknmix`;

USE `Picknmix`;

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

CREATE TABLE `Role`(
    `Id` INT PRIMARY KEY AUTO_INCREMENT,
    `Rolename` VARCHAR(250) NOT NULL
);

INSERT INTO `Role` (`Rolename`) VALUES ('Super Admin');

CREATE TABLE `User`(
    `Id`  INT PRIMARY KEY AUTO_INCREMENT,
    `Name` VARCHAR(250) NOT NULL,
    `RoleId` VARCHAR(250) NOT NULL,
    `MobileNumber` VARCHAR(250) NOt NULL,
    `Email` VARCHAR(250) NOT NULL,
    `Address` VARCHAR(250) NOT NULL,
    `City` VARCHAR(250) NOT NULL,
    `State` VARCHAR(250) NOT NULL,
    `Username` VARCHAR(250) NOT NULL,
    `Password` VARCHAR(250) NOT NULL,
    `Image` VARCHAR(250) NOT NULL
);

INSERT INTO `User` (
    `Name`, `RoleId`, `MobileNumber`, `Email`, `Address`, `City`, `State`, `Username`, `Password`, `Image`
) VALUES (
    'Dhiraj Sonagara', '1', '1234567890', 'dhir@gmail.com', '123 Main St', 'New York', 'NY', 'dhiraj', 'dhiraj@123', 'profile.jpg'
);

CREATE TABLE `Category`(
    `Id` INT PRIMARY KEY AUTO_INCREMENT,
    `CategoryName` VARCHAR(250) NOT NULL    
);

CREATE TABLE `Product`(
    `Id` INT PRIMARY KEY AUTO_INCREMENT,
    `Name` VARCHAR(250) NOT NULL,
    `CategoryId` INT NOT NULL,
    `Measurement`VARCHAR(250) NOT NULL,
    `Description` VARCHAR(250) NOT NULL,
    `Price` DECIMAL NOT NULL,
    `Image` VARCHAR(250) NOT NULL,
    FOREIGN KEY (`CategoryId`) REFERENCES `Category` (`Id`)
);

CREATE TABLE `Cart`(
    `Id` INT PRIMARY KEY AUTO_INCREMENT,
    `UserId` INT NOT NULL,
    `Name` VARCHAR(255) NOT NULL,
    `Image` VARCHAR(255) NOT NULL,
    `price` DECIMAL NOT NULL,
    FOREIGN KEY (`UserId`) REFERENCES `register` (`Id`)
);

CREATE TABLE `Checkout`(
    `Id` INT PRIMARY KEY AUTO_INCREMENT,
    `CartId` INT NOT NULL,
    `UserId` INT NOT NULL,
    `PImage` VARCHAR(250) NOT NULL,
    `PName` VARCHAR(250) NOT NULL,
    `PPrice` DECIMAL NOT NULL,
    `PTotal` DECIMAL NOT NULL,
    FOREIGN KEY (`CartId`) REFERENCES `Cart` (`Id`),
    FOREIGN KEY (`UserId`) REFERENCES `register` (`Id`)
);

CREATE TABLE `Order`(
    `Id` INT PRIMARY KEY AUTO_INCREMENT,
    `UserId` INT NOT NULL,
    `Name` VARCHAR(255) NOT NULL,
    `Address` VARCHAR(255) NOT NULL,
    `City` VARCHAR(255) NOT NULL,
    `Country` VARCHAR(255) NOT NULL,
    `Mobile` VARCHAR(255) NOT NULL,
    `Email` VARCHAR(255) NOT NULL,
    `TotalAmount` DECIMAL NOT NULL,
    `Payment` VARCHAR(255) NOT NULL,
    `OrderDate` DATETIME NOT NULL,
    `delivery_status` ENUM('Pending', 'Delivered') NOT NULL DEFAULT 'Pending',
    `deliveryDate` DATETIME NOT NULL DEFAULT current_timestamp(),
    FOREIGN KEY (`UserId`) REFERENCES `register` (`Id`)
);

CREATE TABLE `OrderDetails`(
    `Id` INT PRIMARY KEY AUTO_INCREMENT,
    `OrderId` INT NOT NULL,
    `Image` VARCHAR(255) NOT NULL,
    `ProductName` VARCHAR(250) NOT NULL,
    `Quantity` VARCHAR(250) NOT NULL,
    `ProductPrice` DECIMAL NOT NULL,
    `TotalPrice` DECIMAL NOT NULL,
    FOREIGN KEY (`OrderId`) REFERENCES `Order` (`Id`)
);

CREATE TABLE `Review`
(
  `Id` INT PRIMARY KEY AUTO_INCREMENT,
  `UserId` INT NOT NULL ,
  `Name` VARCHAR(255) NOT NULL ,
  `Email` VARCHAR(255) NOT NULL ,
  `Review` VARCHAR(250) NOT NULL ,
  FOREIGN KEY (`UserId`) REFERENCES `register` (`Id`)  
);

CREATE TABLE `Contact`(
    `Id` INT PRIMARY KEY AUTO_INCREMENT,
    `UserId` INT NOT NULL,
    `Name` VARCHAR(255) NOT NULL,
    `Mobile` VARCHAR(255) NOT NULL,
    `Email` VARCHAR(255) NOT NULL,
    `Message` VARCHAR(250) NOT NULL,
    FOREIGN KEY (`UserId`) REFERENCES `register` (`Id`)
);

ALTER TABLE `OrderDetails`
ADD COLUMN `UserId` INT NOT NULL,
ADD CONSTRAINT `fk_user_orderdetails` 
FOREIGN KEY (`UserId`) REFERENCES `register` (`Id`);
