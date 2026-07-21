<?php
require_once('db_connect.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");

if ( isset($_GET["course_id"]) && isset($_GET["semester"]) ) {
    $course_id = $_GET["course_id"];
    $semester = $_GET["semester"];
    $query = "DELETE FROM course_semester WHERE course_id='$course_id' AND semester='$semester'";
    mysqli_query( $connect, $query ) or die("Delete failed");
    echo "Course removed from semester. <br><a href='removeCourseFromSemester.php'>Go back</a>";
    exit;
}

// Show current offerings to choose from
$offerings = mysqli_query( $connect,
    "SELECT cs.course_id, c.title, cs.dept, cs.semester
     FROM course_semester cs
     JOIN course c ON cs.course_id = c.id"
);
?>
<h1>Remove Course from Semester</h1>
<form method="get">
    Select offering to remove:
    <select name="course_id">
        <?php while($o = mysqli_fetch_array($offerings)) {
            echo "<option value='{$o['course_id']}'>{$o['title']} ({$o['dept']} - {$o['semester']})</option>";
        } ?>
    </select><br>
    Semester: <input type="text" name="semester" placeholder="e.g. Spring2025"><br>
    <input type="submit" value="Remove">
</form>
<p><a href='index.html'>Home</a></p>