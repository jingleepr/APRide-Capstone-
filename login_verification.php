<?php

$number = $_POST['contact'];
$password = $_POST['password'];

include "dbconnect.php";

$check_query = "SELECT * FROM users WHERE contacts = '$number' AND user_password = '$password'";
$check_result = mysqli_query($dbConn, $check_query);

if (mysqli_num_rows($check_result) <= 0) {
    die("<script>alert('Account not found');window.history.go(-1);</script>");
}


echo "<script>alert('Successfull!'); window.location.href = 'Register.html';</script>";



?>