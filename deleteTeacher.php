<?php
require_once('database_connection.php');

$id = $_GET['id'];

$query = "DELETE FROM Teacher WHERE teacher_id=$id";
$result = mysqli_query($conn, $query);

if ($result) {
    header('Location: readTeacher.php');
    exit;
}

echo "Error: " . mysqli_error($conn);
?>
