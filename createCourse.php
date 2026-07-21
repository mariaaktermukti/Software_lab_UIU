<?php
require_once('database_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];

    $query = "INSERT INTO Course (title) VALUES ('$title')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: readCourse.php');
        exit;
    }

    echo "Error: " . mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Course</title>
</head>
<body>
    <h2>Create Course</h2>

    <form method="POST">
        Title: <input type="text" name="title" required><br><br>
        <input type="submit" value="Create">
    </form>

    <p><a href="index.html">Go to main page</a></p>
</body>
</html>
