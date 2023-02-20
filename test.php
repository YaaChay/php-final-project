<?php
require("db-connect.php");
$productKeys = ["KzY","Kwt", "StW","Smz", "Kwt"];
$randromKey = array_rand($productKeys,1);
$query = "SELECT * FROM `books` WHERE `product_key` LIKE '%".$productKeys[$randromKey]."%';";
$result = mysqli_query($con, $query);
$array = array();
while($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}
$randomArray = array_rand($array,1);

$cusName = $_POST['acc_name'];
$cusAddress = $_POST['address'] . ", " . $_POST['town'] . ", " . $_POST['state_region'];
$phone = "+95" . $_POST['phone'];
$email = $_POST['email'];
$bookName = $array[$randomArray]['name'];
$productKey = $array[$randomArray]['product_key'];
$price = $array[$randomArray]['price'];
$count = rand(1, 5);
$total = $price * $count;
$orderDate = date("Y-m-d");

$queryOrder = "INSERT INTO `order` (`cus_name`,`cus_address`,`phone`,`email`,`book_name`,`product_key`,`price`,`count`,`total`,`order_date`) VALUES ('$cusName','$cusAddress','$phone','$email','$bookName','$productKey',$price,$count,$total,'$orderDate');";

echo $query."<br>";
echo $queryOrder."<br>";
