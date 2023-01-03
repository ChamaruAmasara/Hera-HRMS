<?php 

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "hera";
$port = 3306;


// Create connection
$connection = mysqli_connect($serverName, $userName, $password);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
