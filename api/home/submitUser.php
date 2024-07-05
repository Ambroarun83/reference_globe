<?php
session_start();
include '../../config.php';
include '../responseClass.php';
include '../admin.php';

$responseObj = new responseClass();
$adminObj = new Admin();


$user_id = '';
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
}
$role = 'User'; //registration is only for user roles
if (isset($_POST['role'])) {
    $role = $_POST['role'];
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
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
if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
}
if (isset($_POST['dob'])) {
    $dob = $_POST['dob'];
}

$profile_picture = '';
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['name'] != '') {
    $profile_picture = $adminObj->uploadFiles('profile_picture');
}
$signature = '';
if (isset($_FILES['signature']) && $_FILES['signature']['name'] != '') {
    $signature = $adminObj->uploadFiles('signature');
}


try {
    if ($user_id == '') {
        $qry = $con->prepare("INSERT INTO users (`name`, `role`, `mobile`, `email`, `password`, `address`, `gender`, `dob`, `profile_picture`, `signature`) VALUES(:name,:role,:mobile,:email,:password,:address,:gender,:dob,:profile_picture,:signature) ");
    } else {
        $qry = $con->prepare("UPDATE users SET `name` = :name, `role` = :role, `mobile` = :mobile, `email` = :email, `password` = :password, `address` = :address, `gender` = :gender, `dob` = :dob, `profile_picture` = :profile_picture, `signature` = :signature WHERE id = :user_id");
        $qry->bindParam(':user_id', $user_id);
    }
    $qry->bindParam(':name', $name);
    $qry->bindParam(':role', $role);
    $qry->bindParam(':mobile', $mobile);
    $qry->bindParam(':email', $email);
    $qry->bindParam(':password', $password);
    $qry->bindParam(':address', $address);
    $qry->bindParam(':gender', $gender);
    $qry->bindParam(':dob', $dob);
    $qry->bindParam(':profile_picture', $profile_picture);
    $qry->bindParam(':signature', $signature);

    if ($qry->execute()) {
        $responseObj->respond('Success', 200);
    }
} catch (PDOException $e) {
    $responseObj->respond($e->getMessage(), 400);
}
$con = null;
