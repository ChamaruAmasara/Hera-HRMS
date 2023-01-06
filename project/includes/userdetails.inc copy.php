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

        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        $where = "WHERE 1=1";

		

        if ($UID!=-1) {
            $this->UID = $UID;

            $where = "UserID=$UID";

            $Empsql="SELECT * FROM EmployeeDetails $where";
            $res = $mysqli->query($Empsql);      
        }
        elseif ($EmployeeID!=-1) {
            $this->EmployeeID = $EmployeeID;

            $where = "EmployeeID=$EmployeeID";

            $Empsql="SELECT * FROM EmployeeDetails $where";
            $res = $mysqli->query($Empsql);  
            
        }
        else {
            $Empsql="SELECT * FROM EmployeeDetails $where";
            $res = $mysqli->query($Empsql);  
        }

        $this->EmpRow = $res->fetch_assoc();

        $this->getUserDetail();
    }
    function getUserDetail()
    {

        // get Name
        $this->fullName = htmlspecialchars($this->EmpRow['Name']);

        // get Email
        $this->email = htmlspecialchars($this->EmpRow['Email']);

        // get JobTitleName
        $this->jobTitle = htmlspecialchars($this->EmpRow['JobTitle']);

        //  get Address
        $this->address = htmlspecialchars($this->EmpRow['Address']);

        // get BirthDate
        $this->bDay = htmlspecialchars($this->EmpRow['BirthDate']);

        // get EmergencyContact
        $this->emgContName = htmlspecialchars($this->EmpRow['EmergencyContactName']);
        $this->emgContPhone = htmlspecialchars($this->EmpRow['EmergencyContactPhoneNum']);

        // get MaritalStatus
        $this->maritalStat = htmlspecialchars($this->EmpRow['MaritalStatus']);

        // get payGrade
        $this->payGrade = htmlspecialchars($this->EmpRow['PayGrade']);	

        // get EmploymentStatus
        $this->empStat = htmlspecialchars($this->EmpRow['EmploymentStatus']);

        // get Supervisor Name
        $this->supervisorName = htmlspecialchars($this->EmpRow['SupervisorName']);

        // get Organization Name
        $this->orgName = htmlspecialchars($this->EmpRow['OrganizationName']);

        // get Profile Picture
        $this->profilePic = htmlspecialchars($this->EmpRow['ProfilePhoto']);

        // get Department Name
        $this->deptName = htmlspecialchars($this->EmpRow['DepartmentName']);
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