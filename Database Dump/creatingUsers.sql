-- CREATE USER `username`@`host` IDENTIFIED WITH authentication_plugin BY `password`;
-- GRANT PRIVILEGE ON database.table TO `username`@`host`;
-- GRANT I on `hera`.`` TO `employee`@`localhost` WITH GRANT OPTION;
-- GRANT ALL ON app_db.* TO `app_developer`;
-- GRANT SELECT ON app_db.* TO `app_read`;
-- GRANT INSERT, UPDATE, DELETE ON app_db.* TO `app_write`;
-- `EmployeeDetails`
-- `EmployeeLeaveData`
-- `branch`
-- `country`
-- `customattributename`
-- `customattributevalue`
-- `department`
-- `emergencycontact`
-- `employee`
-- `employmentstatus`
-- `jobtitle`
-- `leave`
-- `organization`
-- `paygrade`
-- `salary`
-- `useraccount`
-- `useraccountlevel`

-- `
-- ``
-- `branch`
-- `country`
-- ``
-- ``
-- `department`
-- ``
-- ``
-- `employmentstatus`
-- `jobtitle`
-- `leave`
-- `organization`
-- `paygrade`
-- `salary`
-- `useraccount`
-- `useraccountlevel`



--roles

CREATE ROLE `admin`, `manager`, `supervisor`, `employee`,`guest`;

-- admin
GRANT ALL ON `hera`.* TO `admin`@"%";


-- manager
GRANT INSERT, UPDATE, SELECT, REFERENCES ON "EmployeeDetails" TO "manager"@"%";
GRANT INSERT, UPDATE, SELECT, REFERENCES ON "customattributename" TO "manager"@"%";
GRANT INSERT, UPDATE, SELECT, REFERENCES ON "customattributename" TO "manager"@"%";
GRANT INSERT, UPDATE, SELECT, REFERENCES ON "department" TO "manager"@"%";
GRANT INSERT, UPDATE, SELECT, REFERENCES ON "emergencycontact" TO "manager"@"%";
GRANT INSERT, UPDATE, SELECT, REFERENCES ON "employee" TO "manager"@"%";
GRANT INSERT, UPDATE, SELECT, REFERENCES ON "employmentstatus" TO "manager"@"%";
GRANT INSERT, UPDATE, SELECT, REFERENCES ON "jobtitle" TO "manager"@"%";
GRANT INSERT, UPDATE, SELECT, REFERENCES ON "paygrade" TO "manager"@"%";
GRANT INSERT, UPDATE, SELECT, REFERENCES ON "salary" TO "manager"@"%";
GRANT INSERT, UPDATE, SELECT, REFERENCES ON "useraccount" TO "manager"@"%";

GRANT SELECT, REFERENCES ON "branch" TO "manager"@"%";
GRANT SELECT, REFERENCES ON "country" TO "manager"@"%";
GRANT SELECT, REFERENCES ON "organization" TO "manager"@"%";
GRANT SELECT, REFERENCES ON "useraccountlevel" TO "manager"@"%";


-- employee
GRANT SELECT, REFERENCES ON "EmployeeDetails" TO "employee"@"%";
GRANT SELECT, REFERENCES ON "customattributename" TO "employee"@"%";
GRANT SELECT, REFERENCES ON "customattributevalue" TO "employee"@"%";
GRANT SELECT, REFERENCES ON "emergencycontact" TO "employee"@"%";
GRANT SELECT, REFERENCES ON "employee" TO "employee"@"%";
GRANT SELECT, REFERENCES ON "organization" TO "employee"@"%";

GRANT INSERT, SELECT, REFERENCES ON "EmployeeLeaveData" TO "employee"@"%";
GRANT INSERT, SELECT, REFERENCES ON "leave" TO "employee"@"%";

-- supervisor
GRANT INSERT, SELECT, REFERENCES ON "EmployeeDetails" TO "supervisor"@"%";
GRANT INSERT, SELECT, REFERENCES ON "customattributename" TO "supervisor"@"%";
GRANT INSERT, SELECT, REFERENCES ON "customattributevalue" TO "supervisor"@"%";
GRANT INSERT, SELECT, REFERENCES ON "emergencycontact" TO "supervisor"@"%";
GRANT INSERT, SELECT, REFERENCES ON "employee" TO "supervisor"@"%";
GRANT INSERT, SELECT, REFERENCES ON "organization" TO "supervisor"@"%";

GRANT INSERT, SELECT, REFERENCES, UPDATE ON "EmployeeLeaveData" TO "supervisor"@"%";
GRANT INSERT, SELECT, REFERENCES, UPDATE ON "leave" TO "supervisor"@"%";

-- guest
GRANT SELECT, REFERENCES ON "useraccount" TO "guestUser"@"%";



-- create users

CREATE USER `adminUser`@`%` IDENTIFIED BY 'qaadakjsn5asdadk213aja';
GRANT `admin` TO `adminUser`@`%` ;

CREATE USER `managerUser`@`%` IDENTIFIED BY '12akjnjsn5dk213aja';
GRANT `manager` TO `managerUser`@`%` ;

CREATE USER `supervisorUser`@`%` IDENTIFIED BY '0akjsnmlk5dk213aja';
GRANT `supervisor` TO `supervisorUser`@`%` ;


CREATE USER `employeeUser`@`%` IDENTIFIED BY 'lkmakjsn5dk213aja';
GRANT `employee` TO `employeeUser`@`%` ;


CREATE USER `guestUser`@`%` IDENTIFIED BY 'sn5dk213aja';
GRANT `guest` TO `guestUser`@`%` ;
