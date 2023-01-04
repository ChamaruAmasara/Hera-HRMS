<?php
	include_once PROJECT_ROOT_PATH.'/includes/dbconfig.inc.php';
	//include '../../includes/dbconfig.inc.php';
	$connection=openDatabaseConnection();


    // get employee id using user id
	$sqlUser="SELECT * FROM useraccount WHERE UserID=1";
	$resultUser = mysqli_query($connection,$sqlUser);
	$rowUser= mysqli_fetch_array($resultUser,MYSQLI_ASSOC);
	$EmployeeID = htmlspecialchars($rowUser['EmployeeID']);
	$userName= htmlspecialchars($rowUser['Username']);
    
    // get employee details using employee id
	$sql= "SELECT * FROM employee WHERE EmployeeID=$EmployeeID";
	$result = mysqli_query($connection,$sql);
	$employeeDetails= mysqli_fetch_array($result,MYSQLI_ASSOC);
 
    // get Name
	$fullName = htmlspecialchars($employeeDetails['Name']);

    // get JobTitleName
	$jibTitleID = htmlspecialchars($employeeDetails['JobTitleID']);
	$sqlJT= "SELECT JobTitleName FROM jobtitle WHERE JobTitleID=$jibTitleID";
	$resultJT = mysqli_query($connection,$sqlJT);
	$rowJT= mysqli_fetch_array($resultJT,MYSQLI_ASSOC);
	$jobTitle = htmlspecialchars($rowJT['JobTitleName']);

    //  get Address
	$address= htmlspecialchars($employeeDetails['Address']);

    // get BirthDate
    $bDay=htmlspecialchars($employeeDetails['BirthDate']);

    // get EmergencyContact
	$emgConID=htmlspecialchars($employeeDetails['EmergencyContactID']);
	$emgContSql="SELECT * FROM emergencycontact WHERE EmergencyContactID =$emgConID";
	$emgContResult=mysqli_query($connection,$emgContSql);
	$emgContDetails=mysqli_fetch_assoc($emgContResult);
	$emgContName=htmlspecialchars($emgContDetails['Name']);
	$emgContPhone=htmlspecialchars($emgContDetails['PrimaryPhoneNumber']);

    // get MaritalStatus
	$maritalStat=htmlspecialchars($employeeDetails['MaritalStatus']);

    // get payGrade
    $payGradeID=htmlspecialchars($employeeDetails['PayGradeID']);
    $payGradeSql="SELECT * FROM paygrade WHERE PayGradeID =$payGradeID";
    $payGradeResult=mysqli_query($connection,$payGradeSql);
    $payGradeDetails=mysqli_fetch_assoc($payGradeResult);
    $payGrade=htmlspecialchars($payGradeDetails['PayGradeName']);

    print_r($payGradeDetails);
    // get EmploymentStatus
    $empStatID=htmlspecialchars($employeeDetails['EmploymentStatusID']);
    $empStatSql="SELECT * FROM employmentstatus WHERE EmploymentStatusID =$empStatID";
    $empStatResult=mysqli_query($connection,$empStatSql);
    $empStatDetails=mysqli_fetch_assoc($empStatResult);
    $empStat=htmlspecialchars($empStatDetails['EmploymentStatusName']);

    // // get Supervisor Name
    // $supervisorID=htmlspecialchars($employeeDetails['SupervisorID']);
    // $supervisorSql="SELECT * FROM employee WHERE EmployeeID =$supervisorID";
    // $supervisorResult=mysqli_query($connection,$supervisorSql);
    // $supervisorDetails=mysqli_fetch_assoc($supervisorResult);
    // $supervisorName=htmlspecialchars($supervisorDetails['Name']);

?>