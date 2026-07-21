<?php
$id = $_GET["id"];
require_once('db_connect.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");
mysqli_query( $connect, "DELETE FROM course WHERE id='$id'" ) or die("Delete failed");
echo "Course deleted.<br><a href='readCourse.php'>View all</a>";
?>