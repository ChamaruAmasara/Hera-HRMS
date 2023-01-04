<?php

function openDatabaseConnection()
{
    $serverName = "dbaas-db-8540606-do-user-13235486-0.b.db.ondigitalocean.com";
    $userName = "hera";
    $password = "AVNS_D75G6G_2s2Gk5MnkZY9";
    $dbName = "hera";
    $port = 25060;

    // $serverName = "localhost";
    // $userName = "root";
    // $password = "123456789";
    // $dbName = "hera";
    // $port = 25060;


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