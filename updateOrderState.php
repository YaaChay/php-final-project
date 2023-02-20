<?php
require("db-connect.php");
$orderId = $_GET['orderId'];
$status = $_GET['status'];
$query = "UPDATE `orders` SET `status` = $status WHERE `id` = $orderId;";
if($status == '2'){
    mysqli_query($con, $query);
    header("location:profile.php");
} else if($status == '3'){
    mysqli_query($con, $query);
    header("location:review.php");
}
