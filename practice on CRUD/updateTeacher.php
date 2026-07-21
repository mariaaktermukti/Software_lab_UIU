<?php
require_once('database_connection.php');

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $course_id = $_POST['course_id'];

    if ($course_id == '') {
        $course_id = "NULL";
    }

    $query = "UPDATE Teacher SET name='$name', course_id=$course_id WHERE teacher_id=$id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: readTeacher.php');
        exit;
    }

    echo "Error: " . mysqli_error($conn);
}

$query = "SELECT * FROM Teacher WHERE teacher_id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

$courseQuery = "SELECT course_id, title FROM Course";
$courseResult = mysqli_query($conn, $courseQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Teacher</title>
</head>
<body>
    <h2>Update Teacher</h2>

    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['teacher_id']; ?>">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>

        Course:
        <select name="course_id">
            <option value="">None</option>
            <?php while ($course = mysqli_fetch_array($courseResult)) { ?>
                <option value="<?php echo $course['course_id']; ?>">
                    <?php echo $course['title']; ?>
                </option>
            <?php } ?>
        </select><br><br>

        <input type="submit" value="Update">
    </form>

    <p><a href="readTeacher.php">Back</a></p>
</body>
</html>
