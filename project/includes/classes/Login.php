<?php

include_once PROJECT_ROOT_PATH . '/includes/userdetails.inc.php';
/**
 * Class login
 * handles the user's login and logout process
 */
class Login
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
     * you know, when you do "$login = new Login();"
     */
    public function __construct()
    {
        // create/read session, absolutely necessary
        session_start();

        // check the possible login actions:
        // if user tried to log out (happen when user clicks logout button)
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        // login via post data (if user just submitted a login form)
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    /**
     * log in with post data
     */
    private function dologinWithPostData()
    {
        // check login form contents
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $user_name = $this->db_connection->real_escape_string($_POST['user_name']);

                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)

                #avoided sql injections

                $sql = "SELECT UserID, Username, Email, PasswordHash,UserAccountLevelID
                        FROM useraccount
                        WHERE Username = ? OR Email = ?;";
                $statement = $this->db_connection->prepare($sql);
                $statement -> bind_param('ss',$user_name,$user_name);
                $statement -> execute();
                $result_of_login_check = $statement->get_result();

                // if this user exists
                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_check->fetch_object();

                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
                    if (password_verify($_POST['user_password'], $result_row->PasswordHash)) {

                        // write user data into PHP SESSION (a file on your server)
                        $_SESSION['UserID'] = $result_row->UserID;
                        $_SESSION['Username'] = $result_row->Username;
                        $_SESSION['Email'] = $result_row->Email;
                        $_SESSION['UserLoginStatus'] = 1;
                        
                        $_SESSION['User'] = new UserDetails(UID:$result_row->UserID);
                        // $_SESSION['User'] = new UserDetails(UID:$result_row->UserID);
                        // 1	Admin	EDIT	EDIT	1	1	1	1
                        // 2	Employee	VIEW	NO	0	1	0	0
                        // 3	Second Management			1	1	1	1
                        // 4	HR Manager	EDIT	EDIT	1	1	1	1
                        // 5	Supervisor	VIEW	VIEW	0	1	1	0

                        
                        $_SESSION['UserAccountLevelID'] = $result_row->UserAccountLevelID;
                        
                        header("Location: ?success=true");

                       

                    } else {
                        $this->errors[] = "Incorrect Username or password. Try again.";
                    }
                } else {
                    $this->errors[] =  "Incorrect Username or password. Try again.";
                }
            } else {
                $this->errors[] = "Database connection problem.";
            }
        }
        
        $redirectURL="auth/?";
        
        foreach ($this->errors as $error) {
            $redirectURL=$redirectURL."errors[]=".$error."&";
        }
        foreach ($this->messages as $message) {
            $redirectURL=$redirectURL."messages[]=".$message."&";
        }
        if (sizeof($this->errors)==0 && sizeof($this->messages)==0){
        // the user is not logged in. you can do whatever you want here.
        // for demonstration purposes, we simply show the "you are not logged in" view.
        
        }
        else{
            header("Location: ".$redirectURL);
            die;
        }
    }

    /**
     * perform the logout
     */
    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "You have been logged out.";

    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['UserLoginStatus']) AND $_SESSION['UserLoginStatus'] == 1) {
            return true;
        }
        // default return
        return false;
    }


}
