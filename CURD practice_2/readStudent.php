<?php
require_once('db_connect.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");

$dept_filter = isset($_GET["dept"]) ? $_GET["dept"] : '';
$where = $dept_filter ? "WHERE dept='$dept_filter'" : "";
$results = mysqli_query( $connect, "SELECT * FROM student $where" ) or die("Query failed");

echo "<h1>Students</h1>";
echo "<form method='get'><label>Filter by Dept: <input name='dept' value='$dept_filter'></label> <input type='submit' value='Filter'></form>";

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Dept</th><th>Name</th><th>NID</th><th>Birth</th><th>Address</th><th>Action</th></tr>";

while( $rows = mysqli_fetch_array($results) ) {
    extract( $rows );   // now you have $id, $dept, $name, $nid, $birth, $address
    echo "<tr>";
    echo "<td> $id </td>";
    echo "<td> $dept </td>";
    echo "<td> $name </td>";
    echo "<td> $nid </td>";
    echo "<td> $birth </td>";
    echo "<td> $address </td>";
    echo "<td> <a href='updateStudent.php?id=$id'>Update</a> | <a href='deleteStudent.php?id=$id'>Delete</a> </td>";
    echo "</tr>";
}

echo "</table>";
echo "<p><a href='index.html'>Home</a></p>";
?>