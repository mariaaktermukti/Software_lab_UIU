<?php
require_once('database_connection.php');

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];

    $query = "UPDATE Course SET title='$title' WHERE course_id=$id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: readCourse.php');
        exit;
    }

    echo "Error: " . mysqli_error($conn);
}

$query = "SELECT * FROM Course WHERE course_id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Course</title>
</head>
<body>
    <h2>Update Course</h2>

    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['course_id']; ?>">
        Title: <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>

    <p><a href="readCourse.php">Back</a></p>
</body>
</html>
