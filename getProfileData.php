<?php
require("db-connect.php");
$queryPf = isset($_COOKIE['acc']) ? "SELECT * FROM `accounts` WHERE `id`= " . $_COOKIE['acc'] . ";" : "";
$resultPf = isset($_COOKIE['acc']) ? mysqli_query($GLOBALS['con'], $queryPf) : "";
$rowPf = isset($_COOKIE['acc']) ? mysqli_fetch_array($resultPf) : "";
function accName()
{
    return $GLOBALS['rowPf']['name'];
}
function accPhone()
{
    return $GLOBALS['rowPf']['phone'];
}
function accPassword()
{
    return $GLOBALS['rowPf']['password'];
}
function accEmail()
{
    return $GLOBALS['rowPf']['email'];
}
function accGender()
{
    return $GLOBALS['rowPf']['gender'];
}
function accAddress()
{
    return $GLOBALS['rowPf']['address'];
}
function accTown()
{
    return $GLOBALS['rowPf']['town'];
}
function accStateRegion()
{
    return $GLOBALS['rowPf']['state_region'];
}
function accPfImgURL()
{
    return $GLOBALS['rowPf']['pf_img_url'];
}
function accBirthday()
{
    return $GLOBALS['rowPf']['birthday'];
}
function accRole()
{
    return $GLOBALS['rowPf']['role'];
}
