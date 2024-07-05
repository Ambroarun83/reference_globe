<?php
include '../../config.php';
include '../responseClass.php';
$responseObj = new responseClass();


$search = '';
$where = '';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $where = "WHERE `emp_name` LIKE '%$search%' OR `designation` LIKE '%$search%' OR `dob` LIKE '%$search%' OR `doj` LIKE '%$search%' OR `blood_group` LIKE '%$search%' OR `mobile` LIKE '%$search%' OR `email` LIKE '%$search%' OR `address` LIKE '%$search%' ";
}

//get total records
$qry = $con->prepare("SELECT * FROM employee $where");
$qry->execute();
$row_count = $qry->rowCount();

$pages = ceil($row_count / 10); //it will tell the total count of pages
$data['total_pages'] = $pages;

$responseObj->respond($data, 200);
$con = null;
