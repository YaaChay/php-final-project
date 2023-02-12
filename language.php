<?php
$data = file_get_contents("./assets/multi-lang.json");
$dataDecode = json_decode($data, true);
function isEng()
{
    if (!isset($_COOKIE['lang']) || $_COOKIE['lang'] == "english") {
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
