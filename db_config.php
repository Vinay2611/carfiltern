<?php
include_once 'function.php';
if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=="127.0.0.1" || $_SERVER['HTTP_HOST']=="192.168.1.1"){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "carfilter";
}else{
    $servername = "dsvinfosolutions.ipagemysql.com";
    $username = "carfilter";
    $password = "carfilter";
    $dbname = "carfilter";
}
// Create connection
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
mysqli_set_charset($db,"utf8");	
?>
