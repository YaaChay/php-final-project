<?php
// $con = mysqli_connect("us-cdbr-east-06.cleardb.net", "bfe32c201411a9", "fe253c65");
// $database = "heroku_21520b5315904f6";
$con = mysqli_connect("localhost", "root","");
$database = "book_shop_db";

if($con){
    mysqli_query($con, "CREATE DATABASE IF NOT EXISTS $database;");
    
    mysqli_select_db($con, $database);
    echo "DB Connected";
}