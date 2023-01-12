INSERT INTO `hera`.`emergencycontact` (`EmergencyContactID`, `Name`, `PrimaryPhoneNumber`, `Address`) VALUES ('1', 'Amma', '0718115510', 'Polhena,thalgampola,galle\n');
INSERT INTO `hera`.`emergencycontact` (`EmergencyContactID`, `Name`, `PrimaryPhoneNumber`, `Address`) VALUES ('2', 'Appaa', '0718126163', 'Karapitiya,Galle.');
INSERT INTO `hera`.`employmentstatus` (`EmploymentStatusName`) VALUES ('Permanent');
INSERT INTO `hera`.`employmentstatus` (`EmploymentStatusName`) VALUES ('Contract Fulltime');
INSERT INTO `hera`.`department` (`DepartmentName`) VALUES ('Engineering');
INSERT INTO `hera`.`department` (`DepartmentName`) VALUES ('HR');
INSERT INTO `hera`.`jobtitle` (`JobTitleName`) VALUES ('Software Engineer');
INSERT INTO `hera`.`jobtitle` (`JobTitleName`) VALUES ('Accuntant');
INSERT INTO `hera`.`paygrade` (`PayGradeName`,`ApprovedAnnualLeaveCount`, `ApprovedCasualLeaveCount`, `ApprovedMaternityLeaveCount`, `ApprovedPayLeaveCount`) VALUES ('Level 1','5', '6', '7', '8');
INSERT INTO `hera`.`paygrade` (`PayGradeName`, `ApprovedAnnualLeaveCount`, `ApprovedCasualLeaveCount`, `ApprovedMaternityLeaveCount`, `ApprovedPayLeaveCount`) VALUES ('Level 3', '3', '2', '1', '1');
INSERT INTO `hera`.`employee` (`Name`, `BirthDate`, `MaritalStatus`, `Address`, `EmergencyContactID`, `DepartmentID`,`BranchID`,`JobTitleID`, `PayGradeID`, `EmploymentStatusID`) VALUES ('Ginushmal Wikumjith', '2000/08/16','Married', 'Moratuwa,Srilanka.', '1', '1','1', '1', '1', '1');
INSERT INTO `hera`.`employee` (`Name`, `BirthDate`, `MaritalStatus`, `Address`, `EmergencyContactID`, `DepartmentID`,`BranchID`, `JobTitleID`, `PayGradeID`, `EmploymentStatusID`, `SupervisorID`) VALUES ('Nadun Kumarasingha', '1999/04/01', 'Unmarried', 'Puththalama,Srilanka.', '2', '2','1', '2', '2', '2', '1');
INSERT INTO `hera`.`useraccountlevel` (`OwnProfileDetailsAccess`, `EveryProfileDetailsAccess`, `CreateProfile`, `CreateLeave`, `ApproveLeave`, `UserAccountLevelChange`) VALUES ('EDIT', 'EDIT', '1', '1', '1', '1');
INSERT INTO `hera`.`useraccountlevel` (`UserAccountLevelName`, `OwnProfileDetailsAccess`, `EveryProfileDetailsAccess`, `CreateProfile`, `CreateLeave`, `ApproveLeave`, `UserAccountLevelChange`) VALUES ('Employee', 'VIEW', 'NO', '0', '0', '0', '0');
INSERT INTO `hera`.`useraccount` (`Username`, `Email`, `EmployeeID`, `UserAccountLevelID`, `ProfilePhoto`) VALUES ('Gwikumjith', 'Gwikumjith@gmail.com', '1', '1', 'assets\\media\\avatars\\1.jpg');
INSERT INTO `hera`.`useraccount` (`Username`, `Email`, `EmployeeID`, `UserAccountLevelID`, `ProfilePhoto`) VALUES ('NedKumba', 'NedKumba@gmail.com', '2', '2', 'assets\\media\\avatars\\2.jpg');
INSERT INTO `hera`.`country` (`CountryName`) VALUES ('Srilanka');
INSERT INTO `hera`.`country` (`CountryName`) VALUES ('Bangladesh');
INSERT INTO `hera`.`country` (`CountryName`) VALUES ('Pakistan');
INSERT INTO `hera`.`organization` (`Name`, `Address`, `RegistrationNumber`) VALUES ('Jupitar', 'Moratuwa,Srilanka', '12345');
INSERT INTO `hera`.`branch` (`BranchName`, `CountryID`, `OrganizationID`) VALUES ('Galle Branch', '1', '1');
INSERT INTO `hera`.`branch` (`BranchName`, `CountryID`, `OrganizationID`) VALUES ('Colombo Branch', '1', '1');
INSERT INTO `hera`.`emergencycontact` (`Name`, `PrimaryPhoneNumber`, `Address`) VALUES ('Akka', '01187718817', 'thangalla,srilanka');
INSERT INTO `hera`.`employee` (`Name`, `BirthDate`, `Gender`, `MaritalStatus`, `Address`, `EmergencyContactID`, `DepartmentID`, `BranchID`, `JobTitleID`, `PayGradeID`, `EmploymentStatusID`, `SupervisorID`) VALUES ('Dilshan Rakshitha', '2000-01-02', 'Male', 'Unmarried', 'Padurak Asse,Hambanthota.', '3', '2', '1', '2', '2', '2', '6');
UPDATE `hera`.`employee` SET `Gender` = 'Male' WHERE (`EmployeeID` = '1');
UPDATE `hera`.`employee` SET `Gender` = 'Male' WHERE (`EmployeeID` = '2');
UPDATE `hera`.`employee` SET `Gender` = 'Male' WHERE (`EmployeeID` = '3');
ALTER TABLE `hera`.`department` 
CHANGE COLUMN `DeapartmentID` `DepartmentID` INT NOT NULL AUTO_INCREMENT ;