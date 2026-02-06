<?php
$con = mysqli_connect("localhost", "root", "", "student_management");

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>