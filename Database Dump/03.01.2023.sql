DROP Database IF EXISTS hera;
create database hera;
use hera;

CREATE TABLE `Leave` (
  `LeaveID` NUMERIC(10,0),
  `LeaveLogDateTime` DATETIME,
  `EmployeeID` NUMERIC(10,0),
  `Approved` boolean,
  `Reason` VARCHAR(100),
  `LeaveType` ENUM('Annual', 'Casual', 'Maternity', 'No-Pay'),
  `FirstAbsentDate` DATE,
  `LastAbsentDate` DATE,
  `LeaveDayCount` NUMERIC(3,0),
  `ApprovedDateTime` DATETIME,
  PRIMARY KEY (`LeaveID`)
);

CREATE TABLE `UserAccountLevel` (
  `UserAccountLevelID` NUMERIC(10,0),
  `UserAccountLevelName` VARCHAR(20),
  `OwnProfileDetailsAccess` ENUM('NO', 'VIEW', 'EDIT'),
  `EveryProfileDetailsAccess` ENUM('NO', 'VIEW', 'EDIT'),
  `CreateProfile` boolean,
  `CreateLeave` boolean,
  `ApproveLeave` boolean,
  `UserAccountLevelChange` boolean,
  PRIMARY KEY (`UserAccountLevelID`)
);

CREATE TABLE `CustomAttributeName` (
  `AttributeNameID` NUMERIC(10,0),
  `AttributeName` VARCHAR(20),
  PRIMARY KEY (`AttributeNameID`)
);

CREATE TABLE `Department` (
  `DeapartmentID` NUMERIC(10,0),
  `DepartmentName` VARCHAR(20),
  PRIMARY KEY (`DeapartmentID`)
);

CREATE TABLE `EmploymentStatus` (
  `EmploymentStatusID` NUMERIC(10,0),
  `EmploymentStatusName` VARCHAR(20),
  PRIMARY KEY (`EmploymentStatusID`)
);

CREATE TABLE `PayGrade` (
  `PayGradeID` NUMERIC(10,0),
  `PayGradeName` VARCHAR(20),
  `ApprovedAnnualLeaveCount` NUMERIC(3,0),
  `ApprovedCasualLeaveCount` NUMERIC(3,0),
  `ApprovedMaternityLeaveCount` NUMERIC(3,0),
  `ApprovedPayLeaveCount` NUMERIC(3,0),
  PRIMARY KEY (`PayGradeID`)
);

CREATE TABLE `JobTitle` (
  `JobTitleID` NUMERIC(10,0),
  `JobTitleName` VARCHAR(20),
  PRIMARY KEY (`JobTitleID`)
);

CREATE TABLE `Employee` (
  `EmployeeID` NUMERIC(10,0),
  `Name` VARCHAR(20),
  `BirthDate` DATE,
  `Gender` ENUM('Male','Female'),
  `MaritalStatus` ENUM('Married','Unmarried'),
  `EmergencyContactID` NUMERIC(10,0),
  `DepartmentID` NUMERIC(10,0),
  `JobTitleID` NUMERIC(10,0),
  `PayGradeID` NUMERIC(10,0),
  `EmploymentStatusID` NUMERIC(10,0),
  `SupervisorID` NUMERIC(10,0),
  PRIMARY KEY (`EmployeeID`),
  FOREIGN KEY (`DepartmentID`) REFERENCES `Department`(`DeapartmentID`),
  FOREIGN KEY (`EmploymentStatusID`) REFERENCES `EmploymentStatus`(`EmploymentStatusID`),
  FOREIGN KEY (`PayGradeID`) REFERENCES `PayGrade`(`PayGradeID`),
  FOREIGN KEY (`JobTitleID`) REFERENCES `JobTitle`(`JobTitleID`),
  FOREIGN KEY (`SupervisorID`) REFERENCES `Employee`(`EmployeeID`)
);

CREATE TABLE `CustomAttributeValue` (
  `CustomAttributeValueID` NUMERIC(10,0),
  `AttributeNameID` NUMERIC(10,0),
  `AttributeValue` VARCHAR(20),
  `EmployeeID` NUMERIC(10,0),
  PRIMARY KEY (`CustomAttributeValueID`),
  FOREIGN KEY (`AttributeNameID`) REFERENCES `CustomAttributeName`(`AttributeNameID`),
  FOREIGN KEY (`EmployeeID`) REFERENCES `Employee`(`EmployeeID`)
);

CREATE TABLE `Country` (
  `CountryID` NUMERIC(10,0),
  `CountryName` VARCHAR(20),
  PRIMARY KEY (`CountryID`)
);

INSERT INTO `Country` (`CountryID`, `CountryName`) VALUES ('1', 'Sri Lanka');
INSERT INTO `Country` (`CountryID`, `CountryName`) VALUES ('2', 'Bangaladesh');
INSERT INTO `Country` (`CountryID`, `CountryName`) VALUES ('3', 'Pakistan');


CREATE TABLE `Branch` (
  `BranchID` NUMERIC(10,0),
  `BranchName` VARCHAR(20),
  `CountryID` NUMERIC(10,0),
  PRIMARY KEY (`BranchID`),
  FOREIGN KEY (`CountryID`) REFERENCES `Country`(`CountryID`)
);

INSERT INTO `Branch` (`BranchID`, `BranchName`, `CountryID`) VALUES ('1', 'Galle', '1');
INSERT INTO `Branch` (`BranchID`, `BranchName`, `CountryID`) VALUES ('2', 'Dahaka', '2');
INSERT INTO `Branch` (`BranchID`, `BranchName`, `CountryID`) VALUES ('3', 'Matara', '1');
INSERT INTO `Branch` (`BranchID`, `BranchName`, `CountryID`) VALUES ('4', '', '2');
INSERT INTO `Branch` (`BranchID`, `BranchName`, `CountryID`) VALUES ('5', 'Dakka', '2');
INSERT INTO `Branch` (`BranchID`, `BranchName`, `CountryID`) VALUES ('6', 'Dakka', '2');
INSERT INTO `Branch` (`BranchID`, `BranchName`, `CountryID`) VALUES ('7', 'Dakka', '2');
INSERT INTO `Branch` (`BranchID`, `BranchName`, `CountryID`) VALUES ('8', 'Dakka', '2');
INSERT INTO `Branch` (`BranchID`, `BranchName`, `CountryID`) VALUES ('9', 'Dakka', '2');
INSERT INTO `Branch` (`BranchID`, `BranchName`, `CountryID`) VALUES ('10', 'Dakka', '2');
INSERT INTO `Branch` (`BranchID`, `BranchName`, `CountryID`) VALUES ('11', 'Dakka', '2');
INSERT INTO `Branch` (`BranchID`, `BranchName`, `CountryID`) VALUES ('12', 'Dakka', '2');

CREATE TABLE `Salary` (
  `SalaryID` NUMERIC(10,0),
  `JobTitleID` NUMERIC(10,0),
  `EmploymentStatusID` NUMERIC(3,0),
  `PayGradeID` NUMERIC(3,0),
  `Salary` NUMERIC(3,0),
  PRIMARY KEY (`SalaryID`),
  FOREIGN KEY (`JobTitleID`) REFERENCES `JobTitle`(`JobTitleID`),
  FOREIGN KEY (`EmploymentStatusID`) REFERENCES `EmploymentStatus`(`EmploymentStatusID`),
  FOREIGN KEY (`PayGradeID`) REFERENCES `PayGrade`(`PayGradeID`)
);

CREATE TABLE `Organization` (
  `OrganizationID` NUMERIC(10,0),
  `Name` VARCHAR(20),
  `Address` VARCHAR(50),
  `RegistrationNumber` VARCHAR(10),
  PRIMARY KEY (`OrganizationID`)
);

INSERT INTO `Organization` (`OrganizationID`, `Name`, `Address`, `RegistrationNumber`) VALUES ('0', 'Jupiter Apparels', '446 jaya Mavatha\nGalle\nSri Lanka', 'PV 1234');


CREATE TABLE `UserAccount` (
  `UserID` NUMERIC(10,0),
  `Username` VARCHAR(32),
  `EmployeeID` NUMERIC(10,0),
  `PasswordHash` BINARY(20),
  `UserAccountLevelID` NUMERIC(10,0),
  PRIMARY KEY (`UserID`),
  FOREIGN KEY (`UserAccountLevelID`) REFERENCES `UserAccountLevel`(`UserAccountLevelID`)
);

CREATE TABLE `EmergencyContact` (
  `EmergencyContactID` NUMERIC(10,0),
  `Name` VARCHAR(20),
  `PrimaryPhoneNumber` NUMERIC(20,0),
  `Address` VARCHAR(50),
  PRIMARY KEY (`EmergencyContactID`)
);

