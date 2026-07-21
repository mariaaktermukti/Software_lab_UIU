<?php
$id = $_GET["id"];
require_once('db_connect.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");
mysqli_query( $connect, "DELETE FROM teacher WHERE id=$id" ) or die("Delete failed");
echo "Teacher deleted.<br><a href='readTeacher.php'>View all</a>";
?>