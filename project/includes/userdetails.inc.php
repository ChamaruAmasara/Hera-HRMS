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
    private $res;
    private $mysqli;


    public function __construct($UID=-1, $EmployeeID=-1)
    {

        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        $where = "WHERE 1=1";

		

        if ($UID!=-1) {
            $this->UID = $UID;

            $where = "WHERE UserID=$UID";

            $Empsql="SELECT * FROM EmployeeDetails $where";
            $res = $this->mysqli->query($Empsql); 
            $this->EmpRow = $res->fetch_assoc();
        }
        elseif ($EmployeeID!=-1) {
            $this->EmployeeID = $EmployeeID;

            $where = "WHERE EmployeeID=$EmployeeID";

            $Empsql="SELECT * FROM EmployeeDetails $where";
            $res = $this->mysqli->query($Empsql);  
            $this->EmpRow = $res->fetch_assoc();
            
        }
        

    }
    function getUserDetailArray(){
        return $this->EmpRow ;
    }

    function getAllemployeeSql($where = "WHERE 1=1"){
        $Empsql="SELECT * FROM EmployeeDetails $where";
        $this->res = $this->mysqli->query($Empsql);

        return $this->res;
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