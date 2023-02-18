<?php
require("db-connect.php");
function itemCount($category)
{
    $query = "SELECT COUNT(*) AS `total` FROM `books` WHERE `category` = '" . $category . "';";
    $result = mysqli_query($GLOBALS['con'], $query);
    $row = mysqli_fetch_array($result);
    echo $row['total'];
}
