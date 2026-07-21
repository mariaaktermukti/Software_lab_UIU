<?php
require_once('db_connect.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");

if ( isset($_GET["id"]) && isset($_GET["title"]) ) {
    $id = $_GET["id"];
    $dept = $_GET["dept"];
    $title = $_GET["title"];
    $credit = $_GET["credit"];
    $syllabus = $_GET["syllabus"];
    $query = "INSERT INTO course VALUES ('$id', '$dept', '$title', $credit, '$syllabus')";
    mysqli_query( $connect, $query ) or die("Insert failed");
    echo "Course created. <br><a href='readCourse.php'>View all</a>";
    exit;
}
?>
<h1>Create Course</h1>
<form method="get">
    ID: <input type="text" name="id"><br>
    Dept: <input type="text" name="dept"><br>
    Title: <input type="text" name="title"><br>
    Credit: <input type="text" name="credit"><br>
    Syllabus: <textarea name="syllabus"></textarea><br>
    <input type="submit" value="Create">
</form>