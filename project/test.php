<html>
<title>test api</title>
<body>


<?php


require 'vendor/autoload.php';


session_cache_limiter(false);

ini_set('display_errors','On');

define('PROJECT_ROOT_PATH', __DIR__);


// include the configs / constants for the database connection
require_once("includes/dbconfig.inc.php");

if (isset($_POST["submit"])) { 
    if ($_POST["submit"]=="LeaveApplication"){

        // show potential errors / feedback (from registration object)
        if (isset($leave_application)) {
            if ($leave_application->errors) {
                foreach ($leave_application->errors as $error) {
                    echo "<h1>".$error."</h1>";
                }
            }
            if ($leave_application->messages) {
                foreach ($leave_application->messages as $message) {
                    echo "<h1>".$message."</h1>";
                }
            }
        }
        

        // load the leave application class
        require_once("includes/classes/LeaveApplication.php");

        $leave_application = new LeaveApplication();


    }
}

?>


</body>

</html>