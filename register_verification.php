<?php

$profile = $_POST['profile'];
$number = $_POST['contacts'];
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$date = $_POST['date'];

include "dbconnect.php";

$check_query = "SELECT * FROM users WHERE contacts = '$contacts'";
$check_result = mysqli_query($dbConn, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    die("<script>alert('Phone number already exist');window.history.go(-1);</script>");
}

$sql ="INSERT INTO users (contacts,profile_picture,username,user_password,gender,DOB) VALUES ('$number','$profile','$username','$password','$gender','$date')";

mysqli_query($dbConn, $sql);


if (mysqli_affected_rows($dbConn) <= 0) {
    die("<script>alert('Failed: Unable to insert data!');window.history.go(-1);</script>");
}


echo "<script>alert('Successfully added!'); window.location.href = 'Login.html';</script>";

?>

