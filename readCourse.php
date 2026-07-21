<?php
require_once('database_connection.php');

$query = "SELECT * FROM Course";
$result = mysqli_query($conn, $query);

echo "<h2> Course List </h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Title</th><th>Update</th><th>Delete</th></tr>";

while ($row = mysqli_fetch_array($result)) {
    $id = $row['course_id'];
    $title = $row['title'];

    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$title</td>";
    echo "<td><a href='updateCourse.php?id=$id'>Update</a></td>";
    echo "<td><a href='deleteCourse.php?id=$id'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>";
echo "<p><a href='index.html'>Go to main page</a></p>";
?>
