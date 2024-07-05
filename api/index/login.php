<?php
session_start();
include '../../config.php';
include '../responseClass.php';

$responseObj = new responseClass();

$username = $_POST['lusername'];
$password = $_POST['lpassword'];

$qry = $con->prepare("SELECT * FROM users WHERE `email` = :username and `password` = :password and is_approved = '0' ");
$qry->bindParam(':username', $username);
$qry->bindParam(':password', $password);
$qry->execute();

if ($row = $qry->fetch()) {
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_role'] = $row['role'];
    $responseObj->respond('Success', 200);
} else {
    $responseObj->respond('Invalid', 400);
}

$con = null;
