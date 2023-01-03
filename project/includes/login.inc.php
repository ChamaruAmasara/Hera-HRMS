<?php


if (isset($_POST["submit"])){
    $email = $_POST["email"];

    $password = $_POST["password"];

    include PROJECT_ROOT_PATH .'/includes/dbconfig.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($email,$password)!==false){
        header("location: ../auth/index.php?error=emptyInput");
        exit();
    }

    if (emailDoesNotExists($email)!==true){
        header("location: ../auth/index.php?error=emailDoesNotExists");
        exit();
    }

    $connection=openDatabaseConnection();
    loginUser($connection,$email,$password);


    echo "It works";
}
else {
    header("location: ../auth/");
}