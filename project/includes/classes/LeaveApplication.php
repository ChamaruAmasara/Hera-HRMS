<?php



/**
 * Class LeaveApplication
 * handles the employees leave application
 */
class LeaveApplication
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
        * you know, when you do "$leaveApplication = new LeaveApplication();"
        */
   
    public function __construct()
    {


        // check the possible login actions:

        // leave application via post data (if user just submitted a leave application form)
        if (isset($_POST["submit"])) {
            $this->applyLeaveWithPostData();
        }
    }

    /**
     * apply leave with post data
     */
    private function applyLeaveWithPostData()
    {
        $valid=true;
        //initialize date1 and date2 variables to datetime today
        $date1 = new DateTime();
        $date2 = new DateTime();
        
        echo "starting";
        // check  form contents
        if (empty($_POST['leave_type'])) {
            $this->errors[] = "Leave Type field was empty.";
            $valid=false;
        } elseif (empty($_POST['date'])) {
            $this->errors[] = "Leave Date Range field was empty.";
            $valid=false;
        } elseif (empty($_POST['reason'])) {
            $this->errors[] = "Reason field was empty.";
            $valid=false;
        } 


        //check whether $_POST['leave_type'] is one of "Annual", "Casual", "Maternity", "No-Pay"
        elseif (!in_array($_POST['leave_type'], array("Annual", "Casual", "Maternity", "No-Pay"))) {
            $this->errors[] = "Leave Type is not valid.";
            $valid=false;
        }



        // split $_POST['date'] by "-" and check whether the individuals are valid dates in future. The date format is MM/DD/YYYY


        
        elseif (!empty($_POST['date'])) {
            $date=trim($_POST['date']);
            $dates = explode("-", $date);
            
            if (count($dates) != 2) {
                $this->errors[] = "Leave Date Range is not valid.";
                $valid=false;
            } else {
                try{
                $date1 = DateTime::createFromFormat('m/d/Y', trim($dates[0]));
                $date2 = DateTime::createFromFormat('m/d/Y', trim($dates[1]));
                if ($date1 == false || $date2 == false) {
                    $this->errors[] = "Leave Date Range is not valid.";
                    $valid=false;
                } else {
                    $today = new DateTime();
                    if ($date1 <= $today || $date2 <= $today || $date1>=$date2) {
                        $this->errors[] = "Leave Date Range is not valid.";
                        $valid=false;
                    }
                    
                }
                }
                catch(Exception $e){
                    $this->errors[] = "Leave Date Range is not valid.";
                    $valid=false;
                }
            }

        }
        

        //the data looks safe 
        if ($valid) {
            echo "everything complete with valid variable";
            if ($valid){
                echo "TRUE";
            }
            else{
                echo "FALSE";
            }

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $leave_type = $this->db_connection->real_escape_string($_POST['leave_type']);
                $date = $this->db_connection->real_escape_string($_POST['date']);
                $reason = $this->db_connection->real_escape_string($_POST['reason']);
                
                //get current date time to store in mysql database
                $leaveLogDateTime = date('Y-m-d H:i:s');
                
                //get current employeeid
                $userDetails = $_SESSION['User'];
                $userDetailsArray = $userDetails->getUserDetailArray();
                $employeeID = $userDetailsArray['EmployeeID'];

                $approved=false;

                $firstAbsentDate=$date1;
                $lastAbsentDate=$date2;

                //count leave day count from $date2-$date1
                $leaveDayCount = $date2->diff($date1)->format("%a");



                // database query, getting all the info of the selected user

                //avoided sql injections

                $sql = "INSERT INTO leave (Approved, 
                                            EmployeeID, 
                                            FirstAbsentDate, 
                                            LastAbsentDate, 
                                            LeaveDayCount, 
                                            LeaveLogDateTime, 
                                            LeaveType, 
                                            Reason)
                        VALUES (?, 
                                ?, 
                                ?, 
                                ?, 
                                ?, 
                                ?, 
                                ?, 
                                ?);";
                $statement = $this->db_connection->prepare($sql);
                $statement -> bind_param('ssssssss',$approved,$employeeID,$firstAbsentDate,$lastAbsentDate,$leaveDayCount,$leaveLogDateTime,$leave_type,$reason);
                $statement -> execute();

            } else {
                $this->errors[] = "Database connection problem.";
            }
            echo "Completed";
        }
    }

}
