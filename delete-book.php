<?php
require("db-connect.php");
$id = $_GET['bookId'];
$page = $_GET['page'];
$deleteBook = "DELETE FROM `books` WHERE `id`=$id;";
mysqli_query($con, $deleteBook);
header("location:$page.php");
