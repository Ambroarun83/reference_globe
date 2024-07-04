<?php
$timeZoneQry = "SET time_zone = '+5:30' ";

$host = "localhost";
$db_user = "root";
$db_pass = "";
$dbname = "rg";
$con = new PDO("mysql:host=$host; dbname=$dbname", $db_user, $db_pass);
$con->exec($timeZoneQry);

date_default_timezone_set('Asia/Kolkata');
