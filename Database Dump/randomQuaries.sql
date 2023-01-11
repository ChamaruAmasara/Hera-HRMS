
-- -----------------------------------------------------
-- Get Taken Leave Count
-- -----------------------------------------------------

SELECT l.EmployeeID,l.LeaveType,count(l.LeaveID) As LeaveCount
FROM hera.leave l 
where  l.Approved=1
GROUP BY l.LeaveType,l.EmployeeID