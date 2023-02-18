<?php
require("db-connect.php");
function isEmpty($dbName){

    $query = "SELECT COUNT(*) AS `total` FROM `$dbName`;";
    $result = mysqli_query($GLOBALS['con'], $query);
    $row = mysqli_fetch_array($result);
    if($row['total'] == 0){
        return true;
    };
    return false;
}