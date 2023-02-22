-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema CompanyName_
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema CompanyName_
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `CompanyName_` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `CompanyName_` ;

-- -----------------------------------------------------
-- Table `CompanyName_`.`country`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CompanyName_`.`country` (
  `CountryID` INT NOT NULL AUTO_INCREMENT,
  `CountryName` VARCHAR(20) NULL,
  PRIMARY KEY (`CountryID`),
  UNIQUE INDEX `CountryID_UNIQUE` (`CountryID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `CompanyName_`.`branch`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CompanyName_`.`branch` (
  `BranchID` INT NOT NULL AUTO_INCREMENT,
  `BranchName` VARCHAR(20) NULL DEFAULT NULL,
  `CountryID` INT NULL DEFAULT NULL,
  `OrganizationID` INT NOT NULL,
  PRIMARY KEY (`BranchID`),
  INDEX `CountryID` (`CountryID` ASC) VISIBLE,
  UNIQUE INDEX `BranchID_UNIQUE` (`BranchID` ASC) VISIBLE,
  CONSTRAINT `branch_ibfk_1`
    FOREIGN KEY (`CountryID`)
    REFERENCES `CompanyName_`.`country` (`CountryID`),
  CONSTRAINT `organization_ibfk_1`
    FOREIGN KEY (`OrganizationID`)
    REFERENCES `CompanyName_`.`organization` (`OrganizationID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `CompanyName_`.`customattributename`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CompanyName_`.`customattributename` (
  `AttributeNameID` INT NOT NULL AUTO_INCREMENT,
  `AttributeName` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`AttributeNameID`),
  UNIQUE INDEX `AttributeNameID_UNIQUE` (`AttributeNameID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `CompanyName_`.`department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CompanyName_`.`department` (
  `DeapartmentID` INT NOT NULL AUTO_INCREMENT,
  `DepartmentName` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`DeapartmentID`),
  UNIQUE INDEX `DeapartmentID_UNIQUE` (`DeapartmentID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `CompanyName_`.`employmentstatus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CompanyName_`.`employmentstatus` (
  `EmploymentStatusID` INT NOT NULL AUTO_INCREMENT,
  `EmploymentStatusName` ENUM('Intern Fulltime', 'Intern Parttime', 'Contract Fulltime', 'Contract Parttime', 'Permanent', 'Freelance') NULL DEFAULT NULL ,
  PRIMARY KEY (`EmploymentStatusID`),
  UNIQUE INDEX `EmploymentStatusID_UNIQUE` (`EmploymentStatusID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `CompanyName_`.`paygrade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CompanyName_`.`paygrade` (
  `PayGradeID` INT NOT NULL AUTO_INCREMENT,
  `PayGradeName` ENUM('Level 1', 'Level 2', 'Level 3', 'Level 4', 'Level 5', 'Level 6') NULL DEFAULT NULL ,
  `ApprovedAnnualLeaveCount` INT NULL DEFAULT NULL,
  `ApprovedCasualLeaveCount` INT NULL DEFAULT NULL,
  `ApprovedMaternityLeaveCount` INT NULL DEFAULT NULL,
  `ApprovedPayLeaveCount` INT NULL DEFAULT NULL,
  PRIMARY KEY (`PayGradeID`),
  UNIQUE INDEX `PayGradeID_UNIQUE` (`PayGradeID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `CompanyName_`.`jobtitle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CompanyName_`.`jobtitle` (
  `JobTitleID` INT NOT NULL AUTO_INCREMENT,
  `JobTitleName` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`JobTitleID`),
  UNIQUE INDEX `JobTitleID_UNIQUE` (`JobTitleID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `CompanyName_`.`emergencycontact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CompanyName_`.`emergencycontact` (
  `EmergencyContactID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(1024) NULL DEFAULT NULL,
  `PrimaryPhoneNumber` VARCHAR(20) NULL DEFAULT NULL,
  `Address` VARCHAR(2048) NULL DEFAULT NULL,
  PRIMARY KEY (`EmergencyContactID`),
  UNIQUE INDEX `EmergencyContactID_UNIQUE` (`EmergencyContactID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `CompanyName_`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `employee` (
  `EmployeeID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(1024) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `IDorPastportNum` varchar(45) DEFAULT NULL,
  `EPFnum` varchar(45) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `Gender` enum('Male','Female') DEFAULT NULL,
  `MaritalStatus` enum('Married','Unmarried') DEFAULT NULL,
  `Address` varchar(2048) DEFAULT NULL,
  `EmergencyContactID` int DEFAULT NULL,
  `DepartmentID` int DEFAULT NULL,
  `BranchID` int DEFAULT NULL,
  `JobTitleID` int DEFAULT NULL,
  `PayGradeID` int DEFAULT NULL,
  `EmploymentStatusID` int DEFAULT NULL,
  `SupervisorID` int DEFAULT NULL,
  `Country` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`EmployeeID`),
  UNIQUE KEY `EmployeeID_UNIQUE` (`EmployeeID`),
  KEY `DepartmentID` (`DepartmentID`),
  KEY `EmploymentStatusID` (`EmploymentStatusID`),
  KEY `PayGradeID` (`PayGradeID`),
  KEY `JobTitleID` (`JobTitleID`),
  KEY `SupervisorID` (`SupervisorID`),
  KEY `employee_IBFK_6_idx` (`EmergencyContactID`),
  KEY `employee_ibfk_7_idx` (`BranchID`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`EmploymentStatusID`) REFERENCES `employmentstatus` (`EmploymentStatusID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`PayGradeID`) REFERENCES `paygrade` (`PayGradeID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`JobTitleID`) REFERENCES `jobtitle` (`JobTitleID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `employee_ibfk_5` FOREIGN KEY (`SupervisorID`) REFERENCES `employee` (`EmployeeID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `employee_IBFK_6` FOREIGN KEY (`EmergencyContactID`) REFERENCES `emergencycontact` (`EmergencyContactID`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `employee_ibfk_7` FOREIGN KEY (`BranchID`) REFERENCES `branch` (`BranchID`) ON DELETE SET NULL ON UPDATE SET NULL
);


-- -----------------------------------------------------
-- Table `CompanyName_`.`customattributevalue`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CompanyName_`.`customattributevalue` (
  `CustomAttributeValueID` INT NOT NULL AUTO_INCREMENT,
  `AttributeNameID` INT NULL DEFAULT NULL,
  `AttributeValue` VARCHAR(20) NULL DEFAULT NULL,
  `EmployeeID` INT NULL DEFAULT NULL,
  PRIMARY KEY (`CustomAttributeValueID`),
  INDEX `AttributeNameID` (`AttributeNameID` ASC) VISIBLE,
  INDEX `EmployeeID` (`EmployeeID` ASC) VISIBLE,
  UNIQUE INDEX `CustomAttributeValueID_UNIQUE` (`CustomAttributeValueID` ASC) VISIBLE,
  CONSTRAINT `customattributevalue_ibfk_1`
    FOREIGN KEY (`AttributeNameID`)
    REFERENCES `CompanyName_`.`customattributename` (`AttributeNameID`),
  CONSTRAINT `customattributevalue_ibfk_2`
    FOREIGN KEY (`EmployeeID`)
    REFERENCES `CompanyName_`.`employee` (`EmployeeID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `CompanyName_`.`leave`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CompanyName_`.`leave` (
  `LeaveID` INT NOT NULL AUTO_INCREMENT,
  `LeaveLogDateTime` DATETIME NULL DEFAULT NULL,
  `EmployeeID` INT NULL DEFAULT NULL,
  `Approved` TINYINT(1) NULL DEFAULT NULL,
  `Reason` VARCHAR(100) NULL DEFAULT NULL,
  `LeaveType` ENUM('Annual', 'Casual', 'Maternity', 'No-Pay') NULL DEFAULT NULL,
  `FirstAbsentDate` DATE NULL DEFAULT NULL,
  `LastAbsentDate` DATE NULL DEFAULT NULL,
  `LeaveDayCount` INT NULL DEFAULT NULL,
  `ApprovedDateTime` DATETIME NULL DEFAULT NULL,
  `ApprovedByID` INT NULL DEFAULT NULL,
  PRIMARY KEY (`LeaveID`),
  INDEX `leave_ibfk_1_idx` (`EmployeeID` ASC) VISIBLE,
  INDEX `leave_appId_idx` (`ApprovedByID` ASC) VISIBLE,
  UNIQUE INDEX `LeaveID_UNIQUE` (`LeaveID` ASC) VISIBLE,
  CONSTRAINT `leave_ibfk_1`
    FOREIGN KEY (`EmployeeID`)
    REFERENCES `CompanyName_`.`employee` (`EmployeeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `leave_appId`
    FOREIGN KEY (`ApprovedByID`)
    REFERENCES `CompanyName_`.`employee` (`EmployeeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;



-- -----------------------------------------------------
-- Table `CompanyName_`.`organization`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CompanyName_`.`organization` (
  `OrganizationID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(1024) NULL DEFAULT NULL,
  `Address` VARCHAR(2048) NULL DEFAULT NULL,
  `RegistrationNumber` VARCHAR(10) NULL DEFAULT NULL,
  `TelephoneNumber` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`OrganizationID`),
  UNIQUE INDEX `OrganizationID_UNIQUE` (`OrganizationID` ASC) VISIBLE
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;




-- -----------------------------------------------------
-- Table `CompanyName_`.`salary`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CompanyName_`.`salary` (
  `SalaryID` INT NOT NULL AUTO_INCREMENT,
  `JobTitleID` INT NULL DEFAULT NULL,
  `EmploymentStatusID` INT NULL DEFAULT NULL,
  `PayGradeID` INT NULL DEFAULT NULL,
  `Salary` INT NULL DEFAULT NULL,
  PRIMARY KEY (`SalaryID`),
  INDEX `JobTitleID` (`JobTitleID` ASC) VISIBLE,
  INDEX `EmploymentStatusID` (`EmploymentStatusID` ASC) VISIBLE,
  INDEX `PayGradeID` (`PayGradeID` ASC) VISIBLE,
  UNIQUE INDEX `SalaryID_UNIQUE` (`SalaryID` ASC) VISIBLE,
  CONSTRAINT `salary_ibfk_1`
    FOREIGN KEY (`JobTitleID`)
    REFERENCES `CompanyName_`.`jobtitle` (`JobTitleID`),
  CONSTRAINT `salary_ibfk_2`
    FOREIGN KEY (`EmploymentStatusID`)
    REFERENCES `CompanyName_`.`employmentstatus` (`EmploymentStatusID`),
  CONSTRAINT `salary_ibfk_3`
    FOREIGN KEY (`PayGradeID`)
    REFERENCES `CompanyName_`.`paygrade` (`PayGradeID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `CompanyName_`.`useraccountlevel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CompanyName_`.`useraccountlevel` (
  `UserAccountLevelID` INT NOT NULL AUTO_INCREMENT,
  `UserAccountLevelName` VARCHAR(100) DEFAULT NULL,
  `OwnProfileDetailsAccess` ENUM('NO', 'VIEW', 'EDIT') DEFAULT NULL,
  `EveryProfileDetailsAccess` ENUM('NO', 'VIEW', 'EDIT') DEFAULT NULL,
  `CreateProfile` TINYINT(1) DEFAULT NULL,
  `CreateLeave` TINYINT(1) DEFAULT NULL,
  `ApproveLeave` TINYINT(1) DEFAULT NULL,
  `UserAccountLevelChange` TINYINT(1) DEFAULT NULL,
  PRIMARY KEY (`UserAccountLevelID`),
  UNIQUE KEY `UserAccountLevelID_UNIQUE` (`UserAccountLevelID`)
);


-- -----------------------------------------------------
-- Table `CompanyName_`.`useraccount`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CompanyName_`.`useraccount` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(64) DEFAULT NULL,
  `Email` varchar(64) DEFAULT NULL,
  `EmployeeID` int NOT NULL,
  `PasswordHash` varchar(255) DEFAULT NULL,
  `UserAccountLevelID` int DEFAULT NULL,
  `ProfilePhoto` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`UserID`,`EmployeeID`),
  UNIQUE KEY `UserID_UNIQUE` (`UserID`),
  KEY `UserAccountLevelID` (`UserAccountLevelID`),
  KEY `EmployeeID_idx` (`EmployeeID`),
  KEY `Username_index` (`Username`),
  KEY `Email_index` (`Email`),
  CONSTRAINT `EmployeeID` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `useraccount_ibfk_1` FOREIGN KEY (`UserAccountLevelID`) REFERENCES `useraccountlevel` (`UserAccountLevelID`) ON DELETE CASCADE ON UPDATE CASCADE
);


-- -----------------------------------------------------
-- Table `CompanyName_`.`supervisors`
-- -----------------------------------------------------

CREATE TABLE  IF NOT EXISTS supervisors(
	SupEmpID INT NOT NULL,
    SupHeadID INT,
    PRIMARY KEY (SupEmpID),
    FOREIGN KEY (SupEmpID) REFERENCES employee(EmployeeID),
    FOREIGN KEY (SupHeadID) REFERENCES employee(EmployeeID)
);




SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



-- -----------------------------------------------------
-- View EmployeeLeaveData
-- -----------------------------------------------------

CREATE VIEW EmployeeLeaveData AS
SELECT l.LeaveID, e.EmployeeID, l.Approved, l.Reason, l.LeaveType, l.FirstAbsentDate, l.LastAbsentDate, l.LeaveDayCount, l.ApprovedDateTime,
       e.Name, e.BirthDate, e.Gender, e.MaritalStatus, e.Address, d.DepartmentName AS Department, b.BranchName AS Branch, c.CountryName AS Country,
       o.Name AS Organization, u.ProfilePhoto, e.Email, u.Username, j.JobTitleName AS JobTitle, p.PayGradeName AS PayGrade, d.DepartmentName AS DepartmentName
FROM `CompanyName_`.leave l
LEFT JOIN employee e ON l.EmployeeID=e.EmployeeID
LEFT JOIN department d ON e.DepartmentID=d.DepartmentID
LEFT JOIN branch b ON e.BranchID=b.BranchID
LEFT JOIN jobtitle j ON e.JobTitleID=j.JobTitleID
LEFT JOIN paygrade p ON e.PayGradeID=p.PayGradeID
LEFT JOIN employmentstatus es ON e.EmploymentStatusID=es.EmploymentStatusID
LEFT JOIN country c ON b.CountryID=c.CountryID
LEFT JOIN organization o ON b.OrganizationID=o.OrganizationID
LEFT JOIN useraccount u ON e.EmployeeID=u.EmployeeID
LEFT JOIN employee sup ON e.SupervisorID=sup.EmployeeID;





-- -----------------------------------------------------
-- View EmployeeDetails
-- -----------------------------------------------------



CREATE VIEW EmployeeDetails AS
SELECT e.EmployeeID,e.Name,e.BirthDate, e.Gender ,e.MaritalStatus,e.Address,e.Country,
e.BranchID,e.EmergencyContactId,e.DepartmentId,e.JobTitleID,e.PayGradeID,e.EmploymentStatusID,
u.UserID,u.Email,u.Username
u.ProfilePhoto,ec.Name as EmergencyContactName,ec.PrimaryPhoneNumber AS EmergencyContactPhoneNum,
ec.Address as EmergencyContactAddress,d.DepartmentName,b.BranchName,c.CountryName,o.Name as OrganizationName,
jt.JobTitleName as JobTitle, p.PayGradeName as PayGrade,es.EmploymentStatusName as EmploymentStatus,
sup.Name as SupervisorName,
e.SupervisorID,
e.EmergencyContactID


FROM employee e
LEFT JOIN useraccount u ON e.EmployeeID=u.EmployeeID
LEFT JOIN emergencycontact ec ON e.EmergencyContactID=ec.EmergencyContactID
LEFT JOIN department d ON e.DepartmentID=d.DepartmentID
LEFT JOIN branch b ON e.BranchID=b.BranchID
LEFT JOIN country c ON b.CountryID=c.CountryID
LEFT JOIN organization o ON b.OrganizationID=o.OrganizationID
LEFT JOIN jobtitle jt ON e.JobTitleID=jt.JobTitleID
LEFT JOIN paygrade p ON e.PayGradeID=p.PayGradeID
LEFT JOIN employmentstatus es ON e.EmploymentStatusID=es.EmploymentStatusID
LEFT JOIN employee sup ON e.SupervisorID=sup.EmployeeID;
