<?php
$data = file_get_contents("./assets/multi-lang.json");
$dataDecode = json_decode($data, true);

if (!isset($_COOKIE['lang'])) {
    setcookie("lang", "english", time() + (86400 * 30), "/");
    header("location:index.php");
}
function isEng()
{
    if ($_COOKIE['lang'] == "english") {
        return true;
    }
    return false;
}
function isMy()
{
    if ($_COOKIE['lang'] == "myanmar") {
        return true;
    }
    return false;
}
