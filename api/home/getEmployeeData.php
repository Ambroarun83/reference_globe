<?php
session_start();
include '../../config.php';
include '../responseClass.php';
$responseObj = new responseClass();

if (isset($_POST['emp_id'])) {
    $emp_id = $_POST['emp_id'];
}

try {
    $qry = $con->prepare("SELECT * FROM employee WHERE id = :emp_id");
    $qry->bindParam(':emp_id', $emp_id);
    $qry->execute();
    $result = $qry->fetch(PDO::FETCH_ASSOC);
    $responseObj->respond($result, 200);
} catch (PDOException $e) {
    $responseObj->respond($e->getMessage(), 400);
}
$con = null;
