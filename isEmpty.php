<?php
function isEmpty($dbName){
    $con = mysqli_connect("us-cdbr-east-06.cleardb.net", "bfe32c201411a9", "fe253c65");
    $database = "heroku_21520b5315904f6";

    $query = "SELECT COUNT(*) AS `total` FROM `$database`.`$dbName`;";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    if($row['total'] == 0){
        return true;
    };
    return false;
}