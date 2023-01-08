<?php

/**
 * Class AddEmployee
 * handles the employee registration
 */
class AddEmployee
{
    /**
     * @var object $db_connection The database connection
     */
    private $db_connection = null;
    /**
     * @var array $errors Collection of error messages
     */
    public $errors = array();
    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $successes = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     */
    public function __construct()
    {
        if (isset($_POST['submit'])) {
            $this->addEmployee();        
        }
    }

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new employee in the database if everything is fine
     */
    private function addEmployee()
    {

        $valid=true;

        //create a array containing required form contents like Name,BirthDate,Gender,MaritalStatus,Address,EmergencyContactName,EmergencyContactNumber,DeparmetId,BranchID,JobTitleID,PayGradeID,EmploymentStatus,SupervisorID
        $required = array('Name','BirthDate','Gender','MaritalStatus','Address','EmergencyContactName','EmergencyContactNumber','EmergencyContactAddress','DepartmentID','BranchID','JobTitleID','PayGradeID','EmploymentStatusID','SupervisorID');
        //check whether each get request avaialable and add error if something is missing
        foreach ($required as $field) {
            if (isset($_POST[$field])){
                if (empty($_POST[$field])) {
                    $valid=false;
                    $this->errors[] = "Field $field is required.";
                }
            } else{
                $valid=false;
                $this->errors[] = "Field $field is required.";
            }
        }
        //all parameters are not empty
        if ($valid){
            //check whether BirthDate is a proper date older than today
            if (!empty($_POST['BirthDate'])) {
                try{
                $date = $_POST['BirthDate'];
                $d = DateTime::createFromFormat('Y-m-d', $date);
                if ($d && $d->format('Y-m-d') === $date) {
                    if ($date > date('Y-m-d')) {
                        $valid=false;
                        $this->errors[] = 'BirthDate cannot be in the future.';
                    }
                } else {
                    $valid=false;
                    $this->errors[] = 'BirthDate is not a valid date.';
                }
            }
            catch(Exception $e){
                $valid=false;
                $this->errors[] = 'BirthDate is not a valid date.';
            }
            }
            
            //check whether gender is male or female
            
            if (!empty($_POST['Gender'])){
                if (!in_array($_POST['Gender'][0],array('male','female'))){
                    $valid=false;
                    $this->errors[] = 'The gender should be either male or female';
                }
            }

            if (!empty($_POST['MaritalStatus'])){
                if (!in_array($_POST['MaritalStatus'][0],array('Married','Unmarried'))){
                    $valid=false;
                    $this->errors[] = 'The Marital Status should be either Married or Unmarried';
                }
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
                        // $required = array('Name','BirthDate','Gender[]','MaritalStatus[]','Address','EmergencyContactName','EmergencyContactNumber','DepartmentID','BranchID','JobTitleID','PayGradeID','EmploymentStatusID','SupervisorID');
        
                        $Name = $this->db_connection->real_escape_string($_POST['Name']);
                        $BirthDate = $this->db_connection->real_escape_string($_POST['BirthDate']);

                        $Gender = $this->db_connection->real_escape_string($_POST['Gender'][0]);
                        $MaritalStatus = $this->db_connection->real_escape_string($_POST['MaritalStatus'][0]);

                        $Address = $this->db_connection->real_escape_string($_POST['Address']);
                        $EmergencyContactName = $this->db_connection->real_escape_string($_POST['EmergencyContactName']);
                        $EmergencyContactNumber = $this->db_connection->real_escape_string($_POST['EmergencyContactNumber']);
                        $EmergencyContactAddress = $this->db_connection->real_escape_string($_POST['EmergencyContactAddress']);
                        $DepartmentID = $this->db_connection->real_escape_string($_POST['DepartmentID']);
                        $BranchID = $this->db_connection->real_escape_string($_POST['BranchID']);
                        $JobTitleID = $this->db_connection->real_escape_string($_POST['JobTitleID']);
                        $PayGradeID = $this->db_connection->real_escape_string($_POST['PayGradeID']);
                        $EmploymentStatusID = $this->db_connection->real_escape_string($_POST['EmploymentStatusID']);
                        $SupervisorID = $this->db_connection->real_escape_string($_POST['SupervisorID']);

                
                        // insert into emergencycontact

                        try{

                        $sql = "INSERT INTO hera.emergencycontact (Name, 
                                                                    PrimaryPhoneNumber, 
                                                                    Address)
                                                VALUES (?, 
                                                        ?, 
                                                        ?);";
                        $statement1 = $this->db_connection->prepare($sql);
                        $statement1 -> bind_param('sss',$EmergencyContactName,$EmergencyContactNumber,$EmergencyContactAddress);
                        $statement1 -> execute();

                        $sql = "INSERT INTO hera.employee (Name,
                                                            BirthDate,
                                                            Gender,
                                                            MaritalStatus,
                                                            Address,
                                                            EmergencyContactID,
                                                            DepartmentID,
                                                            BranchID,
                                                            JobTitleID,
                                                            PayGradeID,
                                                            EmploymentStatusID,
                                                            SupervisorID) 
                                                            VALUES (?, 
                                                                    ?, 
                                                                    ?, 
                                                                    ?, 
                                                                    ?, 
                                                                    (SELECT EmergencyContactID FROM emergencycontact WHERE Name=? AND PrimaryPhoneNumber=? AND Address=? LIMIT 1),
                                                                    ?, 
                                                                    ?, 
                                                                    ?, 
                                                                    ?, 
                                                                    ?, 
                                                                    ?);";
                        $statement2 = $this->db_connection->prepare($sql);
                        $statement2 -> bind_param('ssssssssiiiiii',$Name,$BirthDate,$Gender,$MaritalStatus,$Address,$EmergencyContactName,$EmergencyContactNumber,$EmergencyContactAddress,$DepartmentID,$BranchID,$JobTitleID,$PayGradeID,$EmploymentStatusID,$SupervisorID );
                        $statement2 -> execute();

                        $sql="SELECT EmployeeID FROM hera.employee WHERE Name=? AND BirthDate=? ORDER BY EmployeeID DESC LIMIT 1;";
                        $statement3 = $this->db_connection->prepare($sql);
                        $statement3 -> bind_param('ss',$Name,$BirthDate);
                        $statement3 -> execute();
                        $EmployeeIDRow = $statement3->get_result();
                        $EmployeeIDData = $EmployeeIDRow->fetch_object();
                        $EmployeeID = $EmployeeIDData->EmployeeID;
                                            
                        //print the result from above mysql statement
                        if ($statement1->affected_rows == 1 && $statement2->affected_rows == 1) {
                            $this->successes[] = "New Employee with EmployeeID ".$EmployeeID." has been added to the system.";

                            
                        } 
                        elseif ($statement1->affected_rows == 1 && $statement2->affected_rows != 1){
                                
                            $this->errors[] = "Sorry, emergency contact could not be submitted. Please submit again.";
                        }
                        else {
                            
                            $this->errors[] = "Sorry, The new employee could not be added.";
                        }

                    }
                    //catch exception and add it to errors
                    catch(Exception $e){
                        $this->errors[] = $e->getMessage();
                    }
                } else {
                        $this->errors[] = "Database connection problem.";
                    }
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
    if ($this->successes){
        foreach ($this->successes as $success1) {
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

                    <!--begin::Buttons-->
                    <div class="d-flex flex-start flex-wrap">
                        <a href="#" class="btn btn-outline btn-outline-success btn-active-danger m-2">Cancel</a>
                        <a href="?page=Employee-Details&SubPage=Employee-Info&ID=$EmployeeID" class="btn btn-success m-2">View Employee</a>
                    </div>
                    <!--end::Buttons-->
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
