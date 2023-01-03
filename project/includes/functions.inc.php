<?php

//login functions

function loginUser($connection,$email,$password){
    


}

function emptyInputLogin($email,$pwd){

}


function emailDoesNotExists($connection, $username){


    $sql="SELECT * FROM useraccount WHERE Username = ?;";
    $statement = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($statement,$sql)){
        header("location: ../?page=Add-Employee&error=usernameDoesNotExists");
        exit();
    }

    mysqli_stmt_bind_param($statement,"s",$username);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);

    if ($row = mysqli_fetch_assoc($resultData)){
        echo $row;
        return $row;

    }
    else{
        return false;

    }
    mysqli_stmt_close($statement);

}


//create user functions
function emptyInputCreateUser($name,$email,$username,$pwd,$pwdRepeat){
    $result=false;
    if (empty($name) || empty($email) || empty($username || empty($pwd) || empty($pwdRepeat)) ){
        $result=true;
    }
    return $result;


}

function invalidUsername($username){
    $result =false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result=true;
    }
    return $result;

}


function usernameExists($connection, $username){


    $sql="SELECT * FROM useraccount WHERE Username = ?;";
    $statement = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($statement,$sql)){
        header("location: ../?page=Add-Employee&error=usernameExists");
        exit();
    }

    mysqli_stmt_bind_param($statement,"s",$username);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;

    }
    else{
        return false;

    }
    mysqli_stmt_close($statement);

}

function createUser($connection, $name, $email, $username, $pwd){

}
