<?php
session_start();
include '../../config.php';
include '../responseClass.php';

$responseObj = new responseClass();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}


//get user table contents using pdo
$stmt = $con->prepare("SELECT `role` FROM users WHERE id = :user_id ");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
if ($stmt->rowCount() > 0) {

    $user_role = $stmt->fetch(PDO::FETCH_ASSOC)['role'];

    if ($user_role == 'Super Admin' || $user_role == 'Admin') {
        //check if user is admin
        $stmt = $con->prepare("SELECT * FROM users"); //admin can see all users
    } else {
        $stmt = $con->prepare("SELECT * FROM users WHERE id = :user_id "); //'user' roles only can see/edit thier details
        $stmt->bindParam(':user_id', $user_id);
    }
}

$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {

    //check if user is admin
    if ($user_role == 'Super Admin' || $user_role == 'Admin') {
        $action = "<a href='#' class='edit_user' data-id='" . $user['id'] . "'>Edit</a>&nbsp;<a href='#' class='delete_user' data-id='" . $user['id'] . "'>Delete</a>";
        if ($user['is_approved'] == 1) {
            $action = "<button class='btn btn-success approve_user' data-id='" . $user['id'] . "'>Approve</button7>";
        }
    } else {
        $action = "<a href='#' class='edit_user' data-id='" . $user['id'] . "'>Edit</a>";
    }

    $user['action'] = $action;

    $data[] = $user;
}

$responseObj->respond($data, 200);
