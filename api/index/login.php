<?php
session_start();
include '../../config.php';
include '../responseClass.php';

$responseObj = new responseClass();

$username = $_POST['lusername'];
$password = $_POST['lpassword'];

$qry = $con->prepare("SELECT * FROM users WHERE `email` = :username");
$qry->bindParam(':username', $username);
$qry->execute();

if ($row = $qry->fetch()) {
    if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];

        $responseObj->respond('Success', 200); // Success
    } else {
        $responseObj->respond('Invalid', 400); // Bad Request
    }
} else {
    $responseTxt = 'Invalid';
    $responseObj->respond($responseTxt, 400); //bad request
}

$con = null;
