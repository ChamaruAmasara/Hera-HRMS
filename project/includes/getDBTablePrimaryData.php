<?php

//include database config
require_once(PROJECT_ROOT_PATH ."/includes/dbconfig.inc.php");

function getDBTablePrimaryData($table, $IDcolumn, $nameColumn){
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
    $sql = "SELECT $IDcolumn,$nameColumn FROM $table";
    $res = $mysqli->query($sql);

    return $res;

    }