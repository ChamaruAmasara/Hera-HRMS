CREATE VIEW EmployeeLeaveData AS
SELECT l.LeaveID,e.EmployeeID,l.Approved,l.Reason,l.LeaveType,l.FirstAbsentDate,l.LastAbsentDate,l.LeaveDayCount,l.ApprovedDateTime,
e.Name,e.BirthDate,e.Gender,e.MaritalStatus,e.Address,d.DepartmentName AS Department,b.BranchName AS Branch,c.CountryName AS Country,
o.name as Organization
FROM hera.leave l
LEFT JOIN employee e ON l.EmployeeID=e.EmployeeID
LEFT JOIN department d ON e.DepartmentID=d.DepartmentID
LEFT JOIN branch b ON e.BranchID=b.BranchID
LEFT JOIN jobtitle j ON e.JobTitleID=j.JobTitleID
LEFT JOIN paygrade p ON e.PayGradeID=p.PayGradeID
LEFT JOIN employmentstatus es ON e.EmploymentStatusID=es.EmploymentStatusID
LEFT JOIN country c ON b.CountryID=c.CountryID
LEFT JOIN organization o ON b.OrganizationID=o.OrganizationID
LEFT JOIN useraccount u ON e.EmployeeID=u.EmployeeID
LEFT JOIN employee sup ON e.SupervisorID=sup.EmployeeID
