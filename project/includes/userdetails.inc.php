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

class Leavedetails
{
    private $mysqli;
    public function __construct(){
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);        
    }

    public function getLeaveDetails($where = "1=1")
    {
        $sql = "SELECT * FROM EmployeeLeaveData WHERE $where";
        $res = $this->mysqli->query($sql);
        return $res;
    }

    public function getUserLeaveCounts($where="1=1")
    {
        $sql = "SELECT l.EmployeeID,e.Name ,l.LeaveType,count(l.LeaveID) As LeaveCount
                FROM hera.leave l 
                RIGHT JOIN employee e ON e.EmployeeID=l.EmployeeID
                where  l.Approved=1
                GROUP BY l.LeaveType,l.EmployeeID 
                WHERE $where";
        $res = $this->mysqli->query($sql);
        return $res;
    }
}
?>