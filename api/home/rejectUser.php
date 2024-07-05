<?php
include '../../config.php';
include '../responseClass.php';

$responseObj = new responseClass();

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $qry = $con->prepare("UPDATE `users` SET is_approved = 2 WHERE `id` = :user_id");
    $qry->bindParam(":user_id", $user_id);
    if ($qry->execute()) {
        $responseObj->respond("User Request Rejected Successfully", 200);
    } else {
        $responseObj->respond("Something went wrong", 400);
    }
} else {
    $responseObj->respond("Something went wrong", 400);
}
$con = null;
