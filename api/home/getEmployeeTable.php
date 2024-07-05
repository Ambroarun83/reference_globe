<?php
session_start();
include '../../config.php';
include '../responseClass.php';

$responseObj = new responseClass();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
$page = 10;
if (isset($_POST['page'])) {
    $page = $_POST['page'] - 1 * 10;
}


//get user table contents using pdo
$qry = $con->prepare("SELECT `role` FROM users WHERE id = :user_id ");
$qry->bindParam(':user_id', $user_id);
$qry->execute();
if ($qry->rowCount() > 0) {
    $user_role = $qry->fetch(PDO::FETCH_ASSOC)['role'];
}

$qry = $con->prepare("SELECT * FROM employee LIMIT :page, 10  ");
$qry->bindValue(':page', $page, PDO::PARAM_INT);
$qry->execute();
$employees = $qry->fetchAll(PDO::FETCH_ASSOC);

foreach ($employees as $emp) {

    //check if user is admin
    $action = '';
    if ($user_role == 'Super Admin' || $user_role == 'Admin') {
        $action = "<a href='#' class='edit_emp' data-id='" . $emp['id'] . "'>Edit</a>";
    }

    $emp['action'] = $action;
    if ($user_role == 'User') {
        $emp['insertAccess'] = false;
    }

    $data[] = $emp;
}

$responseObj->respond($data, 200);
$con = null;
