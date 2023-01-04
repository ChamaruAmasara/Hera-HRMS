<?php

include PROJECT_ROOT_PATH."/includes/functions.inc.php";
include PROJECT_ROOT_PATH."/includes/dbconfig.inc.php";

if (isset($_POST["submit"])){
    $email = $_POST["email"];

    $password = $_POST["password"];

    include PROJECT_ROOT_PATH .'/includes/dbconfig.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($email,$password)!==false){
        header("location: ../auth/index.php?error=emptyInput");
        exit();
    }

<<<<<<< Updated upstream
    if (emailDoesNotExists($email)!==true){
        header("location: ../auth/index.php?error=emailDoesNotExists");
=======
    if (emailDoesNotExists($email)!=false){
        header("Location: ../auth/index.php?error=emailDoesNotExists");
>>>>>>> Stashed changes
        exit();
    }

    $connection=openDatabaseConnection();
    loginUser($connection,$email,$password);


    echo "It works";
}
else {
    header("location: ../auth/");
}