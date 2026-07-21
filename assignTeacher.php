<?php
require_once('database_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teacher_id = $_POST['teacher_id'];
    $course_id = $_POST['course_id'];

    if ($course_id == '') {
        $course_id = "NULL";
    }

    $query = "UPDATE Teacher SET course_id=$course_id WHERE teacher_id=$teacher_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: assignTeacher.php');
        exit;
    }

    echo "Error: " . mysqli_error($conn);
}

$teacherQuery = "SELECT teacher_id, name FROM Teacher";
$teachers = mysqli_query($conn, $teacherQuery);

$courseQuery = "SELECT course_id, title FROM Course";
$courses = mysqli_query($conn, $courseQuery);

$assignedQuery = "SELECT Teacher.name, Course.title
                  FROM Teacher
                  LEFT JOIN Course ON Teacher.course_id = Course.course_id";
$assigned = mysqli_query($conn, $assignedQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assign Teacher</title>
</head>
<body>
    <h2>Assign Teacher</h2>

    <form method="POST">
        Teacher:
        <select name="teacher_id" required>
            <?php while ($teacher = mysqli_fetch_array($teachers)) { ?>
                <option value="<?php echo $teacher['teacher_id']; ?>">
                    <?php echo $teacher['name']; ?>
                </option>
            <?php } ?>
        </select><br><br>

        Course:
        <select name="course_id">
            <option value="">None</option>
            <?php while ($course = mysqli_fetch_array($courses)) { ?>
                <option value="<?php echo $course['course_id']; ?>">
                    <?php echo $course['title']; ?>
                </option>
            <?php } ?>
        </select><br><br>

        <input type="submit" value="Assign">
    </form>

    <h3>Current Assignments</h3>
    <table border="1">
        <tr><th>Teacher</th><th>Course</th></tr>

        <?php while ($row = mysqli_fetch_array($assigned)) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['title']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <p><a href="index.html">Go to main page</a></p>
</body>
</html>
