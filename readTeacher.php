<?php
require_once('database_connection.php');

$query = "SELECT teacher_id, name, course_id FROM Teacher";
$result = mysqli_query($conn, $query);

echo "<h2>Teacher List</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Course ID</th><th>Update</th><th>Delete</th></tr>";

while ($row = mysqli_fetch_array($result)) {
    $id = $row['teacher_id'];
    $name = $row['name'];
    $course_id = $row['course_id'];

    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$name</td>";
    echo "<td>$course_id</td>";
    echo "<td><a href='updateTeacher.php?id=$id'>Update</a></td>";
    echo "<td><a href='deleteTeacher.php?id=$id'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>";
echo "<p><a href='index.html'>Go to main page</a></p>";
?>
