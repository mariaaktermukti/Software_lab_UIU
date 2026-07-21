<?php

include 'db_connect.php';

$sql = "SELECT * FROM student";

$result = $conn->query($sql);

echo "<table border='1'>";

echo "<tr>";

echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>Email</th>";
echo "<th>Department</th>";

echo "</tr>";

while ($row = $result->fetch_assoc()) {

    echo "<tr>";

    echo "<td>" . $row['id'] . "</td>";

    echo "<td>" . $row['name'] . "</td>";

    echo "<td>" . $row['email'] . "</td>";

    echo "<td>" . $row['department'] . "</td>";

    echo "</tr>";
}

echo "</table>";

?>

<br>

<a href="index.html">Home</a>