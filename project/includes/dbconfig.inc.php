<?php

/**
 * Configuration for: Database Connection
 *
 * For more information about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 *
 * DB_HOST: database host, usually it's "127.0.0.1" or "localhost", some servers also need port info
 * DB_NAME: name of the database. please note: database and database table are not the same thing
 * DB_USER: user for your database. the user needs to have rights for SELECT, UPDATE, DELETE and INSERT.
 * DB_PASS: the password of the above user
 */
define("DB_HOST", "dbaas-db-8540606-do-user-13235486-0.b.db.ondigitalocean.com");
define("DB_NAME", "hera");
define("DB_USER", "hera");
define("DB_PASS", "AVNS_D75G6G_2s2Gk5MnkZY9");
define("DB_PORT", "25060");


function openDatabaseConnection()
{
    $serverName = DB_HOST;
    $userName = DB_USER;
    $password = DB_PASS;
    $dbName = DB_NAME;
    $port = DB_PORT;


// Create connection
    $connection = mysqli_connect($serverName, $userName, $password, $dbName, $port);

// Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $connection;
}

function closeDatabaseConnection($connection){
    $connection->close();
}