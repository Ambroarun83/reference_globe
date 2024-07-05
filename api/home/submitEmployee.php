<?php
include '../../config.php';
include '../responseClass.php';
include '../admin.php';

$responseObj = new responseClass();
$adminObj = new Admin();


$emp_id = '';
if (isset($_POST['emp_id'])) {
    $emp_id = $_POST['emp_id'];
}
if (isset($_POST['emp_name'])) {
    $emp_name = $_POST['emp_name'];
}
if (isset($_POST['designation'])) {
    $designation = $_POST['designation'];
}
if (isset($_POST['dob'])) {
    $dob = $_POST['dob'];
}
if (isset($_POST['doj'])) {
    $doj = $_POST['doj'];
}
if (isset($_POST['blood_group'])) {
    $blood_group = $_POST['blood_group'];
}
if (isset($_POST['mobile'])) {
    $mobile = $_POST['mobile'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['address'])) {
    $address = $_POST['address'];
}

$proof = '';
if (isset($_FILES['proof']) && $_FILES['proof']['name'] != '') {
    $proof = $adminObj->uploadFiles('proof');
} else if (isset($_POST['old_proof']) && $_POST['old_proof'] != '') {
    $proof = $_POST['old_proof'];
}


try {
    if ($emp_id == '') {
        $qry = $con->prepare("INSERT INTO employee (`emp_name`, `designation`, `dob`, `doj`, `blood_group`, `mobile`, `email`, `address`, `proof`) VALUES(:emp_name,:designation,:dob,:doj,:blood_group,:mobile,:email,:address,:proof) ");
    } else {
        $qry = $con->prepare("UPDATE employee SET `emp_name` = :emp_name, `designation` = :designation, `dob` = :dob, `doj` = :doj, `blood_group` = :blood_group, `mobile` = :mobile, `email` = :email, `address` = :address, `proof` = :proof WHERE id = :emp_id");
        $qry->bindParam(':emp_id', $emp_id);
    }
    $qry->bindParam(':emp_name', $emp_name);
    $qry->bindParam(':designation', $designation);
    $qry->bindParam(':dob', $dob);
    $qry->bindParam(':doj', $doj);
    $qry->bindParam(':blood_group', $blood_group);
    $qry->bindParam(':mobile', $mobile);
    $qry->bindParam(':email', $email);
    $qry->bindParam(':address', $address);
    $qry->bindParam(':proof', $proof);

    if ($qry->execute()) {
        $responseObj->respond('Success', 200);
    }
} catch (PDOException $e) {
    $responseObj->respond($e->getMessage(), 400);
}
$con = null;
