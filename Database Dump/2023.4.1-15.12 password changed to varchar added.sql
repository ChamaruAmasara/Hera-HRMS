-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema hera
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema hera
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `hera` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `hera` ;

-- -----------------------------------------------------
-- Table `hera`.`country`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hera`.`country` (
  `CountryID` INT NOT NULL AUTO_INCREMENT,
  `CountryName` VARCHAR(20) NULL,
  PRIMARY KEY (`CountryID`),
  UNIQUE INDEX `CountryID_UNIQUE` (`CountryID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `hera`.`branch`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hera`.`branch` (
  `BranchID` INT NOT NULL AUTO_INCREMENT,
  `BranchName` VARCHAR(20) NULL DEFAULT NULL,
  `CountryID` INT NULL DEFAULT NULL,
  `OrganizationID` INT NOT NULL,
  PRIMARY KEY (`BranchID`),
  INDEX `CountryID` (`CountryID` ASC) VISIBLE,
  UNIQUE INDEX `BranchID_UNIQUE` (`BranchID` ASC) VISIBLE,
  CONSTRAINT `branch_ibfk_1`
    FOREIGN KEY (`CountryID`)
    REFERENCES `hera`.`country` (`CountryID`),
  CONSTRAINT `organization_ibfk_1`
    FOREIGN KEY (`OrganizationID`)
    REFERENCES `hera`.`organization` (`OrganizationID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `hera`.`customattributename`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hera`.`customattributename` (
  `AttributeNameID` INT NOT NULL AUTO_INCREMENT,
  `AttributeName` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`AttributeNameID`),
  UNIQUE INDEX `AttributeNameID_UNIQUE` (`AttributeNameID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `hera`.`department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hera`.`department` (
  `DeapartmentID` INT NOT NULL AUTO_INCREMENT,
  `DepartmentName` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`DeapartmentID`),
  UNIQUE INDEX `DeapartmentID_UNIQUE` (`DeapartmentID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `hera`.`employmentstatus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hera`.`employmentstatus` (
  `EmploymentStatusID` INT NOT NULL AUTO_INCREMENT,
  `EmploymentStatusName` ENUM('Intern Fulltime', 'Intern Parttime', 'Contract Fulltime', 'Contract Parttime', 'Permanent', 'Freelance') NULL DEFAULT NULL ,
  PRIMARY KEY (`EmploymentStatusID`),
  UNIQUE INDEX `EmploymentStatusID_UNIQUE` (`EmploymentStatusID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `hera`.`paygrade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hera`.`paygrade` (
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
-- Table `hera`.`jobtitle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hera`.`jobtitle` (
  `JobTitleID` INT NOT NULL AUTO_INCREMENT,
  `JobTitleName` ENUM('HR Manager', 'Accuntant', 'Software Engineer', 'QA Engineer') NULL DEFAULT NULL,
  PRIMARY KEY (`JobTitleID`),
  UNIQUE INDEX `JobTitleID_UNIQUE` (`JobTitleID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `hera`.`emergencycontact`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hera`.`emergencycontact` (
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
-- Table `hera`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hera`.`employee` (
  `EmployeeID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(1024) NULL DEFAULT NULL,
  `BirthDate` DATE NULL DEFAULT NULL,
  `Gender` ENUM('Male', 'Female') NULL DEFAULT NULL,
  `MaritalStatus` ENUM('Married', 'Unmarried') NULL DEFAULT NULL,
  `Address` VARCHAR(2048) NULL DEFAULT NULL,
  `EmergencyContactID` INT NULL DEFAULT NULL,
  `DepartmentID` INT NULL DEFAULT NULL,
  `BranchID` INT NULL DEFAULT NULL,
  `JobTitleID` INT NULL DEFAULT NULL,
  `PayGradeID` INT NULL DEFAULT NULL,
  `EmploymentStatusID` INT NULL DEFAULT NULL,
  `SupervisorID` INT NULL DEFAULT NULL,
  PRIMARY KEY (`EmployeeID`),
  INDEX `DepartmentID` (`DepartmentID` ASC) VISIBLE,
  INDEX `employee_ibfk_7_idx` (`BranchID` ASC) VISIBLE,
  INDEX `EmploymentStatusID` (`EmploymentStatusID` ASC) VISIBLE,
  INDEX `PayGradeID` (`PayGradeID` ASC) VISIBLE,
  INDEX `JobTitleID` (`JobTitleID` ASC) VISIBLE,
  INDEX `SupervisorID` (`SupervisorID` ASC) VISIBLE,
  INDEX `employee_IBFK_6_idx` (`EmergencyContactID` ASC) VISIBLE,
  UNIQUE INDEX `EmployeeID_UNIQUE` (`EmployeeID` ASC) VISIBLE,
  CONSTRAINT `employee_ibfk_1`
    FOREIGN KEY (`DepartmentID`)
    REFERENCES `hera`.`department` (`DeapartmentID`),
  CONSTRAINT `employee_ibfk_2`
    FOREIGN KEY (`EmploymentStatusID`)
    REFERENCES `hera`.`employmentstatus` (`EmploymentStatusID`),
  CONSTRAINT `employee_ibfk_3`
    FOREIGN KEY (`PayGradeID`)
    REFERENCES `hera`.`paygrade` (`PayGradeID`),
  CONSTRAINT `employee_ibfk_4`
    FOREIGN KEY (`JobTitleID`)
    REFERENCES `hera`.`jobtitle` (`JobTitleID`),
  CONSTRAINT `employee_ibfk_5`
    FOREIGN KEY (`SupervisorID`)
    REFERENCES `hera`.`employee` (`EmployeeID`),
  CONSTRAINT `employee_IBFK_6`
    FOREIGN KEY (`EmergencyContactID`)
    REFERENCES `hera`.`emergencycontact` (`EmergencyContactID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `hera`.`customattributevalue`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hera`.`customattributevalue` (
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
    REFERENCES `hera`.`customattributename` (`AttributeNameID`),
  CONSTRAINT `customattributevalue_ibfk_2`
    FOREIGN KEY (`EmployeeID`)
    REFERENCES `hera`.`employee` (`EmployeeID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `hera`.`leave`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hera`.`leave` (
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
  PRIMARY KEY (`LeaveID`),
  INDEX `leave_ibfk_1_idx` (`EmployeeID` ASC) VISIBLE,
  UNIQUE INDEX `LeaveID_UNIQUE` (`LeaveID` ASC) VISIBLE,
  CONSTRAINT `leave_ibfk_1`
    FOREIGN KEY (`EmployeeID`)
    REFERENCES `hera`.`employee` (`EmployeeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `hera`.`organization`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hera`.`organization` (
  `OrganizationID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(1024) NULL DEFAULT NULL,
  `Address` VARCHAR(2048) NULL DEFAULT NULL,
  `RegistrationNumber` VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`OrganizationID`),
  UNIQUE INDEX `OrganizationID_UNIQUE` (`OrganizationID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `hera`.`salary`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hera`.`salary` (
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
    REFERENCES `hera`.`jobtitle` (`JobTitleID`),
  CONSTRAINT `salary_ibfk_2`
    FOREIGN KEY (`EmploymentStatusID`)
    REFERENCES `hera`.`employmentstatus` (`EmploymentStatusID`),
  CONSTRAINT `salary_ibfk_3`
    FOREIGN KEY (`PayGradeID`)
    REFERENCES `hera`.`paygrade` (`PayGradeID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `hera`.`useraccountlevel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hera`.`useraccountlevel` (
  `UserAccountLevelID` INT NOT NULL AUTO_INCREMENT,
  `UserAccountLevelName` ENUM('Admin', 'Second Management', 'HR Manager', 'Employee') NULL DEFAULT NULL ,
  `OwnProfileDetailsAccess` ENUM('NO', 'VIEW', 'EDIT') NULL DEFAULT NULL,
  `EveryProfileDetailsAccess` ENUM('NO', 'VIEW', 'EDIT') NULL DEFAULT NULL,
  `CreateProfile` TINYINT(1) NULL DEFAULT NULL,
  `CreateLeave` TINYINT(1) NULL DEFAULT NULL,
  `ApproveLeave` TINYINT(1) NULL DEFAULT NULL,
  `UserAccountLevelChange` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`UserAccountLevelID`),
  UNIQUE INDEX `UserAccountLevelID_UNIQUE` (`UserAccountLevelID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `hera`.`useraccount`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hera`.`useraccount` (
  `UserID` INT NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(64) NULL DEFAULT NULL,
  `Email` VARCHAR(64) NULL DEFAULT NULL,
  `EmployeeID` INT NULL,
  `PasswordHash` VARCHAR(20) NULL DEFAULT NULL,
  `UserAccountLevelID` INT NULL DEFAULT NULL,
  `ProfilePhoto` VARCHAR(2048) NULL,
  PRIMARY KEY (`UserID`),
  INDEX `UserAccountLevelID` (`UserAccountLevelID` ASC) VISIBLE,
  INDEX `EmployeeID_idx` (`EmployeeID` ASC) VISIBLE,
  UNIQUE INDEX `UserID_UNIQUE` (`UserID` ASC) VISIBLE,
  CONSTRAINT `useraccount_ibfk_1`
    FOREIGN KEY (`UserAccountLevelID`)
    REFERENCES `hera`.`useraccountlevel` (`UserAccountLevelID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `EmployeeID`
    FOREIGN KEY (`EmployeeID`)
    REFERENCES `hera`.`employee` (`EmployeeID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


ALTER TABLE `hera`.`leave` 
ADD COLUMN `ApprovedByID` INT NULL AFTER `ApprovedDateTime`,
ADD INDEX `leave_appId_idx` (`ApprovedByID` ASC) VISIBLE;
;
ALTER TABLE `hera`.`leave` 
ADD CONSTRAINT `leave_appId`
  FOREIGN KEY (`ApprovedByID`)
  REFERENCES `hera`.`employee` (`EmployeeID`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
  
ALTER TABLE `hera`.`organization` 
ADD COLUMN `TelephoneNumber` VARCHAR(20) NULL AFTER `Address`;




SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
