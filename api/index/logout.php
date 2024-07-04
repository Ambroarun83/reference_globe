<?php
session_start();
include '../responseClass.php';
$responseObj = new responseClass();

session_destroy();

$responseTxt = 'Success';
$responseObj->respond($responseTxt, 200);//success