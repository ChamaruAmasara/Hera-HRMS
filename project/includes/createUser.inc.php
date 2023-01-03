<?

if (isset($_POST["submit"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbconfig.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputCreateUser($name,$email,$username,$pwd,$pwdRepeat)!=false){
        header("location: ../?page=Add-Employee&error=emptyInput");
        exit();

    }

    if (invalidUsername($username)!=false){
        header("location: ../?page=Add-Employee&error=invalidUsername");
        exit();

    }

    //add more error checks

    createUser($connection, $name, $email, $username, $pwd);
    


}