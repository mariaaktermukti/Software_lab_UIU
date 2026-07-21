<?php
require_once('db_connect.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");

if ( isset($_GET["teacher_id"]) && isset($_GET["course_id"]) ) {
    $teacher_id = $_GET["teacher_id"];
    $course_id = $_GET["course_id"];
    $query = "INSERT INTO teacher_course (teacher_id, course_id) VALUES ($teacher_id, '$course_id')";
    mysqli_query( $connect, $query ) or die("Insert failed: " . mysqli_error($connect));
    echo "Course added to teacher. <br><a href='addCourseToTeacher.php'>Go back</a>";
    exit;
}

$teachers = mysqli_query( $connect, "SELECT id, name FROM teacher" );
$courses = mysqli_query( $connect, "SELECT id, title FROM course" );
?>
<h1>Add Course to Teacher</h1>
<form method="get">
    Teacher: <select name="teacher_id">
        <?php while($t = mysqli_fetch_array($teachers)) echo "<option value='{$t['id']}'>{$t['name']}</option>"; ?>
    </select><br>
    Course: <select name="course_id">
        <?php while($c = mysqli_fetch_array($courses)) echo "<option value='{$c['id']}'>{$c['title']}</option>"; ?>
    </select><br>
    <input type="submit" value="Add">
</form>
<p><a href='index.html'>Home</a></p>