<?php
function itemCount($category)
{
    $con = mysqli_connect("us-cdbr-east-06.cleardb.net", "bfe32c201411a9", "fe253c65");
    $database = "heroku_21520b5315904f6";
    $query = "SELECT COUNT(*) AS `total` FROM `$database`.`books` WHERE `category` = '" . $category . "';";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    echo $row['total'];
}
