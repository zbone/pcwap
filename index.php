<?php
define("APP_NAME","");
define("APP_PATH","./");
define('APP_DEBUG',1);//调试模式
if (!file_exists(APP_PATH.'Conf/pcwap.php')) {
header("Content-type: text/html; charset=utf-8");
    echo "<a href=\"Install/install.php\" >点击安装</a>";
    exit();
}
require("./Inc/index.php");
?>