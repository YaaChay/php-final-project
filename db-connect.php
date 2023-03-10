<?php
// Online DB
$con = mysqli_connect("us-cdbr-east-06.cleardb.net", "bfe32c201411a9", "fe253c65");
$database = "heroku_21520b5315904f6";

// Offline DB
// $con = mysqli_connect("localhost", "root", "");
// $database = "book_shop_db";

// Run this at just first time
// $dbQuery = "CREATE DATABASE IF NOT EXISTS $database;";
// $earliestQuery = "CREATE TABLE IF NOT EXISTS `accounts`(`id` INT UNSIGNED NOT NULL AUTO_INCREMENT, `name` VARCHAR(25) NOT NULL, `birthday` VARCHAR(12) NOT NULL, `gender` VARCHAR(1) NOT NULL, `phone` VARCHAR(15) NOT NULL, `pf_img_url` VARCHAR(500) NOT NULL, `role` VARCHAR(7) NOT NULL, `email` VARCHAR(30) NOT NULL, `password` VARCHAR(20) NOT NULL, `address` VARCHAR(50) NOT NULL, `town` VARCHAR(25) NOT NULL, `state_region` VARCHAR(25) NOT NULL, PRIMARY KEY(`id`));"
//     .$earliestQuery = "CREATE TABLE IF NOT EXISTS `books`(`id` INT UNSIGNED NOT NULL AUTO_INCREMENT, `name` VARCHAR(100) NOT NULL, `author` VARCHAR(25) NOT NULL, `img_url` VARCHAR(500) NOT NULL, `product_key` VARCHAR(10) UNIQUE NOT NULL, `category` VARCHAR(10) NOT NULL, `intro` TEXT NOT NULL, `price` INT NOT NULL, `total_pages` INT NOT NULL,`public_date` VARCHAR(20) NOT NULL, `size` VARCHAR(20) NOT NULL, PRIMARY KEY(`id`));"
//     .$earliestQuery = "CREATE TABLE IF NOT EXISTS `orders` (`id`INT UNSIGNED NOT NULL AUTO_INCREMENT, `cus_id` INT NOT NULL, `cus_name` VARCHAR(25) NOT NULL, `cus_address` VARCHAR(120) NOT NULL, `phone` VARCHAR(15) NOT NULL,`email` VARCHAR(30) NOT NULL, `book_name` VARCHAR(100) NOT NULL, `product_key` VARCHAR(10) NOT NULL, `price` INT NOT NULL, `count` INT NOT NULL, `total` INT NOT NULL, `order_date` VARCHAR(12) NOT NULL, `status` INT DEFAULT 1, PRIMARY KEY(`id`));"
//     .$earliestQuery = "CREATE TABLE `reviews`(`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,`acc_name` VARCHAR(25) NOT NULL,`profile_url` VARCHAR(500) NOT NULL,`rating` INT NOT NULL,`comment` VARCHAR(300) NOT NULL,PRIMARY KEY (`id`));";

if ($con) {
    // Run this at just first time
    // mysqli_query($con, $dbQuery);

    mysqli_select_db($con, $database);

    // Run this at just first time
    // mysqli_query($con, $earliestQuery);
}
