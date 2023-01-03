<?php

if (isset($_POST["submit"])){
    $email = $_POST["email"];

    $password = $_POST["password"];

    require_once 'dbconfig.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($email,$pwd)!==false){
        header("location: ../auth/index.php?error=emptyInput");
        exit();
    }

    loginUser($connection,$email,$password);


    echo "It works";
}
else {
    header("location: ../auth/");
}