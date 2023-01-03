<?php 

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "hera";
$port = 3306;


// Create connection
try{
    $connection = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);

    $connection -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOEXception $e){
    echo "Error in connection ".$e->getMessage();

}
