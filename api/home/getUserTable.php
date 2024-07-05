<?php
session_start();
include '../../config.php';
include '../responseClass.php';

$responseObj = new responseClass();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}


//get user table contents using pdo
$qry = $con->prepare("SELECT `role` FROM users WHERE id = :user_id ");
$qry->bindParam(':user_id', $user_id);
$qry->execute();
if ($qry->rowCount() > 0) {

    $user_role = $qry->fetch(PDO::FETCH_ASSOC)['role'];

    if ($user_role == 'Super Admin' || $user_role == 'Admin') {
        //check if user is admin
        $qry = $con->prepare("SELECT * FROM users"); //admin can see all users
    } else {
        $qry = $con->prepare("SELECT * FROM users WHERE id = :user_id "); //'user' roles only can see/edit thier details
        $qry->bindParam(':user_id', $user_id);
    }
}

$qry->execute();
$users = $qry->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {

    //check if user is admin
    if ($user_role == 'Super Admin' || $user_role == 'Admin') {
        if ($user['role'] == 'Super Admin' || $user['role'] == 'Admin') {
            $action = "<a href='#' class='edit_user' data-id='" . $user['id'] . "'>Edit</a>";
        } else {
            $action = "<a href='#' class='edit_user' data-id='" . $user['id'] . "'>Edit</a>&nbsp;<a href='#' class='delete_user' data-id='" . $user['id'] . "'>Delete</a>";
        }

        if ($user['is_approved'] == 1) {
            $action = "<button class='btn btn-success approve_user' data-id='" . $user['id'] . "'>Approve</button>&nbsp;<button class='btn btn-danger reject_user' data-id='" . $user['id'] . "'>Reject</button>";
        } else if ($user['is_approved'] == 2) {
            $action = "<label>Rejected</label>";
        }
    } else {
        $action = "<a href='#' class='edit_user' data-id='" . $user['id'] . "'>Edit</a>";
    }

    $user['action'] = $action;
    if($user_role == 'User'){
        $user['insertAccess'] = false;
    }

    $data[] = $user;
}

$responseObj->respond($data, 200);
$con = null;
