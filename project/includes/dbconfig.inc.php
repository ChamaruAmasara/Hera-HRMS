<?php

function openDatabaseConnection()
{
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "hera";
    $port = 3306;


// Create connection
    $connection = mysqli_connect($serverName, $userName, $password, $dbName, $port);

// Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    return $connection;
}

function closeDatabaseConnection($connection){
    $connection->close();
}

// sql query
function runSQL($connection, $query, $bindParameterLength, $errorLocation, ...$parameters){
    
    $statement = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($statement,$query)){
        header($errorLocation);
        exit();
    }

    mysqli_stmt_bind_param($statement,$bindParameterLength,$parameters);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);
    
    mysqli_stmt_close($statement);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;

    }
    else{
        return false;

    }
}