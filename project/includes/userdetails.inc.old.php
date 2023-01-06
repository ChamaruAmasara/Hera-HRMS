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
    private $EmpRow;
    private $deptName;


    public function __construct($UID=-1, $EmployeeID=-1)
    {


        if ($UID!=-1) {
            $this->UID = $UID;
            // get employee id using user id
            $sqlUser = "SELECT * FROM useraccount WHERE UserID=$UID";
            $resultUser = mysqli_query($this->connection, $sqlUser);
            $this->EmpRow = mysqli_fetch_array($resultUser, MYSQLI_ASSOC);
            $this->EmployeeID = htmlspecialchars($this->EmpRow['EmployeeID']);
            $this->userName = htmlspecialchars($this->EmpRow['Username']);
            
        }
        elseif ($EmployeeID!=-1) {
            $this->EmployeeID = $EmployeeID;

            // get user id using employee id
            $sqlGetUID= "SELECT * FROM useraccount WHERE EmployeeID=$EmployeeID";
            $resultGetUID = mysqli_query($this->connection, $sqlGetUID);
            $rowGetUID = mysqli_fetch_array($resultGetUID, MYSQLI_ASSOC);
            if($rowGetUID == NULL){
                $this->UID = NULL;
            }
            else{
                $this->UID = htmlspecialchars($rowGetUID['UserID']);
            }

            if($this->UID != NULL){
                $sqlUser = "SELECT * FROM useraccount WHERE UserID=$this->UID";
                $resultUser = mysqli_query($this->connection, $sqlUser);
                $this->EmpRow = mysqli_fetch_array($resultUser, MYSQLI_ASSOC);
            }
            else{
                $this->EmpRow = NULL;
            }
            
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
        if($this->EmpRow == NULL|| $this->EmpRow['Email'] == NULL){
            $this->email = "Not Set";}
        else{
            $this->email = htmlspecialchars($this->EmpRow['Email']);
        }

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
        if($this->EmpRow == NULL||$this->EmpRow['ProfilePhoto'] == NULL ){
            $this->profilePic = "assets\media\avatars\defult.jpg";}
        else{
            $this->profilePic = htmlspecialchars($this->EmpRow['ProfilePhoto']);
        }

        // get Department Name
        $deptID = htmlspecialchars($employeeDetails['DepartmentID']);
        $deptSql = "SELECT * FROM department WHERE DepartmentID =$deptID";
        try {
            $deptResult = mysqli_query($this->connection, $deptSql);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $deptResult = mysqli_query($this->connection, $deptSql);
        $deptDetails = mysqli_fetch_array($deptResult, MYSQLI_ASSOC);
        $this->deptName = htmlspecialchars($deptDetails['DepartmentName']);
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
    function getDeptName()
    {
        return $this->deptName;
    }
}

class Employees{
    private $connection;
    private $deptFillterRow=array();
    private $jobTitleFillterRow=array();
    private $paygradeFillterRow=array();
    private $empStatusFillterRow=array();


    function __construct($connection)
    {
        $this->connection = $connection;
    }

    // get employeed grouped by given filters
    function getEmployees($deptID=null,$jobTitleID=null,$paygradeID=null,$empStatusID=null){
        // get employee array by given department   
        if ($deptID != null) {
            $this->deptFillterRow=$this->getEmployeeRow("DepartmentID=$deptID");
        }

        // get employee array by given job title
        if ($jobTitleID != null) {
            $this->jobTitleFillterRow=$this->getEmployeeRow("JobTitleID=$jobTitleID");
        }

        // get employee array by given paygrade
        if ($paygradeID != null) {
            $this->paygradeFillterRow=$this->getEmployeeRow("PayGradeID=$paygradeID");
        }

        // get employee array by given employment status
        if ($empStatusID != null) {
            $this->empStatusFillterRow=$this->getEmployeeRow("EmploymentStatusID=$empStatusID");
        }


        $this->combineRows();
    }
    private function getEmployeeRow($whereClause){
        $sql = "SELECT * FROM employee WHERE $whereClause";
        $result = mysqli_query($this->connection, $sql);
        $employees = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return $employees;
    }

    private function combineRows(){
        $employees = array_unique(array_merge($this->deptFillterRow,$this->jobTitleFillterRow,$this->paygradeFillterRow,$this->empStatusFillterRow));
        return $employees;
    }
}