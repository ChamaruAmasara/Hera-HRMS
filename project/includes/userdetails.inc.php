<?php
include_once PROJECT_ROOT_PATH . '/includes/dbconfig.inc.php';

class UserDetails
{   
    private $fullName;
    private $EmployeeID;
    private $userName;
    private $email;
    private $jobTitle;
    private $address;
    private $bDay;
    private $emgContName;
    private $emgContPhone;
    private $maritalStat;
    private $payGrade;
    private $empStat;
    private $UID;
    private $supervisorName;
    private $orgName;
    private $profilePic;
    private $connection;
    private $rowUser;


    public function __construct($UID=-1, $EmployeeID=-1)
    {
        $this->connection = openDatabaseConnection();

        if ($UID!=-1) {
            $this->UID = $UID;
            // get employee id using user id
            $sqlUser = "SELECT * FROM useraccount WHERE UserID=$UID";
            $resultUser = mysqli_query($this->connection, $sqlUser);
            $this->rowUser = mysqli_fetch_array($resultUser, MYSQLI_ASSOC);
            $this->EmployeeID = htmlspecialchars($this->rowUser['EmployeeID']);
            $this->userName = htmlspecialchars($this->rowUser['Username']);
            
        }
        elseif ($EmployeeID!=-1) {
            $this->EmployeeID = $EmployeeID;

            // get user id using employee id
            $sqlEmp= "SELECT * FROM useraccount WHERE EmployeeID=$EmployeeID";
            $resultEmp = mysqli_query($this->connection, $sqlEmp);
            $rowEmp = mysqli_fetch_array($resultEmp, MYSQLI_ASSOC);
            $this->UID = htmlspecialchars($rowEmp['UserID']);
        }

        $this->getUserDetail();
    }
    function getUserDetail()
    {

        // get employee details using employee id
        $sql = "SELECT * FROM employee WHERE EmployeeID=$this->EmployeeID";
        $result = mysqli_query($this->connection, $sql);
        $employeeDetails = mysqli_fetch_array($result, MYSQLI_ASSOC);

        // get Name
        $this->fullName = htmlspecialchars($employeeDetails['Name']);

        // get Email
        $this->email = htmlspecialchars($this->rowUser['Email']);

        // get JobTitleName
        $jobTitleID = htmlspecialchars($employeeDetails['JobTitleID']);
        $sqlJT = "SELECT JobTitleName FROM jobtitle WHERE JobTitleID=$jobTitleID";
        $resultJT = mysqli_query($this->connection, $sqlJT);
        $rowJT = mysqli_fetch_array($resultJT, MYSQLI_ASSOC);
        $this->jobTitle = htmlspecialchars($rowJT['JobTitleName']);

        //  get Address
        $this->address = htmlspecialchars($employeeDetails['Address']);

        // get BirthDate
        $this->bDay = htmlspecialchars($employeeDetails['BirthDate']);

        // get EmergencyContact
        $emgConID = htmlspecialchars($employeeDetails['EmergencyContactID']);
        $emgContSql = "SELECT * FROM emergencycontact WHERE EmergencyContactID =$emgConID";
        $emgContResult = mysqli_query($this->connection, $emgContSql);
        $emgContDetails = mysqli_fetch_assoc($emgContResult);
        $this->emgContName = htmlspecialchars($emgContDetails['Name']);
        $this->emgContPhone = htmlspecialchars($emgContDetails['PrimaryPhoneNumber']);

        // get MaritalStatus
        $this->maritalStat = htmlspecialchars($employeeDetails['MaritalStatus']);

        // get payGrade
        $payGradeID = htmlspecialchars($employeeDetails['PayGradeID']);
        $payGradeSql = "SELECT * FROM paygrade WHERE PayGradeID =$payGradeID";
        $payGradeResult = mysqli_query($this->connection, $payGradeSql);
        $payGradeDetails = mysqli_fetch_assoc($payGradeResult);
        $this->payGrade = htmlspecialchars($payGradeDetails['PayGradeName']);

        // get EmploymentStatus
        $empStatID = htmlspecialchars($employeeDetails['EmploymentStatusID']);
        $empStatSql = "SELECT * FROM employmentstatus WHERE EmploymentStatusID =$empStatID";
        $empStatResult = mysqli_query($this->connection, $empStatSql);
        $empStatDetails = mysqli_fetch_assoc($empStatResult);
        $this->empStat = htmlspecialchars($empStatDetails['EmploymentStatusName']);

        // get Supervisor Name
        $supervisorID = htmlspecialchars($employeeDetails['SupervisorID']);
        if ($supervisorID != null) {
            $supervisorSql = "SELECT * FROM employee WHERE EmployeeID =$supervisorID";
            $supervisorResult = mysqli_query($this->connection, $supervisorSql);
            $supervisorDetails = mysqli_fetch_assoc($supervisorResult);
            $this->supervisorName = htmlspecialchars($supervisorDetails['Name']);
        } else {
            $this->supervisorName = "No Supervisor";
        }

        // get Organization Name
        $branchID = htmlspecialchars($employeeDetails['BranchID']);
        $branchSql = "SELECT * FROM branch WHERE BranchID =$branchID";
        $branchResult = mysqli_query($this->connection, $branchSql);
        $branchDetails = mysqli_fetch_assoc($branchResult);
        $orgID = htmlspecialchars($branchDetails['OrganizationID']);
        $orgSql = "SELECT * FROM organization WHERE OrganizationID =$orgID";
        $orgResult = mysqli_query($this->connection, $orgSql);
        $orgDetails = mysqli_fetch_assoc($orgResult);
        $this->orgName = htmlspecialchars($orgDetails['Name']);

        // get Profile Picture
        $this->profilePic = htmlspecialchars($this->rowUser['ProfilePhoto']);
    }
    function getFullName()
    {
        return $this->fullName;
    }
    function getEmployeeID()
    {
        return $this->EmployeeID;
    }
    function getUserName()
    {
        return $this->userName;
    }
    function getEmail()
    {
        return $this->email;
    }
    function getJobTitle()
    {
        return $this->jobTitle;
    }
    function getAddress()
    {
        return $this->address;
    }
    function getBDay()
    {
        return $this->bDay;
    }
    function getEmgContName()
    {
        return $this->emgContName;
    }
    function getEmgContPhone()
    {
        return $this->emgContPhone;
    }
    function getMaritalStat()
    {
        return $this->maritalStat;
    }
    function getPayGrade()
    {
        return $this->payGrade;
    }
    function getEmpStat()
    {
        return $this->empStat;
    }
    function getSupervisorName()
    {
        return $this->supervisorName;
    }
    function getOrgName()
    {
        return $this->orgName;
    }
    function getProfilePic()
    {
        return $this->profilePic;
    }
}