<?php
require_once('database_connection.php');

$id = $_GET['id'];

$query = "DELETE FROM Course WHERE course_id=$id";
$result = mysqli_query($conn, $query);

if ($result) {
    header('Location: readCourse.php');
    exit;
}

echo "Error: " . mysqli_error($conn);
?>
