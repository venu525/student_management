<?php
include "db.php";

$id = $_GET['id'];

$result = mysqli_query($con, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form method="post">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
    Mobile: <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>"><br><br>
    Course: <input type="text" name="course" value="<?php echo $row['course']; ?>"><br><br>
    <input type="submit" name="update" value="Update">
</form>

<?php
if (isset($_POST['update'])) {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $mobile = $_POST['mobile'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET 
            name='$name',
            email='$email',
            mobile='$mobile',
            course='$course'
            WHERE id=$id";

    if (mysqli_query($con, $sql)) {
        header("Location: index.php");
    }
}
?>

</body>
</html>