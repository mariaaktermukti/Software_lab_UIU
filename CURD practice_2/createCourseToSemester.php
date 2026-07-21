<?php
require_once('db_connect.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");

if ( isset($_GET["course_id"]) && isset($_GET["semester"]) ) {
    $course_id = $_GET["course_id"];
    $dept = $_GET["dept"];
    $semester = $_GET["semester"];
    $query = "INSERT INTO course_semester VALUES ('$course_id', '$dept', '$semester')";
    mysqli_query( $connect, $query ) or die("Insert failed");
    echo "Course added to semester. <br><a href='createCourseToSemester.php'>Go back</a>";
    exit;
}

$courses = mysqli_query( $connect, "SELECT id, title FROM course" );
?>
<h1>Add Course to Semester</h1>
<form method="get">
    Course: <select name="course_id">
        <?php while($c = mysqli_fetch_array($courses)) echo "<option value='{$c['id']}'>{$c['title']}</option>"; ?>
    </select><br>
    Dept: <input type="text" name="dept" placeholder="e.g. CSE"><br>
    Semester: <input type="text" name="semester" placeholder="e.g. Spring2025"><br>
    <input type="submit" value="Add">
</form>
<p><a href='index.html'>Home</a></p>