<?php

function openDatabaseConnection()
{
    $serverName = "localhost";
    $userName = "root";
    $password = "123456789";
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