<?php
if (isset($_GET['key']) && isset($_GET['value']) && isset($_GET['page'])) {
    setcookie($_GET['key'], $_GET['value'], time() + (86400 * 30), "/");
    header("location:".$_GET['page'].".php");
}
