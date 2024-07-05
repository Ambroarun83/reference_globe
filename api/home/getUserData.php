<?php
session_start();
include '../../config.php';
include '../responseClass.php';
$responseObj = new responseClass();

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
}

try {
    $qry = $con->prepare("SELECT * FROM users WHERE id = :user_id");
    $qry->bindParam(':user_id', $user_id);
    $qry->execute();
    $result = $qry->fetch(PDO::FETCH_ASSOC);
    $responseObj->respond($result, 200);
} catch (PDOException $e) {
    $responseObj->respond($e->getMessage(), 400);
}
$con = null;
