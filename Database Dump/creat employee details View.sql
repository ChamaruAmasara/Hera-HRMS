CREATE VIEW EmployeeDetails AS
SELECT e.EmployeeID,e.Name,e.BirthDate, e.Gender ,e.MaritalStatus,e.Address,e.Country,
e.BranchID,e.EmergencyContactId,e.DepartmentId,e.JobTitleID,e.PayGradeID,e.EmploymentStatusID,
u.UserID,u.Email,
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
LEFT JOIN employee sup ON e.SupervisorID=sup.EmployeeID
