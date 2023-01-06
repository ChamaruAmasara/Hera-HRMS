<?php

require 'vendor/autoload.php';


session_cache_limiter(false);

ini_set('display_errors','On');

define('PROJECT_ROOT_PATH', __DIR__);


// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, this application does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("includes/libraries/passwordCompatability.php");
}

// include the configs / constants for the database connection
require_once("includes/dbconfig.inc.php");

// load the login class
require_once("includes/classes/Login.php");

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.

    if (isset($_POST["submit"])) { 
        if ($_POST["submit"]=="LeaveApplication"){
    
            // show potential errors / feedback (from registration object)
            if (isset($leave_application)) {
                if ($leave_application->errors) {
                    foreach ($leave_application->errors as $error) {
                        echo $error;
                    }
                }
                if ($leave_application->messages) {
                    foreach ($leave_application->messages as $message) {
                        echo $message;
                    }
                }
            }
            
    
            // load the leave application class
            require_once("includes/classes/LeaveApplication.php");
    
            $leave_application = new LeaveApplication();
    
    
        }
    }




    // for demonstration purposes, we simply show the "you are logged in" view.
    include("pages/default.php");

} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    header("Location: auth/");
}
?>
