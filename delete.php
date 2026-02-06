<?php
include "db.php";

$id = $_GET['id'];

mysqli_query($con, "DELETE FROM students WHERE id=$id");

header("Location: index.php");
?>