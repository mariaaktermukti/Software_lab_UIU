<?php
require_once('db_connect.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");

if ( isset($_GET["id"]) && isset($_GET["title"]) ) {
    $id = $_GET["id"];
    $dept = $_GET["dept"];
    $title = $_GET["title"];
    $credit = $_GET["credit"];
    $syllabus = $_GET["syllabus"];
    $query = "UPDATE course SET dept='$dept', title='$title', credit=$credit, syllabus='$syllabus' WHERE id='$id'";
    mysqli_query( $connect, $query ) or die("Update failed");
    echo "Course updated! <br><a href='readCourse.php'>View all</a>";
    exit;
}
$id = $_GET["id"];
$result = mysqli_query( $connect, "SELECT * FROM course WHERE id='$id'" );
$row = mysqli_fetch_array($result);
if (!$row) die("Not found");
?>
<h1>Update Course</h1>
<form method="get">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    Dept: <input type="text" name="dept" value="<?= $row['dept'] ?>"><br>
    Title: <input type="text" name="title" value="<?= $row['title'] ?>"><br>
    Credit: <input type="text" name="credit" value="<?= $row['credit'] ?>"><br>
    Syllabus: <textarea name="syllabus"><?= $row['syllabus'] ?></textarea><br>
    <input type="submit" value="Update">
</form>