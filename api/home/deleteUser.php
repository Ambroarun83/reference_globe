<?php
session_start();
include '../../config.php';
include '../responseClass.php';

$responseObj = new responseClass();

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    if ($_SESSION['user_id'] == $user_id) {
        $responseObj->respond("You can't delete yourself", 400);
        die();
    } else {
        $qry = $con->prepare("DELETE FROM `users` WHERE `id` = :user_id");
        $qry->bindParam(":user_id", $user_id);
        if ($qry->execute()) {
            $responseObj->respond("User Delete Successfully", 200);
        } else {
            $responseObj->respond("Unable to delete", 400);
        }
    }
} else {
    $responseObj->respond("User ID Unavailable", 400);
}
$con = null;
