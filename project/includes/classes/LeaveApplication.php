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
     * @var array Collection of success / neutral messages
     */
    public $success = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
        * you know, when you do "$leaveApplication = new LeaveApplication();"
        */
    public $mysqli;
    public function __construct()
    {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

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

        $leaveDetails=new Leavedetails();
        $userDetails = $_SESSION['User'];
        $empID=$userDetails->getUserDetailArray()['EmployeeID'];
        $userDetailsArray = $userDetails->getUserDetailArray();
        $ApprovedleaveCounts=$leaveDetails->getUserLeaveCounts("EmployeeID=$empID");
        $leaveCounts=$leaveDetails->getUserLeaveCounts(having:"EmployeeID=$empID",where:"l.Approved='Pending' OR l.Approved='Approved'");
        $userPayGrade= $userDetailsArray['PayGrade'];

        $LeaveTypesandCounts=['Annual'=>0, 'Casual'=>0, 'Maternity'=>0, 'No-Pay'=>0];
        $ApprovedLeaveTypesandCounts=['Annual'=>0, 'Casual'=>0, 'Maternity'=>0, 'No-Pay'=>0];
        $AllowedLeaveTypesandCounts=['Annual'=>0, 'Casual'=>0, 'Maternity'=>0, 'No-Pay'=>0];

        // getting leave counts of each leaves that the user has taken
        while ($leaveCountsArray = $leaveCounts->fetch_assoc()) {
            $LeaveTypesandCounts[$leaveCountsArray['LeaveType']]=$leaveCountsArray['LeaveCount'];	
        }
        // getting leave counts of each leaves that the user has taken
        while ($ApprovedleaveCountsArray = $ApprovedleaveCounts->fetch_assoc()) {
            $ApprovedLeaveTypesandCounts[$ApprovedleaveCountsArray['LeaveType']]=$ApprovedleaveCountsArray['LeaveCount'];	
        }

        // getting the counts of leaves that the user is allowed to take
        $sql = "SELECT * FROM paygrade WHERE PayGradeName='$userPayGrade'";
        $res = $this->mysqli->query($sql);
        $payGradeRow = $res->fetch_assoc();
        $AllowedLeaveTypesandCounts['Annual']=$payGradeRow['ApprovedAnnualLeaveCount'];
        $AllowedLeaveTypesandCounts['Casual']=$payGradeRow['ApprovedCasualLeaveCount'];
        $AllowedLeaveTypesandCounts['Maternity']=$payGradeRow['ApprovedMaternityLeaveCount'];
        $AllowedLeaveTypesandCounts['No-Pay']=$payGradeRow['ApprovedPayLeaveCount'];



        $valid=true;
        //initialize date1 and date2 variables to datetime today
        $date1 = new DateTime();
        $date2 = new DateTime();
        
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
                $this->errors[] = "Leave Date Range is not valid. 1";
                $valid=false;
            } else {
                try{
                $date1 = DateTime::createFromFormat('m/d/Y', trim($dates[0]));
                $date2 = DateTime::createFromFormat('m/d/Y', trim($dates[1]));
                if ($date1 == false || $date2 == false) {
                    $this->errors[] = "Leave Date Range is not valid. 2";
                    $valid=false;
                } else {
                    //set today date to a variable called today
                    $today = new DateTime();
                    //check whether date1 and date2 are in future
                    if ($date1 <= $today || $date2 <= $today) {
                        $this->errors[] = "Leave Date Range is not valid. 3";
                        $valid=false;
                    }
                    
                }
                }
                catch(Exception $e){
                    $this->errors[] = "Leave Date Range is not valid. 4";
                    $valid=false;
                }
            }

        }

        $allowedLeaveOfThisType = $AllowedLeaveTypesandCounts[$_POST['leave_type']];
        $takenLeaveOfThisType = $ApprovedLeaveTypesandCounts[$_POST['leave_type']];
        $allLeavesOfThisType = $LeaveTypesandCounts[$_POST['leave_type']];

        if($allowedLeaveOfThisType <= $takenLeaveOfThisType){
            $this->errors[] = "You have already taken all the leaves of this type.";
            $valid=false;
        }elseif ($allowedLeaveOfThisType <= $allLeavesOfThisType) {
            $this->errors[] = "You have pending and Aproved leaves of this type exceeding the allowed leaves.";
            $valid=false;
        }
        

        //the data looks safe 
        if ($valid) {

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

                $approved='Pending';

                $firstAbsentDate=$date1->format('Y/m/d');
                $lastAbsentDate=$date2->format('Y/m/d');

                //count leave day count from $date2-$date1
                $leaveDayCount = $date2->diff($date1)->format("%a")+1;



                // database query, getting all the info of the selected user

                //avoided sql injections

                $sql = "INSERT INTO hera.leave (Approved, 
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

                //print the result from above mysql statement
                if ($statement->affected_rows == 1) {
                    $this->success[] = "Your leave application has been submitted.";
                } else {
                    $this->errors[] = "Sorry, your leave application could not be submitted. Please go back and try again.";
                }

            } else {
                $this->errors[] = "Database connection problem.";
            }
        }
        if ($this->errors){
            foreach ($this->errors as $error) {
                echo <<<EOT

                <!--begin::Alert-->
                <div class="alert alert-danger d-flex align-items-center p-5">
                    <!--begin::Icon-->
                    <span class="svg-icon svg-icon-2hx svg-icon-danger me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                    <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
                </svg></span>
                    <!--end::Icon-->
                
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column">
                        <!--begin::Title-->
                        <h4 class="mb-1 text-danger">Error</h4>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <span>
                EOT;
                echo $error;
                echo <<<EOT
                </span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                        <i class="bi bi-x fs-1 text-danger"></i>
                    </button>
                </div>
                <!--end::Alert-->

                EOT;
            }
        }
    if ($this->messages){
        foreach ($this->messages as $message) {
            echo <<<EOT

            <!--begin::Alert-->
            <div class="alert alert-primary d-flex align-items-center p-5">
                <!--begin::Icon-->
                <span class="svg-icon svg-icon-2hx svg-icon-primary me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
            </svg></span>
                <!--end::Icon-->
            
                <!--begin::Wrapper-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h4 class="mb-1 text-primary">Notice</h4>
                    <!--end::Title-->
                    <!--begin::Content-->
                    <span>
            EOT;
            echo $message;
            echo <<<EOT
            </span>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
                <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                    <i class="bi bi-x fs-1 text-primary"></i>
                </button>
            </div>
            <!--end::Alert-->

            EOT;
        }
    }
    if ($this->success){
        foreach ($this->success as $success1) {
            echo <<<EOT

            <!--begin::Alert-->
            <div class="alert alert-success d-flex align-items-center p-5">
                <!--begin::Icon-->
                <span class="svg-icon svg-icon-2hx svg-icon-success me-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"></path>
                <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"></path>
            </svg></span>
                <!--end::Icon-->
            
                <!--begin::Wrapper-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h4 class="mb-1 text-success">Success</h4>
                    <!--end::Title-->
                    <!--begin::Content-->
                    <span>
            EOT;
            echo $success1;
            echo <<<EOT
            </span>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
                <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                    <i class="bi bi-x fs-1 text-success"></i>
                </button>
            </div>
            <!--end::Alert-->

            EOT;
        }
    }
    }
}

