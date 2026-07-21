<?php
require_once('db_connect.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");

if ( isset($_GET["teacher_id"]) && isset($_GET["course_id"]) ) {
    $teacher_id = $_GET["teacher_id"];
    $course_id = $_GET["course_id"];
    $query = "DELETE FROM teacher_course WHERE teacher_id=$teacher_id AND course_id='$course_id'";
    mysqli_query( $connect, $query ) or die("Delete failed");
    echo "Course removed from teacher. <br><a href='removeCourseFromTeacher.php'>Go back</a>";
    exit;
}

// Show current assignments to choose from
$assignments = mysqli_query( $connect,
    "SELECT t.id AS teacher_id, t.name AS teacher, c.id AS course_id, c.title AS course
     FROM teacher_course tc
     JOIN teacher t ON tc.teacher_id = t.id
     JOIN course c ON tc.course_id = c.id"
);
?>
<h1>Remove Course from Teacher</h1>
<form method="get">
    Select assignment to remove:
    <select name="teacher_id">
        <?php while($a = mysqli_fetch_array($assignments)) {
            echo "<option value='{$a['teacher_id']}'>{$a['teacher']} - {$a['course']}</option>";
        } ?>
    </select><br>
    <input type="hidden" name="course_id" value="<?= $a['course_id'] ?>"> <!-- but we need dynamic - better to use two selects or a combined value -->
    <!-- Simpler: show two dropdowns again -->
</form>