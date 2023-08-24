<?php
header("Content-type: text/html; charset=utf-8");

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "code_camp_bd_fos";

$db = mysqli_connect($servername, $username, $password, $dbname); 
mysqli_set_charset($db, 'UTF8');
if (!$db) {       
    die("Connection failed: " . mysqli_connect_error());
}
?>