<?php
session_start();

$db['db_host'] = "83.142.225.90";
$db['db_user'] = "greatweddingidea_website";
$db['db_pass'] = ")+HtXeZ[qxCY";
$db['db_name'] = "greatweddingidea_website";



foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

include "functions.php";

$global_settings = displayQuery("settings", "WHERE settingid = 1");

define('ROOT_DIRECTORY', __DIR__);
?>