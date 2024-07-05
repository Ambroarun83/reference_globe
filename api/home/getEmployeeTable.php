<?php
session_start();
include '../../config.php';
include '../responseClass.php';

$responseObj = new responseClass();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

if (isset($_POST['page'])) {
    $page = ($_POST['page'] - 1) * 10;
}
$search = '';
$where = '';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $where = " WHERE `emp_name` LIKE '%$search%' OR `designation` LIKE '%$search%' OR `dob` LIKE '%$search%' OR `doj` LIKE '%$search%' OR `blood_group` LIKE '%$search%' OR `mobile` LIKE '%$search%' OR `email` LIKE '%$search%' OR `address` LIKE '%$search%' ";
}


//get user table contents using pdo
$qry = $con->prepare("SELECT `role` FROM users WHERE id = :user_id ");
$qry->bindParam(':user_id', $user_id);
$qry->execute();
if ($qry->rowCount() > 0) {
    $user_role = $qry->fetch(PDO::FETCH_ASSOC)['role'];
}

try {
    $qry = $con->prepare("SELECT * FROM employee $where LIMIT :page, 10  ");
    $qry->bindValue(':page', $page, PDO::PARAM_INT);
    $qry->execute();
    $employees = $qry->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $responseObj->respond($e->getMessage(), 500);
    die;
}


$data = array();

if ($qry->rowCount() > 0) {
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
} else if ($user_role == 'User') {
    $data['insertAccess'] = false;
}

$responseObj->respond($data, 200);
$con = null;
