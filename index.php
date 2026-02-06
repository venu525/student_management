<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Student Management</title>
</head>
<body>

<h2>Student Registration</h2>

<form method="post" action="">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Mobile: <input type="text" name="mobile" required><br><br>
    Course: <input type="text" name="course" required><br><br>
    <input type="submit" name="submit" value="Save">
</form>

<?php
// INSERT DATA
if (isset($_POST['submit'])) {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $mobile = $_POST['mobile'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name,email,mobile,course)
            VALUES ('$name','$email','$mobile','$course')";

    if (mysqli_query($con, $sql)) {
        echo "Data inserted successfully";
    } else {
        echo "Error";
    }
}
?>

<hr>

<h2>Student List</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Course</th>
    <th>Action</th>
</tr>

<?php
$result = mysqli_query($con, "SELECT * FROM students");

while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['mobile']; ?></td>
    <td><?php echo $row['course']; ?></td>
    <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
        <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>